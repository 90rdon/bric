<?php
/*



Template name: Custom My Client Add



*/
ob_start();
get_header(); 
if(!$_SESSION['is_login']) {
header("Location:/agent-login");
exit;

}
$msg =0;
if(isset($_POST['action']) && $_POST['action'] == 'my_client_insert') {
 $name=$_POST['fnam'];
 
 $lname=$_POST['lnam'];

 $spou=$_POST['suspo'];

 $add=$_POST['add'];

 $city=$_POST['cty'];

 $state=$_POST['stat'];

 $country=$_POST['count'];

 $zip=$_POST['zip'];

 $pho=$_POST['pho'];

 $mail=$_POST['mail'];

 $product=$_POST['produ'];


$borker_id=$_SESSION['id'];
$str="INSERT INTO `tbl_client` (`client_id`, `name`, `last_name`, `Spouse`, `broker_id`, `address`, `city`, `state`, `country`, `zip_code`, `phone`, `email`, `product_type`,  
     `create_date`) VALUES (NULL, '$name', '$lname', '$spou', '$borker_id', '$add', '$city', '$state', '$country', '$zip', '$pho', '$mail', '$product', now())";
  if(mysql_query($str))
   {
     $msg = 1;
  }
}

?>
<script type="text/javascript">
function validate()
{
var fname=document.forms["client_form"]["fnam"].value;

var lname=document.forms["client_form"]["lnam"].value;

var address=document.forms["client_form"]["add"].value;

var mail=document.forms["client_form"]["mail"].value;
var at=mail.indexOf("@");
var dt=mail.lastIndexOf(".");

var city=document.forms["client_form"]["cty"].value;

var state=document.forms["client_form"]["stat"].value;

var country=document.forms["client_form"]["count"].value;

var zip=document.forms["client_form"]["zip"].value;

var phone=document.forms["client_form"]["pho"].value;

if(fname==null||fname=="")
{
alert("First Name must be filled out");
document.forms["client_form"]["fnam"].focus();
return false;
}
else if(lname==null||lname=="")
{
alert("Last Name must be filled out");
document.forms["client_form"]["lnam"].focus();
return false;
}
else if(address==""||address==null)
{
alert("Address must be filled out");
document.forms["client_form"]["add"].focus();
return false;
}
else if(city==""||city==null)
{
alert("City must be filled out");
document.forms["client_form"]["cty"].focus();
return false;
}
else if(state==""||state==null)
{
alert("State must be filled out");
document.forms["client_form"]["stat"].focus();
return false;
}

else if(zip =="")
{
alert("Please ender the zip code ");
document.forms["client_form"]["zip"].focus();
return false;
}
else if(country==""||country==null)
{
alert("Country must be filled out");
document.forms["client_form"]["count"].focus();
return false;
}
else if(phone =="")
{
alert("Please enter phone number");
document.forms["client_form"]["pho"].focus();
return false;
}
else if(mail==""||mail==null)
{
alert("E-mail must be filled out");
document.forms["client_form"]["mail"].focus();
return false;
}
/*else if(at<0||dt<at+5)
{
alert("Your enterd E-mail is not valid");
document.forms["client_form"]["mail"].focus();
return false;
}*/
else
{
return true;
}
}
</script>
<div class="agent_prof">

<h4 class="ttle">Add New Client
<div class="tab">
	<ul>
	    <li><a href="agent-profile"><strong>Agent Profile</strong></a></li>
    	<li><a href="/marketing-toolbox"><b>Marketing Toolbox</b></a></li>
        <li><a href="/my-client"><b>My Clients</b></a></li>
        <li><a href="/my-documents"><b>My Documents</b></a></li>
        <li><a href="/my-training"><b>My Training</b></a></li>
        <li><a href="/reset-password/"><b>Reset Password</b></a></li>
    </ul>
    <div class="clear"></div>
</div>
</h4>
    


<?php if($msg==1) { ?>
<p>Client Added Successfully</p>
<?php } ?>

<div class="agent_signup_pro">

<form name="client_form" action="" method="post" onSubmit="return validate()";>
<input type="hidden" name="action" value="my_client_insert" />
  <div class="row">
	<span class="one"><font color="#FF0000" size="+1">*</font><font color="#666666" size="2"> Fields are mandatory</font></span>
    <div style="clear:both; height:0;"></div>
    </div>
  
  <div class="row grey">
    <span class="one">First Name* :</span>
    <span class="two"><input type="text" name="fnam"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
 <div class="row">
    <span class="one">Last Name* :</span>
    <span class="two"><input type="text" name="lnam"/></span>
    <div style="clear:both; height:0;"></div>
 </div>
 
  <div class="row grey">
    <span class="one">Spouse:</span>
    <span class="two"><input type="text" name="suspo"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
 <div class="row">
    <span class="one">Address* :</span>
    <span class="two"><textarea name="add"></textarea> </span>
     <div style="clear:both; height:0;"></div>
 </div>
  
  <div class="row grey">
    <span class="one">City* :</span>
    <span class="two"><input type="text" name="cty"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row">
    <span class="one">State* :</span>
    <span class="two"><input type="text" name="stat"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
   <div class="row grey">
    <span class="one">Zipcode* :</span>
    <span class="two"><input type="text" name="zip"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row">
    <span class="one">Country* :</span>
    <span class="two"><input type="text" name="count"/></span>
    <div style="clear:both; height:0;"></div>
  </div>

  <div class="row grey">
    <span class="one">Phone*:</span>
    <span class="two"><input type="text" name="pho"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row">
    <span class="one">E-mail *:</span>
    <span class="two"><input type="text" name="mail"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row grey">
    <span class="one">Product Type:</span>
    <span class="two"><input type="text" name="produ"/></span>
    <div style="clear:both; height:0;"></div>
  </div>
  
  <div class="row">
    <span class="two"><input type="reset">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="submit"></span>
  <div style="clear:both; height:0;"></div>
  </div>
</form>

</div>

</div>

<?php get_footer(); ?>