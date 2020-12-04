<?php

 class MigrationManager
{
    public $table = 'db.tbl_migration';
    public $path = 'migrations';

    protected $db;

    public function __construct($db) {
        $this->db = $db;
        $this->checkEnvironment();
    }
    public function up($count = 1) {
        $new = $this->getNewMigrations();
        $new = array_slice($new, 0, $count ? (int)$count : $count($new));
        if ($new) {
            foreach ($new as $version) {
                echo '   ' . $version . PHP_EOL;
            }
            if ($this->confirm('Применить миграции?')) {
                foreach ($new as $version) {
                    echo 'Миграция применена ' . $version . PHP_EOL;
                    if ($this->migrateUp($version) === false) {
                        echo 'Фэйл' . PHP_EOL;
                        return 1;
                    }
                }
                echo 'Успех!' . PHP_EOL;
            }
       } else {
           echo 'Все миграции готовы' . PHP_EOL;
        }
        return 0;
    }

    public function down($count = 0) {
    $recent = $this->getRecentMigrations();
    $recent = array_slice($recent, 0, $count ? (int)$count : 1);
    if ($recent) {
        foreach ($recent as $version) {
            echo '     ' . $version . PHP_EOL;
        }
        if ($this->confirm('Отменить миграции?')) {
            foreach ($recent as $version) {
                echo 'Отменяю миграцию ' . $version . PHP_EOL;
                if ($this->migrateDown($version) === false) {
                    echo 'Фэйл!' . PHP_EOL;
                    return 1;
                }
            }
            echo 'Успех!' . PHP_EOL;
        }
    } else {
        echo 'Нет миграций для отмены' . PHP_EOL;
    }
    return 0;
    }

    public function create()
    {
        $version = gmdate('ymd_His');
        echo 'Создаю миграцию ' . $version . PHP_EOL;
        $file = $this->createFullFileName($version);
        $class = $this->createClassName($version);
        $content =
            <<<END
<?php 

class {$class} extends Migration
{
    public function up() {
    
    }
    
    public function down() {
    
    }
}   
END;
        file_put_contents($file, $content);
    }

    public function help() {
        echo <<< END
Usage:
    php migrate.php <action>
Actions:
    up [<count>]
    down [<count>]
    create
END;
    }

    private function confirm($message) {
        echo $message . ' (yes|no) [yes]: ';
        $input = trim(fgets(STDIN));
        return !strncasecmp($input, 'y', 1);
    }

    private function migrateUp($version) {
        $migration = $this->loadMigration($version);
        if ($migration->up() !== false) {
            $this->writeUp($version);
            return true;
        }
        return false;
    }


    private function migrateDown($version) {
        $migration = $this->loadMigration($version);
        if ($migration->down() !== false) {
            $this->writeDown($version);
            return true;
        }
        return false;
    }

    private function loadMigration($version) {
        require_once($this->createFullFileName($version));
        $class = $this->createClassName($version);
        return new $class($this->db);
    }

    private function createClassName($version) {
        return 'm' . $version;
    }
    private function createFullFileName($version) {
        return $this->path . '/' . $this->createFileName($version);
    }

    private function createFileName($version) {
        return 'm' . $version . '.php';
    }

    private function getNewMigrations() {
        $applied = $this->getAppliedMigrations();
        $existed = $this->getExistingMigrations();
        $available = array_diff($existed, $applied);
        sort($available);
        return $available;
    }

     private function getRecentMigrations() {
         $applied = $this->getAppliedMigrations();
         rsort($applied);
         return $applied;
     }

    private function getAppliedMigrations() {
        $migrations = array();
        if ($result = $this->db->query("SELECT id FROM $this->table  ORDER BY id")) {
            foreach ($result as $row) {
                $migrations[] = $row['id'];
            }
        }
        return $migrations;
    }

    private function getExistingMigrations() {
        $migrations = array();
        $handle = opendir($this->path);
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') continue;
            if (preg_match('/^m(\d{6}_\d{6})\.php$/', $file, $matches)) {
                $migrations[] = $matches[1];
            }
        }
        closedir($handle);
        return $migrations;
    }

    private function writeUp($version) {

        $this->db->query("INSERT INTO $this->table   (id) VALUES ('" . $version . "')");
    }

    private function writeDown($version) {
        $this->db->query("DELETE FROM  $this->table  WHERE id = ('" . $version . "')");
    }

    private function checkEnvironment() {
        if (!file_exists($this->path)) {
            mkdir($this->path);
        }
        $this->db->query('CREATE TABLE IF NOT EXISTS ' . $this->table . ' (`id` varchar(64) NOT NULL PRIMARY KEY) ENGINE=innodb DEFAULT CHARSET=utf8;');

    }

}