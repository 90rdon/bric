<?php

/*







Template name: Custom Agent Edit







*/

ob_start();

get_header();

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



} 





if($_SESSION['broker_type']=='AD'){



if(isset($_GET['a']) && $_GET['a']=='del') {

	mysql_query("DELETE FROM tab_broker WHERE broker_id=".$_GET['id']);

	

	header("Location:/agent-list");

	exit;

}



if(isset($_GET['a']) && $_GET['a']=='delmanager') {

	mysql_query("DELETE FROM tab_broker WHERE broker_id=".$_GET['id']);

	$page_number = $_GET['page_no'];

	header("Location:/manager-list/?t=$page_number");

	exit;

}



$msg =0;

if(isset($_POST['action']) && $_POST['action'] == 'my_agent_update') {

 $broker_name=$_POST['broker_name'];

 $last_name=$_POST['last_name'];

 $email=$_POST['email'];



 $city=$_POST['city'];



 $state=$_POST['state'];



 $state=$_POST['stat'];



 $country=$_POST['country'];



 $zip_code=$_POST['zip_code'];



 $phone=$_POST['phone'];



 $email=$_POST['email'];



 $office_phone=$_POST['office_phone'];

 

 $mobile=$_POST['mobile'];

 

 $address=$_POST['address'];





$str="UPDATE  `tab_broker` SET 

 `broker_name` ='$broker_name',

 `last_name` ='$last_name', 

 `email` ='$email',

 `city`  = '$city',

 `state` = '$state',

 `contry` = '$country',

 `zip code` = '$zip_code',

 `email` = '$email',

 `broker_company` = '$broker_company',

 `office_phone` = '$office_phone',

 `mobile` = '$mobile',

 `address` = '$address' WHERE broker_id=".$_GET['id'];

/* print $str;

 exit;

*/  if(mysql_query($str))

   {

     $msg = 1;

  }

}



$sql = "SELECT * FROM tab_broker WHERE`broker_id` =".$_GET['id'];

$rs = mysql_query($sql);

/*	print $sql;

	exit*/;

	$result = mysql_query($sql);

	

	$row = mysql_fetch_assoc($result);



?>







<?php

if($_SESSION['broker_type']=='AD'){

?>

<div class="agent_prof">

<h4 class="ttle">Agent Edit <span style="font-size:11px; padding-left:15px;">* Required</span>



 <div class="tab">

	<ul>

        <li><a href="/agent-profile">My Profile</a></li>

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

    </div>

    </h4>

<?php } ?>



<?php if($msg==1) { ?>

<p>Agent Edited  Successfully</p>

<?php } ?>



<div class="agent_signup_pro">



<form name="client_form" action="" method="post" >

<input type="hidden" name="action" value="my_agent_update" />

 

  

  <div class="row grey">

   <span class="one">First Name* :</span>

   <span class="two"><input type="text" name="broker_name" value="<?=$row['broker_name']?>"/></span>

   <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row">

  	<span class="one">Last Name* :</span>

    <span class="two"><input type="text" name="last_name" value="<?=$row['last_name']?>"/></span>

  <div style="clear:both; height:0;"></div>

	</div>

    

    <div class="row grey">

    	<span class="one">Address* :</span>

    	<span class="two"><textarea name="address"><?=$row['address']?></textarea></span>

  <div style="clear:both; height:0;"></div>

	</div>

    

    <div class="row">

  		<span class="one">City* :</span>

    	<span class="two"><input type="text" name="city" value="<?=$row['city']?>"/></span>

  <div style="clear:both; height:0;"></div>

	</div>

    

    <div class="row grey">

    	<span class="one">State* :</span>

        <span class="two"><input type="text" name="state" value="<?=$row['state']?>"/></span>

         <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row">

    <span class="one">Country* :</span>

    <span class="two"><input type="text" name="country" value="<?=$row['contry']?>"/></span>

    <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row grey">

   <span class="one">Zipcode* :</span>

    <span class="two"><input type="text" name="zip_code" value="<?=$row['zip_code']?>"/></span>

    <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row">

  	<span class="one">Phone*:</span>

     <span class="two"><input type="text" name="phone" value="<?=$row['phone']?>"/></span>

     <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row grey">

    <span class="one">E-mail *:</span>

    <span class="two"><input type="text" name="email" value="<?=$row['email']?>"/></span>

    <div style="clear:both; height:0;"></div>

	</div>

    

  <div class="row">

    <span class="one">&nbsp;</span>

    <span class="two"><input type="submit" value="Update"></span>

  <div style="clear:both; height:0;"></div>

	</div>

</form>

</div>





</div>

</div>

<?php

}else{



header("Location:/agent-list");

}

?>

<?php get_footer(); ?>