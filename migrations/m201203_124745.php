<?php 

class m201203_124745 extends Migration
{
    public function up() {
        $this->db->query("alter table `db`.`articles`
    add column `rating` varchar(30) not null default 'normal';");

    }

    public function down() {
        $this->db->query("alter table `db`.articles
    drop column rating;");
    }
}   