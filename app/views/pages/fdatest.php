<?php

// include('conn/conn.php');


// $qstring = mysql_query("SELECT * from drug_dictionary ") or die (mysql_error());

// $getfood = mysql_query("SELECT * from foodregister where RegistrationNumber <> 'RegistrationNumber' ") or die (mysql_error());

// $getcosmetics = mysql_query("SELECT * from cosmetics ") or die (mysql_error());


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Foods and Drugs Authority</title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>vendor1/dataTables/media/css/jquery.dataTables.min.css rel="stylesheet" />
    <link href=<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.min.css rel="stylesheet" />

</head>


<style>
    body {
        min-height: 100%;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.50), rgba(0, 0, 0, 0.50)), url("<?php echo URLROOT ?>img/001.jpg");
        background-size: cover;
    }

    .login-container {
        width: 80%;
        margin: 0 auto;
        margin-top: 50px;

        height: 700px;
        background-color: rgba(50, 50, 56, 0.3);

    }

    .form-control {
        color: #fff !important;
        border: 1px solid #fff;
        border-radius: 0px;
        font-size: 14px;
        background: rgba(0, 0, 0, 0) !important;
    }
</style>

<script src=<?php echo URLROOT ?>vendor1/js/jquery.min.js> </script> <script src=<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js> </script> <script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js"> </script> <script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/bootstrap.min.js"> </script> <script src=<?php echo URLROOT ?>js/notify.min.js> </script> <script src=<?php echo URLROOT ?>js/jquery.blockUI.js> </script> <script src=<?php echo URLROOT ?>vendor1/js/autoNumeric.js> </script> <script type="text/javascript">
    $(document).ready(function() {

        $('#tabs').tabs();
        $('.food').hide();
        //$('.drug').hide();

        var category = $('#category').val();

        $('#category').change(function() {
            var x = $(this).val();
            if (x == 'Drug') {
                $('.food').hide();
                $('.drugs').show();
            } else {
                $('.food').show();
                $('.drugs').hide();

            }

        })


        if (category == 'Drug') {
            $("#dproductname").autocomplete({
                source: "ajaxscripts/drugname.php",
                minLength: 1
            });
        }


        if (category == 'Drug') {
            $("#productname").autocomplete({
                source: "ajaxscripts/foodname.php",
                minLength: 1
            });
        }


        $('#searchbtn').click(function() {

            var productname = $("#productname").val();
            var dproductname = $("#dproductname").val();
            var category = $('#category').val();

            if (category == '') {
                alert('Please select product category');
                return false;
            }

            if (category == 'Drug') {

                $.ajax({
                    type: "POST",
                    url: "ajaxscripts/drug.php",
                    data: {
                        dproductname: dproductname
                    },
                    dataType: "html",
                    beforeSend: function() {
                        $.blockUI();
                    },
                    success: function(text) {
                        $('#searchpage').html(text);

                    },
                    complete: function() {
                        $.unblockUI();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + " " + thrownError);
                    }

                });
            } else if (category == 'Food') {

                $.ajax({
                    type: "POST",
                    url: "ajaxscripts/food.php",
                    data: {
                        productname: productname
                    },
                    dataType: "html",
                    beforeSend: function() {
                        $.blockUI();
                    },
                    success: function(text) {
                        $('#searchpage').html(text);

                    },
                    complete: function() {
                        $.unblockUI();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + " " + thrownError);
                    }

                });
            }

        });



    });
</script>

<body>


    <div class='login-container'>





        <div style='padding: 10px'>

            <div style="padding-bottom: 10px;">

                <div class="col-md-10">
                    <h3 style='color:#fff; font-family: Arial'>Search for Registered Products</h3>
                </div>
                <div class="col-md-2"><img src=<?php echo URLROOT ?>img/go-back.png height="20" width="20"> <a href="../" style='color:#fff'>Back to Home</a></div>

            </div>

            <div class="col-md-12" style="padding-bottom: 10px">

                <div class="form-group">
                    <div class="col-md-4">
                        <select class="form-control" id='category'>
                            <option value=''>Select Product Category</option>
                            <option style='color:#000'>Drug</option>
                            <option style='color:#000'>Food</option>
                            <option style='color:#000'>Cosmetics</option>
                            <option style='color:#000'>Medical Devices</option>
                            <option style='color:#000'>Herbal</option>
                            <option style='color:#000'>Food Supplement</option>



                        </select>

                    </div>

                    <div class="col-md-4 drugs">
                        <input type="text" id="dproductname" class="form-control" placeholder="Product Name or Generic Name" />
                    </div>

                    <div class="col-md-4 food">
                        <input type="text" id="productname" class="form-control" placeholder="Product Name" />
                    </div>


                    <div class="col-md-4">
                        <button type='button' class='btn btn-default' id='searchbtn'> Search</button>
                    </div>
                </div>

            </div>
        </div>

        <br />
        <div class="col-md-12">
            <div id='searchpage' style="color:#fff">


                <div id="tabs">
                    <ul style='background:#fff'>
                        <li><a href="#tabs-1">List of Drugs</a></li>
                        <li><a href="#tabs-2">List of Food</a></li>

                        <li><a href="#tabs-3">Cosmetics</a></li>

                        <li><a href="#tabs-4">Herbal</a></li>

                        <li><a href="#tabs-5">Medical Devices</a></li>

                        <li><a href="#tabs-6">Food Supplement</a></li>


                    </ul>
                    <div id="tabs-1" style="height: 500px; overflow-y: scroll">
                        <table class='table table-bordered table-condensed' width="100%" style="color:#fff; font-size:12px">
                            <thead style="color:#000; font-weight:700">
                                <tr>
                                    <td width="173">Product Name</td>
                                    <td width="163">Generic Name</td>
                                    <td width="163">Dosage Form</td>
                                    <td width="199">Manufacturer</td>
                                    <td width="102">Expiry Date</td>
                                    <td width="141">Local Representative</td>
                                </tr>
                            </thead>
                            <?php
                            //  while($get = mysql_fetch_array($qstring))
                            //  {
                            ?>
                            <tr style="color:#000">
                                <td><?php //echo $get['ProductName']  
                                    ?></td>
                                <td><?php //echo str_replace ('+', ', ', $get['GenericName'])   
                                    ?></td>
                                <td><?php //echo $get['DosageForm']  
                                    ?></td>
                                <td><?php //echo $get['Manufacturer']  
                                    ?></td>
                                <td><?php //echo $get['ExpiryDate'];   
                                    ?></td>
                                <td><?php //echo $get['LocalAgent'];  
                                    ?></td>
                            </tr>
                            <?php
                            //  }
                            ?>
                            </tr>

                        </table>
                    </div>
                    <div id="tabs-2" style="height: 500px; overflow-y: scroll">
                        <table class='table table-bordered table-condensed' width="100%" style="color:#fff; font-size:12px">
                            <thead style="color:#000; font-weight:700">
                                <tr>
                                    <td width="143">Registration No:</td>
                                    <td width="193">Product Name</td>
                                    <td width="172">Registration Date</td>

                                </tr>
                            </thead>
                            <?php
                            //  while($get = mysql_fetch_array($getfood))
                            //  {
                            ?>
                            <tr style="color:#000">
                                <td><?php //echo $get['RegistrationNumber'];  
                                    ?></td>
                                <td><?php //echo  $get['ProductName'];   
                                    ?></td>
                                <td><?php //echo  $get['RegistrationDate']; 
                                    ?></td>
                            </tr>
                            <?php
                            // }
                            ?>
                            </tr>

                        </table>
                    </div>

                    <div id="tabs-3" style="height: 500px; overflow-y: scroll">
                        <table class='table table-bordered table-condensed' width="100%" style="color:#fff; font-size:12px">
                            <thead style="color:#000; font-weight:700">
                                <tr>
                                    <td width="30%">Product Name</td>
                                    <td width="30%">Manufacturer</td>
                                    <td width="30%">Legal Representatives</td>
                                    <td width="10%">Expiry Date</td>

                                </tr>
                            </thead>
                            <?php
                            //  while($get = mysql_fetch_array($getcosmetics))
                            //  {
                            ?>
                            <tr style="color:#000">
                                <td><?php //echo $get['productname'];  
                                    ?></td>
                                <td><?php //echo  $get['manufacturer'];   
                                    ?></td>
                                <td><?php //echo  $get['legalrepresentative']; 
                                    ?></td>
                                <td><?php //echo  date('Y-m-d', strtotime($get['expirydate'])); 
                                    ?></td>

                            </tr>
                            <?php
                            //}
                            ?>
                            </tr>

                        </table>





                    </div>
                    <div id="tabs-4" style="height: 500px; overflow-y: scroll">
                    </div>
                    <div id="tabs-5" style="height: 500px; overflow-y: scroll">
                    </div>
                    <div id="tabs-6" style="height: 500px; overflow-y: scroll">
                    </div>

                </div>

            </div>
        </div>



    </div>



</body>

</html>