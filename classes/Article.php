<?php
namespace Classes;

use PDO;

class Article {
    private $id;

    private $title;

    private $content;

    private $image;

    private $date;

    public $errors;

    protected static $db_columns =  ['title','content','date'];

    public function __construct($parameters=[])
    {
        $this->setTitle($parameters['title'] ?? '');
        $this->setContent($parameters['content'] ?? '');
        $this->setDate($parameters['date'] ?? null);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public static function findAll(){
        $request = Db::connect()->query('SELECT * FROM article');
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findById(int $id){
        $request = Db::connect()->prepare('SELECT * FROM article where id = ?');
        $request->execute([$id]);
        return $request->fetch(PDO::FETCH_OBJ);
    }

    public function save()
    {
        if(!empty($this->validation())){ 
            return false; 
        }
        $attributes = $this->attributes();
        $sql = "INSERT INTO article (";
        $sql .= join(',', self::$db_columns);
        $sql .= ") VALUES (";
        $sql .= join(",", array_values($attributes));
        $sql .= ")";

        $connexion = Db::connect()->query($sql);
        $connexion->fetch();
    }

    public function attributes()
    {
        $attributes = [];
        foreach(self::$db_columns as $column)
        {
            $attributes[$column] = Db::connect()->quote($this->$column);
        }
        return $attributes;
    }

    public function delete(int $id)
    {
        Db::connect()->prepare('DELETE FROM article WHERE id = ?')->execute([$id]);
        header('Location: show.php');
    }

    public function merge_attributes(array $args=[])
    {
        foreach($args as $key => $value)
        {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function update(int $id) {
        $attributes = $this->attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value){
            $attribute_pairs[] = "{$key}={$value}";
        }


        $sql = "UPDATE article SET ";
        $sql .= join(',', $attribute_pairs);
        $sql .= " WHERE id =". Db::connect()->quote($id);

        $connexion = Db::connect()->query($sql);
        $connexion->fetch();
    }

    public function validation()
    {

        $this->errors = [];

        if(empty($this->title)){
            $this->errors[] = 'The title is empty';
        }

        if(empty($this->content)){
            $this->errors[] = 'The content is empty';
        }

        if(empty($this->date)){
            $this->errors[] = 'The date is empty';
        }

        if(!is_string($this->title))
        {
            $this->errors[] = 'Invalid title';
        }

        if(!is_string($this->content))
        {
            $this->errors[] = 'Invalid content';
        }

        if (\DateTime::createFromFormat('Y-m-d H:i:s', $this->date) == true) {
            $this->errors[] = 'Invalid date';
          }
          
        return $this->errors;

    }
}