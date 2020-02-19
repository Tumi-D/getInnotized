<?php // if(isset($_GET['uniqueuid']))  $uniqueuid = $_GET['uniqueuid'];    ?>

<div class="" style="margin-bottom:10px; padding:20px; font-size:12px">
<a href='maccount.php' > <i class='fa fa-dashboard'></i> Back to dashboard </a>
</div> 


<div class='card' style='margin:10px'>
<div style='padding:10px'><span style='color:green; font-size:40px'>GHC 0.00</span></div>
<div style='padding:10px'>
<table>
<tr>
<td width=60%><a href='manageaccount.php'>Manage Funds</a></td>
<td>Currencies</td>
</tr>
</table>
</div>
</div>


<div class='card' style='margin:10px'>
<div style='padding:5px'><span style='color:green; font-size:15px; font-weight:700'>Account Administration</span></div>
<div style='padding-left:10px; padding-bottom:5px'>
<table>
<tr>
<td><a href='#' id='access'><i class='fa fa-lock'></i> Operate Account</a></td>
</tr>
<tr>
<td><a href='#' id='assigncat'> <i class='fa fa-list'></i> Assign Products and Services</a></td>
</tr>
<tr>
<td><a href ='#' id='limitbtn'> <i class='fa fa-folder'></i>  Assign Limits and Commissions</a></td>
</tr>

<tr>
<td><a href='#' id='terminal'> <i class='fa fa-cog'></i>  Assigned Terminals</a></td>
</tr>
<tr>
<td><a href='document.php?uniqueuid=<?php // echo  $uniqueuid  ?>'> <i class='fa fa-folder-open'></i>  
Document Management</a></td>
</tr>

<tr>
<td><a href='#' id='transfers'> <i class='fa fa-folder-open'></i>  
Transfer Funds</a></td>
</tr>

</table>
</div>
</div>

</nav>
