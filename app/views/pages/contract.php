<!-- Header and CSS Directives-->
<?php require APPROOT .'/views/inc/header.php'  ?>
<?php require APPROOT .'/views/inc/side_nav/contract.php'  ?>
<?php require APPROOT .'/views/inc/side_nav.php'  ?>

  <!-- Commhr content goes here -->
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-12">
          <h1 class="page-title">CONTRACT MANAGEMENT </h1>
        
        </div>
      </div>
       <!-- Breadcrumbs-->
      <ol class="mybreadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">contract management</li>
      </ol>
    </div>

    <div class="container-fluid main_container">
     
    <div id='placeholder'>

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

