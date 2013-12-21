<?php
/*Template name:custom properties edit*/

ob_start();

get_header(); 
if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;
}
?>
<?php
$properties_id = base64_decode($_GET['msg']);
$msg=0;

if(isset($_POST['action']) && $_POST['action'] == 'update') 

  { 

  

  $msg=1;

  $properties_name = $_POST['properties'];


 $sql="UPDATE 

 `tab_properties` SET

 `properties_name` = '$properties_name' WHERE `id` = '$properties_id'";
	if(mysql_query($sql)){
	header("location:/properties-add/");
		}

 }

 ?>

 

 <script type="text/javascript">

function validate(){
	if (document.frm_properties_update.properties.value =="") {
	
	alert("Please Enter The Properties");
	
	document.frm_properties_update.properties.focus();
	
	return false;
	
	}  
	else
	{
	return true;
    }



}

</script>

<div class="agent_prof">

<?php

if($_SESSION['broker_type']=='AD'){

?>

<h4 class="ttle">Add Properties

<div class="tab">

	<ul>

    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

        <li><a href="/manager-list"><b>Administrator/Manager List</b></a></li>
        
        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/profile-edit">Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>


    </ul>

</div>

    <div class="clear"></div>

</h4>

	

	<?php } ?>
    
    
 <?php 
 $select_query = "SELECT * FROM `tab_properties` WHERE `id` = '$properties_id '"; 
 $run_select_query = mysql_query($select_query);
 $row = mysql_fetch_assoc($run_select_query);
 ?>    

<form name ="frm_properties_update" action="" method="post" onSubmit="return validate();" >

<input type="hidden" name="action" value="update"  />



<?php if($msg==1) { ?>

<p>Properties updated successfully.</p>

<?php } ?>



<div class="agent_signup_pro"> 

<div class="row">

	<span class="one">Properties*</span>

    <span class="two"><input type="text" name="properties"  value="<?php echo $row['properties_name']; ?>"style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>


<div class="row">

	<span class="one"><input type="submit" value="SUBMIT" class="btn_whites" /></span>

    <div style="clear:both; height:0;"></div>

</div>



</div>

</form>

 <?php get_footer(); ?>