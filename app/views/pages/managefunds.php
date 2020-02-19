<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/company_sidebar.php'  ?>

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
              <li><a href="#tabs-1">Add Funding Source</a></li>
            </ul>
            <div id="tabs-1">

              <table align="center" width="100%" border="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">

                <tr>
                  <td>Type of Fund</td>
                  <td align='left'> <select class="form-control" style="width:90%" id='fundtype'>
                      <option value=''>Select Fund Type</option>
                      <option>Card</option>
                      <option>Bank Account</option>
                      <option>Mobile Money</option>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
              </table>

              <div class='bkarea'> </div>

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

      function mobilemoney() {
        $.ajax({
          type: "POST",
          url: "../ajaxscripts/mobilemoney.php",
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


      $('#fundtype').change(function() {

        if ($(this).val() == 'Bank Account') {
          bank();

        }

        if ($(this).val() == 'Card') {
          card();

        }

        if ($(this).val() == 'Mobile Money') {
          mobilemoney();

        }


      })

    })
  </script>