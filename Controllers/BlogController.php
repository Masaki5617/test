<?php



require_once(ROOT_PATH."/Models/blog.php");

class BlogController {
  private $Blog;
 

  public function __construct() {
    $this->Blog = new Blog();
    $this->request['post'] = $_POST;
  }
  

  public function  register_controll() {
      $this->Blog->UsersData($_SESSION["form"]); 
      header("location:login.php");
  } 

  

  //登録画面のバリデーションコントロール
  public function register_validate_controll() {
    if(!empty($this->request["post"])) {
      return $this->register_validate();
    }
  }

  public function register_validate() {

    $err= [];

    
    $str = '/^[0-9]+$/';
    $birth_str = '|\d{4}\-\d{1,2}\-\d{1,2}|';
    $email_str = '/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/';
    $birth_str = '|\d{4}\-\d{1,2}\-\d{1,2}|';
    $password_str = '/\A[a-z\d]{8,100}+\z/i';

    if($_POST["name"] == "") {
      $err["name"] = "no_name";
    }
    if($_POST["tel"] == "") {
      $err["tel"] = "no_tel";
    }
    if(!preg_match($str,$_POST["tel"])) {
      $err["tel"] = "no_tel";
    }
    if($_POST["email"] == "") {
      $err["email"] = "no_email";
    }
    if(!preg_match($email_str,$_POST["email"])) {
      $err["email"] = "no_email";
    }
    if($_POST["birth"] == "") {
      $err["birth"] = "no_birth";
    }
    if(!preg_match($birth_str,$_POST["birth"])) {
      $err["birth"] = "no_birth";
    }
    if($_POST["password"] == "") {
      $err["password"] = "no_password";
    }
    if(!preg_match($password_str,$_POST["password"])) {
      $err["password"] = "no_password";
    }
    if(count($err) == 0) {
      $_SESSION["form"] = $_POST;
      header("location:register.php");
    }else{
      $_SESSION["form"] = $_POST;
      return ["err"=>$err];
    }
  }



  
}

?>

