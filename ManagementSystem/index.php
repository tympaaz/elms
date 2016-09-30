<?php 
require_once('header.php');
require_once('Leads.php');
session_start();
$obj=new Leads;
$leads=$obj->getAllleads();
$new=$obj->new_leads();
$old=$obj->old_leads();
if(isset($_POST['submit'])){
    if(isset($_POST['checked_id'])){
    $deletemul=$obj->Delete();
}else{
    echo "Please Select Deleted Leads";
}
}
if(isset($_POST['export'])){    
   $_SESSION['date']=$_POST['fromdate'];
    $_SESSION['dateto']=$_POST['todate'];
    $_SESSION['source']=$_POST['source'];
    header("location:Export.php");
}
?>

<div class="container">
<form method="post" enctype="multipart/form-data">
  <div class="col-md-12">
<div class="col-md-2">
    <input type="date" id="fromdate" class="form-control" name='fromdate' value="<?php echo date('Y-m-d'); ?>"/>
</div>
      <div class="col-md-2">
    <input type="date" id="todate" class="form-control" name='todate' value="<?php echo date('Y-m-d'); ?>"/>
</div>
       <div class="col-md-2">
    <select class="form-control" name="source" id="source">
         <option value="">Select Source</option>
        <option value="QuickEnquiry">Quick Enquiry</option>
        <option value="AskOurExperts">Ask Our Experts</option>
    </select>
</div>
      <div class="col-md-2">
          <input type="button" class="btn btn-info" name="btn" id="btn" value="Filter">
      </div>
      <div class="col-md-2">
          <input type="submit" class="btn btn-success" name="export" id="export" value="Export">
      </div>
  </div>
    <div class="col-md-12">
    <div class="col-md-6">
    </div>
        <div class="col-md-6">
            <div class="col-md-2">
                <h4>New <span class="badge"><?php echo count($new);?></span></h4>
            </div>
             <div class="col-md-2">
                <h4>Exported<span class="badge"><?php echo count($old);?></span></h4>
            </div>
             <div class="col-md-2">
                <h4>Total <span class="badge"><?php echo count($leads);?></span></h4>
            </div>
        </div>
    </div>
    <div class="col-md-12 table-responsive">
        
        <table class="table table-stripped" id="filter">
            <tr>
                <th>
                    
                </th>
                <th>
                    Sno
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Country
                </th>
                <th>
                    Message
                </th>
                <th>
                    
                </th>
            </tr>
            <?php foreach($leads as $lead){
                ?>
            <tr>
                <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $lead['id']; ?>"/></td>
                <td>
                    <?php static $id=1;
                    echo( $id++);
                    ?> 
                </td>
                <td>
                    <?php 
                    echo $lead['name'];
                    ?>
                </td>
                 <td>
                    <?php 
                    echo $lead['email'];
                    ?>
                </td>
                 <td>
                    <?php 
                    echo $lead['phone'];
                    ?>
                </td>
                 <td>
                    <?php 
                    echo $lead['interested_country'];
                    ?>
                </td>
                 <td>
                    <?php 
                    echo $lead['message'];
                    ?>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $lead['id'] ?>" class="glyphicon glyphicon-trash"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
      <input type="submit" name="submit" id="submit" value="DeleteAll">
</form>
</div>
<?php require_once('footer.php');?>