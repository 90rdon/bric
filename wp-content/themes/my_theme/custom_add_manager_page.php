<?php

/*







Template name: Custom Manager Administrator







*/

ob_start();

get_header(); 



if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}



 

?>

<?php

$msg=0;

if(isset($_POST['action']) && $_POST['action'] == 'insert') 

  { 

  

  $msg=1;

  $broker_name = $_POST['mname'];

  $last_name = $_POST['lname'];

  $username = $_POST['user_name'];

  $password = $_POST['pass'];

  $email = $_POST['email'];

  $broker_type = $_POST['broker_type'];

  

 $sql="INSERT INTO 

 `tab_broker` SET

 `broker_name` = '$broker_name ',

 `last_name` = '$last_name',

 `broker_type`   = '$broker_type',

 `user_name`   = '$username',

 `password`    = '$password',

 `email`       = '$email'";



 

	$res=mysql_query($sql);

	

//	$to = $_POST['email'];



/*// subject

$subject = 'New Username Password';



// message

$message = '

<html>

<head>

  <title>Your Username And Password  </title>

</head>

<body>

  <p> Hi ,'.$broker_name .' ,Here are the details of username and password</p>

  <table>

    <tr>

      <td>Name:</td><td>'.$_POST['user_name'].'</td>

    </tr>

    <tr>

      <td>Email:</td><td>'.$_POST['pass'].'</td>

    </tr>

	<tr><td>Thanks</td></tr>

	<tr><td>Admin Team</td></tr>

  </table>

</body>

</html>

';*/

// To send HTML mail, the Content-type header must be set

/*$msg=0;

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: CLIENT AGENT FAMILY  <admin@admin.com>' . "\r\n";

if(mail($to, $subject, $message, $headers))

 {

	

  }*/

  

 

 }

 ?>

 

 <script language="javascript" >

function validate()  {



if(document.manager_add_frm.mname.value =="") {

alert("Please Enter The First Name ");

document.manager_add_frm.mname.focus();

return false;

} else if (document.manager_add_frm.lname.value =="") {

alert("Please Enter The Last Name ");

document.manager_add_frm.lname.focus();

return false;

}else if (document.manager_add_frm.user_name.value =="") {

alert("Please Enter The User Name ");

document.manager_add_frm.user_name.focus();

return false;

}  else if (document.manager_add_frm.pass.value =="") {

alert("Please Enter The Password ");

document.manager_add_frm.pass.focus();

return false;

}else if (document.manager_add_frm.email.value =="") {

alert("Please Enter The Email Address  ");

document.manager_add_frm.email.focus();

return false;

}  else if (document.manager_add_frm.broker_type.value =="") {

alert("Please Enter Type ");

document.manager_add_frm.broker_type.focus();

return false;

} 



return true;



}

</script>

<div class="agent_prof">

<?php

if($_SESSION['broker_type']=='AD'){

?>

<h4 class="ttle">Add Manager/Administrator

<div class="tab">

	<ul>

     	<li><a href="agent-profile"><strong>My Profile</strong></a></li>

    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/manager-list"><b>Administrator/Manager list</b></a></li>

         <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/client-list"><b>Client List</b></a></li>
        
        <li><a href="/properties-add"><b>Add Properties</b></a></li>

        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

</div>

    <div class="clear"></div>

</h4>

	

	<?php } ?>



<form name ="manager_add_frm" action="" method="post" onSubmit="return validate()" >

<input type="hidden" name="action" value="insert"  />



<?php

if($msg==1) { ?>

<p>Insertion has been done successfully.</p>

<?php } ?>



<div class="agent_signup_pro">



<div class="row">

	<span class="one">FIRST NAME *</span>

	<span class="two"><input type="text" name="mname" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">LAST NAME *</span>

    <span class="two"><input type="text" name="lname" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row">

	<span class="one">USER NAME *</span>

    <span class="two"><input type="text" name="user_name" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">PASSWORD *</span>

    <span class="two"><input type="password" name="pass" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row">

	<span class="one">EMAIL</span>

    <span class="two"><input type="text" name="email" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

    <span class="one">USER TYPE</span>

    <span class="two">

        <select  name="broker_type" class="user_type" style="width:228px;">

        	<option value="A">Agent</option>

        	<option value="M">Manager</option>

        	<option value="AD">Administartor</option>

        </select>

	</span>

    <div style="clear:both; height:0;"></div>

</div>

    

<div class="row">

	<span class="one"><input type="submit" value="SUBMIT" class="btn_whites" /></span>

    <div style="clear:both; height:0;"></div>

</div>





</form>





</div>

<?php get_footer(); ?>