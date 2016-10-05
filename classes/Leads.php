<?php
require_once('Application.php');
require_once('Database.php');
date_default_timezone_set("Asia/Calcutta");
$date= date('Y-m-d');
 
class Leads extends Application{
    private $_table="elms_enquiries";
    private $_table1="elms_users";
    private $_table2="elms_uploads";
    public $_id;
   
     public function getAllleads($date) {
        $sql = "SELECT * FROM `{$this->_table}` ";
        $sql.="Where `trash`=0";
        
//        $sql .= " ORDER BY `id`";
        return $this->db->fetchAll($sql);
    }
    public function today_leads($date){
         $sql = "SELECT * FROM `{$this->_table}` ";
        $sql.="Where `trash`=0";
        $sql.=" And `exprt`=0";
        $sql.=" AND date='$date'";
//        $sql .= " ORDER BY `id`";
        return $this->db->fetchAll($sql);
    }
    public function DeletebyId($id){
        if (!empty($id)) {
            $sql = "update `{$this->_table}` set `trash`=1
	  WHERE `id` = '" . $id. "'";
            return $this->db->query($sql);
            return true;
        }
        return false;
    }
    public function Delete(){
     $id=$_POST['checked_id'];
     $ids=implode(',',$id);
      if (!empty($ids)) {
     $sql= "update `{$this->_table}` set `trash`=1 where id in(".$ids.")";
			return $this->db->query($sql);
                  return true;		
		}
                return false;
}
public function filter_by_date($date,$dateto,$source){
    if(!empty($date) && !empty($dateto) && !empty($source)){
     $sql="select * from `{$this->_table}` where (date BETWEEN '$date' AND '$dateto') AND source='$source' ";
        return $this->db->fetchAll($sql);   
        return true;   
    }else
    if(!empty($date) && !empty($dateto)){
       //        $sql="select * from `{$this->_table}` WHERE (date BETWEEN ".$this->db->escape($date)." AND ".$this->db->escape($dateto).")  ";
      $sql="select * from `{$this->_table}` where date BETWEEN '$date' AND '$dateto'";
        return $this->db->fetchAll($sql);   
        return true;
    }else if(!empty($source)){
        $sql="select * from `{$this->_table}` where source='$source'";
        return $this->db->fetchAll($sql);   
        return true;
    }
    return false;
}
public function Getall_leads($date,$dateto,$source){
    if(!empty($date) && !empty($dateto) && !empty($source)){
     $sql="select * from `{$this->_table}` where (date BETWEEN '$date' AND '$dateto') AND source='$source' AND exprt=0 And trash=0";
        return $this->db->fetchAll($sql);  
        return true;   
    }else
    if(!empty($date) && !empty($dateto)){
       //        $sql="select * from `{$this->_table}` WHERE (date BETWEEN ".$this->db->escape($date)." AND ".$this->db->escape($dateto).")  ";
      $sql="select * from `{$this->_table}` where date BETWEEN '$date' AND '$dateto' AND exprt=0 AND trash=0";
        return $this->db->fetchAll($sql);  
        return true;
    }else 
        if(!empty($source)){
        $sql="select * from `{$this->_table}` where source='$source' AND exprt=0 AND trash=0";
        return $this->db->fetchAll($sql);
        return true;
    }
    return false;
}
     public function Updated($date,$dateto,$source){
           if(!empty($date) && !empty($dateto) && !empty($source)){
        $update="update `{$this->_table}` set exprt=1 where (date BETWEEN '$date' AND '$dateto') AND source='$source' ";
      return $this->db->query($update);
        return true;   
    }else
    if(!empty($date) && !empty($dateto)){
         $update="update `{$this->_table}` set exprt=1 where date BETWEEN '$date' AND '$dateto'";
      return $this->db->query($update);
        return true;
    }else if(!empty($source)){ 
        $update="update `{$this->_table}` set exprt=1 where source='$source'";
      return $this->db->query($update);
        return true;
    }
    return false;
     }
     public function new_leads(){
         $sql="select * from `{$this->_table}` where exprt=0 ";
         return $this->db->fetchAll($sql);
            return true;    
     }
       public function old_leads(){
         $sql="select * from `{$this->_table}` where exprt=1 AND trash=0";
         return $this->db->fetchAll($sql);
            return true;    
     }
     public function login_details($name,$pass){
         $sql="select * from `{$this->_table1}` where name='".$name."' AND password='".$pass."'";
         return $this->db->fetchrow($sql);
     }
  public function get_valid($name,$pass){
      $sql="select * from `{$this->_table1}` where name='".$name."' AND password='".$pass."'";
         return $this->db->fetchrow($sql);
  }
 
}

