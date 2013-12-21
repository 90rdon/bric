<?php

/*







Template name: Custom Broker Toolbox Upload Page







*/

ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}

if(isset($_GET['del_id']) && ($_GET['del_id'] != '')){

$del_id = $_GET['del_id'];

$del_sql = "SELECT * FROM tbl_pdf WHERE id=".$del_id;

$del_query = mysql_query($del_sql);

$del_data = mysql_fetch_assoc($del_query);

$del_name = $del_data['pdf_name'];

$destination = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/pdf/".$del_name;

unlink($destination);



mysql_query("DELETE FROM tbl_pdf WHERE id=".$del_id);

header("location:/toolbox-upload/");

}

?>

 <script type="text/javascript">

function del_pdf(id){

if(confirm("Are you sure you want to delete the agent")){

	document.location.href = "/toolbox-upload/?del_id="+id+"&a=del";

} 

}



</script>



<?php

// echo $uploads_dir = bloginfo('template_directory').'/pdf';

//validation

//$error=0;

if(isset($_POST[submit]) && $_POST['submit']=='SUBMIT'){



$toolbox_type = $_POST['marketing_toolbox'];

$pdf_title = $_POST['pdf_title'];





if(is_uploaded_file($_FILES['pdf']['tmp_name'])){



$tmp_name = $_FILES['pdf']['tmp_name'];

$name = $_FILES['pdf']['name'];

//$uploads_dir = bloginfo('template_directory').'/pdf/'.$name;

$uploads_dir = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/pdf/'.$name;

//echo $uploads_dir;


/*print '<pre>';

print_r($_FILES);

print_r($_SERVER);

exit;*/

 move_uploaded_file($tmp_name,$uploads_dir);
	




$pdf = $_FILES['pdf']['name'];







$sql = "INSERT INTO 

 `tbl_pdf` SET

 				`toolbox_type` = '$toolbox_type',

				`pdf_title` = '$pdf_title',

				`pdf_name` = '$pdf'

 ";



 mysql_query($sql);





//}







}

}

?> 



<h4 class="ttle">Upload Marketing Toolbox

<div class="tab">

	<ul>

   		<li><a href="/agent-profile">My Profile</a></li>

    	<li><a href="/agent-list">Agent List</a></li>

        <li><a href="/client-list">Client List</a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/manager-add">Add Administrator/Manager</a></li>

        <li><a href="/manager-list">Administrator/Manager List</a></li>
        
        <li><a href="/properties-add"><b>Add Properties</b></a></li>

       <li><a href="/delete-toolbox">Delete Toolbox</a></li>

        <li><a href="/reset-password/">Reset Password</a></li>

     </ul>

    <div class="clear"></div>

  </div>

</h4>

 <form name="pdf_upload" action="" method="post" enctype="multipart/form-data">   

    <div class="agent_signup_pro">

		<div class="row listingcnt">

        	<span class="one">Select Properties:</span>

			<span class="two">
            <?php $property_query = 'SELECT *FROM `tab_properties`';
			      $run_property_query = mysql_query($property_query);
				  
			?>

            	<select name="marketing_toolbox" class="user_type">

    				<optgroup label="Select">
                   <?php while($row = mysql_fetch_assoc($run_property_query)) {?>
    		
                   <option value="<?php echo $row['id'];?>"><?php echo $row['properties_name'];?></option>
            <!--		<option value="1">Bermuda Dunes</option>

        				<option value="2">Lake Buena Vista Resort and Spa</option>

        				<option value="3">Visconty Residences</option>

                        <option value="4">Waters Edge Townhomes at Lake Nona</option>-->
                     <?php }?>
        			</optgroup>

        		</select>		

			</span>

<div style="clear:both; height:0;"></div>



</div>



<div class="row listingcnt grey">

    	<span class="one">Title of PDF:</span>

        <span class="two"><input type="text" name="pdf_title" /></span>

        <div style="clear:both; height:0;"></div>

</div>

    

<div class="row listingcnt">

    	<span class="one">Select PDF:</span>

        <span class="two"><input type="file" name="pdf"/></span>

        <div style="clear:both; height:0;"></div>

</div>

    

<div class="row listingcnt grey">

    	

    	<span class="two"><input type="submit" name="submit" value="SUBMIT" class="sub_btn" /></span>

        <div style="clear:both; height:0;"></div>

</div>

 </div>   

   </form>    

  



</div> 

<?php get_footer(); ?>