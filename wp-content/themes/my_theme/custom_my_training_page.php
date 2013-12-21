<?php
/*
Template name: Custom My Training Page
*/
ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;

}

?>

<script type="text/javascript">

function del_training(id){

if(confirm("Are you sure you want to delete the Trianing")){

	document.location.href = "/my-training/?id="+id+"&a=deltraining";

} 

}
</script>

<?php

if(isset($_GET['a']) && $_GET['a']=='deltraining') {

@$video_select = 'SELECT *FROM `tbl_my_training` WHERE id = "'.$_GET['id'].'"';
@$run_video_select = mysql_query($video_select);
@$result = mysql_fetch_assoc($run_video_select);
$video_destination = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/".$result['my_training_name'];
$img_destination = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/image/".$result['image'];
@unlink($video_destination);
@unlink($img_destination);

mysql_query("DELETE FROM tbl_my_training WHERE id=".$_GET['id']);

header('location:/my-training');

exit();
}

?>
<?php
/*------------------------------------------------------START INSERT QUERY---------------------------------------------------------------*/
if(isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT' && $_POST['from_nam'] == 'video' ){

$my_training_title = $_POST['my_training_title'];
$description = $_POST["description"];

if(is_uploaded_file($_FILES['my_training_file']['tmp_name'])){

$tmp_name = $_FILES['my_training_file']['tmp_name'];

$name = $_FILES['my_training_file']['name'];

$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/'.$name;

move_uploaded_file($tmp_name,$uploads_dir);

$image_tmp_name = $_FILES['my_training_image_file']['tmp_name'];

$image_name = $_FILES['my_training_image_file']['name'];

$image_uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/image/'.$image_name;

move_uploaded_file($image_tmp_name,$image_uploads_dir);

$sql = "INSERT INTO 

 `tbl_my_training` SET

				`my_training_title` = '$my_training_title',
				
				`training_description` ='$description', 

				`my_training_name` = '$name',

				`image` = '$image_name'
				

 ";

 mysql_query($sql);

  }
}
/*---------------document upload--------------------*/
if(isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT' && $_POST['from_nam'] == 'document' ){

$description = $_POST["description"];

$my_training_title = $_POST['my_training_title'];

if(is_uploaded_file($_FILES['my_training_file']['tmp_name'])){

$tmp_name = $_FILES['my_training_file']['tmp_name'];

$name = $_FILES['my_training_file']['name'];

$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/'.$name;

move_uploaded_file($tmp_name,$uploads_dir);

$sql = "INSERT INTO 

 `tbl_my_training` SET

				`my_training_title` = '$my_training_title',
				
				`training_description` ='$description', 

				`my_training_name` = '$name'
				
 ";

 mysql_query($sql);

  }
}

/*------------------------------------------------------End INSERT QUERY---------------------------------------------------------------*/
/*------------------------------------------------------START EDIT QUERY---------------------------------------------------------------*/


else if(isset($_GET['action']) && $_GET['action'] == 'edit'){



	$my_training_id = $_GET['my_training_id'];

	$sql = "SELECT * FROM tbl_my_training WHERE id=".$my_training_id;

	$query = mysql_query($sql);

	$row = mysql_fetch_assoc($query);





if(isset($_POST['submit']) && $_POST['submit'] == 'UPDATE' && $_POST['from_nam'] == 'video_update'){

	 $id = $_GET['id'];

	//$my_training_title = $_POST['my_training_title'];

	 $my_training_title = $_POST['my_training_title'];

     $description = $_POST["description"];
	 
 	 $image_name = $row['image'];

 	 $name = $row['my_training_name'];

if(is_uploaded_file($_FILES['my_training_file']['tmp_name'])){

  $tmp_name = $_FILES['my_training_file']['tmp_name'];

  $name = $_FILES['my_training_file']['name'];
  
  $uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/'.$name;

  move_uploaded_file($tmp_name,$uploads_dir);


}
if(is_uploaded_file($_FILES['my_training_image_file']['tmp_name'])){

	

	$image_tmp_name = $_FILES['my_training_image_file']['tmp_name'];

	$image_name = $_FILES['my_training_image_file']['name'];

	$image_uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/image/'.$image_name;

	move_uploaded_file($image_tmp_name,$image_uploads_dir);

 }

 $sql = "UPDATE 

			 `tbl_my_training` SET

			`my_training_title` = '$my_training_title',

				`my_training_name` = '$name',
				 
				 `training_description`= '$description',

				`image` = '$image_name'

	WHERE `id` = '$my_training_id'

 ";

 mysql_query($sql);

header('location:/my-training');

exit();

}

if(isset($_POST['submit']) && $_POST['submit'] == 'UPDATE' && $_POST['from_nam'] == 'document_update'){

	 $id = $_GET['id'];

	 $my_training_title = $_POST['my_training_title'];

     $description = $_POST["description"];
	 
 	 $image_name = $row['image'];

 	 $name = $row['my_training_name'];

if(is_uploaded_file($_FILES['my_training_file']['tmp_name'])){

 $tmp_name = $_FILES['my_training_file']['tmp_name'];

  $name = $_FILES['my_training_file']['name'];
  
  $uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_training/'.$name;

  move_uploaded_file($tmp_name,$uploads_dir);

}

 $sql = "UPDATE 

			 `tbl_my_training` SET

			`my_training_title` = '$my_training_title',

				`my_training_name` = '$name',
				 
				 `training_description`= '$description'

	WHERE `id` = '$my_training_id'

 ";

 mysql_query($sql);

header('location:/my-training');

exit();

}

?>



<?php



if($_SESSION['broker_type']=='M'){



?>



<div class="agent_prof">



<h4 class="ttle">My Training







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



    <div class="clear"></div>



</h4>

<?php

}elseif($_SESSION['broker_type']=='AD'){

?>

<div class="agent_prof">



<h4 class="ttle">My Training







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



    <div class="clear"></div>



</h4>



<?php

}elseif($_SESSION['broker_type']=='A'){

?>

<div class="agent_prof">



<h4 class="ttle">My Training

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




</div>



    <div class="clear"></div>



</h4>



<?php

}

?>

<?php
  $support_extension = array("mp4","flv","webm");
  $file_extension = pathinfo($row['my_training_name'], PATHINFO_EXTENSION); 
  if(array_search($file_extension,$support_extension) !== false){?>

<form name="my_training_upload" action="" method="post" enctype="multipart/form-data">   
<input type="hidden" name="from_nam" value="video_update"/>
    <div class="agent_signup_pro">

<div class="row listingcnt grey">

    	<span class="one">Title of My Training :</span>

 <span class="two"><input type="text" name="my_training_title" value="<?php echo $row['my_training_title']; ?>" style="width: 659px; height: 27px;"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt">

    	<span class="one">Video Image :</span>

        <span class="two">

        <img height="200" width="200" src="<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $row['image'];?>" />

        <input type="file" name="my_training_image_file" /></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt">

    	<span class="one">Browse Video</br>(mp4,flv,webm) :</span>

        <span class="two">

        <img height="200" width="200" src="<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $row['image'];?>" />

        <input type="file" name="my_training_file"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt">

    	<span class="one">Description:</span>

        <span class="two">
 <textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"><?php echo $row['training_description']; ?></textarea>
        </span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt grey">

   	<span class="two"><input type="submit" name="submit" value="UPDATE" class="sub_btn" /></span>

       <div style="clear:both; height:0;"></div>

</div>

 </div>   

   </form>

<?php
  }else{ ?>
	<form name="my_training_upload" action="" method="post" enctype="multipart/form-data">   
    <input type="hidden" name="from_nam" value="document_update"/>
    <div class="agent_signup_pro">

<div class="row listingcnt grey">

    	<span class="one">Title of My Training :</span>

 <span class="two"><input type="text" name="my_training_title" value="<?php echo $row['my_training_title']; ?>" style="width: 659px; height: 27px;" /></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt">

    	<span class="one">Browse Document :</span>

        <span class="two">

        <input type="file" name="my_training_file"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt">

    	<span class="one">Description:</span>

        <span class="two">
                <textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"><?php echo $row['training_description']; ?></textarea>
        </span>

        <div style="clear:both; height:0;"></div>

</div>


<div class="row listingcnt grey">

   	<span class="two"><input type="submit" name="submit" value="UPDATE" class="sub_btn" /></span>

       <div style="clear:both; height:0;"></div>

</div>

 </div>   

   </form>  
	  
<?php 
 }
exit();

}
/*------------------------------------------------------END EDIT QUERY---------------------------------------------------------------*/
?>


<?php

if($_SESSION['broker_type']=='M'){

?>

<div class="agent_prof">

<h4 class="ttle">My Training

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

    <div class="clear"></div>

</h4>

<div class="training_container">


<?php

$q=mysql_query("SELECT * FROM tbl_my_training");


$r=mysql_num_rows($q);

?>

<?php



if($r>0)



{



?>

<div style="background:#333333;">



	<div class="training_video">Training Video/Document</div>

    <div class="training_title">Training Title</div>
    
    <div class="training_description">Training Description</div>

    <div class="action">ACTION</div>

</div>

<?php
$i = 0 ;

while($f=mysql_fetch_array($q))


{


?>

<div class="training_list">

<div class="training_video">
<?php
  $support_extension = array("mp4","flv","webm");
  $file_extension = pathinfo($f['my_training_name'], PATHINFO_EXTENSION); 
  if(array_search($file_extension,$support_extension) !== false){?>

<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image'];?>" height="200" width="200"/></a>

<div class="video_play_btn"><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/images/play_btn.png" height="48" width="48"/></a></div>

<?php /*?><div id="myElement<?php echo $i;?>">Loading the player...</div>
<script type="text/javascript">
   
    jwplayer("myElement<?php echo $i;?>").setup({

        file: "<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>",

        image: "<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image'];?>"

    });

</script><?php */?>

<?php } else { ?>
<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/download_btn_one.png" height="200" width="200"/></a>

<?php /*?><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="download_doc" target="_blank"></a><?php */?>

<?php }?></div>

<div class="training_title">

<?php echo $f['my_training_title'];?>

</div>

<div class="training_description">

<?php echo $f['training_description'];?>

</div>

<div class="action">

<a href="http://bricrealty.com/my-training/?my_training_id=<?php echo $f['id'];?>&action=edit">EDIT</a>  |   <a href="javascript:void(0);" onclick="javascript:del_training('<?=$f['id']?>')">DELETE</a>

</div>

<div class="clear"></div>

</div>

<?php $i++; } ?>

<?php



}



else



{



?>



<p>No record</p>



<?php



}



?>


<div class="clear"></div>

<a id="add_training" class="add_training" href="javascript:viod()">Add Training</a>

</div>


<div id="training_add" class="training_add" style="display:none;">
<div class="agent_signup_pro">
<div class="row listingcnt">
    <span class="one">Training Type:</span>
    <span class="two">
    <select id="document_type" onchange="document_type();" class="user_type">
        <option value="video">please select</option>
        <option value="document">Document</option>
        <option value="video">video</option>
    </select>
    </span> 
       <div style="clear:both; height:0;"></div>
  </div>
</div>
<form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="video_upload">   
<input type="hidden" name="from_nam" value="video"/>
 <div class="agent_signup_pro">
 
 
<div class="row listingcnt grey">



    	<span class="one">Title of My Training :</span>



        <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>



        <div style="clear:both; height:0;"></div>



</div>

<div class="row listingcnt">



    	<span class="one">Video Desctiption:</span>



    <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>



        <div style="clear:both; height:0;"></div>



</div>






<div class="row listingcnt">



    	<span class="one">Video Image :</span>



        <span class="two"><input type="file" name="my_training_image_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>







<div class="row listingcnt">



    	<span class="one">Browse Video</br>(mp4,flv,webm) :</span>



        <span class="two"><input type="file" name="my_training_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>



    



<div class="row listingcnt grey">



    	



    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>



        <div style="clear:both; height:0;"></div>



</div>



 </div>   



   </form>

<form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="document_upload" style="display:none;">   
<input type="hidden" name="from_nam" value="document"/>
 <div class="agent_signup_pro">

<div class="row listingcnt grey">

    	<span class="one">Title of My Training :</span>

 <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>

        <div style="clear:both; height:0;"></div>
</div>

<div class="row listingcnt">

 	  <span class="one">Documen Desctiption:</span>

        <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>

      <div style="clear:both; height:0;"></div>

</div>


<div class="row listingcnt">

   	<span class="one">Browse Document :</span>

        <span class="two"><input type="file" name="my_training_file"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt grey">

    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>

        <div style="clear:both; height:0;"></div>

</div>
 
 </div>   
 
</form>

</div>


</div>

<?php

}elseif($_SESSION['broker_type']=='AD'){

?>

<div class="agent_prof">

<h4 class="ttle">My Training

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

    <div class="clear"></div>

</h4>

<div class="training_container">

<?php

$q=mysql_query("SELECT * FROM tbl_my_training");

$r=mysql_num_rows($q);


?>

<?php

if($r>0)

{

?>

<div style="background:#333333;">

	<div class="training_video">Training Video/Document</div>

    <div class="training_title">Training Title</div>
    
    <div class="training_description">Training Description</div>

    <div class="action">ACTION</div>

</div>

<?php

$i = 0 ;

while($f=mysql_fetch_array($q))

{

?>

<div class="training_list">

<div class="training_video">
<?php
  $support_extension = array("mp4","flv","webm");
  $file_extension = pathinfo($f['my_training_name'], PATHINFO_EXTENSION); 
  if(array_search($file_extension,$support_extension) !== false){?>

<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image'];?>" height="200" width="200"/></a>

<div class="video_play_btn"><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/images/play_btn.png" height="48" width="48"/></a></div>


<?php /*?><div id="myElement<?php echo $i;?>">Loading the player...</div>
<script type="text/javascript">
   
    jwplayer("myElement<?php echo $i;?>").setup({

        file: "<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>",

        image: "<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image'];?>"

    });

</script><?php */?>

<?php } else { ?>
<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/download_btn_one.png" height="200" width="200"/></a>

<?php /*?><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="download_doc" target="_blank"></a><?php */?>

<?php }?></div>

<div class="training_title">

<?php echo $f['my_training_title'];?>

</div>

<div class="training_description">

<?php echo $f['training_description'];?>

</div>

<div class="action">

<a href="http://bricrealty.com/my-training/?my_training_id=<?php echo $f['id'];?>&action=edit">EDIT</a>  |   <a href="javascript:void(0);" onclick="javascript:del_training('<?=$f['id']?>')">DELETE</a>

</div>

<div class="clear"></div>

</div>

<?php $i++; } ?>

<?php

}

else

{

?>

<p>No record</p>

<?php

}

?>

<div class="clear"></div>

<a id="add_training" class="add_training" href="javascript:viod()">Add Training</a>

</div>

<div id="training_add" class="training_add" style="display:none;">
<div class="agent_signup_pro">
<div class="row listingcnt">
    <span class="one">Training Type:</span>
    <span class="two">
    <select id="document_type" onchange="document_type();" class="user_type">
        <option value="video">please select</option>
        <option value="document">Document</option>
        <option value="video">video</option>
    </select>
    </span> 
       <div style="clear:both; height:0;"></div>
  </div>
</div>
<form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="video_upload">   
<input type="hidden" name="from_nam" value="video"/>
 <div class="agent_signup_pro">
 
 
<div class="row listingcnt grey">



    	<span class="one">Title of My Training :</span>



        <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>



        <div style="clear:both; height:0;"></div>



</div>

<div class="row listingcnt">



    	<span class="one">Video Desctiption:</span>



        <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>



        <div style="clear:both; height:0;"></div>



</div>






<div class="row listingcnt">



    	<span class="one">Video Image :</span>



        <span class="two"><input type="file" name="my_training_image_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>







<div class="row listingcnt">



    	<span class="one">Browse Video</br>(mp4,flv,webm) :</span>



        <span class="two"><input type="file" name="my_training_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>



    



<div class="row listingcnt grey">



    	



    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>



        <div style="clear:both; height:0;"></div>



</div>



 </div>   



   </form>

<form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="document_upload" style="display:none;">   
<input type="hidden" name="from_nam" value="document"/>
 <div class="agent_signup_pro">

<div class="row listingcnt grey">

    	<span class="one">Title of My Training :</span>

       <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>

        <div style="clear:both; height:0;"></div>
</div>

<div class="row listingcnt">

 	  <span class="one">Documen Desctiption:</span>

        <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>

      <div style="clear:both; height:0;"></div>

</div>


<div class="row listingcnt">

   	<span class="one">Browse Document :</span>

        <span class="two"><input type="file" name="my_training_file"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt grey">

    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>

        <div style="clear:both; height:0;"></div>

</div>
 
 </div>   
 
</form>

</div>

</div>

<?php

}elseif($_SESSION['broker_type']=='A'){

?>

<div class="agent_prof">

<h4 class="ttle">My Training

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

</div>

    <div class="clear"></div>

</h4>


<div class="training_container">

<?php

$q=mysql_query("SELECT * FROM tbl_my_training");

$r=mysql_num_rows($q);

?>

<?php

if($r>0)

{


?>

<div style="background:#333333;">

	<div class="training_video">Training Video/Document</div>

    <div class="training_title">Training Title</div>
    
     <div class="training_description">Training Description</div>

    <div class="action">ACTION</div>

</div>

<?php

$i = 0 ;

while($f=mysql_fetch_array($q))

{

?>

<div class="training_list">

<div class="training_video">
<?php
  $support_extension = array("mp4","flv","webm");
  $file_extension = pathinfo($f['my_training_name'], PATHINFO_EXTENSION); 
  if(array_search($file_extension,$support_extension) !== false){?>

<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image']; ?>" height="200" width="200"/></a>


<div class="video_play_btn"><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="html5lightbox" data-width="480" data-height="320" ><img src="<?php echo get_template_directory_uri(); ?>/images/play_btn.png" height="48" width="48"/></a></div>

<?php /*?><div id="myElement<?php echo $i;?>">Loading the player...</div>
<script type="text/javascript">
   
    jwplayer("myElement<?php echo $i;?>").setup({

        file: "<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>",

        image: "<?php echo get_template_directory_uri(); ?>/my_training/image/<?php echo $f['image'];?>"

    });

</script><?php */?>

<?php } else { ?>
<a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/download_btn_one.png" height="200" width="200"/></a>

<?php /*?><a href="<?php echo get_template_directory_uri(); ?>/my_training/<?php echo $f['my_training_name'];?>" class="download_doc" target="_blank"></a><?php */?>

<?php }?></div>

<div class="training_title">

<?php echo $f['my_training_title'];?>

</div>

<div class="training_description">

<?php echo $f['training_description'];?>

</div>

<div class="action">

<a href="http://bricrealty.com/my-training/?my_training_id=<?php echo $f['id'];?>&action=edit">EDIT</a>  |   <a href="javascript:void(0);" onclick="javascript:del_training('<?=$f['id']?>')">DELETE</a>

</div>

<div class="clear"></div>

</div>

<?php $i++; } ?>

<?php

}

else

{

?>

<p>No record</p>

<?php

}

?>

<div class="clear"></div>



<a id="add_training" class="add_training" href="javascript:viod()">Add Training</a>



</div>

<div id="training_add" class="training_add" style="display:none;">

<div class="agent_signup_pro">
<div class="row listingcnt">
    <span class="one">Training Type:</span>
    <span class="two">
    <select id="document_type" onchange="document_type();" class="user_type">
        <option value="video">please select</option>
        <option value="document">Document</option>
        <option value="video">video</option>
    </select>
    </span> 
       <div style="clear:both; height:0;"></div>
  </div>
</div>
 <form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="video_upload">   
<input type="hidden" name="from_nam" value="video"/>
 <div class="agent_signup_pro">
 
 
<div class="row listingcnt grey">



    	<span class="one">Title of My Training :</span>



       <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>



        <div style="clear:both; height:0;"></div>



</div>

<div class="row listingcnt">



    	<span class="one">Video Desctiption:</span>



        <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>



        <div style="clear:both; height:0;"></div>



</div>






<div class="row listingcnt">



    	<span class="one">Video Image :</span>



        <span class="two"><input type="file" name="my_training_image_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>







<div class="row listingcnt">



    	<span class="one">Browse Video</br>(mp4,flv,webm) :</span>



        <span class="two"><input type="file" name="my_training_file"/></span>



        <div style="clear:both; height:0;"></div>



</div>



    



<div class="row listingcnt grey">



    	



    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>



        <div style="clear:both; height:0;"></div>



</div>



 </div>   



   </form>

<form name="my_training_upload" action="" method="post" enctype="multipart/form-data" class="document_upload" style="display:none;">   
<input type="hidden" name="from_nam" value="document"/>
 <div class="agent_signup_pro">

<div class="row listingcnt grey">

    	<span class="one">Title of My Training :</span>

        <span class="two"><input type="text" name="my_training_title" style="width: 659px; height: 27px;"/></span>

        <div style="clear:both; height:0;"></div>
</div>

<div class="row listingcnt">

 	  <span class="one">Documen Desctiption:</span>

        <span class="two"><textarea rows="4" cols="50" name="description" style="width: 639px; height: 75px;"></textarea></span>

      <div style="clear:both; height:0;"></div>

</div>


<div class="row listingcnt">

   	<span class="one">Browse Document :</span>

        <span class="two"><input type="file" name="my_training_file"/></span>

        <div style="clear:both; height:0;"></div>

</div>

<div class="row listingcnt grey">

    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>

        <div style="clear:both; height:0;"></div>

</div>
 
 </div>   
 
</form>

</div>



</div>



<?php



}

?>

<?php get_footer(); ?>