 <?php
/*



Template name: Custom My Documents Edit Page



*/
ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agent-login");
exit;

}
?>


<?php
$select = "SELECT * FROM tbl_my_document WHERE id =".$_GET['id'];
$query = mysql_query($select);
$row = mysql_fetch_assoc($query);
?>



<?php

if(isset($_POST['submit']) && $_POST['submit'] == 'UPDATE'){

$id = $_GET['id'];
$my_document_title = $_POST['my_document_title'];

if(is_uploaded_file($_FILES['my_document_file']['tmp_name'])){

$tmp_name = $_FILES['my_document_file']['tmp_name'];

$name = $_FILES['my_document_file']['name'];



$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_document/'.$name;



move_uploaded_file($tmp_name,$uploads_dir);


 }else{
 
 
 	$name = $row['my_document_name'];
 
 }


$sql = "UPDATE 

 `tbl_my_document` SET

				`my_document_title` = '$my_document_title',

				`my_document_name` = '$name'
	WHERE `id` = '$id'

 ";

 mysql_query($sql);


header('location:/my-documents/');
 exit();
}

?>



<div class="clear"></div>





<div class="agent_prof">

<h4 class="ttle">My Documents Edit


<?php

if($_SESSION['broker_type']=='M'){

?>
<div class="tab">

	<ul>

    	<li><a href="/agent-list"><b>Agents List</b></a></li>

		<li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

         <li><a href="/profile-edit">Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

</div>
<?php
}elseif($_SESSION['broker_type']=='AD'){
?>
<div class="tab">

	<ul>
    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

        <li><a href="/manager-list"><b>Administrator/Manager List</b></a></li>

        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/profile-edit"><!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/edit_icon.png" /> -->Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

        

    </ul>

</div>

<?php
}
?>

    <div class="clear"></div>

</h4>


<form name="my_document_upload" action="" method="post" enctype="multipart/form-data">   

    <div class="agent_signup_pro">

		



<div class="row listingcnt grey">

    	<span class="one">Title of My Document:</span>

        <span class="two"><input type="text" name="my_document_title" value="<?php echo $row['my_document_title']; ?>" /></span>

        <div style="clear:both; height:0;"></div>

</div>

    

<div class="row listingcnt">

    	<span class="one">Select File:</span>

        <span class="two"><img height="200" width="200" src="<?php echo get_template_directory_uri(); ?>/my_document/<?php echo $row['my_document_name'];?>" />
        				  <input type="file" name="my_document_file" /></span>

        <div style="clear:both; height:0;"></div>

</div>

    

<div class="row listingcnt grey">

    	

    	<span class="two"><input type="submit" name="submit" value="UPDATE" class="sub_btn" /></span>

        <div style="clear:both; height:0;"></div>

</div>

 </div>   

   </form>

<?php get_footer(); ?>