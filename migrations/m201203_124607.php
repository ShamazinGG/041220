<?php 

class m201203_124607 extends Migration
{
    public function up() {
        $this->db->query("insert into `db`.`articles` (`title`, `body`, `date`, `author`) values
('title', 'articlebody', current_timestamp, 'test'),
('title2', 'articlebody2', current_timestamp, 'test2'),
('title3', 'articlebody3', '', 'test3'),
('title3', 'articlebody3', '', 'test3'),
('title3', 'articlebody3', '', 'test3');");


    }

    public function down() {
        $this->db->query("DELETE FROM db.articles;");

    }
}   