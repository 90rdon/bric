<?php
/*
Template name: custom_login_page
*/
ob_start();
get_header(); 
if(isset($_POST['action']) && $_POST['action'] == 'login')
  {
  $msg =0;
  $sql= 'SELECT * FROM tab_broker WHERE user_name=\''.$_POST['username'].'\' AND password =\''.$_POST['password'].'\' AND broker_type =\''.$_POST['broker_type'].'\'';
 /* print $sql;
  exit;*/
   $res=mysql_query($sql);
  $count = mysql_num_rows($res);
  $row=mysql_fetch_array($res);
   if($count >0) 
   {
		$_SESSION['is_login'] = true;
		$_SESSION['broker_type'] = $_POST['broker_type'];
		$_SESSION['id']=$row['broker_id'];
		
		header("Location:/agent-profile");
		exit;
		
   } 
 else 
 {
	$msg =1;
 }
 
 }

?>
<script type="text/javascript">
function validate_login()
{
if(document.login.username.value == "")
{
alert("Please Enter Username");
document.login.username.focus();
return false;
}
if(document.login.password.value == "")
{
alert("Please Enter Password");
document.login.password.focus();
return false;
}

return true;

}
</script>
<div class="login_hd">
	<h2>Log in to Bricrealty</h2>
    Don't have a Bricrealty account? <a href="/agent-signup">Sign up now.</a>
</div>

<div class="agent_login_head">



<?php
if(isset($msg) && $msg==1) { ?>
<p>Invalid Username/Password</p>
<?php } ?>


    <form name="login" method="post" action="" onsubmit="return validate_login();">
        <input type="hidden" name="action" value="login" />
		<span>Username</span>
		<input type="text" name="username" class="tbox_1" />
        
        <span>Password</span>
		<input type="password" name="password" class="tbox_1" />
		<span>User Type</span>      
        <select  name="broker_type" class="user_type">
        <option>Select User Type</option>
        <option value="A">Agent</option>
        <option value="M">Manager</option>
        <option value="AD">Administartor</option>
        </select>
        <input type="submit" value="LOGIN" class="sub_btn" />
        </form>



</div>


<?php get_footer(); ?>