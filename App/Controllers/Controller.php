<?php
include 'Core/View.php';

class Controller
{
    public $View;
    public function __construct()
    {

        $this->View = new View();
    }

    public function indexAction()
   {
        $this->View->index();
    }







}