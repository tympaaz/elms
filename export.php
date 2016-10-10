<?php
session_start();
require_once('classes/Leads.php');
$obj=new Leads();
$source=$_SESSION['source'];
$datefrom=$_SESSION['date'];
$dateto=$_SESSION['dateto'];
date_default_timezone_set("Asia/Calcutta");
$date=date('d-m-Y');
$time=date('h.i.s-A');
if(!empty($source)){
   $tmp_file = "Kansaz_".$source."_".$date."_".$time.".csv";
}else{
     $tmp_file = "Kansaz_"."_All_".$date."_".$time.".csv";
}
$filename= "Kansaz_".$source."_".$date."_".$time.".csv";
$fp = fopen('php://output', 'w');
$ff=fopen('upload/'.$tmp_file,'w');
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
    $filter=$obj->Getall_leads($datefrom,$dateto,$source);
        foreach ($filter as $row) {
        fputcsv($ff, $row);
         fputcsv($fp, $row);
    }
    $update=$obj->Updated($datefrom,$dateto,$source);
?>

