<?php
session_start();
/*

Template name: custom_signup_page

*/
ob_start();
get_header(); 


if(isset($_POST['action']) && $_POST['action'] == 'insert') 
  { 
  
   extract($_POST);
 $sql="INSERT INTO 
 `tab_broker` SET
 `broker_name` = '$first_name',
 `last_name` = '$last_name',
 `user_name`   = '$name_user',
 `password`    = '$pass',
 `email`       = '$email_broker',
 `address`     = '$address_broker',
 `city`        = '$city_broker',
 `state`       = '$state_broker',
 `contry`      = '$country_broker',
 `zip code`    = '$zip_broker',
 `broker_company`  = '$cmpny_broker',
 `office_phone`    = '$ofc_no',
 `mobile`          = '$phone_broker'";

// echo $sql;
// exit();
	$res=mysql_query($sql);
	$to=$_POST['email_broker'];

// subject
$subject = 'Thank you for registering at bricrealty.com';

// message
$message = '

<p>Hello, welcome to bricrealty.</p>

<p>We would like to congratulate you on becoming a preferred agent with our Real Estate Company.</p>

<p>As a registered agent, you will receive access to bricrealty&acute;s &quot;Online Registration System&quot; and our &quot;BricLab Marketing Toolbox&quot; which will give you the ability to;</p>
<p>
&bull; Register your clients<br />
&bull; Access our exclusive inventory<br />
&bull; Market our communities and/or listings with your own logo and contact information through our "white label" sales collateral<br />
&bull; Access exclusive photos, video, brochures, and flyers of all our communities & properties<br /> 
&bull; Obtain Floor plans, site plans, and other specific community information<br />
&bull; Local area information<br />
&bull; Periodic newsletters<br />
&bull; and more…..<br />
</p>

<p>We are eagerly looking forward to your selling success, and feel honored that you have chosen us to help you with your real estate selling goals.</p>

<p>P.S.<br />
Please take advantage of registering your clients in our database portal as this will help protect your customers and ensure that you get the proper credit for sales involving them.  All client registrations are on a first come, first serve basis by registration date and time, so please make sure to register your clients before someone else does.</p>

<p>If you have any questions or need additional support please email us at info@bricrealty.com</p>

<p>Once again, from everyone on our bricrealty team, we look forward to working with you and are excited to be a part of your selling success.</p>

<p>Respectfully;</p>

<p>bricrealty Management</p>
';
// To send HTML mail, the Content-type header must be set
$msg=0;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: BRICREALTY AGENT REGISTRATION  <info@bricrealty.com>' . "\r\n";
if(mail($to, $subject, $message, $headers))
 {
	$msg=1;
  }
  
  	$toadmin='registeredagent@bricrealty.com';

// subject
$subjectadmin = 'Notice of Agent Registration';

// message
$messageadmin = '

<p>A new agent by the name of '.$_POST['name_broker'].' has registered on bricrealty.com.</p>
<p>Their contact information is:</p>
<p> 
First Name : '.$_POST['first_name'].'<br>
Last Name : '.$_POST['last_name'].'<br>
Email address: '.$_POST['email_broker'].'<br>
Cell Phone number : '.$_POST['phone_broker'].'<br>
Office number : '.$_POST['ofc_no'].'<br>
</p>
<p>Please make sure to reach out to this newly registered agent within 24 hours of this notice.
<p>
<p>Respectfully</p>
<p>Bricrealty Management</p>


';
// To send HTML mail, the Content-type header must be set
$msgadmin=0;
$headersadmin  = 'MIME-Version: 1.0' . "\r\n";
$headersadmin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headersadmin .= 'From: BRICREALTY AGENT REGISTRATION  <info@bricrealty.com>' . "\r\n";
if(mail($toadmin, $subjectadmin, $messageadmin, $headersadmin));
{
	$msgadmin=1;
  }

 
 }
?>

<script language="javascript" >
function validate()  {

if(document.signup.first_name.value =="") {
alert("Please Enter Your First Name ");
document.signup.first_name.focus();
return false;
} else if (document.signup.last_name.value =="") {
alert("Please Enter Your Last Name ");
document.signup.name_user.focus();
return false;
/*
if(document.signup.name_broker.value =="") {
alert("Please Enter The Name ");
document.signup.name_broker.focus();
return false;*/
} else if (document.signup.name_user.value =="") {
alert("Please Enter The User Name ");
document.signup.name_user.focus();
return false;
}  else if (document.signup.pass.value =="") {
alert("Please Enter The Password ");
document.signup.pass.focus();
return false;
}else if (document.signup.email_broker.value =="") {
alert("Please Enter The Email Address  ");
document.signup.email_broker.focus();
return false;
}  else if (document.signup.phone_broker.value =="") {
alert("Please Enter Cell Phone ");
document.signup.phone_broker.focus();
return false;
} else if (!document.signup.terms.checked) {
alert("Please Checked the terms and Condition  ");
return false;

}

return true;

}
</script>


<div class="agent_prof">
<h4 class="ttle">Agent Registration <span style="font-size:11px; padding-left:15px;">* Required</span>
</h4>

<div class="agent_signup_pro">
<?php
if($msg==1) { 
header("Location:/agent-welcome");
 } ?>

<form name="signup" method="post" action="" onSubmit="return validate()">

<input type="hidden" name="action" value="insert" />
<div class="row grey">
	<span class="one">FIRST NAME *</span>
	<span class="two"><input type="text" name="first_name" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row">
	<span class="one">LAST NAME *</span>
    <span class="two"><input type="text" name="last_name" /></span>
     <div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
	<span class="one">USER NAME *</span>
    <span class="two"><input type="text" name="name_user" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row">
	<span class="one">PASSWORD *</span>
    <span class="two"><input type="password" name="pass" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
	<span class="one">EMAIL</span>
    <span class="two"><input type="text" name="email_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row">
	<span class="one">ADDRESS</span>
    <span class="two"><input type="text" name="address_broker" /></span>
     <div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
	<span class="one">CITY</span>
	<span class="two"><input type="text" name="city_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row">
	<span class="one">STATE</span>
    <span class="two"><input type="text" name="state_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
	<span class="one">ZIP CODE</span>
    <span class="two"><input type="text" name="zip_broker" /></span>
     <div style="clear:both; height:0;"></div>
</div>

<div class="row">
	<span class="one">COUNTRY</span>
    <span class="two"><input type="text" name="country_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>

<div class="row grey">
	<span class="one">AGENT COMPANY</span>
    <span class="two"><input type="text" name="cmpny_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>

    
<div class="row">
	<span class="one">CELL PHONE *</span>
    <span class="two"><input type="text" name="phone_broker" /></span>
    <div style="clear:both; height:0;"></div>
</div>
    
<div class="row grey">
	<span class="one">OFFICE PHONE</span>
    <span class="two"><input type="text" name="ofc_no" /></span>
    <div style="clear:both; height:0;"></div>
</div>
    


<div class="row" style="height:15px; padding:20px;">
	<input type="checkbox" name="terms" value="1" />  Click here to accept terms and conditions  and move box next to submit button below terms and conditions</span>
   
    <div style="clear:both; height:0;"></div>
</div>

<div class="agreement">
<p><strong>TERMS AND CONDITIONS</strong></p>
<p><strong>Introduction</strong></p>
<p>These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.</p>
<p>You must be at least 18 years of age to use this website.  By using this website and by agreeing to these terms and conditions you warrant and represent that you are at least 18 years of age.</p>
<p>This website uses cookies.  By using this website and agreeing to these terms and conditions, you consent to our BRICREALTY REALTY, LLC's use of cookies in accordance with the terms of  REALTY, LLC's privacy policy / cookies policy.</p>
<p><strong>License to use website</strong></p>
<p>Unless otherwise stated, BRICREALTY REALTY, LLC and/or its licensors own the intellectual property rights in the website and material on the website.  Subject to the license below, all these intellectual property rights are reserved.</p>
<p>You may view, download for caching purposes only, and print pages or other content from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
<p>You must not:</p>
<p>
<ul>
  <li>  republish material from this website (including republication on another website);</li>
  <li>  sell, rent or sub-license material from the website;</li>
  <li>	show any material from the website in public;</li>
  <li>	reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;</li>
  <li>	edit or otherwise modify any material on the website; or</li>
  <li>	redistribute material from this website except for content specifically and expressly made available for redistribution.</li>
</ul>
</p>
<p>Where content is specifically made available for redistribution, it may only be redistributed within your organisation.</p>
<p><strong>Acceptable use</strong></p>
<p>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>
<p>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
<p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without BRICREALTY REALTY, LLC'S express written consent.</p>
<p>You must not use this website to transmit or send unsolicited commercial communications.</p>
<p>You must not use this website for any purposes related to marketing without BRICREALTY REALTY, LLC'S express written consent.</p>
<p><strong>Restricted access</strong></p>
<p>Access to certain areas of this website is restricted.  BRICREALTY REALTY, LLC reserves the right to restrict access to other areas of this website, or indeed this entire website, at BRICREALTY REALTY, LLC'S discretion.</p>
<p>If BRICREALTY REALTY, LLC provides you with a user ID and password to enable you to access restricted areas of this website or other content or services, you must ensure that the user ID and password are kept confidential.</p>
<p>BRICREALTY REALTY, LLC may disable your user ID and password in BRICREALTY REALTY, LLC'S sole discretion without notice or explanation.</p>
<p><strong>User content</strong></p>
<p>In these terms and conditions, &quot;your user content&quot; means material (including without limitation text, images, audio material, video material and audio-visual material) that you submit to this website, for whatever purpose.</p>
<p>You grant to BRICREALTY REALTY, LLC a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, adapt, publish, translate and distribute your user content in any existing or future media.  You also grant to BRICREALTY REALTY, LLC the right to sub-license these rights, and the right to bring an action for infringement of these rights.</p>
<p>Your user content must not be illegal or unlawful, must not infringe any third party's legal rights, and must not be capable of giving rise to legal action whether against you or BRICREALTY REALTY, LLC or a third party (in each case under any applicable law).</p>
<p>You must not submit any user content to the website that is or has ever been the subject of any threatened or actual legal proceedings or other similar complaint.</p>
<p>BRICREALTY REALTY, LLC reserves the right to edit or remove any material submitted to this website, or stored on BRICREALTY REALTY, LLC'S servers, or hosted or published upon this website.</p>
<p>Notwithstanding BRICREALTY REALTY, LLC'S rights under these terms and conditions in relation to user content, BRICREALTY REALTY, LLC does not undertake to monitor the submission of such content to, or the publication of such content on, this website.</p>
<p><strong>No warranties</strong></p>
<p>This website is provided &quot;as is&quot; without any representations or warranties, express or implied.  BRICREALTY REALTY, LLC makes no representations or warranties in relation to this website or the information and materials provided on this website.</p>
<p>Without prejudice to the generality of the foregoing paragraph, BRICREALTY REALTY, LLC does not warrant that:</p>
<ul>
  <li> this website will be constantly available, or available at all; or</li>
  <li> the information on this website is complete, true, accurate or non-misleading.</li>
</ul>
<p>Nothing on this website constitutes, or is meant to constitute, advice of any kind.  If you require advice in relation to any legal, financial or medical matter you should consult an appropriate professional.</p>
<p><strong>Limitations of liability</strong></p>
<p>BRICREALTY REALTY, LLC will not be liable to you (whether under the law of contact, the law of torts or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:</p>
<p>
<ul>
  <li>	to the extent that the website is provided free-of-charge, for any direct loss;</li>
  <li>	for any indirect, special or consequential loss; or</li>
  <li>	for any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.</li>
</ul>
</p>
<p>These limitations of liability apply even if BRICREALTY REALTY, LLC has been expressly advised of the potential loss.</p>
<p><strong>Exceptions</strong></p>
<p>Nothing in this website disclaimer will exclude or limit any warranty implied by law that it would be unlawful to exclude or limit; and nothing in this website disclaimer will exclude or limit BRICREALTY REALTY, LLC'S liability in respect of any:</p>
<p>
<ul>
  <li> death or personal injury caused by BRICREALTY REALTY, LLC'S negligence;</li>
  <li> fraud or fraudulent misrepresentation on the part of BRICREALTY REALTY, LLC; or</li>
  <li> matter which it would be illegal or unlawful for BRICREALTY REALTY, LLC to exclude or limit, or to attempt or purport to exclude or limit, its liability. </li>
</ul>
</p>
<p><strong>Reasonableness</strong></p>
<p>By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable. </p>
<p>If you do not think they are reasonable, you must not use this website.</p>
<p><strong>Other parties</strong></p>
<p>You accept that, as a limited liability entity, BRICREALTY REALTY, LLC has an interest in limiting the personal liability of its officers and employees.  You agree that you will not bring any claim personally against BRICREALTY REALTY, LLC'S officers or employees in respect of any losses you suffer in connection with the website.</p>
<p>Without prejudice to the foregoing paragraph, you agree that the limitations of warranties and liability set out in this website disclaimer will protect BRICREALTY REALTY, LLC'S officers, employees, agents, subsidiaries, successors, assigns and sub-contractors as well as BRICREALTY REALTY, LLC. </p>
<p><strong>Unenforceable provisions</strong></p>
<p>If any provision of this website disclaimer is, or is found to be, unenforceable under applicable law, that will not affect the enforceability of the other provisions of this website disclaimer.</p>
<p><strong>Indemnity</strong></p>
<p>You hereby indemnify BRICREALTY REALTY, LLC and undertake to keep BRICREALTY REALTY, LLC indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by BRICREALTY REALTY, LLC to a third party in settlement of a claim or dispute on the advice of BRICREALTY REALTY, LLC'S legal advisers) incurred or suffered by BRICREALTY REALTY, LLC arising out of any breach by you of any provision of these terms and conditions, or arising out of any claim that you have breached any provision of these terms and conditions.</p>
<p><strong>Breaches of these terms and conditions</strong></p>
<p>Without prejudice to BRICREALTY REALTY, LLC'S other rights under these terms and conditions, if you breach these terms and conditions in any way, BRICREALTY REALTY, LLC may take such action as BRICREALTY REALTY, LLC deems appropriate to deal with the breach, including suspending your access to the website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.</p>
<p><strong>Variation</strong></p>
<p>BRICREALTY REALTY, LLC may revise these terms and conditions from time-to-time.  Revised terms and conditions will apply to the use of this website from the date of the publication of the revised terms and conditions on this website.  Please check this page regularly to ensure you are familiar with the current version.</p>
<p><strong>Assignment</strong></p>
<p>BRICREALTY REALTY, LLC may transfer, sub-contract or otherwise deal with BRICREALTY REALTY, LLC'S rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.</p>
<p>You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions. </p>
<p><strong>Severability</strong></p>
<p>If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect.  If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect. </p>
<p><strong>Entire agreement</strong></p>
<p>These terms and conditions , together with the Agent Registration form, constitute the entire agreement between you and BRICREALTY REALTY, LLC in relation to your use of this website, and supersede all previous agreements in respect of your use of this website.</p>
<p><strong>Law and jurisdiction</strong></p>
<p>These terms and conditions will be governed by and construed in accordance with Florida Law, and any disputes relating to these terms and conditions will be subject to the non- exclusive jurisdiction of the courts of Florida and the United States of America.</p>
<p><strong>Registrations and authorisations</strong></p>
<p>BRICREALTY REALTY, LLC is registered with the Florida Department of Business Professional Regulation and the Division of Real Estate and holds a professional title of Real Estate Broker Office and it has been granted in the United States of America.  BRICREALTY REALTY, LLC is subject to the RULES and Regulations which can be found at www.myfloridalicense.com/dbpr/re/statutes.html.</p>
<p>BRICREALTY REALTY, LLC subscribes to the following code of conduct of the Florida Real Estate Commission. </p>
<p><strong>BRICREALTY REALTY, LLC'S details</strong></p>
<p>You can contact BRICREALTY REALTY, LLC by email to info@bricrealty.com.</p>


</div>

<div class="row grey">
	<span class="one">&nbsp;</span>
    <span class="two"><input type="submit" value="SUBMIT" class="btn_whites" /></span>
    <div style="clear:both; height:0;"></div>
</div
    
    



></form>

</div>
</div>
</form>

<?php get_footer(); ?>