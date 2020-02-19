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

<body>
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insuance_solution_rge3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">
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

    <div class='row' style='padding:5px'>

      <div class='col-md-5'>
        <div id="tabs">
          <ul style="background:#fff">
            <li><a href="#tabs-1">Branch Details </a></li>

          </ul>
          <div id="tabs-1">

            <table class='table table-condensed' width="100%" style="font-size:13px; font-family:Verdana, Geneva, sans-serif">



              <tr>
                <td><span class='alabel'>Branch Name</span></td>
                <td class="afteritem"><input type="text" id="branch" style="width:100%" /></td>
              </tr>

              <tr>


              <tr>

              <tr>
                <td><span class='alabel'>Latitude</span></td>
                <td class="afteritem"><input type="text" id="latitude" style="width:100%" /></td>
              </tr>

              <tr>

              <tr>
                <td><span class='alabel'>Longitude</span></td>
                <td class="afteritem"><input type="text" id="longitude" style="width:100%" /></td>
              </tr>

              <tr>

              <tr>
                <td><span class='alabel'>Popular Name</span></td>
                <td class="afteritem"><input type="text" id="popularname" style="width:100%" /></td>
              </tr>

              <tr>
                <td><span class='alabel'>House/Building No:</span></td>
                <td class="afteritem">
                  <input type="text" id="buildingno" style="width:100%" />
                </td>
              </tr>


              <tr>
                <td><span class='alabel'>Unit No:</span></td>
                <td class="afteritem">
                  <input type="text" id="unitno" style="width:100%" />
                </td>
              </tr>


              <tr>
                <td><span class='alabel'>Street Address</span></td>
                <td class="afteritem"> <input type="text" id="street" style="width:100%" />
                </td>
              </tr>

              <tr>
                <td><span class='alabel'>City</span></td>
                <td class="afteritem">
                  <input type="text" id="city" style="width:100%" />
                </td>
              </tr>

              <tr>
                <td><span class='alabel'>Assembly</span></td>
                <td class="afteritem">

                  <input type="text" id="assembly" style="width:100%" />
                </td>
              </tr>

              <tr>
                <td><span class='alabel'>Region</span></td>
                <td class="afteritem">

                  <input type="text" id="region" style="width:100%" />
                </td>
              </tr>


              <tr>
                <td></td>
                <td class="afteritem">
                  <button class="btn btn-success btn-sm btn-block pull-left" id='savebranch'>Save Branch</button>
                </td>
              </tr>

            </table>

          </div>


        </div>


      </div>

      <div class='col-md-7'>
        <div id="map" style="padding-left: 10px; height: 420px"></div>
        <!-- <div id="pano" style="padding: 10px; height: 200px; margin-top:10px"> </div> -->





      </div>

    </div>

  </div>

  </div>
</body>






<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>