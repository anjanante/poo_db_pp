<?php
namespace Classes;

class user  extends ObjectModel {

    public $id;

    public $firstname;

    public $lastname;

    public $email;

    public $password;

    public $errors;
    

    protected static $table_name = 'user';
    protected static $db_columns =  ['firstname','lastname','email','password'];

    public function __construct($parameters=[])
    {
        $this->firstname = $parameters['firstname'];
        $this->lastname = $parameters['lastname'];
        $this->email = $parameters['email'];
        $this->password = $parameters['password'];
    }

    public function setPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function save()
    {
        $this->setPassword();
        parent::save();
    }

    public function update(int $id)
    {
        $this->setPassword();
        parent::update($id);
    }

    public function validation()
    {

    }
}