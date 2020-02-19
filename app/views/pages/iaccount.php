<?php  //session_start();  
?>
<?php //require '../config/config.php';   
?>
<?php //require "../conn/conn.php"; 
?>
<?php //require "../conn/msconn.php"; 
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/individual.php'  ?>

<?php

// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getcomusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '2' ");
// $getpendingusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getbranch = $ucon->query("Select * from branch  where UNIQUEUID = '$uid' ");

// $getusers = $con->query("Select * from basicinformation  where UNIQUEUID = '$uid' ");


?>

<style>
    tr td {
        padding: 3px !important;
        margin: 0 !important;
        font-size: 12px
    }

    .pinput {
        padding: 4px !important;
        width: 100%;
        border: 1px solid green;
    }
</style>

<!-- Commhr content goes here -->
<div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
    <div class="row" style='padding-left:20px'>
        <div class='col-md-12'>
            <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  ?></h3>
        </div>
        <div id="viewmodal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 800px" role="document">

                <div class="modal-content" style="width: 600px">
                    <div class="modal-body" id="ajaxcontainer">

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button> -->

                    </div>

                </div>
            </div>
        </div>

    </div>
    <hr style='background:#fff' />

    <div class="container-fluid main_container">
        <div>
            <div class="row" style="margin-bottom:10px">

                <div class='col-md-12 reportarea'>
                    <div id="stabs">
                        <ul style="background:#fff">
                            <li><a href="#tabs-1">Transaction History</a></li>

                        </ul>

                        <div id="tabs-1">

                            <table class="table table-condensed">
                                <tr>
                                    <td width='20%'>
                                        <select class='form-control'>
                                            <option>Choose</option>
                                            <option>Daily</option>
                                            <option>Weekly</option>
                                            <option>Monthly</option>
                                            <option>Quarterly</option>
                                            <option>Semi-annually</option>
                                            <option>Year</option>

                                        </select>
                                    </td>
                                    <td width='40%' align='center'>OR</td>
                                    <td><input type='text' id=from class='form-control' placeholder="from" /> </td>
                                    <td><input type='text' id=to class='form-control' placeholder="to" /></td>
                                    <td><button class="btn btn-info" id='searchreport'><i class="fa fa-search"></i> Search</button></td>

                                </tr>
                            </table>


                        </div>





                    </div>




                </div>

            </div>
        </div>


        <!--Footer and JS directies -->

        <?php require APPROOT . '/views/inc/footer.php'  ?>
        <script type='text/javascript'>
            $(document).ready(function() {


                $("#from, #to").datepicker({
                    inline: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "2016:2020",
                    dateFormat: 'yy-mm-dd',
                    maxDate: 0
                });


                $('#stabs').tabs();

                $('.transact').dataTable({
                    "sPaginationType": "full_numbers"
                });


                function AjaxPost(posturl, postdata) {

                    $.ajax({
                        type: "POST",
                        url: posturl,
                        data: postdata,
                        dataType: "html",
                        beforeSend: function() {
                            $.blockUI();
                        },
                        success: function(text) {
                            $('.reportarea').html(text);
                        },
                        complete: function() {
                            $.unblockUI();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        }
                    });
                }



                $('#addcard').click(function() {

                    var posturl = '../ajaxscripts/addcard.php';
                    var postdata = {};
                    AjaxPost(posturl, postdata)

                })

                $('#addcat').click(function() {

                    var posturl = '../ajaxscripts/addservice.php';
                    var postdata = {};
                    AjaxPost(posturl, postdata)
                })

                $('#additem').click(function() {
                    var posturl = 'ajaxscripts/additem.php';
                    var postdata = {};
                    AjaxPost(posturl, postdata)
                })


                $('.transfers').click(function() {
                    var posturl = 'ajaxscripts/transfer.php';
                    var postdata = {};
                    AjaxPost(posturl, postdata)
                })


                //alert('prince');

                // if(category == 'Bill Payments'){ ajaxurl = '../ajaxscripts/bills.php'; } 
                // if(category == 'Airtime Top-Up'){ ajaxurl = '../ajaxscripts/mobilemoney.php'; } 
                // if(category == 'Funds Transfer'){ ajaxurl = '../ajaxscripts/transferfund.php'; } 
                // if(category == 'Cash deposits and withdrawals'){ ajaxurl = '../ajaxscripts/cash.php'; } 
                // if(category == 'Account Opening'){ ajaxurl = '../ajaxscripts/accountopening.php'; } 

                function ajaxModal(posturl, postdata) {

                    $('#viewmodal').modal('show');
                    $.ajax({
                        type: "POST",
                        url: posturl,
                        data: postdata,
                        dataType: "html",
                        beforeSend: function() {
                            $.blockUI();
                        },
                        success: function(text) {
                            $('#ajaxcontainer').html(text);
                        },
                        complete: function() {
                            $.unblockUI();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        }
                    });
                }


                $(document).on('click', '#sendmoney', function() {

                    var posturl = '../ajaxscripts/transferfund.php';
                    var postdata = {};
                    ajaxModal(posturl, postdata)
                })

                $(document).on('click', '#bills', function() {


                    var posturl = '../ajaxscripts/bills.php';
                    var postdata = {};
                    ajaxModal(posturl, postdata)
                })

                $(document).on('click', '#topups', function() {


                    var posturl = '../ajaxscripts/mobilemoney.php';
                    var postdata = {};
                    ajaxModal(posturl, postdata)
                })

                $(document).on('click', '#openaccount', function() {


                    var posturl = '../ajaxscripts/accountopening.php';
                    var postdata = {};
                    ajaxModal(posturl, postdata)
                })

                $(document).on('click', '#deposits', function() {


                    var posturl = '../ajaxscripts/cash.php';
                    var postdata = {};
                    ajaxModal(posturl, postdata)
                })

            })
        </script>