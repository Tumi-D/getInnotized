<?php
// session_start();
// include("conn/conn.php");
// $uid = $_SESSION['uid'];

//$getdata = $con->query("Select * from users where uid = '$uid' ");

//$get = $getdata->fetch(PDO::FETCH_ASSOC);

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

  <title>UBA Agency Banking</title>


  <!-- Bootstrap core CSS -->
  <link href=<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.min.css rel="stylesheet" />
  <link href=<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css rel="stylesheet" />
  <link href=<?php echo URLROOT ?>vendor1/dataTables/media/css/jquery.dataTables.min.css rel="stylesheet" />
  <link href=<?php echo URLROOT ?>custom-theme/jquery-ui-1.10.0.custom.min.css rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href=<?php echo URLROOT ?>pcss/themes/flick/theme.css"> <link rel="stylesheet" href=<?php echo URLROOT ?>uploadify/uploadifive.css rel="stylesheet">

</head>


<style>
  body {
    min-height: 100%;
    /* background:linear-gradient(0deg,rgba(0,0,0,0.50),rgba(0,0,0,0.50)),url(<?php echo URLROOT ?>)img/backgroundimg.jpg); */
    background-size: cover;
    font-size: 14px;
  }

  .form-container {
    margin: 0 auto;
    height: auto;
    background-color: rgba(40, 50, 56, 0.6);
    padding: 20px;

  }

  .form-control {
    color: #fff;
    border: 1px solid #fff;
    border-radius: 0px;
    font-size: 14px;
    background: rgba(0, 0, 0, 0) !important;
  }

  label {
    color: #fff;
  }
</style>


<script src=<?php echo URLROOT ?>vendor1/js/jquery-ui-1.10.0.custom.min.js> </script> <script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/jquery.dataTables.min.js"> </script> <script type="text/javascript" src=<?php echo URLROOT ?>vendor1/js/bootstrap.min.js"> </script> <script src=<?php echo URLROOT ?>js/notify.min.js> </script> <script src=<?php echo URLROOT ?>js/jquery.blockUI.js> </script> <script src=<?php echo URLROOT ?>vendor1/js/autoNumeric.js> </script> <script src=<?php echo URLROOT ?>uploadify/jquery.uploadifive.min.js> </script> <script type="text/javascript">
  $(document).ready(function() {

    $("#comptxt").autocomplete({
      source: "ajaxscripts/llterm.php",
      minLength: 1
    });

    function summary() {
      $.ajax({
        type: "POST",
        url: "ajaxscripts/userlist.php",
        data: {},
        dataType: "html",
        beforeSend: function() {
          $.blockUI();
        },
        success: function(text) {
          $("#reportforms").html(text);
        },
        complete: function() {
          $.unblockUI();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + " " + thrownError);
        }
      });
    }

    summary();



    $('.addemp').click(function() {



      $.ajax({
        type: "POST",
        url: "ajaxscripts/adduser.php",
        data: {},
        dataType: "html",
        beforeSend: function() {
          $.blockUI();
        },
        success: function(text) {
          $("#reportforms").html(text);
        },
        complete: function() {
          $.unblockUI();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + " " + thrownError);
        }
      });
    })

    $('.emplist').click(function() {



      $.ajax({
        type: "POST",
        url: "ajaxscripts/userlist.php",
        data: {},
        dataType: "html",
        beforeSend: function() {
          $.blockUI();
        },
        success: function(text) {
          $("#reportforms").html(text);
        },
        complete: function() {
          $.unblockUI();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + " " + thrownError);
        }
      });
    })
  })
</script>

<body>
  <div>
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background:#E00202'>

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style='color:#fff'>UBA Agency Banking</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" style='color:#fff'>
          <li class="active"><a href="#">Home</a></li>

          <li style='color:#fff'><a href="user.php">User Administration</a></li>
          <li style='color:#fff'><a href="index.php">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
  </div>
  </nav>

  </div>

  <div style='width:80%;height:730px; margin:0 auto; margin-top:100px;'>

    <div class='row'>
      <div class='col-md-8'><span style='font-size:30px; font-weight:700; color:#FFF; text-transform: uppercase;'>
          <?php  //echo $get['organization']  
          ?> </span></div>
      <div class='col-md-4'>
      </div>
    </div>

    <br />

    <div id='pc' class='row'>
      <div class='col-md-3'>
        <div class="list-group border-bottom">

          <a href="#" class="list-group-item active" id='primarybtn' style='background:#E00202'><span class="fa fa-user"></span>
            User Management</a>
          <a href="#" class="list-group-item addemp"><span class="fa fa-cog"></span>Add User</a>
          <a href="#" class="list-group-item emplist"><span class="fa fa-cog"></span>User List</a>
        </div>
      </div>



      <div class="col-md-9 form-container" id="reportforms" style="padding-left: 10px">

      </div>


    </div>

  </div>



</body>

</html>