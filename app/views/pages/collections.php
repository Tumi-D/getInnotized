<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/side_nav.php'  ?>

  <!-- Commhr content goes here -->
  <div class="content-wrapper" 
  style="background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
  url('<?php echo URLROOT ?>/img/car4.jpg');background-size:cover; background-attachment:fixed;
   background-position: fixed">

    
  <div style='padding:10px'><h1 style='color:orange'>Payments and Collections</h1></div>
  <hr style="background:#fafafa"/>
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:20px">
         
        <div class='col-md-5'>
        <select class='form-control activity'>
        <option>Please select activity</option>
        <option value='1'>Registered Vehicles</option>
        <option value='2'>Unregistered Vehicles</option>
        </select>
        
        </div>
        
        <div class='col-md-3 pull-left reg'>
        <input class='form-control' name='search' id='regnumber' placeholder = 'Enter Registration Number' />
        </div>
        <div class='col-md-2 reg'>
        <button style='color:#fff' class='btn btn-warning' id='searchbtn'> Search</button>
        </div>

    

        

      
       </div> 
       <div id='placeholder' style='color:#fff'>
       
         </div>
         <!-- End of Placeholder -->
   
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>

   $('.unreg, .reg').hide();

    
    $('.activity').change(function(){

    var x = $(this).val();
    if(x == '1'){
        $('.reg').show();  

    }

    if(x == '2'){
        $('.reg').hide();  
        var posturl = '../ajax/dvform.php'

        $.ajax({
            type: "POST",
            url: posturl,
            data: {},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $("#placeholder").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });
      
    }
 })
  
  $('#searchbtn').click(function(){


    var regnumber = $('#regnumber').val();
    var posturl = '../ajax/regform.php'

   
    $.ajax({
            type: "POST",
            url: posturl,
            data: {regnumber:regnumber},
            beforeSend: function() {
                $.blockUI();
            },
            success: function(text) {
                $("#placeholder").html(text)
            },
            complete: function() {
                $.unblockUI();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });


  });


  </script>



