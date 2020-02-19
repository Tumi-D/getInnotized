<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/side_nav.php'  ?>

  <!-- Commhr content goes here -->
  <div class="content-wrapper" 
  style="background:linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
  url('<?php echo URLROOT ?>/img/car4.jpg');background-size:cover; background-attachment:fixed;
   background-position: fixed">

    
  <div style='padding:10px'><h1 style='color:orange'>Policy Renewal</h1></div>
  <hr style="background:#fafafa"/>
    
    <div class="container-fluid main_container">
    <div>
    <div class="row" style="margin-bottom:20px">
      
      
      <div class='col-md-5 pull-left reg'>
      <input class='form-control' name='search' id='regnumber' placeholder = 'Policy No, Reg Number, Telephone' />
      </div>
      <div class='col-md-2'>
      <button style='color:#fff' class='btn btn-warning' id='sub'> Search</button>
      </div>
      <div class='col-md-5'>
    
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

$(document).ready(function(){

 $('#sub').click(function(){

    var regnumber = $('#regnumber').val();
    var posturl = '../ajax/renewal.php'

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
});

  </script>



