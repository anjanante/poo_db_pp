<?php
namespace Classes;

class ObjectModel {

    protected static $table_name;

    protected static $db_columns;

    public $errors = [];

    public static function findAll()
    {
        $requete = Db::connect()->query('SELECT * FROM '.static::$table_name);
        $articles = $requete->fetchAll(\PDO::FETCH_OBJ);

        return $articles;
    }

    public static function findById($id)
    {
        $requete = Db::connect()->prepare("SELECT * FROM ".static::$table_name." WHERE id = ?");
       
       
        $requete->execute([$id]);
        $article = $requete->fetch(\PDO::FETCH_OBJ);

        return $article;
    }

    public function save()
    {
        if (method_exists($this, 'validation')) {
            $this->validation();
        }
        if(!empty($this->errors)){ 
            return false; 
        }
        $attributes = $this->attributes();
        // INSERT INTO article (colonnes) VALUES (VALEURS)
        $sql = "INSERT INTO ".static::$table_name." (";
        $sql .= join(',', static::$db_columns);
        $sql .= ") VALUES (";
        $sql .= join(",", array_values($attributes));
        $sql .=")";


        $connexion = Db::connect()->query($sql);
        $connexion->fetch();
        return true;
    }

    public function attributes()
    {
        $attributes = [];
        foreach(static::$db_columns as $column)
        {
            $attributes[$column] =  Db::connect()->quote($this->$column);
        }
        return $attributes;
    }

    public function delete($id)
    {
        Db::connect()->prepare("DELETE FROM ".static::$table_name." WHERE id = ?")->execute([$id]);
        header('Location: show.php');
    }

    public function merge_attributes($args=[])
    {
        foreach($args as $key => $value)
        {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function update($id) {
        $attributes = $this->attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value){
            $attribute_pairs[] = "{$key}={$value}";
        }


        $sql = "UPDATE ".static::$table_name." SET ";
        $sql .= join(',', $attribute_pairs);
        $sql .= " WHERE id =". Db::connect()->quote($id);

        $connexion = Db::connect()->query($sql);
        $connexion->fetch();
    }
}