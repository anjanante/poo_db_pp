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
        $this->errors = [];

        if(empty($this->firstname)){
            $this->errors[] = 'Firstname is empty';
        }

        if(empty($this->lastname)){
            $this->errors[] = 'Lastname is empty';
        }

        if(empty($this->email))
        {
            $this->errors[] = 'Email is empty';
        }

        if(empty($this->password))
        {
            $this->errors[] = 'Password is empty';
        }

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            $this->errors[] = 'Please check email.';
        }

        if(strlen($this->password ) < 5)
        {
            $this->errors[] = 'Password must have at least 5 chars';
        }
        return $this->errors;
    }

    public static function userConnect()
    {
        $requete = Db::connect()->prepare("SELECT * FROM user WHERE email = ?");
        $requete->execute([$_POST['email']]);
        $user = $requete->fetch(\PDO::FETCH_OBJ);

        if($user) {
            if(password_verify($_POST['password'], $user->password))
            {
                $session = new Session();
                $session->login($user);

                header("Location: users/show.php");
                exit;
            }
        }
    }
}