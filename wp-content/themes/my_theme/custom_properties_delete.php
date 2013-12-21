<?php
/*Template name:custom properties delete*/

ob_start();

get_header(); 
if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;
}
?>
<?php
$properties_id = base64_decode($_GET['msg']);
/*pdf delete start*/
$del_sql = "SELECT * FROM `tbl_pdf` WHERE `toolbox_type`=".$properties_id;
$del_query = mysql_query($del_sql);
while($del_data = mysql_fetch_assoc($del_query)){
$del_name = $del_data['pdf_name'];
$destination = "/var/chroot/home/content/78/6140178/html/bricrealty/wp-content/themes/my_theme/pdf/".$del_name;
@unlink($destination);
}
/*pdf delete end*/
/*pdf_record delete start*/
$del_pdf_record = 'DELETE FROM `tbl_pdf` WHERE `toolbox_type` = "'.$properties_id.'"';
mysql_query($del_pdf_record);
/*pdf_record delete end*/
/*properties delete start*/
$sql="DELETE FROM `tab_properties` WHERE `id` = '$properties_id'";
if(mysql_query($sql)){
 header("location:/properties-add/");
}
/*properties delete end*/
 ?>
<?php get_footer(); ?>