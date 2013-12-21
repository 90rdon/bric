<?php
/*



Template name: Custom Reset Password



*/
ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agent-login");
exit;

}
$msg =0;
if(isset($_POST['action']) && $_POST['action'] == 'my_password_update') {
 $broker_name=$_POST['broker_name'];

 $password=$_POST['password'];

 $user_name=$_POST['user_name'];



$str="UPDATE  `tab_broker` SET 
 `password` ='$password', 
 `user_name` = '$user_name' WHERE broker_id=".$_SESSION['id'];
/* print $str;
 exit;
*/  if(mysql_query($str))
   {
     $msg = 1;
  }
}

$sql = "SELECT * FROM tab_broker WHERE`broker_id` =".$_SESSION['id'];
$rs = mysql_query($sql);
/*	print $sql;
	exit*/;
	$result = mysql_query($sql);
	
	$row = mysql_fetch_assoc($result);

?>


<div class="agent_prof">

<?php
if($_SESSION['broker_type']=='A'){
?>


<h4 class="ttle">Reset Password
<div class="tab">
	<ul>
	     <li><a href="agent-profile"><strong>Agent Profile</strong></a></li>
    	<li><a href="/marketing-toolbox"><b>Marketing Toolbox</b></a></li>
        <li><a href="/my-client"><b>My Clients</b></a></li>
        <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
		<li><a href="/my-client-add"><b>Add Client </b></a></li>
    </ul>
    <div class="clear"></div>
</div>
</h4>
	
	<?php
}elseif($_SESSION['broker_type']=='AD'){
?>

<h4 class="ttle">Reset Password
<div class="tab">
	<ul>
    	<li><a href="agent-profile"><strong>My Profile</strong></a></li>
    	<li><a href="/agent-list"><b>Agent List</b></a></li>
        <li><a href="/client-list"><b>Client List</b></a></li>
        <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>
        <li><a href="/manager-list"><b>Administrator/Manager List</b></a></li>
        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>
        
    </ul>
    <div class="clear"></div>
</div>
</h4>
	
	<?php } else if ($_SESSION['broker_type']=='M') { ?>

<h4 class="ttle">Reset Password
	<div class="tab">
	<ul>
	  <li><a href="agent-profile"><strong>My Profile</strong></a></li>
       <li><a href="/agent-list"><b>Agent List</b></a></li>
       <li><a href="/client-list"><b>Client List</b></a></li>
       <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
    </ul>
    <div class="clear"></div>
 </div>
 </h4>
	
	<?php } ?>


<?php if($msg==1) { ?>
<p>Password  Edited  Successfully</p>
<?php } ?>
<div class="agent_signup_pro">

<form name="client_form" action="" method="post" >
<input type="hidden" name="action" value="my_password_update" />
 
  
  <div class="row">
    <span class="one">Username* :</span>
    <span class="two"><input type="text" name="user_name" value="<?=$row['user_name']?>"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row grey">
    <span class="one">Password* :</span>
    <span class="two"><input type="text" name="password" value="<?=$row['password']?>"/></span>
  	<div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row">
    <span class="one"><input type="submit" value="Change Password"></span>
    <div style="clear:both; height:0;"></div>
  </div>
</form>


</div>
</div>
<?php get_footer(); ?>