<!-- Header and CSS Directives-->
<?php //  require '../config/config.php';   
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/account_sav.php'  ?>

<!-- Commhr content goes here -->
<div class="content-wrapper">


    <div class="container-fluid main_container">

        <div id='placeholder'>

            <div class="row" style="margin-bottom:20px">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="account.php">
                        <div class="card">
                            <div class="container">
                                <h4><b>&nbsp;</b></h4>
                                <div align='center' class="img-holder">

                                    <i class='fa fa-users fa-4x'></i>
                                </div>
                                <p align="center" class="roboto">Manage User Accounts </p>
                                <h4><b>&nbsp;</b></h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="rates.php">
                        <div class="card">
                            <div class="container">
                                <h4><b>&nbsp;</b></h4>
                                <div align='center' class="img-holder">
                                    <i class='fa fa-shopping-cart fa-4x'></i>
                                </div>
                                <p align="center" class="roboto">Configure Rates </p>
                                <h4><b>&nbsp;</b></h4>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href="reports.php">
                        <div class="card">
                            <div class="container">
                                <h4><b>&nbsp;</b></h4>
                                <div align='center' class="img-holder">
                                    <i class='fa fa-folder-open-o fa-4x'></i>
                                </div>
                                <p align="center" class="roboto">Reports </p>
                                <h4><b>&nbsp;</b></h4>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- End of first upper row -->


            <div class="row" style="margin-bottom:20px">






            </div>
        </div> <!-- End of Placeholder -->

    </div>
</div>


<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>

