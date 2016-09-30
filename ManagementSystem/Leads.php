<?php
require_once('Application.php');
require_once('Database.php');
class Leads extends Application{
    private $_table="quick_enquiry";
    public $_id;
     public function getAllleads() {
        $sql = "SELECT * FROM `{$this->_table}` ";
        $sql .= " ORDER BY `id`";
        return $this->db->fetchAll($sql);
    }
    public function DeletebyId($id){
        if (!empty($id)) {
            $sql = "DELETE FROM `{$this->_table}`
	  WHERE `id` = '" . $this->db->escape($id). "'";
            return $this->db->query($sql);
            return true;
        }
        return false;
    }
    public function Delete(){
     $id=$_POST['checked_id'];
     $ids=implode(',',$id);
      if (!empty($ids)) {
     $sql= "delete from `{$this->_table}` where id in(".$this->db->escape($ids).")";
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
     $sql="select * from `{$this->_table}` where (date BETWEEN '$date' AND '$dateto') AND source='$source' AND flag=0";
        return $this->db->fetchAll($sql);  
        return true;   
    }else
    if(!empty($date) && !empty($dateto)){
       //        $sql="select * from `{$this->_table}` WHERE (date BETWEEN ".$this->db->escape($date)." AND ".$this->db->escape($dateto).")  ";
      $sql="select * from `{$this->_table}` where date BETWEEN '$date' AND '$dateto' AND flag=0";
        return $this->db->fetchAll($sql);  
        return true;
    }else if(!empty($source)){
        $sql="select * from `{$this->_table}` where source='$source' AND flag=0";
        return $this->db->fetchAll($sql);
        return true;
    }
    return false;
}
     public function Updated($date,$dateto,$source){
           if(!empty($date) && !empty($dateto) && !empty($source)){
        $update="update `{$this->_table}` set flag=1 where (date BETWEEN '$date' AND '$dateto') AND source='$source' ";
      return $this->db->query($update);
        return true;   
    }else
    if(!empty($date) && !empty($dateto)){
         $update="update `{$this->_table}` set flag=1 where date BETWEEN '$date' AND '$dateto'";
      return $this->db->query($update);
        return true;
    }else if(!empty($source)){ 
        $update="update `{$this->_table}` set flag=1 where source='$source'";
      return $this->db->query($update);
        return true;
    }
    return false;
     }
     public function new_leads(){
         $sql="select * from `{$this->_table}` where flag=0 ";
         return $this->db->fetchAll($sql);
            return true;    
     }
       public function old_leads(){
         $sql="select * from `{$this->_table}` where flag=1 ";
         return $this->db->fetchAll($sql);
            return true;    
     }
  
}

