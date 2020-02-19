<!-- Header and CSS Directives-->
<?php //session_start();   
?>
<?php //require '../config/config.php';   
?>
<?php //require "../conn/conn.php"; 
?>
<?php //require "../conn/msconn.php"; 
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/company.php'  ?>

<?php

// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' ");

// $getterminals = $ucon->query("Select * from terminal");

// $agetterminals = $ucon->query("Select * from terminal");


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
<div class="content-wrapper">
  <!-- style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%"> -->
  <div class="row" style='padding-left:20px'>
    <div class='col-md-6'>
      <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  
                                ?></h3>
    </div>

    <div class='col-md-5'>

    </div>



  </div>
  <hr style='background:#fff' />

  <div class='row' style='padding:5px'>

    <div class='col-md-8'>
      <div id="tabs">
        <ul style="background:#fff">
          <li><a href="#tabs-1">AVAILABLE TERMINALS</a></li>
          <li><a href="#tabs-2">ASSIGN TERMINALS</a></li>

        </ul>
        <div id="tabs-1">

          <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
            <thead>
              <tr class='info'>
                <td>Name</td>
                <td>Model</td>
                <td>Serial</td>
                <td>Mac Addresss</td>
                <td>Brand</td>



              </tr>
            </thead>

            <?php

            //  while($b = $getterminals->fetch(PDO::FETCH_ASSOC)){


            ?>

            <tr>
              <td><?php //echo $b['TERMINALNAME']   
                  ?></td>
              <td><?php  //echo $b['MODEL']  
                  ?></td>
              <td><?php  //echo $b['SERIAL']  
                  ?></td>
              <td><?php  //echo $b['MACADDRESS']  
                  ?></td>
              <td><?php  //echo $b['BRAND']  
                  ?></td>

            </tr>

            <?php
            // }
            ?>
          </table>


        </div>


        <div id="tabs-2">

          <table align="center" class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">

            <tr>
              <td><select class="form-control" style="width:90%" id='agentid'>
                  <option>SELECT COMPANY</option>
                  <?php

                  // while($u = $getusers->fetch(PDO::FETCH_ASSOC)){

                  // $unid = $u['AGENTID'];

                  // $getagent = $con->query("SELECT * FROM businessinformation where UNIQUEUID = '$unid' ");
                  // $b = $getagent->fetch(PDO::FETCH_ASSOC);

                  ?>
                  <option value='<?php //echo $b['UNIQUEUID'];  
                                  ?>'><?php //echo $b['BUSINESSNAME']  
                                                                    ?></option>

                  <?php
                  //  }
                  ?>

                </select></td>
              <td align='left'>
                <select class="form-control" style="width:90%" id='terminalid'>
                  <option>SELECT TERMINAL</option>
                  <?php
                  //    while($t = $agetterminals->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <option value='<?php //echo $t['TID'];  
                                  ?>'><?php //echo $t['TERMINALNAME']  
                                                              ?></option>
                  <?php
                  // }
                  ?>

                </select></td>
              <td><button class='btn btn-danger assigntem'>Assign</button></td>
              <td></td>
            </tr>
          </table>


          <div id='terminalspace'></div>

        </div>


      </div>


    </div>



  </div>

</div>

</div>






<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>

<script type='text/javascript'>
  $('#tabs').tabs();
  console.log("got here");
</script>