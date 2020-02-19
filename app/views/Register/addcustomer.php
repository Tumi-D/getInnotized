<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/side_nav/settings.php'  ?>
<?php require APPROOT . '/views/inc/side_nav.php'  ?>


<!-- Commhr content goes here -->
<div class="content-wrapper">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <h1 class="page-title">ACCOUNT SETTING</h1>

      </div>
    </div>
    <!-- Breadcrumbs-->
    <ol class="mybreadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item">Account setting</li>
    </ol>
  </div>

  <div class="container-fluid main_container">


    <div id='placeholder'>
      <div class='notify'></div>

      <div class="row">
        <div class="col-lg-12">

          <div>

            <div class="row">
              <div class="col-lg-6">


                <div class="form-group">

                  <select class="form-control" id='customerid'>
                    <option value=''>Select Company</option>
                    <?php
                    foreach ($data['records'] as $key) {
                      echo '<option value=' . $key->cid . '>' . $key->companyname . '</option>';
                      ?>

                    <?php
                    }
                    ?>

                  </select>
                </div>




                <div class="form-group">

                  <input id="email" type="text" placeholder="Email" class="form-control" />

                </div>

                <div class="form-group">

                  <input id="password" type="password" placeholder="Password" class="form-control" />

                </div>

                <div class="form-group">

                  <input id="confirmpassword" type="password" placeholder="Confirm Password" class="form-control" />

                </div>

              </div>

              <div class="col-lg-12">
                <div><span style="color:red"></span></div>
                <div class="form-group">
                  <button id="createCustomerAccount" type="button" class="btn btn-custom">Create Account</button>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>



    </div>


    <!--Footer and JS directies -->
    <?php require APPROOT . '/views/inc/footer.php'  ?>