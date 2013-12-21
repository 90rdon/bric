<?php
/*



Template name: Custom Broker Manager Profile Edit Page



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

/*var_dump($_POST);
exit;*/

if(isset($_POST['action']) && $_POST['action'] == 'update') 
  { 
  
  $msg=1;
  $broker_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['user_name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  
 $update_sql="UPDATE 
 `tab_broker` SET
 `broker_name` = '$broker_name',
 `last_name` = '$last_name',
 `user_name`   = '$username',
 `password`    = '$password',
 `email`       = '$email' WHERE broker_id=".$_GET['id'];
 
/* print $sql;
 exit;*/
 

 
	$res=mysql_query($update_sql);
	
}
	
	$sql = 'SELECT * FROM tab_broker WHERE broker_id ='.$_GET['id'];
	//echo $sql;
	$rs = mysql_query($sql);
    $row = mysql_fetch_assoc($rs);
	
	$namearr = explode(" ",$row['broker_name']);
	
	/*$first_name = $namearr[0];
    $last_name = $namearr[1];
	*/






 ?>
 
 


<?php
if($_SESSION['broker_type']=='AD'){
?>
<div class="agent_prof">
<h4 class="ttle">Administrator/Manager Edit <span style="font-size:11px; padding-left:15px;">* Required</span>

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

</div>
</h4>


<div class="agent_signup_pro">


<?php
if($msg==1) { ?>
<p>Edit has been edited successfully .</p>
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
<span class="one">USER NAME</span>
<span class="two"><input type="text" name="user_name" value="<?=$row['user_name']?>"/></span>
<div style="clear:both; height:0;"></div>
</div>


<div class="row">
<span class="one">PASSWORD</span>
<span class="two"><input type="text" name="password" value="<?=$row['password']?>"/></span>
<div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
<span class="one">EMAIL</span>
<span class="two"><input type="text" name="email" value="<?=$row['email']?>" /></span>
<div style="clear:both; height:0;"></div>
</div>


<div class="row">
<span class="one">&nbsp;</span>
<span class="two"><input type="submit" value="Update"  class="btn_whites" /></span>
<div style="clear:both; height:0;"></div>
</div>

</form>
</div>
</div>

</div>
<?php
}
?>



<?php get_footer(); ?>