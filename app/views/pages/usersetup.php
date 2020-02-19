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

<body>
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_solution_large3'); background-size:cover;rgba(0,0,0,.5);height:100%">
    <div class="row" style='padding-left:20px'>
      <div class='col-md-6'>
        <h3 style='color:orange'></h3>
      </div>

      <div class='col-md-4'>
        <div class="formarea"></div>
      </div>


      <div class='col-md-1'>

      </div>
    </div>
    <hr style='background:#fff' />

    <div class='row' style='padding:5px'>

      <div class='col-md-8'>
        <div id="tabs">
          <ul style="background:#fff">
            <li><a href="#tabs-1">Departments</a></li>
            <li><a href="#tabs-2">Positions</a></li>



          </ul>
          <div id="tabs-1">

            <table align="center" class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
              <tr>

                <td><input class='form-control' id='department' placeholder="Department"></td>
                <td><button class='btn btn-danger addepartment'>Add</button></td>

              </tr>

            </table>

            <div class='itemarea'></div>
          </div>
          <div id="tabs-2">
            <table align="center" class='table' width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size:11px; font-family:Verdana, Geneva, sans-serif">
              <tr>

                <td>
                  <select class='form-control' id='departmentid'>
                    <option value=''>Select Department</option>
                    <?php //  while($get = $getdepartment->fetch(PDO::FETCH_ASSOC)) {  
                    ?>
                    <option value='<?php // echo $get['DEPARTMENT']  
                                    ?>'><?php // echo $get['DEPARTMENT']  
                                        ?></option>
                    <?php // } 
                    ?>
                  </select>
                </td>
                <td><input class='form-control' id='position' placeholder="Position"></td>
                <td><button class='btn btn-danger addposition'>Add</button></td>

              </tr>

            </table>

            <div class='posarea'></div>
          </div>


        </div>


      </div>

      <div class='col-md-7'>
        <div id="map" style="padding-left: 10px; height: 420px"></div>
      </div>
    </div>
  </div>
  </div>
</body>


<!--Footer and JS directies -->

<?php require APPROOT . '/views/inc/footer.php'  ?>

<script type='text/javascript'>
  $('#tabs').tabs();

  // function deparmentable(){
  //            $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/departments.php",
  //                 data:{},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                 $('.itemarea').html(text);
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //               });
  //     }


  //   function positiontable(){
  //            $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/positions.php",
  //                 data:{},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                 $('.posarea').html(text);
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //               });
  //     }  

  // deparmentable();
  // positiontable();


  //  $('.addepartment').click(function(){

  //     var department = $('#department').val();

  //     if(department == ''){alert('Please enter department name'); return false };


  //              $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/savedepartment.php",
  //                 data:{department:department},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {

  //                   //$('#itemarea').html(text)
  //                   deparmentable();
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //                 });
  //       $('#department').val('');
  //   })


  //   $('.addposition').click(function(){

  //            var position = $('#position').val();
  //            var departmentid = $('#departmentid').val();

  //            if(departmentid == ''){alert('Please Select department'); return false };
  //            if(position == ''){alert('Please enter position'); return false };



  //              $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/saveposition.php",
  //                 data:{position:position, departmentid:departmentid},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                    positiontable();
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //                 });
  //              $('#department').val('');

  //          })


  //  $(document).on('click', '.deletedepartment', function(){

  //   var departmentid  = $(this).attr('departmentid');
  //   var caveat  = confirm('Want to delete department ?');
  //   var deleteparam  = 'Yes';

  //     if(caveat == true){

  //         $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/savedepartment.php",
  //                 data:{departmentid:departmentid, deleteparam:deleteparam},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                   deparmentable();
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //                 });
  //     }

  // })


  // $(document).on('click', '.deleteposition', function(){

  //   var positionid  = $(this).attr('positionid');
  //   var caveat  = confirm('Want to delete position ?');
  //   var deleteparam  = 'Yes';

  //     if(caveat == true){

  //         $.ajax({
  //                 type: "POST",
  //                 url: "../ajaxscripts/saveposition.php",
  //                 data:{positionid:positionid, deleteparam:deleteparam},
  //                 dataType: "html",
  //                 beforeSend: function(){
  //                 $.blockUI();
  //                 },
  //                 success: function(text) {
  //                   positiontable();
  //                 },
  //                 complete: function(){
  //                  $.unblockUI();
  //                 },
  //                 error:function (xhr, ajaxOptions, thrownError){
  //                   alert(xhr.status + " " + thrownError);
  //                 }
  //                 });
  //     }

  // })
</script>