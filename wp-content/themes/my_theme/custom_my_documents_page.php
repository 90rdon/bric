<?php



/*















Template name: Custom My Documents Page















*/



ob_start();



get_header(); 



if(!$_SESSION['is_login']) {



header("Location:/agent-login");



exit;







}



?>
<?php
@$broker_id = $_SESSION['id'];

@$user_type_select_query = 'SELECT *FROM `tab_broker` WHERE `broker_id`="'.$broker_id.'"';
@$run_user_type_select_query = mysql_query($user_type_select_query);
@$result_user_type_select = mysql_fetch_assoc($run_user_type_select_query);
$broker_type = $result_user_type_select['broker_type'];
?>
<script type="text/javascript">

function del_documents(id){

if(confirm("Are you sure you want to delete the Documents")){

	document.location.href = "/my-documents/?id="+id+"&a=deldocuments";

} 

}



</script>
<?php

if(isset($_GET['a']) && $_GET['a']=='deldocuments') {

//echo "hello";

//echo "------------";

//echo $my_training_id;

//echo "------------";

//echo $_GET['id'];

mysql_query("DELETE FROM tbl_my_document WHERE id=".$_GET['id']);

header('location:/my-documents');

exit();



}



?>
<?php



if(isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT'){







$my_document_title = $_POST['my_document_title'];











if(is_uploaded_file($_FILES['my_document_file']['tmp_name'])){



/*if(($_FILES["my_document_file"]["type"] == "image/gif")  ||  ($_FILES["my_document_file"]["type"] == "image/jpeg")  ||   ($_FILES["my_document_file"]["type"] == "image/jpg")   ||  ($_FILES["my_document_file"]["type"] == "image/pjpeg")  ||  ($_FILES["my_document_file"]["type"] == "image/png"))  {*/



$tmp_name = $_FILES['my_document_file']['tmp_name'];







$name = $_FILES['my_document_file']['name'];







$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_document/'.$name;







move_uploaded_file($tmp_name,$uploads_dir);











$sql = "INSERT INTO 



 `tbl_my_document` SET



				`my_document_title` = '$my_document_title',



				`my_document_name` = '$name',

                `broker_id` = '$broker_id',
				`broker_type` = '$broker_type'

 ";







 mysql_query($sql);



/*}else{



	echo "File Extension of the inserted documents is not supported.Try again.";

}*/



 }



}else if(isset($_GET['action']) && $_GET['action'] == 'edit'){

$my_document_id = $_GET['my_document_id'];

$sql = "SELECT * FROM tbl_my_document WHERE id=".$my_document_id;

$query = mysql_query($sql);

$row = mysql_fetch_assoc($query);





if(isset($_POST['submit']) && $_POST['submit'] == 'UPDATE'){

//print '<pre>';

//print_r($_FILES);

//exit();

if(is_uploaded_file($_FILES['my_document_file']['tmp_name'])){

/*if(($_FILES["my_document_file"]["type"] == "image/gif")  ||  ($_FILES["my_document_file"]["type"] == "image/jpeg")  ||   ($_FILES["my_document_file"]["type"] == "image/jpg")   ||  ($_FILES["my_document_file"]["type"] == "image/pjpeg")  ||  ($_FILES["my_document_file"]["type"] == "image/png"))  {*/





$my_document_title = $_POST['my_document_title'];



if(is_uploaded_file($_FILES['my_document_file']['tmp_name'])){



$tmp_name = $_FILES['my_document_file']['tmp_name'];



$name = $_FILES['my_document_file']['name'];







$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/my_document/'.$name;







move_uploaded_file($tmp_name,$uploads_dir);





 }

/* }else {

"File Extension of the inserted documents is not supported.Try again.";



}*/



 }else{

 

 	$my_document_title = $_POST['my_document_title'];

 	$name = $row['my_document_name'];

	

 

 }

$id = $_GET['id'];



 $sql = "UPDATE 



 `tbl_my_document` SET



				`my_document_title` = '$my_document_title',



				`my_document_name` = '$name'

	WHERE `id` = '$my_document_id'



 ";



 mysql_query($sql);

header('location:/my-documents');

exit();



}





?>
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
  <?php

}

?>
  <div class="clear"></div>
</h4>
<form name="my_document_upload" action="" method="post" enctype="multipart/form-data">
  <div class="agent_signup_pro">
    <div class="row listingcnt grey"> <span class="one">Title of My Document:</span> <span class="two">
      <input type="text" name="my_document_title" value="<?php echo $row['my_document_title']; ?>" />
      </span>
      <div style="clear:both; height:0;"></div>
    </div>
    <div class="row listingcnt"> <span class="one">Select File:</span> <span class="two">
      <?php /*?><img height="200" width="200" src="<?php echo get_template_directory_uri(); ?>/my_document/<?php echo $row['my_document_name'];?>"/><?php */?>
      <input type="file" name="my_document_file" value="<?php echo $row['my_document_name']; ?>" />
      </span>
      <div style="clear:both; height:0;"></div>
    </div>
    <div class="row listingcnt grey"> <span class="two">
      <input type="submit" name="submit" value="UPDATE" class="sub_btn" />
      </span>
      <div style="clear:both; height:0;"></div>
    </div>
  </div>
</form>
<?php

exit();



?>
<?php

}else if(isset($_GET['action']) && $_GET['action'] == 'delete'){







$my_document_id = $_GET['my_document_id'];







mysql_query("DELETE FROM tbl_my_document WHERE id=".$my_document_id);







}



?>
<?php



if($_SESSION['broker_type']=='M'){



?>
<div class="agent_prof">
<h4 class="ttle">My Documents
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
<div class="my_document">

  <?php







$q=mysql_query("SELECT * FROM tbl_my_document WHERE `broker_id` = $broker_id");



$r=mysql_num_rows($q);



?>
  <?php



if($r>0)



{



?>
  <div class="training_video">My Documents</div>
  <div class="training_download">Download</div>
  <div class="training_title">My Documents Title</div>
  <div class="action">Action</div>
  <?php



$i = 0 ;



while($f=mysql_fetch_array($q))







{



?>
  <div class="training_list">
    <div class="training_video"> <img src="<?php echo get_template_directory_uri(); ?>/images/document_img.jpg" /> </div>
    <div class="training_download"><a href="<?php echo get_template_directory_uri(); ?>/my_document/<?php echo $f['my_document_name'];?>" target="_blank">click</a></div>
    <div class="training_title"> <?php echo $f['my_document_title'];?> </div>
    <div class="action"> <a href="http://bricrealty.com/my-documents/?my_document_id=<?php echo $f['id'];?>&action=edit">Edit</a> | <a href="javascript:void(0);" onclick="javascript:del_documents('<?=$f['id']?>')">Delete</a> </div>
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
  <a id="add_training" class="add_training" href="javascript:viod()">Add Document</a> </div>
<div id="training_add" class="training_add" style="display:none;">
  <form name="my_document_upload" action="" method="post" enctype="multipart/form-data">
    <div class="agent_signup_pro">
      <div class="row listingcnt grey"> <span class="one">Title of My Document:</span> <span class="two">
        <input type="text" name="my_document_title" />
        </span>
        <div style="clear:both; height:0;"></div>
      </div>
      <div class="row listingcnt"> <span class="one">Select File:</span> <span class="two">
        <input type="file" name="my_document_file"/>
        </span>
        <div style="clear:both; height:0;"></div>
      </div>
      <div class="row listingcnt grey"> <span class="two">
        <input type="submit" name="submit" value="SUBMIT" class="sub_btn" />
        </span>
        <div style="clear:both; height:0;"></div>
      </div>
    </div>
  </form>
</div>
<?php



}elseif($_SESSION['broker_type']=='AD'){



?>
<div class="agent_prof">
  <h4 class="ttle">My Documents
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
  <div class="my_document">
    <?php







$q=mysql_query("SELECT * FROM tbl_my_document WHERE `broker_id` = $broker_id");



$r=mysql_num_rows($q);



?>
    <?php



if($r>0)



{



?>
    <div class="training_video">My Documents</div>
    <div class="training_download">Download</div>
    <div class="training_title">My Documents Title</div>
    <div class="action">Action</div>
    <?php



$i = 0 ;



while($f=mysql_fetch_array($q))







{



?>
    <div class="training_list">
      <div class="training_video"> <img src="<?php echo get_template_directory_uri(); ?>/images/document_img.jpg" /> </div>
      <div class="training_download"><a href="<?php echo get_template_directory_uri(); ?>/my_document/<?php echo $f['my_document_name'];?>" target="_blank">click</a></div>
      <div class="training_title"> <?php echo $f['my_document_title'];?> </div>
      <div class="action"> <a href="http://bricrealty.com/my-documents/?my_document_id=<?php echo $f['id'];?>&action=edit">Edit</a> | <a href="javascript:void(0);" onclick="javascript:del_documents('<?=$f['id']?>')">Delete</a> </div>
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
    <a id="add_training" class="add_training" href="javascript:viod()">Add Document</a> </div>
  <div id="training_add" class="training_add" style="display:none;">
    <form name="my_document_upload" action="" method="post" enctype="multipart/form-data">
      <div class="agent_signup_pro">
        <div class="row listingcnt grey"> <span class="one">Title of My Document:</span> <span class="two">
          <input type="text" name="my_document_title" />
          </span>
          <div style="clear:both; height:0;"></div>
        </div>
        <div class="row listingcnt"> <span class="one">Select File:</span> <span class="two">
          <input type="file" name="my_document_file"/>
          </span>
          <div style="clear:both; height:0;"></div>
        </div>
        <div class="row listingcnt grey"> <span class="two">
          <input type="submit" name="submit" value="SUBMIT" class="sub_btn" />
          </span>
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
  <h4 class="ttle">My Documents
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
  <div class="my_document">

    <?php





$q=mysql_query("SELECT * FROM tbl_my_document WHERE `broker_id` = $broker_id OR `broker_type`='M'");



$r=mysql_num_rows($q);



?>
    <?php



if($r>0)



{



?>
    <div class="training_video">My Documents</div>
    <div class="training_download">Download</div>
    <div class="training_title">My Documents Title</div>
    <div class="action">Action</div>
    <?php



$i = 0 ;



while($f=mysql_fetch_array($q))







{



?>
    <div class="training_list">
      <div class="training_video"> <img src="<?php echo get_template_directory_uri(); ?>/images/document_img.jpg" /> </div>
      <div class="training_download"><a href="<?php echo get_template_directory_uri(); ?>/my_document/<?php echo $f['my_document_name'];?>" target="_blank">click</a></div>
      <div class="training_title"><?php echo $f['my_document_title'];?></div>
      <?php if($f['broker_type']=='A'){?>
      <div class="action"> <a href="http://bricrealty.com/my-documents/?my_document_id=<?php echo $f['id'];?>&action=edit">Edit</a> | <a href="javascript:void(0);" onclick="javascript:del_documents('<?=$f['id']?>')">Delete</a> </div>
      <?php }else{?> <div class="action">No permission to delete it</div><?php }?>
      
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
    <a id="add_training" class="add_training" href="javascript:viod()">Add Document</a> </div>
  <div id="training_add" class="training_add" style="display:none;">
    <form name="my_document_upload" action="" method="post" enctype="multipart/form-data">
      <div class="agent_signup_pro">
        <div class="row listingcnt grey"> <span class="one">Title of My Document:</span> <span class="two">
          <input type="text" name="my_document_title" />
          </span>
          <div style="clear:both; height:0;"></div>
        </div>
        <div class="row listingcnt"> <span class="one">Select File:</span> <span class="two">
          <input type="file" name="my_document_file"/>
          </span>
          <div style="clear:both; height:0;"></div>
        </div>
        <div class="row listingcnt grey"> <span class="two">
          <input type="submit" name="submit" value="SUBMIT" class="sub_btn" />
          </span>
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
