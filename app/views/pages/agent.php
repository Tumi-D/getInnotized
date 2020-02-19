<!-- Header and CSS Directives-->
<?php //require '../config/config.php';   ?>
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/agent.php'  ?>

<?php
// session_start();
// $uid = $_SESSION['uid'];

// $getinfo = $con->query("Select * from users where uid = '$uid' ");
// $u = $getinfo->fetch(PDO::FETCH_OBJ);
// $company = $u->company;

// $getcategory = $con->query("Select * from ratecategory");

?>


  <!-- Commhr content goes here -->
  <div class="content-wrapper" style="background:url('<?php echo URLROOT ?>/img/insurance_soluion_large3.jpg'); background-size:cover;rgba(0,0,0,.5);height:100%">

    
  <div style='padding-left:20px'><h4 style='color:orange'>AGENT PORTAL</h4></div>
  <hr style="background:#fff"/>
    
    <div class="container-fluid main_container">
      <div>
      <div class="row" style="margin-bottom:20px">
         
        <div class='col-md-5'>
        <table width='800px' style="color:#fff">
        <tr>
          <td>Search:</td>
          <td><input class='form-control' id='regnumber' type='text' 
          placeholder='Telephone, Policy Number, Reg Number' /></td>
          <td><button class='btn btn-primary searchbtn'>Search</button></td>
         <tr>
        </table>
        
        </div>
        
       </div> 
       <div id='placeholder' style="color:#fff">
       
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
  
 $('.searchbtn').click(function(){
    
    
        var regnumber = $('#regnumber').val();
        var posturl = '../ajax/agentquote.php'
    ;
       
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


