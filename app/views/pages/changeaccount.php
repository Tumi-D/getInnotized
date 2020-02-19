<!-- Header and CSS Directives-->
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/side_nav/changeaccount.php'  ?>
<?php require APPROOT .'/views/inc/side_nav.php'  ?>


  <!-- Commhr content goes here -->
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-12">
          <h1 class="page-title">CHANGE PASSWORD</h1>
        
        </div>
      </div>
       <!-- Breadcrumbs-->
      <ol class="mybreadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">Change password</li>
      </ol>
    </div>

    <div class="container-fluid main_container">
     
     
      <div id='placeholder'>
                                    <div class="row" id="">
                                            <div class="col-lg-12">

                                                    <div>
                                                      
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                   
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input id="surname" type="text" placeholder="Email" class="form-control input-sm">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>New Password</label>
                                                                        <input id="" type="text" placeholder="New Password" class="form-control">
                                                                    </div>
                                                                  
                                                                      <div class="form-group">
                                                                        <label>Confirm Password</label>
                                                                        <input id="" type="text" placeholder="Confirm Password" class="form-control">
                                                                    </div>

                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div><span style="color:red"></span></div>
                                                                    <div class="form-group">
                                                                        <button id="" type="button" class="btn btn-default btn-md">Change Password</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                       
                                                    </div>
                                         
                                            </div>
                                        </div>
                                 

           </div>
    
   
    </div>
   

  <!--Footer and JS directies -->


<?php require APPROOT .'/views/inc/footer.php'  ?>

<script>
$(document).ready(function() {
  var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
});

</script>

