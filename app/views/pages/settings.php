<?php require APPROOT . '/views/inc/header.php'  ?>
<?php require APPROOT . '/views/inc/side_nav/settings.php'  ?>
<?php require APPROOT . '/views/inc/side_nav.php'  ?>


<!-- Commhr content goes here -->
<div class="content-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<h1 class="page-title">ACCOUNT SETTING</h1>

			</div>
		</div>
		<!-- Breadcrumbs-->
		<ol class="mybreadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item">Account setting</li>
		</ol>
	</div>

	<div class="container-fluid main_container">


		<div id='placeholder'>
			<!-- Target Div of Ajax Load Event // !!Do not Remove !! -->

			<table class="display nowrap apptables" cellspacing="0" width="100%" style="font-size:0.750em">
				<thead>
					<tr>

						<th>NAME</th>
						<th>EMAIL</th>
						<th>STATUS</th>
						<th>SUPER ADMIN</th>
						<th><i class="fa fa-unlock"></i></th>
						<th><i class="fa fa-lock"></i></th>
						<th><i class="fa fa-trash-o"></i></th>
					</tr>
				</thead>
				<tfoot>
					<tr>

						<th>NAME</th>
						<th>EMAIL</th>
						<th>STATUS</th>
						<th>SUPER ADMIN</th>
						<th><i class="fa fa-unlock"></i></th>
						<th><i class="fa fa-lock"></i></th>
						<th><i class="fa fa-trash-o"></i></th>
					</tr>
				</tfoot>
				<tbody>

					<?php

					// foreach($data['records'] as $get){


					?>

					<tr>

						<td><?php //echo $get->firstname." ".$get->lastname 
							?></td>
						<td><?php //echo $get->email  
							?></td>
						<td><?php //checkStatus($get-status)  
							?></td>
						<td><input type='checkbox' class='billingchk' c_index='<?php //echo $get->uid  
																				?>' <?php //checkAdminStatus($get->billingstatus)    
																											?> /></td>

						<td align='center'><a href='#' style='color:#111111' class='ltstatus' i_index='<?php //echo $get->uid  
																										?>'><i class='fa fa-unlock'></i></a></td>

						<td align='center'><a href='#' style='color:red' class='atstatus' i_index='<?php //echo $get->uid  
																									?>'><i class='fa fa-lock'></i></a></td>
						<td align='center'>
							<a href='#' style='color:red' class='destatus' i_index='<?php //echo $get->uid  
																					?>'><i class='fa fa-trash-o'></i></a>
						</td>

					</tr>
					<?php
					// }
					?>


			</table>
		</div>


	</div>


	<!--Footer and JS directies -->
	<?php require APPROOT . '/views/inc/footer.php'  ?>