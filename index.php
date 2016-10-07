<?php 
session_start();
if (isset($_SESSION['user'])) {
    $name=$_SESSION['user'];
    $pass=$_SESSION['pass'];
require_once('classes/Leads.php');
$obj=new Leads;
$auth=$obj->get_valid($name,$pass);
if(!$auth){
    header('location:classes/Auth.php');;
}
$leads=$obj->getAllleads($date);
$new=$obj->new_leads();
$old=$obj->old_leads();
$today=$obj->today_leads($date);
if(isset($_POST['submit'])){
    if(isset($_POST['checked_id'])){
    $deletemul=$obj->Delete();
}else{
    echo "Please Select Deleted Leads";
}
}
if(isset($_POST['export'])){    
   $_SESSION['date']=$_POST['elms-filter-date-from'];
    $_SESSION['dateto']=$_POST['elms-filter-date-to'];
    $_SESSION['source']=$_POST['elms-filter-select-source'];
    header("location:export.php");
}
?>
<?php require_once('templates/header.php'); ?>

    <div class="container">
        <div class="filter row">
            <div class="col-9">
                <form id="filter-form" action="">
                    <div class="row">
                        <div class="col-3">
                            <div class="input-grp">
                                <label for="" class="lbl-elms-filter-date-from">Date<i>(from)</i></label>
                                <input type="date" value="" id="elms-filter-date-from" class="form-control" name="elms-filter-date-from"  value="<?php echo date('Y-m-d'); ?>"/> 
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="input-grp">
                                <label for="" class="lbl-elms-filter-date-to"><i>(to)</i></label>
                                <input type="date" value="" id="elms-filter-date-to" class="form-control" name="elms-filter-date-to" value="<?php echo date('Y-m-d'); ?>" />
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="input-grp">
                                <label for="">Source</label>
                                <select id="elms-filter-select-source" name="elms-filter-select-source">
                                    <option value="All">All</option>
                                    <option value="Ask Our Experts">Ask Our Experts</option>
                                    <option value="Schedule an Appointment">Schedule an Appointment</option>
                                    <option value="Telephone Counselling">Telephone Counselling</option>
                                    <option value="Quick Enquiry">Quick Enquiry</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <input type="submit" value="Filter" name="elms-filter-submit" id="elms-filter-submit" />
                        </div>

                    </div>
                </form>
            </div>

            <div class="col-3">
                <button class="export-as" name="export" id="export">
                    <i class="fa fa-download"></i><br/>
                    Export as .CSV
                </button>
            </div>

        </div>
    </div>


    <div class="stats wrap container fullwidth">
        <div class="row">
            <div class="col-6">
                <div class="stats-title">
                    <span class="title">Enquiries Stats</span> - <span class="sub-title">All</span>
                </div>
            </div>

            <div class="col-6">
                <div class="stats-content">
                    <div class="stat">
                        New <span class="number" id="new"><?php echo count($today); ?></span>
                    </div>
                    <div class="stat">
                        Total <span class="number" id="total"><?php echo count($leads); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="enquiries container">
        <div class="row">
            <div class="col-12">
                <div class="enquiries-options">
                    <input type="checkbox" id="checkAll" />Select All<span class="sep">|</span><input type="submit" name="submit" id="submit" value="Delete All" />
                </div>
                <table class="enquiries-tbl" id="filter">
                    <tr>
                        <th class="no-text"></th>
                        <th class="center">S.No</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Interested Country</th>
                        <th>Message</th>
                        <th class="no-text"></th>
                    </tr>

            <?php foreach($today as $lead){ ?>
            <tr>
                <td><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $lead['id']; ?>"/></td>
                <td class="center">
                    <?php
                    static $id=1;
                    echo( $id++)."(".$lead['id'].")";
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
                    <a href="delete.php?id=<?php echo $lead['id'] ?>" class="fa fa-trash"></a>
                </td>
            </tr>
            <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="recently-exported wrap fullwidth container">
        <div class="row">
            <div class="col-12">
                <h3 class="title">Recently Exported Lists</h3>
                <table class="re-lists">
                    <tr>
                        <th>List Name</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Kansaz.com - Ask our expert - 1 October, 2016 - 9:58 PM</td>
                        <td><a class="download-btn" href="#"><i class="fa fa-cloud-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Kansaz.com - Ask our expert - 1 October, 2016 - 9:58 PM</td>
                        <td><a class="download-btn" href="#"><i class="fa fa-cloud-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Kansaz.com - Ask our expert - 1 October, 2016 - 9:58 PM</td>
                        <td><a class="download-btn" href="#"><i class="fa fa-cloud-download"></i></a></td>
                    </tr>

                    <tr>
                        <td>Kansaz.com - Ask our expert - 1 October, 2016 - 9:58 PM</td>
                        <td><a class="download-btn" href="#"><i class="fa fa-cloud-download"></i></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
<?php require_once('templates/footer.php'); 
}else{
     header('location:classes/Auth.php');
} ?>