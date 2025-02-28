<?php
namespace Classes;

use PDO;

class Article extends ObjectModel{
    public $id;

    public $title;

    public $content;

    public $image;

    public $date;

    public $errors;

    protected static $table_name = 'article';

    protected static $db_columns =  ['title','content','date'];


    public function __construct($parameters=[])
    {
        $this->title = $parameters['title'] ?? '';
        $this->content = $parameters['content'] ?? '';
        $this->date = $parameters['date'] ?? '';
    }


    public function validation()
    {
        var_dump('Validation Article child');

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