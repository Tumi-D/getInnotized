<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   
?>
<?php //require "../conn/conn.php"; 
?>
<?php //require "../conn/msconn.php"; 
?>
<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/agent.php'  ?>

<?php
// session_start();
// $uid = $_SESSION['uid'];

// if(isset($_GET['uniqueuid']))  $uniqueuid = $_GET['uniqueuid']; 

// $getlocation =  $con->query("SELECT * FROM LOCATION where UNIQUEUID = '$uniqueuid' ");
// $loc = $getlocation->fetch(PDO::FETCH_ASSOC);
// $latitude = $loc['LATITUDE'];
// $longitude = $loc['LONGITUDE'];
// $city = $loc['CITY'];
// $street= $loc['STREET'];

// $getbus = $con->query("Select * from businessinformation where UNIQUEUID  = '$uniqueuid' ");
// $bus = $getbus->fetch(PDO::FETCH_ASSOC);

// $getdoc = $ucon->query("Select * from DOCUMENTS  where UNIQUEUID  = '$uniqueuid' ");

// $getusers = $con->query("Select * from secondaryusers where mainid = '$uid' ");

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

<!-- Dialogs -->

<body onload=initMap()>

  <div id="limitmodal" class="modal fade" role="dialog" style="width: 800px">
    <div class="modal-dialog" style="width: 800px" role="document">

      <div class="modal-content" style="width: 600px">
        <div class="modal-body" id="limitcontent">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>

  <div id="catmodal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 400px" role="document">

      <div class="modal-content">
        <div class="modal-body" id="catcontent">

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

        </div>

      </div>
    </div>
  </div>

  <div id="accessmodal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 200px" role="document">

      <div class="modal-content">
        <div class="modal-body" id="accesscontent">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>



  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background:url('<?php //echo URLROOT 
                                                      ?>/img/insuance_solution.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
    <div class="row" style='padding-left:20px'>
      <div class='col-md-6'>
        <h3 style='color:orange'><?php //echo strtoupper($bus['BUSINESSNAME'])  
                                  ?></h3>
      </div>

      <div class='col-md-4'>
        <div class="formarea"></div>
        <input type='text' class="form-control" id='address' />
      </div>


      <div class='col-md-1'>
        <button class='btn btn-warning pull-left' id='searchmap' placeholder='Search Location'>Search</button>
      </div>
    </div>
    <hr style='background:#fff' />

    <div style='margin-left:10px'>
      <select class='form-control' style='width:200px'>
        <option>Account Type</option>
        <option>Debit</option>
        <option>Credit</option>
      </select>

    </div>

    <div class='row' style='padding:5px'>

      <div class='col-md-5'>
        <div id="tabs">
          <ul style="background:#fff">
            <li><a href="#tabs-1">Credit Limit </a></li>
            <li><a href="#tabs-2">Security</a></li>

          </ul>
          <div id="tabs-1">

            <table width="100%" class='table table-condensed' s tyle="font-size:13px; font-family:Verdana, Geneva, sans-serif">




              <tr>
                <td><span class='alabel'>Amount</span></td>
                <td class="afteritem">
                  <input type="text" id="amount" /></td>
              </tr>


              <tr>
                <td align='right'></td>
                <td class="afteritem">
                  <button class="btn btn-primary btn-sm  pull-left" id='savedoc'>Save</button>
                </td>
              </tr>

            </table>



          </div>
          <div id="tabs-2">

            <table width="100%" class='table table-condensed' style="font-size:13px; font-family:Verdana, Geneva, sans-serif">

              <tr>

                <td>Security Type</td>

                <td>
                  <select class='form-control' style='width:200px' id='sectype'>
                    <option>Select</option>
                    <option>Lien</option>
                    <option>Collateral</option>
                    <option>Guarantee</option>
                  </select>
                </td>

              </tr>


              <tr class='colla'>
                <td><span class='alabel'>Type </span></td>
                <td class="afteritem">
                  <select class='form-control' style='width:200px' id='sectype'>
                    <option>Select</option>
                  </select>
              </tr>

              <tr>
                <td><span class='alabel'>Amount </span></td>
                <td class="afteritem">
                  <input type="text" id="amount" /></td>
              </tr>

              <tr class='lien'>
                <td><span class='alabel'>Account Number </span></td>
                <td class="afteritem">
                  <input type="text" id="amount" /></td>
              </tr>

              <tr class='docs'>
                <td><span class='alabel'>Supporting Documents </span></td>
                <td class="afteritem">
                  <input type="file" id="supportdoc" /></td>
              </tr>




              <tr class='colla'>
                <td></td>
                <td><button class='btn btn-danger'>Get Location</button></td>
              </tr>


              <tr>
                <td align='right'></td>
                <td class="afteritem">
                  <button class="btn btn-primary btn-sm  pull-left" id='savedoc'>Save</button>
                </td>
              </tr>

            </table>



          </div>

          <div id="tabs-3">


          </div>






        </div>


      </div>

      <div class='col-md-7'>

      </div>

    </div>

  </div>

  </div>
</body>












<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>
<?php $randno = date('YmdHis');   ?>

<script type='text/javascript'>
  $('#tabs').tabs();

  $('.lien').hide();
  $('.docs').hide();
  $('.colla').hide();

  $('#sectype').change(function() {

    var x = $(this).val();
    if (x == 'Lien') {
      $('.lien').show();
      $('.docs').hide();
      $('.colla').hide();
    }


    if (x == 'Guarantee') {
      $('.lien').hide();
      $('.docs').show();
      $('.colla').hide();
    }

    if (x == 'Collateral') {
      $('.lien').hide();
      $('.docs').show();
      $('.colla').show();
    }

  })



  $('#supportdoc').uploadifive({
    'buttonText': 'Supporting Documents',
    'auto': false,
    'method': 'post',
    'multi': false,
    'width': 250,
    'formData': {
      'randno': '<?php echo $randno  ?>',
      'uniqueuid': '<?php echo $uniqueuid  ?>'
    },
    'uploadScript': '../ajaxscripts/uploadfile.php'
  })
</script>