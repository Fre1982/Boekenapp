<?php
require_once 'db_connect.php';

class boeken extends db {

    private $book_id,
    $ISBNNummer,
    $Verhuurd,
    $Titel,
    $Omschrijving,
    $Uitgever,
    $Genre,
    $DatumVerhuur,
    $Schrijver,
    $User_id;

   /* public function __construct($book_id)
    {
        require_once 'db.class.php';
        $conn = new db('localhost','root','','boekenapp');

        $sql="
        SELECT * FROM boeken
        WHERE boek_id = $book_id";
        $this->
    }*/

    public function getBookData($book_id)
     {
         $sql="
         SELECT * FROM boeken
         WHERE boek_id = $book_id";
         $stmt= $this->conn->prepare($sql);
         $stmt->execute();
         /*$this->setBookId($sql['boek_id']);*/
     }

    //leen boek x aan lener y
    public function rent ($book,$user){
        if ($this->User_id = ""){
            $sql="
            UPDATE boeken
            SET user_id = $user
            WHERE boek_id = $book";
            $stmt= $this->conn->prepare($sql);
            $stmt->execute();
        }else{
            echo "Dit boek is al uitgeleend";
        }
    }

    public function checkOut ($book){
        if ($this->User_id = ""){
            echo "Dit boek is niet uitgeleend";
        }else{
            $sql="
            UPDATE boeken
            SET user_id = ''
            WHERE boek_id = $book";
            $stmt= $this->conn->prepare($sql);
            $stmt->execute();
        }
    }

    public function addBook($titel, $ISBNNummer){
      //if($_SERVER['REQUEST_METHOD']=== 'POST'){
        //$titel = empty($_POST['titel'])?'':($_POST['titel']);
        //$ISBNNummer = empty($_POST['isbn'])?'':($_POST['isbn']);
        //$db = new db('localhost');
      //require_once 'db_connect.php';
      $sql="
      INSERT INTO boeken(titel, isbn)
      VALUES ('$titel', '$ISBNNummer')

      ";
      $stmt= $this->conn->prepare($sql);
      $stmt->execute();

      if($conn->query($sql)===true){
        header('Location: index.php');
      }

    }

  /**
   * @return mixed
   */
  public function getBookId()
  {
      return $this->book_id;
  }

  /**
   * @param mixed $book_id
   */
  public function setBookId($book_id)
  {
      $this->book_id = $book_id;
  }

  /**
   * @return mixed
   */
  public function getISBNNummer()
  {
      return $this->ISBNNummer;
  }

  /**
   * @param mixed $ISBNNummer
   */
  public function setISBNNummer($ISBNNummer)
  {
      $this->ISBNNummer = $ISBNNummer;
  }

  /**
   * @return mixed
   */
  public function getVerhuurd()
  {
      return $this->Verhuurd;
  }

  /**
   * @param mixed $Verhuurd
   */
  public function setVerhuurd($Verhuurd)
  {
      $this->Verhuurd = $Verhuurd;
  }

  /**
   * @return mixed
   */
  public function getTitel()
  {
      return $this->Titel;
  }

  /**
   * @param mixed $Titel
   */
  public function setTitel($Titel)
  {
      $this->Titel = $Titel;
  }

  /**
   * @return mixed
   */
  public function getOmschrijving()
  {
      return $this->Omschrijving;
  }

  /**
   * @param mixed $Omschrijving
   */
  public function setOmschrijving($Omschrijving)
  {
      $this->Omschrijving = $Omschrijving;
  }

  /**
   * @return mixed
   */
  public function getUitgever()
  {
      return $this->Uitgever;
  }

  /**
   * @param mixed $Uitgever
   */
  public function setUitgever($Uitgever)
  {
      $this->Uitgever = $Uitgever;
  }

  /**
   * @return mixed
   */
  public function getGenre()
  {
      return $this->Genre;
  }

  /**
   * @param mixed $Genre
   */
  public function setGenre($Genre)
  {
      $this->Genre = $Genre;
  }

  /**
   * @return mixed
   */
  public function getDatumVerhuur()
  {
      return $this->DatumVerhuur;
  }

  /**
   * @param mixed $DatumVerhuur
   */
  public function setDatumVerhuur($DatumVerhuur)
  {
      $this->DatumVerhuur = $DatumVerhuur;
  }

  /**
   * @return mixed
   */
  public function getSchrijver()
  {
      return $this->Schrijver;
  }

  /**
   * @param mixed $Schrijver
   */
  public function setSchrijver($Schrijver)
  {
      $this->Schrijver = $Schrijver;
  }

  /**
   * @return mixed
   */
  public function getUserId()
  {
      return $this->User_id;
  }

  /**
   * @param mixed $User_id
   */
  public function setUserId($User_id)
  {
      $this->User_id = $User_id;
  }

}
