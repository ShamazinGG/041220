<?php
include_once 'Core/Model.php';
class ArticleModel extends Model
{
    protected $attributes =  'id,title, body, date, author';
    protected $table = 'articles';


    public function update($data)
    {
        $table = $this->table;
        $id = Router::getInstance()->getId();

        $attributeUp = [
            'title' => $data['title'],
            'body' => $data['body'],
            'date' => $data['date'],
            'author' => $data['author']
        ];

        $query = "UPDATE $table SET title=:title, body=:body, date=:date, author=:author WHERE id= $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute($attributeUp);

    }

    public function validate($attribute, &$errors)
    {
        $isValid = true;
        if (!$attribute['title']) {
            $isValid = false;
            $errors['title'] = 'Поле "Название статьи" обязательно';
        }


        if (!$attribute['author']) {
            $isValid = false;
            $errors['author'] = 'Имя автора статьи обязательно';

        }
        // Конец валидации

        return $isValid;
    }


}