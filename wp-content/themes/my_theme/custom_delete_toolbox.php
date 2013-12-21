<?php

/*







Template name: Custom Broker Toolbox Delete Page







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

// header("location:/toolbox-upload/");

}

?>

 <script type="text/javascript">

function del_pdf(id){

if(confirm("Are you sure you want to delete the agent")){

	document.location.href = "/toolbox-upload/?del_id="+id+"&a=del";

} 

}



</script>





<h4 class="ttle">Delete Marketing Toolbox



<div class="tab">

	<ul>

   		<li><a href="/agent-profile">My Profile</a></li>

    	<li><a href="/agent-list">Agent List</a></li>

        <li><a href="/client-list">Client List</a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/manager-add">Add Administrator/Manager</a></li>

        <li><a href="/manager-list">Administrator/Manager List</a></li>

        <li><a href="/toolbox-upload">Upload Marketing Toolbox</a></li>

        <li><a href="/reset-password/">Reset Password</a></li>

        

    </ul>

  </div>

    <div class="clear"></div>

</h4>



<div class="agent_signup_pro">   

   <?php

  // $path = "http://bricrealty.com/toolbox-upload/";

   ?>

   <!--<form>

   <select name="" id="val_select" onchange="select_type(<?=$path?>)">

   		<option id="val" value="0">Select Option</option>

   		<option id="val_1" value="1">Bermuda Dunes</option>

        <option id="val_2" value="2">Lake Buena Vista Resort and Spa</option>

        <option id="val_3" value="3">Visconty Residences</option>

   </select>

   </form>-->

   

   <?php



/*$merketing_toolbox = array(

'BLANK' =>'Select',

'BD' =>'Bermuda Dunes',

'LB' =>'Lake Buena Vista Resort and Spa',

'VR' =>'Visconti Residences',

'WET' =>'Waters Edge Townhomes at Lake Nona',





);
*/


?>

<div class="row">

    

   <form name="client_form" action="" method="post" >







<input type="hidden" name="action" value="my_password_update" />

 



    <span class="one">Select Properties:</span>

    <span class="two">

    <select name="merketing_tool_box1" id="merketing_tool_box1">
    <option>Select</option>
    <?php 
      $select_query = "SELECT * FROM `tab_properties` ORDER BY `id` DESC"; 
      $run_select_query = mysql_query($select_query);
	

	//foreach($merketing_toolbox as $key => $val) {
	 while($row = mysql_fetch_assoc($run_select_query)){ 
    ?>

    <option value="<?php echo "/delete-toolbox?properties=$row[id]"?>"><?php echo $row['properties_name'];?></option>

    

    <?php 

	}

	

	

	?>

    

    </select>


</span>



	<div style="clear:both; height:0;"></div>

 

</form>



</div>
<?php $properties_id = $_GET['properties'];
if (isset($properties_id)){
	$query = 'SELECT * FROM `tab_properties` WHERE `id` ="'.$properties_id.'"';
	$run_query = mysql_query($query);
	$row = mysql_fetch_assoc($run_query);
?>
<div class="row" id="BD1">

		<span class="one"><h4 class="vr"><?php echo $row['properties_name'];?></h4></span>

		<span class="two">

        <div class="pdf_list">

    		

            <ul>

    

    <?php

    

	$sql = "SELECT * FROM tbl_pdf WHERE toolbox_type=$properties_id";

	$query = mysql_query($sql);
    if(mysql_num_rows($query)==0){echo "No toolbox attached this properties";}
	while($data = mysql_fetch_assoc($query)){

	?>

    <li><a href="<?php bloginfo('template_directory'); ?>/pdf/<?=$data['pdf_name']?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/images.jpg" title="edit" height="20px" width="20px" /><?=$data['pdf_title']?></a>

    <a href="javascript:void(0);" onclick="javascript:del_pdf('<?=$data['id']?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" width="20px" /></a>

    </li>

    

    <?php } ?>

    



    </ul>

    </div>

    </span>

    <div style="clear:both; height:0;"></div>

</div>
<?php }?>

<br clear="all"  />

</div>

   

</div>   

   

  <br clear="all"  />

</div> 

   

   

   <?php

   

   $sql_list = "SELECT * FROM tbl_pdf";

   

   ?>

   

    

<?php //} ?>







<?php get_footer(); ?>