<?php
require_once('Leads.php');
 $target = $_POST['date'];
  $target1 = $_POST['dateto'];
$source=$_POST['source'];
$obj=new Leads();
$filter=$obj->filter_by_date($target,$target1,$source);
echo json_encode($filter);
?>


