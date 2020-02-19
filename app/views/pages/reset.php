<?php
// require '../config/config.php';
// require "../conn/conn.php";


// if(isset($_GET['uniqueuid'])) {$uniqueuid = $_GET['uniqueuid'];}

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uniqueuid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo SITENAME   ?></title>

  <link href="<?php echo URLROOT ?>vendor1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo URLROOT ?>vendor1/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>css/loginstyle.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo URLROOT ?>/img/favicon.png">
</head>

<body class="fixed-nav sticky-footer" id="page-top" style="background:url('<?php echo URLROOT ?>img/insurance_solution_large3.jpg');
 background-size:cover;">
  <!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"> UNIVERSAL MONEY </a>
</nav>


  <div class="content-wrappers">
    <div class="container-fluid main_container">
      <div id='placeholder'>
      <div class="row" style="margin-bottom:20px">
       
      
      <div class="login-page">
  <div class="form">
  <h6><?php  //echo $bus['BUSINESSNAME']   ?></h6>
  
    <form class="login-form" method='post'>
      <input type="text" id='loginname' placeholder="Choose Login Name"/>
      <input type="text" id='pin' placeholder="PIN"/>
      <input type="password" id='password' placeholder="Password"/>
      <input type="password"  id='confirmpass'  placeholder="Confirm password"/>
      <button type='button' id='reset' name = 'button'>Create Account</button>
      <div id='space'></div>
    
    </form>
  </div>
</div>

      <!-- End of first upper row -->

      </div>
    </div>   <!-- End of Placeholder -->

    </div>
    </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>
      $('#reset').click(function(){
      
      var password  = $('#password').val();
      var cpassword = $('#confirmpass').val();
      var loginname = $('#loginname').val();
      var pin  = $('#pin').val();
      var resetid  = '<?php print $uniqueuid   ?>';
  

      if(password !== cpassword){
          alert('Both passwords must match');
          return false;
      }

      $.ajax({
                  type: "POST",
                  url: "../ajaxscripts/reset.php",
                  data:{password:password, loginname:loginname, resetid:resetid, pin:pin},
                  dataType: "html",
                  beforeSend: function(){
                  $.blockUI();
                  },
                  success: function(text) {

                  alert('Account Successfully Set Up');
                  window.location = 'http://umopay.ucomgh.com/pages'
                  },
                  complete: function(){
                  $.unblockUI();
                  },
                  error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status + " " + thrownError);
                  }
            })

      })

  </script>




