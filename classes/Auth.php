<?php
     require_once('Leads.php');
//      $obj=new Leads();
//      $login=$obj->login_details($name,$pass);
Class Auth{
    
    public function user(){
        session_start();
//        if(!isset($_SESSION['user']) ){
//            header('location:Login.php');
//            return false;
//        }else 
            if (isset($_SESSION['user'])) {
            $name=$_SESSION['user'];
            $pass=$_SESSION['pass'];
            require_once('Leads.php');
$obj=new Leads;
$auth=$obj->get_valid($name,$pass);
if(!$auth){
    header('location:../login.php');;
}else{
//        else if($login){
            header('location:../index.php');
}
//        }
        }else{
            header('location:../login.php');;
        }
    }
}
$db= new Auth();
$user=$db->user();
return $user;
?>