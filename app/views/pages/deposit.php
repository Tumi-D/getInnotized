<?php  //session_start();  ?>
<?php //require '../config/config.php';   ?>
<?php //require "../conn/conn.php"; ?>
<?php //require "../conn/msconn.php"; ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/company.php'  ?>

<?php

// $today = date('Y-m-d');
// $uid = $_SESSION['uid'];

// $getproducts  = $ucon->query("Select * from SELECTEDPRODUCTS where UNIQUEUID = '$uid' and productname <> 'Registrations' ");

// $getbusinfo = $con->query("Select * from BUSINESSINFORMATION  where UNIQUEUID = '$uid' ");
// $bus = $getbusinfo->fetch(PDO::FETCH_ASSOC);

// $getcomusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '2' ");
// $getpendingusers = $con->query("Select * from secondaryusers where mainid = '$uid' and  access_level = '1' ");

// $getbranch = $ucon->query("Select * from branch  where UNIQUEUID = '$uid' ");

// $getusers = $con->query("Select * from basicinformation  where UNIQUEUID = '$uid' ");

// $getitems = $ucon->query("select * from ASSIGNEDSERVICES WHERE AGENTID = '$uid' ");


?>

<style>
tr td{
    padding: 3px !important;
    margin: 0 !important;
    font-size: 12px
  }

 .pinput{
    padding: 6px !important; 
    width: 100%; 
    border:1px solid green; 
 } 

</style>

  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background: #fafafa">
    
  <div style='padding:10px'><h1 style='color:orange'>DEPOSTIS AND WITHDRAWALS</h1></div>
  <hr style="background:#fafafa"/>
    <div class="container-fluid main_container">
   
      <div id='placeholder'>
        
    
      <div class="row" style="margin-top:-30px">

    
      <div class="col-lg-6 col-md-6 col-sm-6">

      <table class='table table-bordered' width="80%" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                   

                     
                      <tr>
                      <td colspan='2'><span class='alabel'><h3>Recipient Details</h3></span></td>
                      </td>
                      </tr>

                      <tr>
                      <td colspan='2'>   <input type="text" class="form-control"   id="tinnumber" placeholder='Search with DVLA PIN, Voters ID, Telephone, Name' /></td>
                      </td>
                      </tr>

                
                      <tr>
                      <td><span class='alabel'>First Name</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value=""  />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Last Name</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value=""  />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Telephone</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value="" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>City</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value=""  />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Street </span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value="" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>House Number</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value="" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Select ID TYPE</span></td>
                      <td class="afteritem">
                        <select  class="form-control"  id='type'> 
                         <option>Select Option</option>
                        <option>Drivers Licence</option>
                        <option>NHIS</option>
                        <option>Voters ID</option>
                        <option>Passport</option>
                        </select>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Select Bank</span></td>
                      <td class="afteritem">
                        <select  class="form-control"  id='type'> 
                         <option>Select Bank</option>
                         <?php
                        //  $getbanks = $ucon->query("SELECT * from banklookup ");
                        //   while($get = $getbanks->fetch(PDO::FETCH_OBJ)){
            
                        //     $value = $get->BANKNAME;
                        //     echo '<option>'. $value.'</option>';
                        //   }

                          ?>
                        </select>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Account Number</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value="" />
                      </td>
                      </tr>
                


                       <tr>
                      <td><span class='alabel'>ID Number</span></td>
                      <td class="afteritem"> 
                        <input type="text" class="form-control"    id="tinnumber" value=""  />
                       
                      </td>
                      </tr>

                      </tr>

                       

                    </table>
     

     
       </div>

       <div class="col-lg-6 col-md-6 col-sm-6">

      <table class='table' width="80%" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                   

                     
                      <tr>
                      <td colspan='2'><span class='alabel'><h3>Billing  Information</h3></span></td>
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Activity</span></td>
                      <td class="afteritem">
                        <select  class="form-control" style="width:90%" id='type'> 
                         <option>Select Option</option>
                        <option>Deposit</option>
                        <option>Withdrawal</option>
                    
                        </select>
                      </td>
                      </tr>
                
                      <tr>
                      <td><span class='alabel'>Description</span></td>
                      <td class="afteritem"> 
                        <textarea class="tx_businness"    style="width:90%">

                        </textarea>
                      </td>
                      </tr>


                      <tr>
                      <td><span class='alabel'>Currency</span></td>
                      <td class="afteritem">
                        <select  class="form-control" style="width:90%" id='type'> 
                         <option>Select Currency</option>
                        <option>GHS</option>
                        <option>USD</option>
                        </select>
                      </td>
                      </tr>

                      

                      <tr>
                      <td><span class='alabel'>Amount</span></td>
                      <td class="afteritem"> <input type="text" class="form-control"    id="tinnumber" value="" style="width:90%" />
                      </td>
                      </tr>

                      <tr>
                      <td><span class='alabel'>Funding Source</span></td>
                      <td class="afteritem">
                      <select  class="form-control" style="width:90%"  id= 'toaccount'> 
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
                      <td><span class='alabel'></span></td>
                      <td class="afteritem"> 
                        <button class='btn btn-warning'><i class="fa fa-shopping-cart"></i> Submit </button>
                      </td>
                      </tr>



                      </tr>

                       

                    </table>
     

     
       </div>
      </div>

      <!-- End of first upper row -->


      <div class="row" style="margin-bottom:20px">

      

      


      </div>
    </div>   <!-- End of Placeholder -->

    </div>
    </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>



