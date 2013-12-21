<?php
/*



Template name: Custom Client Csv



*/
/*ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agent-login");
exit;

}*/
 
 
    // CLIENT LIST EXPLODE
 
if(isset($_GET['action']) && ($_GET['action']=='client_explode')){
$conn = new PDO("mysql:host=68.178.140.193;dbname=bricrealty", 'bricrealty', 'Pkweb@123');
 // Connect and query the database for the users
//$conn = new PDO("mysql:host=localhost;dbname=sourav", 'root', '');
$sql = "SELECT * FROM tbl_client ORDER BY client_id";
$results = $conn->query($sql);
 
// Pick a filename and destination directory for the file
// Remember that the folder where you want to write the file has to be writable
$filename = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv/client_list/client_list_".time().".csv";
 
// Actually create the file
// The w+ parameter will wipe out and overwrite any existing file with the same name
$handle = fopen($filename, 'w+');
 
// Write the spreadsheet column titles / labels
fputcsv($handle, array('First name','last_name','Spouse','broker_id','address','city','state','country','zip_code','phone','email','product_type','create_date'));
 
// Write all the user records to the spreadsheet
foreach($results as $row)
{
    fputcsv($handle, array($row['name'], $row['last_name'],$row['Spouse'], $row['broker_id'],$row['address'], $row['city'],$row['state'], $row['country'],$row['zip_code'], $row['phone'],$row['email'], $row['product_type'],$row['create_date']));
}
 
// Finish writing the file
fclose($handle);
header("Location:client-list/");
} 
 
 
 
        //AGENT_LIST EXPLODE


if(isset($_GET['action']) && ($_GET['action']=='agent-list_explode')){
$conn = new PDO("mysql:host=68.178.140.193;dbname=bricrealty", 'bricrealty', 'Pkweb@123');
 // Connect and query the database for the users
//$conn = new PDO("mysql:host=localhost;dbname=sourav", 'root', '');
$sql = "SELECT * FROM tab_broker WHERE broker_type='A' ORDER BY broker_id";
$results = $conn->query($sql);
 
// Pick a filename and destination directory for the file
// Remember that the folder where you want to write the file has to be writable
$filename = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv/agent_list/agent_list_".time().".csv";
 
// Actually create the file
// The w+ parameter will wipe out and overwrite any existing file with the same name
$handle = fopen($filename, 'w+');
 
// Write the spreadsheet column titles / labels
fputcsv($handle, array('First Name','Last Name','Broker Type','User Name','Password','Email','Address','City','State','Country','Zip code','Company','Office Phone','Mobile','Create date'));
 
// Write all the user records to the spreadsheet
foreach($results as $row)
{
    fputcsv($handle, array($row['broker_name'], $row['last_name'],$row['broker_type'],$row['user_name'],$row['password'],$row['email'], $row['address'],$row['city'], $row['state'],$row['contry'],$row['zip code'], $row['broker_company'],$row['office_phone'], $row['mobile'],$row['create_date']));
}
 
// Finish writing the file
fclose($handle);
header("Location:agent-list/");
} 



        // MANAGER ADMIN LIST EXPLODE


if(isset($_GET['action']) && ($_GET['action']=='manager_list_explode')){
$conn = new PDO("mysql:host=68.178.140.193;dbname=bricrealty", 'bricrealty', 'Pkweb@123');
 // Connect and query the database for the users
//$conn = new PDO("mysql:host=localhost;dbname=sourav", 'root', '');
$sql = "SELECT * FROM tab_broker WHERE broker_type!='A' ORDER BY broker_id";
$results = $conn->query($sql);
 
// Pick a filename and destination directory for the file
// Remember that the folder where you want to write the file has to be writable
$filename = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv/admin_manager_list/admin_manager_list_".time().".csv";
 
// Actually create the file
// The w+ parameter will wipe out and overwrite any existing file with the same name
$handle = fopen($filename, 'w+');
 
// Write the spreadsheet column titles / labels
fputcsv($handle, array('First Name','Last Name','Broker Type','User Name','Password','Email','Address','City','State','Country','Zip code','Company','Office Phone','Mobile','Create date'));
 
// Write all the user records to the spreadsheet
foreach($results as $row)
{
    fputcsv($handle, array($row['broker_name'], $row['last_name'],$row['broker_type'],$row['user_name'],$row['password'],$row['email'], $row['address'],$row['city'], $row['state'],$row['contry'],$row['zip code'], $row['broker_company'],$row['office_phone'], $row['mobile'],$row['create_date']));
}
 
// Finish writing the file
fclose($handle);
header("Location:manager-list/");
} 



               //CLIENT LIST EXPLODE


if(isset($_GET['action']) && ($_GET['action']=='myclient_exp')){
$conn = new PDO("mysql:host=68.178.140.193;dbname=bricrealty", 'bricrealty', 'Pkweb@123');
 // Connect and query the database for the users
//$conn = new PDO("mysql:host=localhost;dbname=sourav", 'root', '');
$broker_id=$_GET['t'];
/*echo*/ $sql = "SELECT * FROM tbl_client WHERE broker_id=$broker_id ORDER BY client_id";
//exit;
 $results = $conn->query($sql);
 
// Pick a filename and destination directory for the file
// Remember that the folder where you want to write the file has to be writable

$filename = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/csv/my_client/my_client_list_".$broker_id.'_'.time().".csv";
 
// Actually create the file
// The w+ parameter will wipe out and overwrite any existing file with the same name
$handle = fopen($filename, 'w+');
 
// Write the spreadsheet column titles / labels
fputcsv($handle, array('First name','last_name','Spouse','broker_id','address','city','state','country','zip_code','phone','email','product_type','create_date'));
 
// Write all the user records to the spreadsheet
/*print '<pre>';
	print_r($results);
print '</pre>';
exit;*/
foreach($results as $row)
{
    fputcsv($handle, array($row['name'], $row['last_name'],$row['Spouse'], $row['broker_id'],$row['address'], $row['city'],$row['state'], $row['country'],$row['zip_code'], $row['phone'],$row['email'], $row['product_type'],$row['create_date']));
}
 
// Finish writing the file
fclose($handle);
if($broker_id>1){
	header("Location:my-client/?id=".$broker_id);	
}else{
	header("Location:my-client/");	
}

} 
 
 
 
    

 
 ?>
<?php //get_footer(); ?>