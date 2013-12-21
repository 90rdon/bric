 <?php

/*







Template name: Manager Admin List







*/
$page_number = $_GET['t'];
ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}





if(isset($_REQUEST['del_data']) && ($_REQUEST['del_data'] != '')){

$del_data = $_POST['del_data'];

	foreach($del_data as $id){

	//echo $id.'<br />';

		mysql_query("DELETE FROM tab_broker WHERE broker_id=$id");

	}

	//header("Location:/client-list/?t=".$_GET['t']);

}	





$borker_id=$_SESSION['id'];

 if(isset($_GET['t'])) {

  	$page1 = $_GET['t'];

  } else {

  	$page1 = 1;

  }

  

 

 // $order_by=$_GET['order_by'];

  

  

  $targetpage = '/manager-list/?';

  $tbl_name1 = 'tab_broker';

  $where = " WHERE broker_type !='A' $short_by $order_by";

  

  $adj =8;

  

  $limit = 3;

  

  

  $p =  pagenation($page1,$limit,$targetpage, $adj,$tbl_name1 ,$where);

  $start = $p['start'];



	/*insert session value for dynamic*/

	$o_by = 'broker_name';

	$type = 'ASC';

	

	if(isset($_POST['fn']) && ($_POST['fn']=='First Name')){

	

	$o_by = 'broker_name';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='Last Name')){

	

	$o_by = 'last_name';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='Email')){

	

	$o_by = 'email';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='User Name')){

	

	$o_by = 'user_name';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='Password')){

	

	$o_by = 'password';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='User Type')){

	

	$o_by = 'broker_type';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		

		}elseif($_SESSION['fn']==0){

			

			

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$_SESSION['fn'] = 0;

			$type = 'ASC';

		}elseif($_POST['fn']==0){

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

		}

		}

		}

		

		$ob=' ORDER BY '.$o_by.' '.$type.' ';

		

	

	$sql = "SELECT * FROM $tbl_name1 WHERE broker_type !='A' ".$ob."  LIMIT $start , $limit";

/*	print $sql;

	exit*/;

	$result = mysql_query($sql);



//data implode



if(isset($_POST['manager_list_csv_upd']) && ($_POST['manager_list_csv_upd']=='Upload')){



if(is_uploaded_file($_FILES['csv_upd']['tmp_name'])){

$file_tmp_name = $_FILES['csv_upd']['tmp_name'];

//$file_name = $_FILES['csv_upd']['name'];

$image1 = str_replace(" ","_",$_FILES['csv_upd']['name']);

$ext = stristr($image1,'.');

$file_name = 'uploaded_admin_manager_list_'.time().$ext;

$destination = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/admin_manager_list/'.$file_name;

if(move_uploaded_file($file_tmp_name,$destination)){

$file = fopen("/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/admin_manager_list/".$file_name,"r");

$k=1;

while(! feof($file))

  {

  /*print '<pre>';

  print_r(fgetcsv($file));

  print '</pre>';*/

  $datass = fgetcsv($file);

  

  

   $broker_name = $datass[0];

  $last_name = $datass[1];

  $broker_type = $datass[2];

  $user_name = $datass[3];

  $password = $datass[4];

  $email = $datass[5];

  $address = $datass[6];

  $city = $datass[7];

  $state = $datass[8];

  $contry = $datass[9];

  $zip_code =$datass[10];

  $broker_company = $datass[11];

  $office_phone = $datass[12];

  $mobile = $datass[13]; 

  $create_date = date('Y-m-d H:i:s',strtotime($datass[14]));

  

  if($broker_name != '' && $last_name != '' && $broker_type != '' && $user_name != '' && $password != '' && $email != '' && $address != '' && $city != '' && $state != '' && $contry != '' && $zip_code != '' && $broker_company != '' && $office_phone != '' && $mobile != '' && $create_date != ''){

  if($k>1 && $broker_type!='A'){

 $query = "INSERT INTO tab_broker SET broker_name='$broker_name',last_name='$last_name',

 broker_type='$broker_type',user_name='$user_name',

 password='$password',email='$email',

 address='$address',city='$city',

  	state='$state',contry='$contry',

	`zip code`='$zip_code',broker_company='$broker_company',

 office_phone= '$office_phone',mobile= '$mobile',create_date='$create_date'

 ";

 

  mysql_query($query);

  }

  }

  

  

  $k++;

  }



fclose($file);



}



	

	

}



}



//end of data implode

	



?>

<script type="text/javascript">

function del_agent(id,page_no){

if(confirm("Are you sure you want to delete the agent")){

	document.location.href = "/agent-edit/?id="+id+"&a=delmanager&page_no="+page_no+"";

} 

}



</script>





<script type="text/javascript">

$jq(document).ready(function(){

$jq('#chckHead3').click(function () {

if (this.checked == false) {

//alert()

$jq('.chcktb3:checked').attr('checked', false);

}

else {

//alert("Shankajit B");

$jq('.chcktb3:not(:checked)').attr('checked', true);

}

});

});

</script>







<script type="text/javascript">

function del_all_client(id,p){

var inputElems = document.getElementsByTagName("input"),

    count = 0;

for(var i=0; i<inputElems.length; i++) {

    if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {

        count++;

		

    }

} 

if(count ==1){

	var msg = "Are you sure you want to delete The Selected Record";

}else{

	var msg = "Are you sure you want to delete All "+count+" Selected Records?";

}

if(confirm(msg)){

	//document.location.href = "/client-list/?t="+p+"&del_action=all";

	document.location.href = "/manager-list/";

}

}



</script>



<?php





if($_SESSION['broker_type']=='AD'){

?>

<h4 class="ttle">Administrator/Manager  List

 <div class="tab">

	<ul>

        <li><a href="agent-profile"><strong>My Profile</strong></a></li>

    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

        <li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

   </ul>

 </div>

    <div class="clear"></div>

</h4>

<?php } ?>

<form name="" method="post" enctype="multipart/form-data">

<h4 class="ttle">

	<div class="tab items">

		<ul>

       		<li class="dltbtn">

<?php

	if(isset($_GET['t']) && ($_GET['t'] != '')){

		$page_num = $_GET['t'];

	}else{

		$page_num = 1;

	}

?>

<a href="javascript:void(0);" onclick="javascript:del_all_client('<?=$row['broker_id']?>','<?=$page_num?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" height="26px" /></a>

<input type="hidden" name="action" value="all" />

			

            </li>





			<li>

            <div align='center'><font color='#E67100'size="+1"><a href="/client_list_csv/?action=manager_list_explode">Export</a></font></div>

            </li>



			<li class="uploadng">

	

			<input type="file" name="csv_upd" size="10" style="float:left;" />

            <input type="submit" name="manager_list_csv_upd" value="Upload"  style="float:right;" />

			

            </li>



		</ul>

        </div>

</h4>





<div class="agent_signup_pro myclienslst">

<table width="100%" cellpadding="0" cellspacing="0">

	<tr class="row" style="background:#333;">

		<td class="one slct">

        

        <?php

        $url = $_SERVER[REQUEST_URI];

		$search = strpos($url,'?');

		if($search>0){

			$extra_parts = '&';

		}else{

			$extra_parts = '?';

		}

		$final_url = $url.$extra_parts.'action=all';

		if(isset($_GET['action']) && ($_GET['action'] == 'all')){

			$final_url = str_replace('action=all','',$final_url);

			$final_url = str_replace('&&','',$final_url);

			$final_url = str_replace('?&','',$final_url);

		}

		?>

        	<input class="chcktb3" type="checkbox" id="chckHead3" />



</td>



    <td class="one fname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="First Name" /></td>



    <td class="one lname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Last Name" /></td>



    <td class="one email"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Email" /></td>



    <td class="one fname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="User Name" /></td>



    <?php

	if($_SESSION['broker_type']=='AD'){

	?>



    <td class="one fname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Password" /></td>



    <?php

	}

	?>



    <td class="one fname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="User Type" /></td>

  

    <?php

	if($_SESSION['broker_type']=='AD'){

	?>

    <td class="one action">Action</td>

    <?php

	}

	?>

	 

  </tr>

<?php

	$i=1;

?>

<?php while($row=mysql_fetch_array($result))

{

?>	

<?php



if($i%2==0){

?>

<tr class="row listingcnt grey">

<?php

}

?>

<?php

if($i%2==1){

?>

<tr class="row listingcnt">

<?php } ?>



 <?php

	if($_SESSION['broker_type']=='AD'){

	?>

    <td class="one slct"><input class="chcktb3" type="checkbox" <?php if(isset($_GET['action']) && ($_GET['action']='all')){ $mn++; ?> checked="checked" <?php } ?> id="del_all_<?=$row['broker_id']?>" name="del_data[<?=$row['broker_id']?>]" value="<?=$row['broker_id']?>"/></td>



    <td class="one fname"><?php echo $row['broker_name']; ?></td>

    <td class="one lname"><?php echo $row['last_name']; ?></td>

	<td class="one email"><?php echo $row['email']; ?></td>

	<td class="one fname"><?php echo $row['user_name']; ?></td>

 	<td class="one fname"><?php echo $row['password']; ?></td>

	<?php if($row['broker_type'] == 'AD') { 

	?>

	

	<td class="one fname">Administrator</td>

    <?php

	

	} else if ($row['broker_type'] == 'M') {

	?>

	

	<td class="one fname">Manager</td>

    <?php } ?>

    <?php

	

	}

    ?>

    <?php

	if($_SESSION['broker_type']=='AD'){

	?>

    <td class="one action"><a href="/manager-edit/?id=<?=$row['broker_id']?>"><img src="<?php bloginfo('template_directory'); ?>/images/edit_icon.png" title="edit" height="14px" /></a>

   <a href="javascript:void(0);" onclick="javascript:del_agent('<?=$row['broker_id']?>','<?=$page_num?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" height="14px" /></a></td>

   

</tr>

	<?php

	}

	?>



<?php

$i++;

 }

 ?>



  <input type="hidden" name="check_count" id="check_count" value="<?=$mn?>">

</table>

</form>

</div>

<?php echo $p['pagenation'];?>





<?php get_footer(); ?>