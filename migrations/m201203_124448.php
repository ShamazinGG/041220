<?php 

class m201203_124448 extends Migration
{
    public function up() {
        $this->db->query("create table if not exists `db`.`articles` (
        `id` int unsigned not null auto_increment,
        `title` varchar(255) not null,
        `body` nvarchar(4000) not null,
        `date` varchar(255) not null,
        `author` varchar(255) not null,
        primary key (id)
);");

    }

    public function down() {
        $this->db->query("drop table if exists `db`.`articles`;");
    }

}   