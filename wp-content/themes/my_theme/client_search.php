<?php

/*


Template name:Client search

*/
$client_id = $_POST['client_serach'];
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

		mysql_query("DELETE FROM tbl_client WHERE client_id=$id");

	}

	//header("Location:/client-list/?t=".$_GET['t']);

}	

 

 

 

 

 if(isset($_GET['t'])) {

  	$page1 = $_GET['t'];

  } else {

  	$page1 = 1;

  }

  

 

	

  

 // $order_by=$_GET['order_by'];

 if(isset($_GET['id']) && ($_GET['id'] != '')){

 	$url_part = "?id=".$_GET['id']."&";

 }else{

 	$url_part = "?";

 }

  

  $targetpage = '/client-search/'.$url_part;

  $tbl_name1 = 'tbl_client';

 $where = 'WHERE concat_ws(" ",`name`,`last_name`) LIKE"%'.$client_id.'%" OR `name` LIKE "%'.$client_id.'%" OR 
	       `last_name` LIKE "%'.$client_id.'%" OR `Spouse` LIKE  "%'.$client_id.'%" OR `address` LIKE  "%'.$client_id.'%" OR 
		   `city` LIKE  "%'.$client_id.'%" OR `state` LIKE  "%'.$client_id.'%" OR `country` LIKE  "%'.$client_id.'%" OR 
		   `zip_code` LIKE  "%'.$client_id.'%" OR `phone` LIKE  "%'.$client_id.'%" OR `email` LIKE "%'.$client_id.'%"';

  

  $adj =8;

  

  $limit = 5;

  

  

  $p =  pagenation($page1,$limit,$targetpage, $adj,$tbl_name1 ,$where);

  $start = $p['start'];

  

  $o_by = 'name';

	$type = 'ASC';

	

	if(isset($_POST['fn']) && ($_POST['fn']=='First Name')){

	

	$o_by = 'name';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='Spouse')){

	

	$o_by = 'Spouse';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='Address')){

	

	   $o_by = 'address';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='City')){

	

	   $o_by = 'city';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='State')){

	

	   $o_by = 'state';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='Zip Code')){

	

	   $o_by = 'zip_code';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='Country')){

	

	   $o_by = 'country';

	

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

		if(isset($_POST['fn']) && ($_POST['fn']=='Phone')){

	

	   $o_by = 'phone';

	

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

	

		$ob=' ORDER BY '.$o_by.' '.$type.' ';

	

	 



   $sql = 'SELECT * FROM `'.$tbl_name1.'` WHERE concat_ws(" ",`name`,`last_name`) LIKE"%'.$client_id.'%" OR `name` LIKE "%'.$client_id.'%" OR 
	       `last_name` LIKE "%'.$client_id.'%" OR `Spouse` LIKE  "%'.$client_id.'%" OR `address` LIKE  "%'.$client_id.'%" OR 
		   `city` LIKE  "%'.$client_id.'%" OR `state` LIKE  "%'.$client_id.'%" OR `country` LIKE  "%'.$client_id.'%" OR 
		   `zip_code` LIKE  "%'.$client_id.'%" OR `phone` LIKE  "%'.$client_id.'%" OR `email` LIKE "%'.$client_id.'%" '.$ob.'  LIMIT '.$start.' ,'.$limit.'';
	

	$result = mysql_query($sql);

	

	

	

	$broker_sql = 'SELECT * FROM tab_broker';



$broker_rs = mysql_query($broker_sql);

$arr = array();

while($broker_row = mysql_fetch_assoc($broker_rs)) {

	$arr[$broker_row['broker_id']] = $broker_row['broker_name'].' '.$broker_row['last_name'];

}





	

	

if(isset($_POST['client_csv_upd']) && ($_POST['client_csv_upd']=='Upload')){



if(is_uploaded_file($_FILES['csv_upd']['tmp_name'])){

$file_tmp_name = $_FILES['csv_upd']['tmp_name'];

//$file_name = $_FILES['csv_upd']['name'];

$image1 = str_replace(" ","_",$_FILES['csv_upd']['name']);

$ext = stristr($image1,'.');

$file_name = 'uploaded_client_list_'.time().$ext;

$destination = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/client_list/'.$file_name;

if(move_uploaded_file($file_tmp_name,$destination)){

$file = fopen("/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/client_list/".$file_name,"r");

$k=1;

while(! feof($file))

  {

 /* print '<pre>';

  print_r(fgetcsv($file));

  print '</pre>';*/

  $datass = fgetcsv($file);

  

  

   $name = $datass[0];

  $last_name = $datass[1];

  $Spouse = $datass[2];

  $broker_id = $datass[3];

  $address = $datass[4];

  $city = $datass[5];

  $state = $datass[6];

  $country = $datass[7];

  $zip_code = $datass[8];

  $phone = $datass[9];

  $email = $datass[10];

  $product_type = $datass[11];

  $create_date = date('Y-m-d H:i:s',strtotime($datass[12]));

  

  

  

  

  

  if($name != '' && $last_name != '' && $Spouse != '' && $broker_id != '' && $address != '' && $city != '' && $state != '' && $country != '' && $zip_code != '' && $phone != '' && $email != '' && $product_type != '' && $create_date != ''){

  if($k>1){

 $query = "INSERT INTO tbl_client SET name='$name',last_name='$last_name',

 Spouse='$Spouse',broker_id='$broker_id',

 address='$address',city='$city',

 state='$state',country='$country',

 zip_code='$zip_code',phone='$phone',

 email='$email',product_type='$product_type',

 create_date= '$create_date'

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

	

	

 

?>

<script type="text/javascript">

function del_client(id){

if(confirm("Are you sure you want to delete the client")){

	document.location.href = "/my-client-edit/?id="+id+"&a=del";

} 

}



</script>





<script type="text/javascript">

$jq(document).ready(function(){

$jq('#chckHead4').click(function () {

if (this.checked == false) {

//alert()

$jq('.chcktb4:checked').attr('checked', false);

}

else {

//alert("Shankajit B");

$jq('.chcktb4:not(:checked)').attr('checked', true);

}

});

});

</script>







<script type="text/javascript">

function del_all_client(id,p){

var inputElems = document.getElementsByTagName("input");

var count = 0;

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

	if(p != ''){

		var extra_url_part = "?t="+p+"&action=client_del";

	}else{

		var extra_url_part = "?action=client_del";

	}

	//return false;

}

var url = "http:/bricrealty.com/client-list/"+extra_url_part;

document.location.href = url;

}



</script>



<h4 class="ttle">CLIENT LIST

 <?php

 if( $_SESSION['broker_type']=='A'){

	?>

	<br/>

<div class="tab">

	<ul>

	    <li><a href="agent-profile"><strong>My Profile</strong></a></li>

    	<li><a href="/marketing-toolbox"><b>Marketing Toolbox</b></a></li>

		<li><a href="/my-client-add"><b>Add Client </b></a></li>

		<li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

</div>



<?php

} else if ($_SESSION['broker_type']=='M') {

?>



<div class="tab">

	<ul>

	

	     <li><a href="agent-profile"><strong>My Profile</strong></a></li>

          <li><a href="/agent-list"><b>Agents List</b></a></li>

		<li><a href="/reset-password/"><b>Reset Password</b></a></li>

       

    </ul>

</div>



<?php }else if ($_SESSION['broker_type']=='AD') { ?>

<div class="tab">

	<ul>

        <li><a href="agent-profile"><strong>My Profile</strong></a></li>

    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

        <li><a href="/manager-list"><b>Administrator/Manager List</b></a></li>

        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

</div>

    <?php

	}

	?>

<div class="clear"></div>

</h4>
<h4 class="ttle">
 <!------------------------------>
<?php
if($_SESSION['broker_type']=='M' OR $_SESSION['broker_type']=='AD'){?>
<div style="float:left" >
	<form action="" method="post">
    <input type="text" name="client_serach" placeholder="SEARCH"/>
    <input type="submit" value="SEARCH"/>
    </form>
</div>
 
 <?php }?>
<!--------------------------->
<form name="" method="post" enctype="multipart/form-data">
<div class="tab items">

   		<ul>

 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

			<li class="dltbtn">

<?php

	if(isset($_GET['t']) && ($_GET['t'] != '')){

		$page_num = $_GET['t'];

	}else{

		$page_num = 1;

	}

?>

<a href="javascript:void(0);" onclick="javascript:del_all_client('<?=$row['client_id']?>','<?=$page_num?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" height="26px" />

</a>

<input type="hidden" name="action" value="all" />



</li>





<li>

	<div align='center'><font color='#E67100'size="+1"><a href="/client_list_csv/?action=client_explode">Export</a></font></div>

</li>

<li class="uploadng">

	

			<input type="file" name="csv_upd" size="10" style="float:left;" />

            <input type="submit" name="client_csv_upd" value="Upload"  style="float:right;" />



</li>





<?php } ?>



</ul>

</div>

</h4>



<?php

	if($_SESSION['broker_type']=='AD'){

	?>



<div class="agent_signup_pro myclienslst administrator">



<?php

	}elseif($_SESSION['broker_type']=='M'){

	?>

<div class="agent_signup_pro myclienslst manager"> 



<?php

	}elseif($_SESSION['broker_type']=='A'){

	?>

    <div class="agent_signup_pro myclienslst manager"> 

 <?php } ?>



<table width="100%" cellpadding="0" cellspacing="0">

<tr class="row" style="background:#333;">

 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

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

        	<input class="chcktb4" type="checkbox" id="chckHead4" />

 </td>



<?php } ?>



    <td class="one fname"><input type="submit" name="fn_broker" id="fn_broker" onclick="change_val()" class="point" value="Agent Name" /></td>

    <td class="one fname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="First Name" /></td>



    <td class="one lname"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Last Name" /></td>

    <td class="one spouse"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Spouse" /></td>

    

     <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

 

    <td class="one address" style="width:90px;"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Address" /></td>



    <?php

	}

	?>

   <td class="one city"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="City" /></td>



    <td class="one state"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="State" /></td>



     <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>



    <td class="one zip"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Zip" /></td>



    <?php } ?>



    <td class="one country"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Country" /></td>



 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>



   <td class="one phone"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Phone" /></td>



    <?php } ?>

    	 

 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>



    <td class="one email"><input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Email" /></td>



	<?php } ?>

     <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

	<td class="one date" style="width:49px;">Date</td>

    <?php } ?>

    <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

	<td class="one action" style="padding:0 5px;">Action</td>

    <?php

	}

	?>

</tr>





<?php 

$mn=0;

$i=1;

while($row=mysql_fetch_array($result))

{

$create_date=$row['create_date'];



?>	

<?php



if($i%2==0){

?>

<tr class="row listingcnt clntlst grey">

<?php

}

?>

<?php



if($i%2==1){

?>

<tr class="row listingcnt clntlst">

<?php } ?>



 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

	<td class="one slct"><div><input class="chcktb4" type="checkbox" id="del_all_<?=$row['client_id']?>" name="del_data[<?=$row['client_id']?>]" value="<?=$row['client_id']?>"/></div></td>

<?php } ?>

   <td class="one fname"><div><?php echo $arr[$row['broker_id']]; ?></div></td>

    <td class="one fname"><div style="width:60px;"><?php echo $row['name']; ?></div></td>

    <td class="one lname"><div style="width:60px;"><?php echo $row['last_name']; ?></div></td>

	<td class="one spouse"><div style="width:60px;"><?php echo $row['Spouse']; ?></div></td>

	 <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

    <td class="one address"><div style="width:115px;"><?php echo $row['address']; ?></div></td>

    <?php } ?>

	<td class="one city"><div><?php echo $row['city']; ?></div></td>

    <td class="one state"><div><?php echo $row['state']; ?></div></td>

     <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

   <td class="one zip"><div><?php echo $row['zip_code']; ?></div></td>

    <?php } ?>

	<td class="one country"><div><?php echo $row['country']; ?></div></td>

     <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

    <td class="one phone"><div><?php echo $row['phone']; ?></div></td>

    <td class="one email"><div style="width:60px;"><?php echo $row['email']; ?></div></td>

   

    <td class="one date"><div style="width:40px;"><?php 

	

	/*echo strftime("%b/%d/%G %T",$create_date);*/

	echo date("m/d/Y", strtotime($create_date));

	 $h = date("H",strtotime($create_date));

	$m= date("i",strtotime($create_date));

	 $s= date("s",strtotime($create_date));

	 

     echo "-";

	echo date("H:i:s",mktime($h, $m,$s, 7, 1, 2000));  

	

	?>

    </div>

    </td>

    <?php } ?>

    <?php

	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){

	?>

    <td class="one action"><div style="padding:0;"><a href="my-client-edit/?id=<?=$row['client_id']?>" style="margin-right:5px;"><img src="<?php bloginfo('template_directory'); ?>/images/edit_icon.png" title="edit" width="20px" /></a> 

    <a href="javascript:void(0);" onclick="javascript:del_client('<?=$row['client_id']?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" width="20px" /></a></div></td>

    





<?php

}

?>



 </tr>

<?php

$i++;

 }


 ?>

 <input type="hidden" name="check_count" id="check_count" value="<?=$mn?>">

</table>

 </div>

</form>
<?php if(mysql_num_rows($result)==0)
  {
	echo "Search result not found"; 
  }
?>
<?php echo $p['pagenation'];?>







<?php get_footer(); ?>