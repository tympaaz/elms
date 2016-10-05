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
   $_SESSION['date']=$_POST['fromdate'];
    $_SESSION['dateto']=$_POST['todate'];
    $_SESSION['source']=$_POST['source'];
    header("location:classes/Export.php");
}
?>
<?php require_once('templates/header.php'); ?>

    <div class="container">
        <div class="filter row">
            <div class="col-9">
                <form id="filter-form">
                    <div class="row">
                        <div class="col-3">
                            <div class="input-grp">
                                <label for="" class="lbl-elms-filter-date-from">Date<i>(from)</i></label>
                                <i class="fa fa-calendar-o"></i>
                                <input type="text" value="" id="elms-filter-date-from" name="elms-filter-date-from" /> 
                            </div>

                            <div class="input-grp">
                                 <label for="" class="lbl-elms-filter-date-from">Date<i>(from)</i></label>
                                <input type="date" id="fromdate" class="form-control" name='fromdate' value="<?php echo date('Y-m-d'); ?>"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="input-grp">
                                <label for="" class="lbl-elms-filter-date-to"><i>(to)</i></label>
                                <i class="fa fa-calendar-o"></i>
                                <input type="text" value="" id="elms-filter-date-to" name="elms-filter-date-to" />
                            </div>

                            <div class="input-grp">
                                <label for="" class="lbl-elms-filter-date-to"><i>(to)</i></label>
                               <input type="date" id="todate" class="form-control" name='todate' value="<?php echo date('Y-m-d'); ?>"/>
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
                <button class="export-as">
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
                        New <span class="number">100</span>
                    </div>
                    <div class="stat">
                        Last Exported <span class="number">200</span>
                    </div>
                    <div class="stat">
                        Total <span class="number">300</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="enquiries container">
        <div class="row">
            <div class="col-12">
                <div class="enquiries-options">
                    <a href="#">Select All</a><span class="sep">|</span><a href="#">Delete All</a><span class="sep">|</span><a href="#">Delete Selected</a>
                </div>
                <table class="enquiries-tbl">
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

                    <tr>
                        <td><input type="checkbox" class="del del-12" /></td>
                        <td class="center">1</td>
                        <td>John Doe</td>
                        <td>me@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-13" /></td>
                        <td class="center">2</td>
                        <td>Paul Adams</td>
                        <td>paul@adams.com</td>
                        <td>9000900012</td>
                        <td>Australia</td>
                        <td>Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-14" /></td>
                        <td class="center">3</td>
                        <td>Ninna Williams</td>
                        <td>nw@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-15" /></td>
                        <td class="center">4</td>
                        <td>Jin Kazama</td>
                        <td>jin@kjin.com</td>
                        <td>9000900012</td>
                        <td>Hongkong</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-12" /></td>
                        <td class="center">5</td>
                        <td>John Doe</td>
                        <td>me@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-13" /></td>
                        <td class="center">6</td>
                        <td>Paul Adams</td>
                        <td>paul@adams.com</td>
                        <td>9000900012</td>
                        <td>Australia</td>
                        <td>Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-14" /></td>
                        <td class="center">7</td>
                        <td>Ninna Williams</td>
                        <td>nw@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-15" /></td>
                        <td class="center">8</td>
                        <td>Jin Kazama</td>
                        <td>jin@kjin.com</td>
                        <td>9000900012</td>
                        <td>Hongkong</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-12" /></td>
                        <td class="center">9</td>
                        <td>John Doe</td>
                        <td>me@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-13" /></td>
                        <td class="center">10</td>
                        <td>Paul Adams</td>
                        <td>paul@adams.com</td>
                        <td>9000900012</td>
                        <td>Australia</td>
                        <td>Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-14" /></td>
                        <td class="center">11</td>
                        <td>Ninna Williams</td>
                        <td>nw@johndoe.com</td>
                        <td>9000900012</td>
                        <td>Canada</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" class="del del-15" /></td>
                        <td class="center">12</td>
                        <td>Jin Kazama</td>
                        <td>jin@kjin.com</td>
                        <td>9000900012</td>
                        <td>Hongkong</td>
                        <td>I am interested in Canada PR. Can you please provide me more details</td>
                        <td><i class="fa fa-trash-o"></i></td>
                    </tr>
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