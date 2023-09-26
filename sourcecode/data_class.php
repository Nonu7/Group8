<?php include("db.php");

class data extends db 
{

    private $bookname;
    private $bookdetail;
    private $author;
    private $bookpub;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;
    private $id;




    function __construct() 
     {
        // echo " constructor ";
        echo "</br></br>";
      }

/**
 * Add a new user to the database.
 *
 * string $name The name of the user.
 * string $password The password of the user.
 * string $email The email of the user.
 * string $type The type of the user (e.g., student, teacher).
 */

    function addnewuser($name,$password,$email,$type)
     {
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
        $this->type=$type;


         $q="INSERT INTO userdata(id, name, email, pass,type)VALUES('','$name','$email','$password','$type')";

        if($this->connection->exec($q)) 
            header("Location:admin_service_dashboard.php?msg=New Add done");

        else
            header("Location:admin_service_dashboard.php?msg=Register Fail");
       }


// Authenticate a user's login.

    function userLogin($email, $password) 
     {
        $q="SELECT * FROM userdata where email='$email' and pass='$password'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) 
          {
            foreach($recordSet->fetchAll() as $row) 
             {
                $logid=$row['id'];
                header("location: otheruser_dashboard.php?userlogid=$logid");
               }
            }

        else 
            header("location: index.php?msg=Invalid Credentials");

    }


//Authenticate an admin's login.

    function adminLogin($email, $password) 
      {

        $q="SELECT * FROM admin where email='$email' and pass='$password'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) 
          {

            foreach($recordSet->fetchAll() as $row)
              {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
                 }
            }

        else 
            header("location: index.php?msg=Invalid Credentials");

    }

/**
 * Add a new book to the library.
 *
 *  string $bookname The name of the book.
 *  string $bookdetail The book's details.
 *  string $author The author of the book.
 *  string $bookpub The book's publisher.
 *  int $bookquantity The quantity of the book available.
 */

    function addbook($bookname, $bookdetail, $author, $bookpub, $bookquantity) 
      {
        $this->bookname=$bookname;
        $this->bookdetail=$bookdetail;
        $this->bookaudor=$author;
        $this->bookpub=$bookpub;
        $this->bookquantity=$bookquantity;

       $q="INSERT INTO book (id,bookname, bookdetail, bookaudor, bookpub, branch, bookprice,bookquantity,bookava,bookrent)
       VALUES('', '$bookname', '$bookdetail', '$author', '$bookpub', '$bookquantity','$bookquantity',0)";

        if($this->connection->exec($q)) 
            header("Location:admin_service_dashboard.php?msg=done");

        else 
            header("Location:admin_service_dashboard.php?msg=fail");

    }


   function getbook()
      {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
      }

    function getbookissue()
      {
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
       }

    function userdata() 
      {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
       }

    function getbookdetail($id)
       {
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
        }

    function userdetail($id)
       {
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
        }
