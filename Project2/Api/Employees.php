<?php

class Employees
{
    private $conn;
    private  $db_table;
    public $id;
    public $name;
    public $email;
    public $age;
    public $mobile;
    public $created;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getEmployees(){
        $sqlQuery = "SELECT id , name, email, age, mobile, created FROM "
            .$this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public  function  createEmployee(){
        $sqlQuery = "INSERT INTO
                        ".$this->db_table ."   
                    SET
                        name = :name,
                        email =:email,    
                        age = :age,
                        mobile = :mobile,
                        created = :created";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->created=htmlspecialchars(strip_tags($this->created));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    public function getSingleEmployee(){
        $sqlQuery = "SELECT
                     id,
                     name,
                     email,
                     mobibe,
                     created   
                     FROM
                     ".$this->db_table. "
                      WHERE
                        id = ? 
                        LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->age = $dataRow['age'];
        $this->mobile = $dataRow['mobile'];
        $this->created = $dataRow['created'];
    }

    public function updateEmployee(){
        $sqlQuery = "UPDATE
                      ". $this->db_table."
                     SET 
                       name = :name,
                       email = :email,
                       age =:age,
                       mobile = :mobile,
                       created = :created
                     WHERE
                       id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam("name", $this->name);
        $stmt->bindParam("email", $this->email);
        $stmt->bindParam("age", $this->age);
        $stmt->bindParam("mobile", $this->mobile);
        $stmt->bindParam("created", $this->created);
        $stmt->bindParam("id", $this->id);

        if($stmt->execute){
            return true;
        }
        return  false;
    }

    function  deleteEmployee(){
        $sqlQuery = "DELETE FROM " .$this->db_table. "WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;

        }
        return false;
    }
}
?>