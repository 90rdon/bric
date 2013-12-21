<?php

/*







Template name: Custom Marketing Tool Box







*/

ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}

?>





<?php



$msg =0;

$sql = "SELECT * FROM tab_broker WHERE`broker_id` =".$_SESSION['id'];

$rs = mysql_query($sql);

/*	print $sql;

	exit*/;

	$result = mysql_query($sql);

	

	$row = mysql_fetch_assoc($result);



?>







<h4 class="ttle">Marketing Toolbox



<div class="tab">

	<ul>

	

	     <li><a href="agent-profile"><strong>Agent Profile</strong></a></li>

    	<li><a href="/my-client-add"><b>Add Client </b></a></li>

        <li><a href="/my-client"><b>My Clients</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

         <li><a href="/reset-password/"><b>Reset Password</b></a></li>

        

    </ul>

    <div class="clear"></div>

</div>

</h4>





<div class="agent_signup_pro">













<?php



/*$merketing_toolbox = array(

'BLANK' =>'Select',

'BD' =>'Bermuda Dunes',

'LB' =>'Lake Buena Vista Resort and Spa',

'VR' =>'Visconti Residences',

'WET' =>'Waters Edge Townhomes at Lake Nona',



);*/



?>





 

  

<div class="row">

<form name="client_form" action="" method="post" >

<input type="hidden" name="action" value="my_password_update" />

<span class="one">Select Properties:</span> 

<span class="two"><select name="merketing_tool_box" id="merketing_tool_box2">
      <option>Select</option>
    <?php 
      $select_query = "SELECT * FROM `tab_properties` ORDER BY `id` DESC"; 
      $run_select_query = mysql_query($select_query);
	

	//foreach($merketing_toolbox as $key => $val) {
	 while($row = mysql_fetch_assoc($run_select_query)){ 
    ?>
   <option value="<?php echo "/marketing-toolbox?properties=$row[id]"?>"><?php echo $row['properties_name'];?></option>
  <?php 

	}

	

	

	?>

    

    </select>

</span>



<div style="clear:both; height:0;"></div>

 

</form>



</div>

<?php if(isset($_GET['properties'])){
$properties = $_GET['properties'];?>

<?php $query = 'SELECT * FROM `tab_properties` WHERE `id` ="'.$properties.'"';
$run_query = mysql_query($query);
$row = mysql_fetch_assoc($run_query); ?>

<div class="row" id="WET">

<span class="one"><h4 class="vr"><?php echo $row['properties_name'];?></h4></span>

<span class="two">

<div class="pdf_list">

    <ul>

             <?php

    

	$sql = "SELECT * FROM tbl_pdf WHERE toolbox_type=$properties";

	$query = mysql_query($sql);
     if(mysql_num_rows($query)==0){echo "No toolbox attached this properties";}
	while($data = mysql_fetch_assoc($query)){

	$url="http://bricrealty.com/wp-content/themes/my_theme/pdf/".$data['pdf_name'];

	?>

    <li><a href="<?=$url?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/images.jpg" title="edit" height="20px" width="20px" /><?=$data['pdf_title']?></a></li>

    

    <?php }  ?>

	</ul>

</div>

</span>

<div style="clear:both; height:0;"></div>

</div>

<?php }?>









<br clear="all"  />



</div>



<br clear="all"  />

</div>

<?php get_footer(); ?>