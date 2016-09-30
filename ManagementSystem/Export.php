<?php
session_start();
require_once('Leads.php');
$obj=new Leads();
$source=$_SESSION['source'];
$datefrom=$_SESSION['date'];
$dateto=$_SESSION['dateto'];
$date=date('d-m-Y');
$filename = "Kansaz".$date.".csv";
$fp = fopen('php://output', 'w');
$fi=fopen("/upload/".$filename,'w');
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
    $filter=$obj->Getall_leads($datefrom,$dateto,$source);
    foreach ($filter as $row) {
//        fputcsv($fp, $row);
        fputcsv($fi,$row);
    }
     $filter=$obj->Updated($datefrom,$dateto,$source);
     
//      $file = rand(1000,100000)."-".$_FILES['file']['name'];
//    $file_loc = $_FILES['file']['tmp_name'];
// $file_size = $_FILES['file']['size'];
// $file_type = $_FILES['file']['type'];
// $folder="upload/";
// 
// move_uploaded_file($file_loc,$folder.$file);
       ?>
