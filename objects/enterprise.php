<?php
class Enterprise
{
    // database connection and table name
    private $conn;
    private $table_name = "enterprises";

    // object properties
    public $cif;
    public $name;
    public $activity;
    public $adress;
    public $location;
    public $email;
    public $phone;
    public $places = 1;
    public $comments;


    /**
     * Enterprise constructor.
     * @param Object $db
     */
    public function __construct(Object $db){
        $this->conn = $db;
    }


    /**
     * @return bool
     */
    function create(){


        $query = "INSERT INTO " . $this->table_name . " SET
                    cif=:cif, name=:name, activity=:activity, adress=:adress, location=:location ,
                    email=:email, phone=:phone, contact=:contact,places=:places, comments=:comments";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->cif=htmlspecialchars(strip_tags($this->cif));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->activity=htmlspecialchars(strip_tags($this->activity));
        $this->adress=htmlspecialchars(strip_tags($this->adress));
        $this->location=htmlspecialchars(strip_tags($this->location));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $this->places=htmlspecialchars(strip_tags($this->places));
        $this->comments=htmlspecialchars(strip_tags($this->comments));



        // bind values
        $stmt->bindParam(":cif", $this->cif);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":activity", $this->activity);
        $stmt->bindParam(":adress", $this->adress);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":places", $this->places);
        $stmt->bindParam(":comments", $this->comments);


        if($stmt->execute()) return true;
        print_r($stmt->errorInfo());
        return false;
    }
    function readAll($from_record_num, $records_per_page){
        $query = "SELECT name,adress,location,activity,places FROM " . $this->table_name . " ORDER BY location,name ASC
            LIMIT {$from_record_num}, {$records_per_page}";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
