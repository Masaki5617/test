<?php

require_once(ROOT_PATH."/Models/Db.php");




class Blog extends Db{
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  public function UsersData($usersData = null) {
    $password = password_hash($usersData["password"],PASSWORD_DEFAULT);
    $this->dbh->beginTransaction();
    try{
      $sql = 'INSERT INTO usersData(name,tel,email,birth,password) VALUES(:name,:tel,:email,:birth,:password)';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(":name",$usersData["name"],PDO::PARAM_STR);
      $sth->bindParam(":tel",$usersData["tel"],PDO::PARAM_INT);
      $sth->bindParam(":email",$usersData["email"],PDO::PARAM_STR);
      $sth->bindParam(":birth",$usersData["birth"],PDO::PARAM_STR);
      $sth->bindParam(":password",$password,PDO::PARAM_STR);
      $sth->execute();
      $this->dbh->commit();
    }catch(PDOException $e) {
      echo "接続エラー".$e->getmessage();
      exit();
    }
  }
    
}

?>