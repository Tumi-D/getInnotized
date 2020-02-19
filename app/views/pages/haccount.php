<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   
?>
<?php //require "../conn/conn.php"; 
?>
<?php //require "../conn/msconn.php"; 
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/ag.php'  ?>

<?php
// session_start();
// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getcomusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '2' ");
// $getpendingusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getbranch = $ucon->query("Select * from branch  where UNIQUEUID = '$uid' ");

// $getusers = $con->query("Select * from basicinformation  where UNIQUEUID = '$uid' ");


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
<div class="content-wrapper" style="height:100%;">
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

        <div class='col-md-12 reportarea'>
          <div id="stabs">
            <ul style="background:#fff">
              <li><a href="#tabs-1">Services</a></li>
              <li><a href="#tabs-2">Activities</a></li>
              <li><a href="#tabs-3">Products </a></li>

            </ul>

            <div id="tabs-1">


            </div>

            <div id="tabs-2">

              <table class="table table-condensed">
                <tr>
                  <td width='20%'>
                    <select class='form-control'>
                      <option>Choose</option>
                      <option>Daily</option>
                      <option>Weekly</option>
                      <option>Monthly</option>
                      <option>Quarterly</option>
                      <option>Semi-annually</option>
                      <option>Year</option>

                    </select>
                  </td>
                  <td width='40%' align='center'>OR</td>
                  <td><input type='text' id=from class='form-control' placeholder="from" /> </td>
                  <td><input type='text' id=to class='form-control' placeholder="to" /></td>
                  <td><button class="btn btn-info" id='searchreport'><i class="fa fa-search"></i> Search</button></td>

                </tr>
              </table>

            </div>

            <div id="tabs-3">


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

      $('.transact').dataTable({
        "sPaginationType": "full_numbers"
      });


      function AjaxPost(posturl, postdata) {

        $.ajax({
          type: "POST",
          url: posturl,
          data: postdata,
          dataType: "html",
          beforeSend: function() {
            $.blockUI();
          },
          success: function(text) {
            $('.reportarea').html(text);
          },
          complete: function() {
            $.unblockUI();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
          }
        });
      }

      $('#addcard').click(function() {

        var posturl = '../ajaxscripts/addcard.php';
        var postdata = {};
        AjaxPost(posturl, postdata)

      })

      $('#addcat').click(function() {

        var posturl = '../ajaxscripts/addservice.php';
        var postdata = {};
        AjaxPost(posturl, postdata)
      })

      $('#additem').click(function() {
        var posturl = 'ajaxscripts/additem.php';
        var postdata = {};
        AjaxPost(posturl, postdata)
      })


      $('.transfers').click(function() {
        var posturl = 'ajaxscripts/transfer.php';
        var postdata = {};
        AjaxPost(posturl, postdata)
      })

    })
  </script>