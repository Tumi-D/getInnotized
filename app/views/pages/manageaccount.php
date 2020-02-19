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

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");


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
  <!-- style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%" -->
  <div class="row" style='padding-left:20px'>
    <div class='col-md-6'>
      <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  
                                ?></h3>
    </div>

    <div class='col-md-6'>

    </div>
  </div>
  <hr style='background:#fff' />

  <div class="container-fluid main_container">
    <div>
      <div class="row" style="margin-bottom:10px">

        <div class='col-md-8 reportarea'>

          <div id="stabs">
            <ul style="background:#fff">
              <li><a href="#tabs-1">Transfer Money</a></li>
            </ul>

            <div id="tabs-1">

              <div>
                <table align="center" width="100%" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                  <tr>
                    <td>Transfer From</td>
                    <td> <select class="form-control" style="width:90%" id='fromaccount'>
                        <option>UMO Account</option>
                        <?php
                        // $getmorecards = $ucon->query("SELECT * from cards where UNIQUEUID = '$uid' ");
                        //   while($get = $getmorecards->fetch(PDO::FETCH_OBJ)){

                        //     $value = $get->CARDTYPE.' - '.$get->CARDNUMBER;
                        //     echo '<option>'. $value.'</option>';
                        //   }

                        // $getmorebanks = $ucon->query("SELECT * from BANK where UNIQUEUID = '$uid' ");
                        //   while($get = $getmorebanks->fetch(PDO::FETCH_OBJ)){
                        //   $value = $get->BANKNAME.'-'.$get->ACCOUNTNUMBER;
                        //   echo '<option>'. $value.'</option>';
                        //   }

                        //   $getmobile = $ucon->query("SELECT * from MOBILEMONEY where UNIQUEUID = '$uid' ");
                        //   while($get = $getmobile->fetch(PDO::FETCH_OBJ)){
                        //   $value = $get->MOBILENETWORK.'-'.$get->TELEPHONE;
                        //   echo '<option>'. $value.'</option>';
                        //   }  

                        ?>

                      </select>
                    </td>

                  </tr>


                  <tr>
                    <td>Transfer To</td>
                    <td> <select class="form-control" style="width:90%" id='toaccount'>
                        <option>UMO Account</option>
                        <?php

                        //   $getmorecards = $ucon->query("SELECT * from cards where UNIQUEUID = '$uid' ");
                        //   while($get = $getmorecards->fetch(PDO::FETCH_OBJ)){

                        //     $value = $get->CARDTYPE.' - '.$get->CARDNUMBER;
                        //     echo '<option>'. $value.'</option>';
                        //   }


                        //   $getmorebanks = $ucon->query("SELECT * from BANK where UNIQUEUID = '$uid' ");
                        //   while($get = $getmorebanks->fetch(PDO::FETCH_OBJ)){
                        //   $value = $get->BANKNAME.'-'.$get->ACCOUNTNUMBER;
                        //   echo '<option>'. $value.'</option>';
                        //   }

                        //   $getmobile = $ucon->query("SELECT * from MOBILEMONEY where UNIQUEUID = '$uid' ");
                        //   while($get = $getmobile->fetch(PDO::FETCH_OBJ)){
                        //   $value = $get->MOBILENETWORK.'-'.$get->TELEPHONE;
                        //   echo '<option>'. $value.'</option>';
                        //   }

                        ?>

                      </select>
                    </td>

                  </tr>


                  <tr>
                    <td>Amount</td>
                    <td><input type="text" class="form-control" id="amount" value="" style="width:90%" /></td>

                  </tr>


                  <tr>
                    <td></td>
                    <td> <button class='btn btn-success transferamt'><i class="fa fa-shopping-cart"></i> Transfer</button></td>

                  </tr>

                </table>
              </div>


              <div class='history'></div>


            </div>




          </div>
        </div>





      </div>

    </div>
  </div>


  <!--Footer and JS directies -->

  <?php require APPROOT . '/views/inc/footer.php'  ?>
  <script type='text/javascript'>
    $(document).ready(function() {
      $('#stabs').tabs();

      function bank() {
        $.ajax({
          type: "POST",
          url: "../ajaxscripts/addbank.php",
          data: {},
          dataType: "html",
          beforeSend: function() {
            $.blockUI();
          },
          success: function(text) {
            $('.bkarea').html(text);
          },
          complete: function() {
            $.unblockUI();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
          }
        });
      }


      function card() {
        $.ajax({
          type: "POST",
          url: "../ajaxscripts/addcard.php",
          data: {},
          dataType: "html",
          beforeSend: function() {
            $.blockUI();
          },
          success: function(text) {
            $('.bkarea').html(text);
          },
          complete: function() {
            $.unblockUI();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
          }
        });
      }

      $('.transferamt').click(function() {

        var fromaccount = $('#fromaccount').val();
        var toaccount = $('#toaccount').val();
        var amount = $('#amount').val();


        $.ajax({
          type: "POST",
          url: "../ajaxscripts/atransfer.php",
          data: {
            fromaccount: fromaccount,
            toaccount: toaccount,
            amount: amount
          },
          dataType: "html",
          beforeSend: function() {
            $.blockUI();
          },
          success: function(text) {
            history()
          },
          complete: function() {
            $.unblockUI();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
          }
        });

      })

      function history() {
        $.ajax({
          type: "POST",
          url: "../ajaxscripts/transhistory.php",
          data: {},
          dataType: "html",
          beforeSend: function() {
            $.blockUI();
          },
          success: function(text) {
            $('.history').html(text);
          },
          complete: function() {
            $.unblockUI();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
          }
        });
      }



      $('#fundtype').change(function() {


        if ($(this).val() == 'Bank Account') {
          bank();

        }

        if ($(this).val() == 'Card') {
          card();

        }


      })

    })
  </script>