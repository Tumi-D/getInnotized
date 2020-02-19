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

    <div id="formAlert" class="alert alert-danger" style="display:none">
      <strong>Warning!</strong> <span id="the_message"></span>
    </div>

    <form name="register" method='post'>
      <div id='placeholder'>
        <div class="row" id="">
          <div class="col-lg-12">

            <div>

              <div class="row">
                <div class="col-lg-6">

                  <div class="form-group">

                    <input id="firstname" type="text" name="firstname" placeholder="Firstname" class="form-control input-sm ">
                  </div>
                  <div class="form-group">

                    <input id="lastname" type="text" name="lastname" placeholder="Lastname" class="form-control">
                  </div>
                  <div class="form-group">

                    <input id="email" type="text" name="email" placeholder="Email" class="form-control" />

                  </div>

                  <div class="form-group">

                    <input id="password" name="password" type="password" placeholder="Password" class="form-control" />

                  </div>

                  <div class="form-group">

                    <input id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password" class="form-control" />

                  </div>

                </div>

                <div class="col-lg-12">
                  <div><span style="color:red"></span></div>
                  <div class="form-group">
                    <button name='createAdmin' type="submit" class="btn btn-custom">Create Account</button>
                  </div>
                </div>

              </div>



            </div>

          </div>
        </div>
      </div>
    </form>


  </div>



  <!--Footer and JS directies -->
  <?php require APPROOT . '/views/inc/footer.php'  ?>

  <script>
    // Run this code only when the DOM (all elements) are ready

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    $('form[name="register"]').on("submit", function(e) {


      var firstname = $(this).find('input[name="firstname"]');
      var lastname = $(this).find('input[name="lastname"]');
      var email = $(this).find('input[name="email"]');
      var password = $(this).find('input[name="password"]');
      var cpassword = $(this).find('input[name="confirmpassword"]');

      if ($.trim(firstname.val()) === "") {

        e.preventDefault();
        $('#the_message').html('Firstname is required.');
        // $("#formAlert").slideDown(400);

        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });

      } else if ($.trim(lastname.val()) === "") {

        e.preventDefault();
        $('#the_message').html('Lastname is required.');
        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });

      } else if ($.trim(email.val()) === "") {

        e.preventDefault();
        $('#the_message').html('Email is required.');
        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });

      } else if (!isEmail(email.val())) {

        e.preventDefault();
        $('#the_message').html('Enter valid email.');
        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });

      } else if ($.trim(password.val()) === "") {

        e.preventDefault();
        $('#the_message').html('Password is required.');
        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });
      } else if ($.trim(password.val()) != $.trim(cpassword.val())) {
        e.preventDefault();
        $('#the_message').html('Non-matching password.');
        $("#formAlert").fadeTo(2000, 500).slideUp(500, function() {
          $("#formAlert").slideUp(500);
        });

      } else {
        // e.preventDefault();    // Not needed, just for demonstration
        // $("#formAlert").slideUp(400, function () {    // Hide the Alert (if visible)
        //   alert("Would be submitting form");    // Not needed, just for demonstration
        // firstname.val("");    // Not needed, just for demonstration
        // });
      }

    });
  </script>