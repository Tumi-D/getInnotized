<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/company.php'  ?>

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
  <!-- style="background:url('<?php echo URLROOT ?>img/insurance_solution_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%"> -->
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
              <li><a href="#tabs-1">Activities</a></li>
              <li><a href="#tabs-2">Active Accounts</a></li>
              <li><a href="#tabs-3">Pending Accounts</a></li>
              <li><a href="#tabs-4">Employess</a></li>
              <li><a href="#tabs-5">Branches </a></li>
            </ul>

            <div id="tabs-1">

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

              <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
                <thead>
                  <tr class='info'>
                    <td>Customer</td>
                    <td>Product</td>
                    <td>Amount (GHS)</td>
                    <td>Date Colleted</td>
                    <td>Branch</td>
                    <td>Agent</td>
                  </tr>
                </thead>

                <?php
                //    $total = 0;
                //     while($u = $getbilling->fetch(PDO::FETCH_ASSOC)){

                //       $agentid = $u['AGENTID'];
                //       $cid  =  $u['UNIQUEUID'];

                //       $total = $total + $u['AMOUNT'];

                //       $getbasicinfo = $con->query("Select * from BASICINFORMATION  where UNIQUEUID = '$agentid' ");
                //       $ba =   $getbasicinfo->fetch(PDO::FETCH_ASSOC);

                //       $getcusnfo = $con->query("Select * from CUSTOMERS  where UNIQUEUID = '$cid' ");
                //       $cus =  $getcusnfo->fetch(PDO::FETCH_ASSOC);

                ?>

                <tr>
                  <td><a href='customerdetails.php?unid=<?php // echo $cid 
                                                        ?>'><?php //echo $cus['FULLNAME'];  
                                                                                ?></a></td>
                  <td><?php // echo $u['PRODUCTNAME'];   
                      ?></td>
                  <td><?php // echo number_format($u['AMOUNT'], 2)   
                      ?></td>
                  <td><?php //echo $u['BILLINGDATE'];   
                      ?></td>
                  <td><?php //echo $ba['BRANCH'];   
                      ?></td>
                  <td><a href='agentcollections.php?unid=<?php //echo $agentid 
                                                          ?>'>
                      <?php  //echo $ba['FULLNAME'];  
                      ?></td>
                </tr>


                <?php
                //  }
                ?>


              </table>


              <div align='center'>
                <h3 style='color:green'>TOTAL COLLECTED: <?php  //echo 'GHS '. number_format($total,2)  
                                                          ?></h3>
              </div>



            </div>


            <div id="tabs-2" style='' class='userarea'>
           <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
                <thead>
                  <tr class='info'>
                    <td>Company Name</td>
                    <td>Telephone</td>
                    <td>Tin</td>
                    <td>Email</td>
                    <td>Date Created</td>

                  </tr>
                </thead>
                <!-- <tbody> -->
                <?php

                  if ($data !== null) { ?>
                    <?php
                            $baseUrl = URLROOT;
                          foreach ($data['approved'] as $business) {

                              echo "<tr>";
                              echo "<td><a href='{$baseUrl}pages/companydetails/{$business->busid}'>{$business->businessname}</a></td>";
                              echo "<td>{$business->telephone}</td>";
                              echo "<td>{$business->tinnumber}</td>";
                              echo "<td>{$business->email}</td>";
                              echo "<td>{$business->applieddate}</td>";
                              echo "</tr>";
                           
                          }
                    ?>
                  <?php } ?>

                <!-- </tbody> -->
              </table>



            </div>

            <div id="tabs-3" style=''>

              <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
                <thead>
                  <tr class='info'>
                    <td>Company Name</td>
                    <td>Telephone</td>
                    <td>Tin</td>
                    <td>Email</td>
                    <td>Date Created</td>

                    <td>Status</td>

                  </tr>
                </thead>
                <!-- <tbody> -->
                <?php

                  if ($data !== null) { ?>
                    <?php
                            $baseUrl = URLROOT;
                          foreach ($data['pending'] as $business) {

                              echo "<tr>";
                              echo "<td><a href='{$baseUrl}pages/companydetails/{$business->busid}'>{$business->businessname}</a></td>";
                              echo "<td>{$business->telephone}</td>";
                              echo "<td>{$business->tinnumber}</td>";
                              echo "<td>{$business->email}</td>";
                              echo "<td>{$business->applieddate}</td>";
                              echo ($business->status == 1) ? "<td><a style ='background-color: #002B45; border-color: #002B45; color: white;' class='btn btn-primary btn-sm' href='{$baseUrl}pages/changeStatus/{$business->busid}'>UNAPPROVED</a></td>" :  "<td><a class='btn btn-primary btn-sm' href='{$baseUrl}pages/changeStatus/{$business->busid}'>APPROVED</a></td>";
                              echo "</tr>";
                           
                          }
                    ?>
                  <?php } ?>

                <!-- </tbody> -->
              </table>


            </div>



            <div id="tabs-4">

              <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
                <thead>
                  <tr class='info'>
                    <td>Full name</td>
                    <td>Date of Birth</td>
                    <td>Nationality</td>
                    <td>Edit</td>

                  </tr>
                </thead>

                <?php

                // while($u = $getusers->fetch(PDO::FETCH_ASSOC)){

                ?>

                <tr>
                  <td><?php  // echo $u['FULLNAME']  
                      ?></td>
                  <td><?php  // echo $u['DATEOFBIRTH']  
                      ?></td>
                  <td><?php  // echo $u['NATIONALITY']  
                      ?></td>
                  <td style='color:red'><a href='#'>Edit</a></td>

                </tr>
                <?php
                //  }
                ?>


              </table>


            </div>



            <div id="tabs-5" style=''>

              <table class='table table-bordered table-condensed transact' width='100%' style='font-size:12px'>
                <thead>
                  <tr class='info'>
                    <td>Branch Name</td>
                    <td>Longitude</td>
                    <td>Latitude</td>
                    <td>Location</td>

                  </tr>
                </thead>

                <?php

                //while($b = $getbranch->fetch(PDO::FETCH_ASSOC)){

                ?>

                <tr>
                  <td><?php // echo $b['BRANCHNAME']  
                      ?></td>
                  <td><?php  //echo $b['LONGITUDE']  
                      ?></td>
                  <td><?php  //echo $b['LATITUDE']  
                      ?></td>
                  <td style='color:red'><?php  // echo $b['STREET'].", ".$b['CITY'].' ,'.$b['REGION']  
                                        ?></td>

                </tr>
                <?php
                //}
                ?>


              </table>

            </div>




          </div>




        </div>

      </div>
    </div>


    <!--Footer and JS directies -->

    <?php require APPROOT . '/views/inc/footer.php'  ?>
    <script type='text/javascript'>
      $(document).ready(function() {


        $("#from, #to").datepicker({
          inline: true,
          changeMonth: true,
          changeYear: true,
          yearRange: "2016:2020",
          dateFormat: 'yy-mm-dd',
          maxDate: 0
        });


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