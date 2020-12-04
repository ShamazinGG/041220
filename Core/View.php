<?php
class View
{
    public function render($file, $data = [])
    {
        extract($data);
        include $file;
    }
   public function index()
   {
       include 'App/Views/Main.php';
    }


}
