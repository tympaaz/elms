<?php
require_once('classes/Leads.php');
$id=$_GET['id'];
$obj=new Leads();
$delete=$obj->DeletebyId($id);
header('Location:index.php');
?>
