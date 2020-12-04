<?php
include 'App/Models/UserModel.php';
include 'Core/View.php';

class UserController extends View
{
    private $UserModel;
    private $View;
    public array $errors = [
    'login' => '',
    'username' => '',
    'birthdate' => '',
    ];

    public function __construct()
    {
        $this->UserModel = new UserModel(Router::getInstance()->getId());
        $this->View = new View();
    }


    public function MainAction()
    {
        $attributes = $this->UserModel->getAll();
        $this->View->render('App/Views/User/main.php', ['attributes' => $attributes]);

    }

    public function ViewAction()
    {

        $attribute = $this->UserModel->getById();
        $this->View->render('App/Views/User/view.php', ['attribute' => $attribute ]);

    }
    public function CreateAction()
    {
        $attribute = [
            'id' => '',
            'login' => '',
            'username' => '',
            'surname' => '',
            'birthdate' => '',
            'email' => '',
            'address' => '',
        ];

        $errors = $this->errors;



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $attribute = array_merge($attribute, $_POST);
            $isValid = $this->UserModel->validate($attribute, $errors);

            if ($isValid) {
                $this->UserModel->create($_POST);
                header("Location: /user/");
            }

        }
        $this->View->render('App/Views/User/create.php',['attribute' => $attribute,
                                                                'errors' => $errors]);

    }

    public function UpdateAction()
    {
        $attribute = $this->UserModel->getById();
        $updateData = Router::getInstance()->getFormInfo();

        $errors = $this->errors;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $attribute = array_merge($attribute, $_POST);

            $isValid = $this->UserModel->validate($attribute, $errors);
            if ($isValid) {
                $attribute = $this->UserModel->update($updateData);
                header("Location: /user/");
            }
        }
        $this->View->render('App/Views/User/update.php', ['attribute' => $attribute,
                                                                    'errors' => $errors]);
    }

    public function DeleteAction()
    {

        $attribute = $this->UserModel->delete();
        $this->View->render('App/Views/User/delete.php',['attribute' => $attribute]);

    }

}

