<?php
/*
Template name: Custom properties add
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

  $properties_name = $_POST['properties'];



 $sql="INSERT INTO 

 `tab_properties` SET

 `properties_name` = '$properties_name'";



 

	$res=mysql_query($sql);

 }

 ?>

 

 <script type="text/javascript">

function validate(){
	/*var properties = document.forms["frm_properties"]["properties"].value;
	alert(properties);*/
	
	if (document.frm_properties.properties.value =="") {
	
	alert("Please Enter The Properties");
	
	document.frm_properties.properties.focus();
	
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



<form name ="frm_properties" action="" method="post" onSubmit="return validate();" >

<input type="hidden" name="action" value="insert"  />



<?php if($msg==1) { ?>

<p>Properties insertion has been done successfully.</p>

<?php } ?>



<div class="agent_signup_pro"> 

<div class="row">

	<span class="one">Properties*</span>

    <span class="two"><input type="text" name="properties" style="width:200px;" /></span>

    <div style="clear:both; height:0;"></div>

</div>


<div class="row">

	<span class="one"><input type="submit" value="SUBMIT" class="btn_whites" /></span>

    <div style="clear:both; height:0;"></div>

</div>



</div>

</form>


 <?php 
 $select_query = "SELECT * FROM `tab_properties` ORDER BY `id` DESC"; 
 $run_select_query = mysql_query($select_query);
 ?>
<div class="prop_list_outr">
	<div class="prop_hdr_row">
    	<div class="prophdr_1stcol">Properties</div>
        <div class="prophdr_2ndcol">Action</div>
        <div class="clear"></div>
    </div>
    <?php  while($row = mysql_fetch_assoc($run_select_query)){ ?>
    <div class="prop_cell_row">
    	<div class="prop_1stcol"><?php echo $row['properties_name']; ?></div>
        <div class="prop_2ndcol">
        	<h4 class="edit"><a href="properties-edit?msg=<?php echo base64_encode ($row['id']);?>">Edit</a></h4>
        	<h4 class="delete"><a href="properties-delete?msg=<?php echo base64_encode ($row['id']);?>/" onclick="return properties_del_confirm();">Delete</a></h4>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php }?>
</div>



<?php get_footer(); ?>