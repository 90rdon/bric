<?php

/*
Template name:Agent Search

*/
$agent_id = $_POST['agent_serach'];

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

  

  //if(isset($_GET['short_by'])){ $short_by='ORDER BY '.$_GET['short_by'];}else{$short_by='';}

//	if(isset($_GET['order_by'])){ $order_by=$_GET['order_by'];}else{$order_by='';}

	

	

	

 //  $order_by=$_GET['order_by'];

  

  $targetpage = '/agent-search/?';

  $tbl_name1 = 'tab_broker';

  $where = ' WHERE`broker_type` ="'.A.'" AND concat_ws(" ",`broker_name`,`last_name`) LIKE"%'.$agent_id.'%" OR 
			`broker_name` LIKE "%'.$agent_id.'%" OR `last_name` LIKE "%'.$agent_id.'%" OR  `user_name` LIKE  "%'.$agent_id.'%"  OR 
			`email` LIKE "%'.$agent_id.'%" OR `address` LIKE  "%'.$agent_id.'%" OR `city` LIKE  "%'.$agent_id.'%" OR  `state` LIKE  "%'.$agent_id.'%" OR 
			`contry` LIKE  "%'.$agent_id.'%" OR `zip code` LIKE  "%'.$agent_id.'%" OR `broker_company` LIKE  "%'.$agent_id.'%"  OR 
			`office_phone` LIKE "%'.$agent_id.'%" OR `mobile` LIKE  "%'.$agent_id.'%"';
  

  $adj =8;

  

  $limit = 20;

  

  

  $p =  pagenation($page1,$limit,$targetpage, $adj,$tbl_name1 ,$where);

  $start = $p['start'];



	/*insert session value for dynamic*/

	//var_dump($p);

	

	

	$o_by = 'broker_name';

	$type = 'ASC';

	//$_SESSION['ob']=' ORDER BY '.$o_by.' '.$type.' ';



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

			$type = 'ASC';

			

			$_SESSION['fn'] = 0;

		

		}elseif($_SESSION['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_POST['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		}

		}

	

		if(isset($_POST['fn']) && ($_POST['fn']=='Email')){

	

		$o_by = 'email';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_SESSION['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_POST['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		}

		}

	if(isset($_POST['fn']) && ($_POST['fn']=='Address')){

	

	$o_by = 'address';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_SESSION['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_POST['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		}

		}

	

	if(isset($_POST['fn']) && ($_POST['fn']=='City')){

	

	$o_by = 'city';

	

		if(isset($_SESSION['fn']) && ($_SESSION['fn'] === 0 || $_SESSION['fn'] ==1)){

		

			if($_SESSION['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_SESSION['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

		}

		

		

		

		}else{

		if($_POST['fn']==1){

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		}elseif($_POST['fn']==0){

			$type = 'DESC';

			$_SESSION['fn'] = 1;

			

			

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

			

			//id_ASC_sort();

			//$_POST['fn']=0;

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		

		}elseif($_POST['fn']==0){

			

			//id_DESC_sort();

			//$_POST['fn']=1;

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

			

		}

		}

			

		}

		

		if(isset($_POST['fn']) && ($_POST['fn']=='Country')){

	

		$o_by = 'contry';

	

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

			

			//id_ASC_sort();

			//$_POST['fn']=0;

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		

		}elseif($_POST['fn']==0){

			

			//id_DESC_sort();

			//$_POST['fn']=1;

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

			

		}

		}

			

		}

		if(isset($_POST['fn']) && ($_POST['fn']=='Company')){

	

		$o_by = 'broker_company';

	

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

			

			//id_ASC_sort();

			//$_POST['fn']=0;

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		

		}elseif($_POST['fn']==0){

			

			//id_DESC_sort();

			//$_POST['fn']=1;

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

			

		}

		}

			

		}

		

		if(isset($_POST['fn']) && ($_POST['fn']=='Office Phone')){

	

		$o_by = 'office_phone';

	

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

			

			//id_ASC_sort();

			//$_POST['fn']=0;

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		

		}elseif($_POST['fn']==0){

			

			//id_DESC_sort();

			//$_POST['fn']=1;

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

			

		}

		}

			

		}



		if(isset($_POST['fn']) && ($_POST['fn']=='Mobile')){

	

		$o_by = 'mobile';

	

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

			

			//id_ASC_sort();

			//$_POST['fn']=0;

			$type = 'ASC';

			$_SESSION['fn'] = 0;

		

		

		}elseif($_POST['fn']==0){

			

			//id_DESC_sort();

			//$_POST['fn']=1;

			$_SESSION['fn'] = 1;

			$type = 'DESC';

			

			

		}

		}

			

		}



	

	$ob=' ORDER BY `'.$o_by.'`'.$type.' ';

	
 $sql = 'SELECT * FROM `'.$tbl_name1.'` WHERE `broker_type` ="'.A.'" AND concat_ws(" ",`broker_name`,`last_name`) LIKE"%'.$agent_id.'%" OR 
        `broker_name` LIKE "%'.$agent_id.'%" OR `last_name` LIKE "%'.$agent_id.'%" OR  `user_name` LIKE  "%'.$agent_id.'%"  OR 
	    `email` LIKE "%'.$agent_id.'%" OR `address` LIKE  "%'.$agent_id.'%" OR `city` LIKE  "%'.$agent_id.'%" OR  `state` LIKE  "%'.$agent_id.'%" OR 
	    `contry` LIKE  "%'.$agent_id.'%" OR `zip code` LIKE  "%'.$agent_id.'%" OR `broker_company` LIKE  "%'.$agent_id.'%"  OR 
        `office_phone` LIKE "%'.$agent_id.'%" OR `mobile` LIKE  "%'.$agent_id.'%" '.$ob.'  LIMIT '.$start.' ,'.$limit.'';

	

	$result = mysql_query($sql);



	

	

	?>

<?php

	





if(isset($_POST['agent_csv_upd']) && ($_POST['agent_csv_upd']=='Upload')){



if(is_uploaded_file($_FILES['csv_upd']['tmp_name'])){

$file_tmp_name = $_FILES['csv_upd']['tmp_name'];

//$file_name = $_FILES['csv_upd']['name'];

$image1 = str_replace(" ","_",$_FILES['csv_upd']['name']);

$ext = stristr($image1,'.');

$file_name = 'uploaded_agent_list_'.time().$ext;

$destination = '/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/agent_list/'.$file_name;

if(move_uploaded_file($file_tmp_name,$destination)){

$file = fopen("/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv_upload/agent_list/".$file_name,"r");

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

  

  if($broker_name != ''){

  if($k>1 && $broker_type='A'){

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



?>

<script type="text/javascript">

function del_agent(id){

if(confirm("Are you sure you want to delete the agent")){

	document.location.href = "/agent-edit/?id="+id+"&a=del";

} 

}

</script>

<script type="text/javascript">

$jq(document).ready(function(){

$jq('#chckHead2').click(function () {

if (this.checked == false) {

//alert()

$jq('.chcktb2:checked').attr('checked', false);

}

else {

//alert("Shankajit B");

$jq('.chcktb2:not(:checked)').attr('checked', true);

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

	document.location.href = "/agent-list/";

}

}



</script>



<h4 class="ttle">Agent List

  <?php



if($_SESSION['broker_type']=='M'){

?>

  <div class="tab">

    <ul>

      <li><a href="/agent-profile"><b>My Profile</b></a></li>

      <li><a href="/client-list"><b>Client List</b></a></li>

       <li><a href="/my-documents"><b>My Documents</b></a></li>

       <li><a href="/my-training"><b>My Training</b></a></li>

      <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

  </div>

  <?php

}elseif($_SESSION['broker_type']=='AD'){

?>

  <div class="tab">

    <ul>

      <li><a href="/agent-profile"><b>My Profile</b></a></li>

      <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

      <li><a href="/manager-list"><b>Administrator/Manager list</b></a></li>

      <li><a href="/client-list"><b>Client List</b></a></li>

      <li><a href="/my-documents"><b>My Documents</b></a></li>

      <li><a href="/my-training"><b>My Training</b></a></li>

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
	<form action="/agent-search" method="post">
    <input type="text" name="agent_serach" placeholder="SEARCH"/>
    <input type="submit" value="SEARCH"/>
    </form>
</div>
 
 <?php }?>
<!--------------------------->
<form name="" method="post" enctype="multipart/form-data">

 
  

    <div class="tab items">

      <ul>

        <?php

	if($_SESSION['broker_type']=='AD'){

	?>

        <li class="dltbtn">

          <?php

		if(isset($_GET['t']) && ($_GET['t'] != '')){

			$page_num = $_GET['t'];

		}else{

			$page_num = 1;

		}

	?>

          <a class="delete_selected_val" href="javascript:void(0);" onclick="javascript:del_all_client('<?=$row['broker_id']?>','<?=$page_num?>')"><img src="<?php bloginfo(					'template_directory'); ?>/images/deleate_icon.png" title="delete" height="26px" /> </a>

          <input type="hidden" name="action" value="all" />

        </li>

        <li>

          <div align='center'><font color='#E67100'size="+1"><a href="/client_list_csv/?action=agent-list_explode">Export</a></font></div>

        </li>

        <li class="uploadng">

          <input type="file" name="csv_upd" size="10" style="float:left;" />

          <input type="submit" name="agent_csv_upd" value="Upload"  style="float:right;" />

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

	}

	?>

    <div class="row">

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one slct">

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

      <input class="chcktb2" type="checkbox" id="chckHead2" />

      </span>

      <?php } ?>

      <span class="one fname">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="First Name" />

      </span> <span class="one lname">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Last Name" />

      </span>

      </td>

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one email">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Email" />

      </span>

      <?php } ?>

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one address">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Address" />

      </span>

      <?php } ?>

      <span class="one city">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="City" />

      </span> <span class="one state">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="State" />

      </span> <span class="one country">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Country" />

      </span>

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one company">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Company" />

      </span>

      <?php } ?>

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one phone">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Office Phone" />

      </span> <span class="one mobile">

      <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Mobile" />

      </span>

      <?php } ?>

      <span class="one allclnt action">All Clients</span>

      <?php

	if($_SESSION['broker_type']=='AD'){

	?>

      <span class="one action">Action</span>

      <?php

	}

	?>

      <div class="clear"></div>

    </div>

    <table width="100%" cellpadding="0" cellspacing="0">

      <?php

$i=1;

?>

      <?php while($row=mysql_fetch_array($result))

{

?>

      <?php



if($i%2==0){

?>

      <tr class="row listingcnt agentlst grey">

        <?php

}

?>

        <?php



if($i%2==1){

?>

      <tr class="row listingcnt agentlst">

        <?php } ?>

        <?php

	if($_SESSION['broker_type']=='AD'){

	?>

        <td class="one slct"><div>

            <input class="chcktb2" type="checkbox" <?php if(isset($_GET['action']) && ($_GET['action']='all')){ $mn++; ?> checked="checked" <?php } ?> id="del_all_<?=$row['broker_id']?>" name="del_data[<?=$row['broker_id']?>]" value="<?=$row['broker_id']?>"/>

          </div></td>

        <?php } ?>

        <td class="one fname"><div><?php echo $row['broker_name']; ?></div></td>

        <td class="one lname"><div><?php echo $row['last_name']; ?></div></td>

        <?php

	if($_SESSION['broker_type']=='AD'){

	?>

        <td class="one email"><div><?php echo $row['email']; ?></div></td>

        <td class="one address"><div><?php echo $row['address']; ?></div></td>

        <?php } ?>

        <td class="one city"><div><?php echo $row['city']; ?></div></td>

        <td class="one state"><div><?php echo $row['state']; ?></div></td>

        <td class="one country"><div><?php echo $row['contry']; ?></div></td>

        <?php

	if($_SESSION['broker_type']=='AD'){

	?>

        <td class="one company"><div><?php echo $row['broker_company']; ?></div></td>

        <td class="one phone"><div><?php echo $row['office_phone']; ?></div></td>

        <td class="one mobile"><div><?php echo $row['mobile']; ?></div></td>

        <?php } ?>

        <td class="one allclnt"><div><a href="/my-client/?id=<?=$row['broker_id']?>">All Clients</a></div></td>

        <?php

	if($_SESSION['broker_type']=='AD'){

	?>

        <td class="one action"><div> <a href="/agent-edit/?id=<?=$row['broker_id']?>" style=" margin-right:5px;"><img src="<?php bloginfo('template_directory'); ?>/images/edit_icon.png" title="edit" width="20px" /></a><a href="javascript:void(0);" onclick="javascript:del_agent('<?=$row['broker_id']?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" width="20px" /></a></div></td>

        <?php

	}

	?>

      </tr>

      <?php

$i++;

 }
 if(mysql_num_rows($result)==0)
  {
	echo "Search result not found"; 
  }

 ?>

      <input type="hidden" name="check_count" id="check_count" value="<?=$mn?>">

    </table>

  </div>

</form>

<?php echo $p['pagenation'];?>

<?php get_footer(); ?>

