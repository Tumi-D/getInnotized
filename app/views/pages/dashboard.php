<!-- Header and CSS Directives-->
<?php require APPROOT . '/views/inc/header.php'  ?>
<? php // require APPROOT .'/views/inc/side_nav/dashboard.php'  
?>
<?php require APPROOT . '/views/inc/side_nav.php'  ?>

<!-- Commhr content goes here -->
<div class="content-wrapper">


  <div class="container-fluid main_container">


    <div id='placeholder'>


      <div class="row" style="margin-bottom:20px">

        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/group-refresh.svg" /> </div>
                <p align="center" class="roboto">Administrative Dashboard </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/settings.svg" /> </div>
                <p align="center" class="roboto">Account Settings </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/padlock.svg" /> </div>
                <p align="center" class="roboto">Change Password </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>

      </div>

      <!-- End of first upper row -->


      <div class="row" style="margin-bottom:20px">

        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/newspaper.svg" /> </div>
                <p align="center" class="roboto">Reports </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/upload.svg" /> </div>
                <p align="center" class="roboto">Uploads </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-12">
          <a href="settings">
            <div class="card">
              <div class="container">
                <h4><b>&nbsp;</b></h4>
                <div align='center' class="img-holder"> <img class="card-img" src="<?php echo URLROOT ?>/img/diploma.svg" /> </div>
                <p align="center" class="roboto">Contract Management </p>
                <h4><b>&nbsp;</b></h4>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div> <!-- End of Placeholder -->

  </div>
</div>


<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>