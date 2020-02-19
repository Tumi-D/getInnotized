<?php
// $biztin = $_POST['biztin'];

// $url = "http://gcnet.ucomgh.com/test.php?tin=".$biztin;

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt ($ch, CURLOPT_CAINFO, "cacert.pem");
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $response = curl_exec($ch);
// $obj = json_decode($response, true);
// $busname = $obj['bizname'];
// $telephone = $obj['phonenumber'];
// $nature = $obj['nature'];
// $businessregno = $obj['businessregno'];
// $tin  = $obj['tin'];
// $principals = $obj['principals']['officer'];
// $shareholders = $obj['shareholders']['shareholder'];

 //print_r($shareholders);

?>


<table class='table table-bordered'>
<tr class='alert alert-danger'>
<td colspan=3 style='font-size:15px; font-weight:700'>Directors</td>
</tr>


<?php
//    foreach($principals as $get):
//       $fname = $get['firstname'];
//       $lname = $get['lastname'];
//       $position = $get['position'];
//       $tin = $get['tin'];

?>

<tr>
<td><?php //echo $fname.' '.$lname ?></td>
<td><?php //echo $position ?></td>
<td><?php //echo $tin ?></td>
</tr>
<?php
//endforeach
?>
</table>





<table class='table table-bordered'>
<tr class='alert alert-success'>
<td colspan=2>Shareholders</td>
</tr>
<?php
//    foreach($shareholders as $get):
//       $fname = $get['firstname'];
//       $lname = $get['lastname'];
//       $tin = $get['tin'];

?>

<tr>
<td><?php //echo $fname.' '.$lname ?></td>
<td><?php //echo $tin ?></td>
</tr>
<?php
// endforeach
?>
</table>