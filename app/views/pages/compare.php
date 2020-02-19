<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/compare.php'  ?>

<?php

// $getcategory = $con->query("Select * from ratecategory");

?>

  <!-- Commhr content goes here -->
  <div class="content-wrapper">

    
  <div style='padding-left:20px'><h1 style='color:orange'>Compare Insurance Rates</h1></div>
  <hr/>
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:20px">
         
        <div class='col-md-5'>
        <select id='activity' class='form-control'>
        <option value=''>Choose Vehicle Category</option>
        <?php
        // while($cat = $getcategory->fetch(PDO::FETCH_OBJ)){

        //         echo '<option>'.$cat->category.'</option>';
        //     }
        ?>
        </select>
        
        </div>
        

    

        

      
       </div> 
       <div id='placeholder'>
       
         </div>
         <!-- End of Placeholder -->
   
        </div>
        </div>
   

  <!--Footer and JS directies -->
  
  <?php require APPROOT .'/views/inc/footer.php'  ?>
  <script type='text/javascript'>
    $('#activity').change(function(){

        var category = $(this).val();
        var posturl = '../ajax/ratecompare.php'

        $.ajax({
            type: "POST",
            url: posturl,
            data: {category:category},
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


$('#quote').click(function(){
    var posturl = '../ajax/quotation.php'
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
  });


  </script>



