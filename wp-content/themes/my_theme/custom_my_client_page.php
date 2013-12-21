<?php
/*



Template name: Custom My Client



*/
ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agentlogin");
exit;

}


if(isset($_REQUEST['del_action']) && ($_REQUEST['del_action'] == 'all')){

$del_data = explode(',',$_REQUEST['list']);
foreach($del_data as $id){
	//echo $id.'<br />';
		mysql_query("DELETE FROM tbl_client WHERE client_id=$id");
	}
	header("Location:http://bricrealty.com/my-client/");

}

if(isset($_GET['id']) && $_GET['id'] !="") {
$borker_id = $_GET['id'];
}  else {
$borker_id = $_SESSION['id'];
}
 if(isset($_GET['t'])) {
  	$page1 = $_GET['t'];
  } else {
  	$page1 = 1;
  }
  
 
 $extra_url='?';
  if(isset($_GET['id']) && ($_GET['id']!='') ){
  $extra_url='?id='.$_GET['id'].'&';
  
  }
  
  $targetpage = '/my-client/'.$extra_url;
  $tbl_name1 = 'tbl_client';
  $where = " WHERE`broker_id`=$borker_id $short_by $order_by";
  
  $adj =8;
  
  $limit = 5;
  
  
  $p =  pagenation($page1,$limit,$targetpage, $adj,$tbl_name1 ,$where);
  $start = $p['start'];

	/*insert session value for dynamic*/
	//var_dump($p);
	
	
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
	
	 $sql = "SELECT * FROM $tbl_name1 WHERE`broker_id`=$borker_id ".$ob." LIMIT $start , $limit";
	/*print $sql;
	exit;*/
	$result = mysql_query($sql);
	
	
	
	$broker_sql = 'SELECT * FROM tab_broker WHERE broker_id ='.$borker_id;

$broker_rs = mysql_query($broker_sql);
$broker_row = mysql_fetch_assoc($broker_rs);
	
	
	
	if(isset($_POST['client_csv_upd']) && ($_POST['client_csv_upd']=='Upload')){

if(is_uploaded_file($_FILES['csv_upd']['tmp_name'])){
$file_tmp_name = $_FILES['csv_upd']['tmp_name'];
//$file_name = $_FILES['csv_upd']['name'];
$image1 = str_replace(" ","_",$_FILES['csv_upd']['name']);
$ext = stristr($image1,'.');
$file_name = 'uploaded_client_list_'.time().$ext;
$destination = '/var/chroot/home/content/78/6140178/html/bricworth/wp-content/themes/terragroup/csv_upload/my_client/'.$file_name;
if(move_uploaded_file($file_tmp_name,$destination)){
$file = fopen("/var/chroot/home/content/78/6140178/html/bricworth/wp-content/themes/terragroup/csv_upload/my_client/".$file_name,"r");
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
  
  
  
  
  
  if($name != '' && $last_name != '' && $broker_id != '' && $address != '' && $city != '' && $state != '' && $country != '' && $zip_code != '' && $phone != '' && $email != '' && $product_type != '' && $create_date != ''){
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
$jq('#chckHead').click(function () {
if (this.checked == false) {
$jq('.chcktbl:checked').attr('checked', false);
}
else {
//alert("Shankajit B");
$jq('.chcktbl:not(:checked)').attr('checked', true);
}
});
});
</script>

<script type="text/javascript">

    $jq(document).ready(function(){
       $jq('#del_all_client').click(function(){
		   var del_id ='';
		   var num = 0;
            var checkValues = $jq('input[name=del_data]:checked').map(function()
            {
               del_id  += ','+$jq(this).val();
				num++;
            });
			//console.log(del_id);
			if(num == 1){
				var msg = 'Do You Really Want to delete this Record?';	
			}else{
				var msg = 'Do You Really Want to delete '+num+' Records?';	
			}
			if(confirm(msg)){
			document.location.href = "/my-client/?del_action=all&list="+del_id.substr(1);
			}
        });
    });

</script>

<script type="text/javascript">


   /* function del_all_client(){
	
    
	//jQuery("input:checked").each(function(){ 
	
	x = document.getElementsByName("del_data");
	alert(x.length);
	var datasss = '';
       for (var i = 0; i < values123.length; i++) {
		 
		 alert(console.log(i));
   
}
	 
		
  //  });
	
	//document.location.href = "/my-client/?del_action=all&list="+values;
    }   

 

/*function del_all_client(id,p){
	
var values = document.getElementsByName("del_data").value;
alert(console.log(values));
	
var inputElems = document.getElementsByTagName("input"),
    count = 0;
for(var i=0; i<inputElems.length; i++) {
    if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
		var data = document.getElementByName("del_all_"+i).value;
		
		
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
	//alert("test");
	document.location.href = "/my-client/?id="+id+"&t="+p+"&del_action=all";
}
}*/

</script>

<h4 class="ttle">CLIENT LIST
  <?php if( $_SESSION['broker_type']=='A'){?>
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
      <li><a href="/agent-profile"><strong>My Profile</strong></a></li>
      <li><a href="/agent-list"><b>Agents List</b></a></li>
      <li><a href="/client-list"><b>Client List</b></a></li>
      <li><a href="/reset-password/"><b>Reset Password</b></a></li>
    </ul>
  </div>
  <?php }else if ($_SESSION['broker_type']=='AD') {
 ?>
  <div class="tab">
    <ul>
      <li><a href="/agent-profile"><strong>My Profile</strong></a></li>
      <li><a href="/agent-list"><b>Agent List</b></a></li>
      <li><a href="/client-list"><b>Client List</b></a></li>
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
<form name="" method="post" enctype="multipart/form-data">
  <h4 class="ttle"> Agent Name :
    <?=$broker_row['broker_name']?>
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
   <a class="delete_selected_val" id="del_all_client" href="javascript:void(0);"> <img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" height="26px" /> </a>
          
          <input type="hidden" name="action" value="all" />
        </li>
        <li>
          <div align='center'><font color='#E67100'size="+1">
          
          <?php
          
		  if(isset($_GET['id'])){
			$exp_id =  $_GET['id'];
			}else{
				$exp_id =  1;	
			}
		  
		  ?>
          
          <a href="/client_list_csv/?t=<?=$exp_id?>&action=myclient_exp">Export</a></font></div>
        </li>
        <li class="uploadng">
          <input type="file" name="csv_upd" size="10" class="filefld" />
          <input type="submit" name="client_csv_upd" value="Upload" class="filesbmt" />
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
	}if($_SESSION['broker_type']=='M'){
	?> 
  <div class="agent_signup_pro myclienslst manager">
  
  	<?php
	}if($_SESSION['broker_type']=='A'){
	?>
  <div class="agent_signup_pro myclienslst agent">
  	<?php
	}
	?>
  <table width="100%" cellpadding="0" cellspacing="0" class="agent_table">
<tr>
    <?php
	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){
	?>
    <td class="agent_head">
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
    <input class="chcktbl" type="checkbox" id="chckHead" />
    </td>
    <?php } ?>
    
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="First Name" />
    </td>
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Last Name" />
   </td>
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Spouse" />
    </td>
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Address" />
    </td>
    <?php } ?>
    
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="City" />
    </td>
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="State" />
    </td>
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Zip" />
    </td>
    <?php } ?>
    
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Country" />
    </td>
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Phone" />
    </td>
    <?php } ?>
    
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">
    <input type="submit" name="fn" id="fn" onclick="change_val()" class="point" value="Email" />
    </td>
    <?php } ?>
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">Date</td>
    <?php } ?>
    
    
    <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
    <td class="agent_head">Action</td>
    <?php }	?>
 </tr>


  <?php
$i=1;
?>

  <?php while($row=mysql_fetch_array($result))
{
$create_date=$row['create_date'];

?>
<?php if($i%2==0){?>
  <tr class="row listingcnt grey">
<?php } else { ?>
    <tr class="row listingcnt">
<?php } ?>
      
  
	  <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){ ?>
      <span class="one slct">
      <td>
      <input class="chcktbl" type="checkbox"  id="del_all_<?=$row['client_id']?>" name="del_data" value="<?=$row['client_id']?>"/>
      </td>
      </span>
      <?php } ?>
      
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['last_name'];?></td>
      <td><?php echo $row['Spouse'];?></td>
      
	  <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
      <td><?php echo $row['address'];?></td>
      <?php } ?>
      
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['state']; ?></td>
      
	  
	  <?php	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
      <td><?php echo $row['zip_code']; ?></td>
      <?php } ?>
      
      <td><?php echo $row['country']; ?></td>
	  
	  <?php	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <?php } ?>
      
      
      <?php if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
      
     <td>
	<?php
	/*echo strftime("%b/%d/%G %T",$create_date);*/
	echo date("m/d/Y", strtotime($create_date));
	 $h = date("H",strtotime($create_date));
	$m= date("i",strtotime($create_date));
	 $s= date("s",strtotime($create_date));
     echo "-";
	echo date("H:i:s",mktime($h, $m,$s, 7, 1, 2000));  
	
	?>
     </td> 
      <?php }?>
      
      
      <?php	if($_SESSION['broker_type']=='AD' || $_SESSION['broker_type']=='A'){?>
      <td>
      <a href="my-client-edit/?id=<?=$row['client_id']?>" style="margin-right:10px;"><img src="<?php bloginfo('template_directory'); ?>/images/edit_icon.png" title="edit" width="20px" /></a>
      <a href="javascript:void(0);" onclick="javascript:del_client('<?=$row['client_id']?>')"><img src="<?php bloginfo('template_directory'); ?>/images/deleate_icon.png" title="delete" width="20px" /></a></td>
      <?php }?>

    <?php
$i++;?>
</tr>
 <?php }
 ?>
    <input type="hidden" name="check_count" id="check_count" value="<?=$mn?>">
  </table>
  </div>

</form>
<?php echo $p['pagenation'];?>
<?php get_footer(); ?>
