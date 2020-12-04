<?php
include 'App/Models/ArticleModel.php';
include 'Core/View.php';
class ArticleController
{
    private  $ArticleModel;
    private $View;
    public array $errors = [
        'title' => '',
        'body' => '',
        'author' => '',

    ];

    public function __construct()
    {
        $this->ArticleModel = new ArticleModel(Router::getInstance()->getId());
        $this->View = new View();
    }

    public function MainAction()
    {
        $attributes = $this->ArticleModel->getAll();
        $this->View->render('App/Views/Article/main.php', ['attributes' => $attributes]);
    }

    public function ViewAction()
    {

        $attribute = $this->ArticleModel->getById();
        $this->View->render('App/Views/Article/view.php', ['attribute' => $attribute ]);

    }
    public function CreateAction()
    {
        $attribute = [
            'id' => '',
            'title' => '',
            'body' => '',
            'date' => '',
            'author' => '',
        ];

        $errors = $this->errors;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $attribute = array_merge($attribute, $_POST);
            $isValid = $this->ArticleModel->validate($attribute, $errors);

            if ($isValid) {
                $this->ArticleModel->create($_POST);
                header("Location: /article/");
            }

        }
        $this->View->render('App/Views/Article/create.php',['attribute' => $attribute,
            'errors' => $errors]);
    }



    public function UpdateAction()
    {

        $attribute = $this->ArticleModel->getById();
        $updateData = Router::getInstance()->getFormInfo();
        $errors = $this->errors;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $attribute = array_merge($attribute, $_POST);
            $isValid = $this->ArticleModel->validate($attribute, $errors);
            if ($isValid) {
                $attribute = $this->ArticleModel->update($updateData);
                header("Location: /article/");
            }
        }
        $this->View->render('App/Views/Article/update.php', ['attribute' => $attribute,
            'errors' => $errors]);

    }
    public function DeleteAction()
    {

        $attribute = $this->ArticleModel->delete();
        $this->View->render('App/Views/Article/delete.php',['attribute' => $attribute]);

    }

}