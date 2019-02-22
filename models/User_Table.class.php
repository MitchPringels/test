<?php

class User_Table {
    protected $db;
    public function __construct ( $db ) {
        $this->db = $db;
    }

    protected function makeStatement ( $sql, $data = null ){
        $statement = $this->db->prepare( $sql );
        try {
            $statement->execute( $data );
        } catch (Exception $e) {
            $exceptionMessage = "<p>Je probeerde deze SQL uit te voeren: $sql <p>
                    <p>Exception: $e</p>";
            trigger_error($exceptionMessage);
        }
        return $statement;
    }

    public function create ( $username, $email, $password) {
        $this->checkEmail( $email );
        $sql = "INSERT INTO user ( username, email, password)
                VALUES(?, ?, MD5(?))";
        $data= array($username, $email, $password);
        $this->makeStatement( $sql, $data );
        return $this->db->lastInsertId();
    }

    public function readone($user_id) {
      $sql = "SELECT * FROM user WHERE user_id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($user_id);
      $statement->execute($data);
      $model = $statement->fetchObject();
      return $model;
    }
    public function update($user_id, $username, $email){
        $sql= "UPDATE user SET username = ?, email = ? WHERE user_id = ?";
        $data = array($username, $email, $user_id);
        $this->makeStatement( $sql, $data );
    }


    public function delete($user_id){
        $sql= "DELETE FROM user WHERE user_id = ?";
        $data = array($user_id);
        $this->makeStatement( $sql, $data );
    }

    public function currentuser(){
        $user_id = $_SESSION['username'];
        return $this->readone($user_id);
    }


    private function checkEmail ($email) {
        $sql = "SELECT email FROM user WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $sql, $data );
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) {
            $e = new Exception("Sorry, '$email' is allready taken");
            throw $e;
        }
    }

    public function checkCredentials ( $email, $password){
        $sql = "SELECT user_id, email, password FROM user
                WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $sql, $data );
        if ( $statement->rowCount() === 1 ) {
            $model = $statement->fetchObject();
            $out = $model->user_id;
        } else {
            $loginProblem = new Exception( "Logging in failed!" );
            throw $loginProblem;
        }
        return $out;
    }

    //read all the createdartworks
    public function readallartworks($user_id) {
      $sql = "SELECT image FROM art WHERE user_id = ?";
      $statement = $this->db->prepare($sql);
      $data = array($user_id);
      $statement->execute($data);
      return $statement;
    }


}
