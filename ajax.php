<?php
require_once('classes/Leads.php');
 $target = $_POST['date'];
  $target1 = $_POST['dateto'];
$source=$_POST['source'];
$obj=new Leads();
$filter=$obj->Getall_leads($target,$target1,$source);
echo json_encode($filter);
?>


