<?php
//namespace Core;
//include 'App/Controllers/UserController.php';
//include 'App/Controllers/ArticleController.php';

class Router
{
    private array $routes;
    public static $_instance;
    public function __construct()

    {
        $this->routes = [

            // Main page`s Actions
            "/" =>  ["Controller" => "Controller",
                      "Action" => "indexAction"],
            "/user/" => ["Controller" => "UserController",
                         "Action" => "MainAction"],
            "/article/" => ["Controller" => "ArticleController",
                "Action" => "MainAction"],

            // Create Actions
          "/user/create" => ["Controller" => "UserController",
              "Action" => "CreateAction"],
            "/article/create" => ["Controller" => "ArticleController",
                "Action" => "CreateAction"],

            // View actions
           "/user/{id}/view" => ["Controller" => "UserController",
              "Action" => "ViewAction"],
            "/article/{id}/view" => ["Controller" => "ArticleController",
                "Action" => "ViewAction"],

            // Update actions
            "/user/{id}/update" => ["Controller" => "UserController",
               "Action" => "UpdateAction"],
            "/article/{id}/update/" => ["Controller" => "ArticleController",
                "Action" => "UpdateAction"],

            // Delete actions
           "/user/{id}/delete" => ["Controller" => "UserController",
                "Action" => "DeleteAction"],
            "/article/{id}/delete" => ["Controller" => "ArticleController",
                "Action" => "DeleteAction"],

        ];
    }

    public static function getInstance() : Router
    {
        if(null === self::$_instance) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    public function parse()
    {

        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $routeInfo) {
            $match = true;
            $param = [];
            $routeParts = explode('/', $route);
            $uriParts = explode('/', $uri);

            foreach ($uriParts as $key => $uriPartName) {
                if (!isset($routeParts[$key])){
                    $match = false;
                    continue;
                }
                if (substr($routeParts[$key], 0, 1) == '{' && substr($routeParts[$key], -1, 1) == '}') {
                    $match = true;
                    $param[trim($routeParts[$key], '{}')] = $uriParts[$key];


                } elseif ($routeParts[$key] !== $uriParts[$key]) {
                    $match = false;

                }
            }
            if ($match)
            {

                $controllerName = ucfirst($uriParts[1]).'Controller';
                include 'App/Controllers/'.$controllerName.'.php';
                $action = new $controllerName();
                $action->{$routeInfo["Action"]}();
                break;
            }

        }
        die(404);
    }

    public function getFormInfo()
    {
        $formArray = $_POST;
        if (isset($formArray)){
            return $formArray;
        }
    }

    public function getId()
    {
        $url = $_SERVER['REQUEST_URI'];
        $routeParts = explode('/', $url);
        $id = $routeParts[2];
        return $id;
    }



}