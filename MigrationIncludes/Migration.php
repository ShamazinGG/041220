<?php


abstract class Migration
{

    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function up() {

    }

    public function down() {

    }

}