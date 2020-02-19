 <!-- Header and CSS Directives-->
 <?php require APPROOT . '/views/inc/header.php'  ?>
 <?php require APPROOT . '/views/inc/side_nav/customers.php'  ?>
 <?php require APPROOT . '/views/inc/side_nav.php'  ?>

 <!-- Commhr content goes here -->
 <div class="content-wrapper">
     <div class="container-fluid">

         <div class="row">
             <div class="col-12">
                 <h1 class="page-title">ADMINISTRATOR DASHBOARD</h1>

             </div>
         </div>
         <!-- Breadcrumbs-->
         <ol class="mybreadcrumb">
             <li class="breadcrumb-item">
                 <a href="index.html">Home</a>
             </li>
             <li class="breadcrumb-item">Administrator Dashboard</li>
         </ol>
     </div>

     <div class="container-fluid main_container">

         <?php //echo $data['globalcustomers'];   ?>


         <div id='placeholder'>

             <table class="display nowrap apptables" cellspacing="0" width="100%" style="font-size:0.750em;">
                 <thead>
                     <tr>

                         <th>COMPANY NAME</th>
                         <th>MICROSOFT STATUS</th>
                         <th>MICROSOFT DOMAIN</th>
                         <th>GOOGLE DOMAIN</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php

                        //foreach ($data['records'] as $get) {

                            ?>
                         <tr>

                             <td><?php //echo $get->companyname;  ?></td>
                             <td><?php //echo $get->relation;  ?></td>
                             <td><?php //echo $get->domain;  ?></td>
                             <td><?php //breakGoogleDomain($get->googleid);  ?></td>

                         </tr>
                     <?php
                       // }
                        ?>
             </table>

         </div>


     </div>


     <!--Footer and JS directies -->


     <?php require APPROOT . '/views/inc/footer.php'  ?>