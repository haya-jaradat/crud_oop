<?php

class category
{
    private $connection;
    private $table_name = "categories";

    public $id;
    public $name;

    public function __construct($connection)
    {
        $this->connection= $connection;
    }

    public function get_categories()
    {
        $query ="SELECT id,name from"." ". $this->table_name." "."order by name" ;
        $statment=$this->connection->prepare($query);
        $statment->execute();
        $categories =$statment->fetchall(PDO::FETCH_ASSOC);
        return $categories;
    }
}
?>

