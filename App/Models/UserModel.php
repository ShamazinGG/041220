<?php

include_once 'Core/Model.php';
class UserModel extends Model
{

    protected $attributes = 'id, login, username, surname, birthdate, email, address';
    protected $table = 'users';



    public function update($data)
    {
        $table = $this->table;
        $id = Router::getInstance()->getId();


        $attributeUp = [
            'login' => $data['login'],
            'username' => $data['username'],
            'surname' => $data['surname'],
            'birthdate' => $data['birthdate'],
            'email' => $data['email'],
            'address' => $data['address']
        ];

        $query = "UPDATE $table SET login=:login, username=:username, surname=:surname,
        birthdate=:birthdate, email=:email, address=:address WHERE id= $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute($attributeUp);


    }



    function validate($attribute, &$errors)
    {
        $isValid = true;
        //Начало валидации
        if (!$attribute['login'] || strlen($attribute['login']) < 5 || strlen($attribute['login']) > 20) {
            $isValid = false;
            $errors['login'] = 'Поле "Логин" обязательно и должно содержать от 5 до 20 символов';
        }

        if (!$attribute['birthdate']) {
            $isValid = false;
            $errors['birthdate'] = '"Дата рождения" введена некорректно';

        }
        // Конец валидации

        return $isValid;

    }
}


