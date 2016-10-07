<?php
     require_once('Leads.php');
Class Auth{
    public function user(){
        session_start();
            if (isset($_SESSION['user'])) {
            $name=$_SESSION['user'];
            $pass=$_SESSION['pass'];
            require_once('Leads.php');
$obj=new Leads;
$auth=$obj->get_valid($name,$pass);
if(!$auth){
    header('location:Login.php');;
}else{
            header('location:../index.php');
}
        }else{
            header('location:../Login.php');;
        }
    }
}
$db= new Auth();
$user=$db->user();
return $user;
?>