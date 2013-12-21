<?php
/*



Template name: Custom Broker Profile Edit Page



*/
ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agent-login");
exit;

}
$msg =0;
if(isset($_POST['action']) && $_POST['action'] == 'update') {

   extract($_POST);
   
  /* $name = $first_name.' '.$last_name;*/
   
 $sql="UPDATE 
 `tab_broker` SET
 `broker_name` = '$first_name',
 `last_name` = '$last_name',
 `email`       = '$email_broker',
 `address`     = '$address_broker',
 `city`        = '$city_broker',
 `state`       = '$state_broker',
 `contry`      = '$country_broker',
 `zip code`    = '$zip_broker',
 `broker_company`  = '$cmpny_broker',
 `office_phone`    = '$ofc_no',
 `mobile`          = '$phone_broker' WHERE broker_id=".$_SESSION['id'];

// echo $sql;
// exit();
	$res=mysql_query($sql);
	
	$msg =1;

}



$sql = 'SELECT * FROM tab_broker WHERE broker_id ='.$_SESSION['id'];

$rs = mysql_query($sql);
$row = mysql_fetch_assoc($rs);

/*$namearr = explode(" ",$row['broker_name']);

$first_name = $namearr[0];
$last_name = $namearr[1];
*/
?>
<div class="agent_prof">
<?php
if($_SESSION['broker_type']=='A'){




?>
<h4 class="ttle">Agent Profile <span style="font-size:11px; padding-left:15px;">* Required</span>

<div class="tab">
	<ul>
    <li><a href="agent-profile"><strong>Agent Profile</strong></a></li>
    	<li><a href="/marketing-toolbox"><b>Marketing Toolbox</b></a></li>
        <li><a href="/my-client-add"><b>Add Client </b></a></li>
        <li><a href="/my-client"><b>My Clients</b></a></li>
        <li><a href="/reset-password/"><b>Reset Password</b></a></li>
    </ul>
    <div class="clear"></div>
<!--<p align="right"><a href="/marketing-toolbox"><b>Marketing Tools</b></a></p>

<p align="right"><a href="/my-client"><b>My Clients</b></a></p>

<p align="right"><a href="/my-client-add"><b>Client Add</b></a></p>

<p align="right"><a href="/reset-password/"><b>ReSet Password</b></a></p>-->
</div>

</h4>

<div class="agent_signup_pro">





<?php
if($msg==1) { ?>
<p>Your Profile has been edited successfully .</p>
<?php } ?>

<form name="frm2" method="post" action="" >

<input type="hidden" name="action" value="update" />




<div class="row grey">
<span class="one">FIRST NAME *</span> 
<span class="two"><input type="text" name="first_name" value="<?=$row['broker_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">LAST NAME *</span> 
<span class="two"><input type="text" name="last_name" value="<?=$row['last_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">EMAIL</span> 
<span class="two"><input type="text" name="email_broker" value="<?=$row['email']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">ADDRESS</span> 
<span class="two"><input type="text" name="address_broker" value="<?=$row['address']?>"/></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">CITY</span> 
<span class="two"><input type="text" name="city_broker" value="<?=$row['city']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">STATE</span> 
<span class="two"><input type="text" name="state_broker" value="<?=$row['state']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">ZIP CODE</span> 
<span class="two"><input type="text" name="zip_broker" value="<?=$row['zip code']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">COUNTRY</span> 
<span class="two"><input type="text" name="country_broker" value="<?=$row['contry']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">AGENT COMPANY</span> 
<span class="two"><input type="text" name="cmpny_broker" value="<?=$row['broker_company']?>"/></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">CELL PHONE *</span> 
<span class="two"><input type="text" name="phone_broker" value="<?=$row['mobile']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">OFFICE PHONE</span> 
<span class="two"><input type="text" name="ofc_no" value="<?=$row['office_phone']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">&nbsp;</span> 
<span class="two"><input type="submit" value="Update" class="btn_whites" /></span>
<div style="clear:both; height:0;"></div>
</div>


</form>






</div>
</div>
<?php
}else if($_SESSION['broker_type']=='M'){
?>
<div class="agent_prof">
<h4 class="ttle">Manager Profile<span style="font-size:11px; padding-left:15px;">* Required</span> 

<div class="tab">
	<ul>
    <li><a href="agent-profile"><strong>My Profile</strong></a></li>
    	<li><a href="/agent-list"><b>Agents List</b></a></li>
		<li><a href="/client-list"><b>Client List</b></a></li>
         <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
        <li><a href="/reset-password/"><b>Reset Password</b></a></li>
    </ul>
    <div class="clear"></div>
    </div>
 </h4>
 
    <div class="agent_signup_pro">



<?php if($msg==1) { ?>
<p>Your Profile has been edited successfully .</p>
<?php } ?>


<form name="frm2" method="post" action="" >
<input type="hidden" name="action" value="update" />

<div class="row grey">
<span class="one">First Name * :</span>
<span class="two"><input type="text" name="first_name" value="<?=$row['broker_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">Last Name * :</span>
<span class="two"><input type="text" name="last_name" value="<?=$row['last_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">E-Mail :</span>
<span class="two"><input type="text" name="email_broker" value="<?=$row['email']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">&nbsp;</span> 
<span class="two"><input type="submit" value="Update" class="btn_whites" /></span>
<div style="clear:both; height:0;"></div>
</div>

</form>


</div>
</div>

<?php
}else if($_SESSION['broker_type']=='AD'){
?>
<div class="agent_prof">

<h4 class="ttle">Administrator Profile <span style="font-size:11px; padding-left:15px;">* Required</span>

<div class="tab">
	<ul>
   		<li><a href="agent-profile">My Profile</a></li>
    	<li><a href="/agent-list">Agent List</a></li>
        <li><a href="/client-list">Client List</a></li>
        <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
        <li><a href="/manager-add">Add Administrator/Manager</a></li>
        <li><a href="/manager-list">Administrator/Manager List</a></li>
        <li><a href="/toolbox-upload">Upload Marketing Toolbox</a></li>
        <li><a href="/reset-password/">Reset Password</a></li>
        
    </ul>
    <div class="clear"></div>
<!--<p align="right"><a href="/marketing-toolbox"><b>Marketing Tools</b></a></p>

<p align="right"><a href="/my-client"><b>My Clients</b></a></p>

<p align="right"><a href="/my-client-add"><b>Client Add</b></a></p>

<p align="right"><a href="/reset-password/"><b>ReSet Password</b></a></p>-->
</div>
</h4>

<div class="agent_signup_pro">

<?php if($msg==1) { ?>
<p>Your Profile has been edited successfully .</p>
<?php } ?>


<form name="frm2" method="post" action="" >
<input type="hidden" name="action" value="update" />


<div class="row grey">
<span class="one">First Name * :</span>
<span class="two"><input type="text" name="first_name" value="<?=$row['broker_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">Last Name * :</span>
<span class="two"><input type="text" name="last_name" value="<?=$row['last_name']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">E-Mail :</span>
<span class="two"><input type="text" name="email_broker" value="<?=$row['email']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row">
<span class="one">&nbsp;</span>
<span class="two"><input type="submit" value="Update" class="btn_whites" /></span>
<div style="clear:both; height:0;"></div>
</div>
</form>



</div>
</div>
<?php
}
?>


<?php get_footer(); ?>