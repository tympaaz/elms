<?php
require_once('Leads.php');
$id=$_GET['id'];
echo $id;
$obj=new Leads();
$delete=$obj->DeletebyId($id);
header('Location:index.php');
?>
