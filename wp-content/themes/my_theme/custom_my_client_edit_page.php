<?php

/*







Template name: Custom My Client Edit







*/

ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}

if(isset($_GET['a']) && $_GET['a']=='del') {

	mysql_query("DELETE FROM tbl_client WHERE client_id=".$_GET['id']);
	$page_number = $_GET['page_no'];
	header("Location:/my-client/?t=$page_number");
    exit;
	}



$msg =0;

if(isset($_POST['action']) && $_POST['action'] == 'my_client_update') {

 $name=$_POST['nam'];

 

 $lname=$_POST['lname'];



 $spou=$_POST['suspo'];



 $add=$_POST['add'];



 $city=$_POST['cty'];



 $state=$_POST['stat'];



 $country=$_POST['count'];



 $zip=$_POST['zip'];



 $pho=$_POST['pho'];



 $mail=$_POST['mail'];



 $product=$_POST['produ'];





$str="UPDATE  `tbl_client` SET 

 `name` ='$name',

 `last_name` = '$lname', 

 `Spouse` ='$spou',

 `city`  = '$city',

 `state` = '$state',

 `country` = '$country',

 `zip_code` = '$zip',

 `phone` = '$pho',

 `email` = '$mail',

 `address` = '$add' WHERE client_id=".$_GET['id'];

/* print $str;

 exit;*/

  if(mysql_query($str))

   {

     $msg = 1;

  }

}



$sql = "SELECT * FROM tbl_client WHERE`client_id` =".$_GET['id'];

$rs = mysql_query($sql);

/*	print $sql;

	exit*/;

	$result = mysql_query($sql);

	

	$row = mysql_fetch_assoc($result);



?>

<script type="text/javascript">

function validate()

{

var name=document.forms["client_form"]["nam"].value;

var lname=document.forms["client_form"]["lname"].value;



var address=document.forms["client_form"]["add"].value;



var mail=document.forms["client_form"]["mail"].value;

var at=mail.indexOf("@");

var dt=mail.lastIndexOf(".");



var city=document.forms["client_form"]["cty"].value;



var state=document.forms["client_form"]["stat"].value;



var country=document.forms["client_form"]["count"].value;



var zip=document.forms["client_form"]["zip"].value;



var phone=document.forms["client_form"]["pho"].value;



if(name==null||name=="")

{

alert("First Name must be filled out");

document.forms["client_form"]["nam"].focus();

return false;

}

else if(lname==null||lname=="")

{

alert("Last Name must be filled out");

document.forms["client_form"]["nam"].focus();

return false;

}

else if(address==""||address==null)

{

alert("Address must be filled out");

document.forms["client_form"]["add"].focus();

return false;

}

else if(city==""||city==null)

{

alert("City must be filled out");

document.forms["client_form"]["cty"].focus();

return false;

}

else if(state==""||state==null)

{

alert("State must be filled out");

document.forms["client_form"]["stat"].focus();

return false;

}

else if(isNaN(zip)==true||zip.length<6||zip==""||zip==null)

{

alert("Put a valid ZIP like 700056");

document.forms["client_form"]["zip"].focus();

return false;

}

else if(country==""||country==null)

{

alert("Country must be filled out");

document.forms["client_form"]["count"].focus();

return false;

}



else if(isNaN(phone)==true||phone.length<10)

{

alert("Enter 10 digits integer phone no");

document.forms["client_form"]["pho"].focus();

return false;

}

else if(mail==""||mail==null)

{

alert("E-mail must be filled out");

document.forms["client_form"]["mail"].focus();

return false;

}

else if(at<0||dt<at+5)

{

alert("Your enterd E-mail is not valid");

document.forms["client_form"]["mail"].focus();

return false;

}

else

{

return true;

}

}





function del_client(id){

if(confirm("Are you sure you want to delete the client")){

	document.location.href = "/my-client-edit/?id="+id+"&a=del";

} 

}



</script>

<div class="agent_prof">

<h4 class="ttle">Client Edit<span style="font-size:11px; padding-left:15px;">* Required</span>

<?php

if($_SESSION['broker_type']=='AD'){

?>



<div class="tab">

	<ul>

    	<li><a href="/agent-profile">My Profile</a></li>

    	<li><a href="/agent-list">Agent List</a></li>

        <li><a href="/client-list">Client List</a></li>

        <li><a href="/manager-add">Add Administrator/Manager</a></li>

        <li><a href="/manager-list">Administrator/Manager List</a></li>

        <li><a href="/toolbox-upload">Upload Marketing Toolbox</a></li>

        <li><a href="/reset-password/">Reset Password</a></li>

        

    </ul>

    <div class="clear"></div>

    </div>

<?php

}elseif($_SESSION['broker_type']=='A'){

?>

<div class="tab">

	<ul>

    	<li><a href="/agent-profile">My Profile</a></li>

    	<li><a href="/marketing-toolbox">Marketing Toolbox</a></li>

        <li><a href="/my-client">My Clients</a></li>

        <li><a href="/my-client-add">Add Client</a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/reset-password/">Reset Password</a></li>

    </ul>

    <div class="clear"></div>

    </div>

    <?php } ?>

    

    </h4>

    

<div class="agent_signup_pro">



<?php if($msg==1) { ?>

<p>Client Edited  Successfully</p>

<?php } ?>



<form name="client_form" action="" method="post" onSubmit="return validate()";>

<input type="hidden" name="action" value="my_client_update" />



<div class="row grey">

	<span class="one">First Name* :</span>

   <span class="two"><input type="text" name="nam" value="<?=$row['name']?>"/></span>

  	<div style="clear:both; height:0;"></div>

</div>



<div class="row">

    <span class="one">Last Name* :</span>

    <span class="two"><input type="text" name="lname" value="<?=$row['last_name']?>"/></span>

  	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

    <span class="one">Spouse:</span>

    <span class="two"><input type="text" name="suspo" value="<?=$row['Spouse']?>"/></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row">

    <span class="one">Address* :</span>

    <span class="two"><textarea name="add"><?=$row['address']?></textarea></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

    <span class="one">City* :</span>

    <span class="two"><input type="text" name="cty" value="<?=$row['city']?>"/></span>

  <div style="clear:both; height:0;"></div>

</div>



<div class="row">

    <span class="one">State* :</span>

    <span class="two"><input type="text" name="stat" value="<?=$row['state']?>"/></span>

 	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

    <span class="one">Zipcode* :</span>

    <span class="two"><input type="text" name="zip" value="<?=$row['zip_code']?>"/></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row">

    <span class="one">Country* :</span>

    <span class="two"><input type="text" name="count" value="<?=$row['country']?>"/></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

    <span class="one">Phone*:</span>

    <span class="two"><input type="text" name="pho" value="<?=$row['phone']?>"/></span>

  <div style="clear:both; height:0;"></div>

</div>



<div class="row">

    <span class="one">E-mail *:</span>

    <span class="two"><input type="text" name="mail" value="<?=$row['email']?>"/></span>

  	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">&nbsp;</span>

    <span class="two"><input type="submit" value="Update" >

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <input type="reset"></span>

    <div style="clear:both; height:0;"></div>

</div>

 

</form>

</div>





</div>

</div>

<?php get_footer(); ?>