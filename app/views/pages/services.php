<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/company_sidebar.php'  ?>


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
    <div class='col-md-12'>
      <h3>Add Products and Services</h3>
    </div>
  </div>
  <hr style='background:#fff' />

  <div class="container-fluid main_container">
    <div>
      <div class="row" style="margin-bottom:10px">

        <div class='col-md-8 reportarea'>

          <div id="stabs">
            <ul style="background:#fff">
              <li><a href="#tabs-1">Products and Services</a></li>
              <li id='serviceitem' style='display:none'><a href="#tabs-2">Add Service Items</a></li>

            </ul>
            <div id="tabs-1">

              <table align="center" class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                <tr>
                  <td>
                    <select class="form-control" style='width: 200px' id='categoryname'>
                      <option disabled>Select Category</option>
                      <option value="Banking"> Banking </option>
                      <option value="E-services"> E-services</option>
                      <option value="Payments"> Payments</option>
                      <?php
                      //  while($get = $getcat->fetch(PDO::FETCH_ASSOC)){

                      //    echo '<option>'.$get['CATEGORYNAME'].'</option>';
                      //  }
                      ?>
                    </select>
                  </td>

                  <td style='display:none'><input class='form-control' id='servicename' placeholder="Service Category Name"></td>
                  <td style='display:none'><button class='btn btn-danger addcategory'>Add Category</button></td>
                </tr>
              </table>

              <div class='itemarea'></div>
              <div class='itemform'>
                <table align="center" class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
                  <tr>
                    <td width='300'><input class='form-control' id='itemname' placeholder="Product/Service Name"></td>
                    <td width='80'>
                      <div style='padding:10px'><input id='limitbtn' type='checkbox'> limit</div>
                    </td>
                    <td width='70'>
                      <div style='padding:10px'><input id='feebtn' type='checkbox'> Fee</div>
                    </td>
                    <td><input style='display:one' class='form-control' id='limitxt' placeholder="Limit"></td>
                    <td><input style='display:one' class='form-control' id='fee' placeholder="Fee"></td>
                    <td><button class='btn btn-success additem'>Add Service</button></td>
                  </tr>
                </table>
              </div>
            </div>
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
    $('#accordion').accordion();
    $("#limitxt").prop('disabled', true);
    $("#fee").prop('disabled', true);
    $('.itemform').hide();

    // $('#limitbtn').click(function() {

    //   if ($(this).is(':checked')) {
    //     $("#limitxt").prop('disabled', false);
    //   } else {
    //     $("#limitxt").prop('disabled', true);
    //   }

    // })

    // $('#feebtn').click(function() {

    //   if ($(this).is(':checked')) {
    //     $("#fee").prop('disabled', false);
    //   } else {
    //     $("#fee").prop('disabled', true);
    //   }

    // })



    // function servicetable() {
    //   $.ajax({
    //     type: "POST",
    //     url: "../ajaxscripts/category.php",
    //     data: {},
    //     dataType: "html",
    //     beforeSend: function() {
    //       $.blockUI();
    //     },
    //     success: function(text) {
    //       $('.catarea').html(text);
    //     },
    //     complete: function() {
    //       $.unblockUI();
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //       alert(xhr.status + " " + thrownError);
    //     }
    //   });
    // }

    // servicetable();

    // $('#serviceitem').click(function() {

    //   $.ajax({
    //     type: "POST",
    //     url: "../ajaxscripts/additem.php",
    //     data: {},
    //     dataType: "html",
    //     beforeSend: function() {
    //       $.blockUI();
    //     },
    //     success: function(text) {
    //       $('#itemarea').html(text);
    //     },
    //     complete: function() {
    //       $.unblockUI();
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //       alert(xhr.status + " " + thrownError);
    //     }
    //   });

    // })


    // $('.addcategory').click(function() {

    //   var servicename = $('#servicename').val();

    //   if (servicename == '') {
    //     alert('Please enter service name');
    //     return false
    //   };


    //   $.ajax({
    //     type: "POST",
    //     url: "../ajaxscripts/savecategory.php",
    //     //url: "",
    //     data: {
    //       servicename: servicename
    //     },
    //     dataType: "html",
    //     beforeSend: function() {
    //       $.blockUI();
    //     },
    //     success: function(text) {
    //       window.location = 'http://localhost:8888/agency/pages/services.php';
    //     },
    //     complete: function() {
    //       $.unblockUI();
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //       alert(xhr.status + " " + thrownError);
    //     }
    //   });
    //   $('#servicename').val('');

    // })
  })

  function itemtable(catname) {

    $.ajax({
      type: "POST",
      url: "../ajaxscripts/item.php",
      data: {
        catname: catname
      },
      dataType: "html",
      beforeSend: function() {
        $.blockUI();
      },
      success: function(text) {
        $('.itemarea').html(text);
      },
      complete: function() {
        $.unblockUI();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + " " + thrownError);
      }
    });
  }

  $('#categoryname').change(function() {

    var catname = $(this).val();
    itemtable(catname);

    $('.itemform').show();
  })



  $('.additem').click(function() {



    var categoryname = $('#categoryname').val();
    var itemname = $('#itemname').val();
    var limitxt = $('#limitxt').val();
    var fee = $('#fee').val();


    $.ajax({
      type: "POST",
      url: "../ajaxscripts/saveitem.php",
      data: {
        categoryname: categoryname,
        itemname: itemname,
        limitxt: limitxt,
        fee: fee
      },
      dataType: "html",
      beforeSend: function() {
        $.blockUI();
      },
      success: function(text) {
        //$('.itemarea').html(text);
        itemtable(categoryname);
      },
      complete: function() {
        $.unblockUI();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + " " + thrownError);
      }
    });

    //$('#categoryname').val('');
    $('#itemname').val('');
    $('#amount').val('');
    //$('#grade').val('');
    $('#limitxt').val('');
    $('#fee').val('');

    $("#limitxt").prop('disabled', true);
    $("#fee").prop('disabled', true);
    $('#limitbtn').prop('checked', false);
    $('#feebtn').prop('checked', false);


  })


  // $(document).on('click', '.deleteitem', function(){

  //   var itemid = $(this).attr('itemid');
  //   var catname  =  $(this).attr('catname');


  //           $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/deleteitem.php",
  //                 data:{itemid:itemid},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                   itemtable(catname)
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //               });
  // })
</script>