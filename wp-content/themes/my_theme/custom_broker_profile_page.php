<?php

/*







Template name: Custom Broker Profile Page







*/

ob_start();

get_header(); 

if(!$_SESSION['is_login']) {

header("Location:/agent-login");

exit;



}



$sql = 'SELECT * FROM tab_broker WHERE broker_id ='.$_SESSION['id'];



$rs = mysql_query($sql);

$row = mysql_fetch_assoc($rs);



?>

<div class="agent_prof">

<?php

if($_SESSION['broker_type']=='A'){









?>

<h4 class="ttle">Agent Profile  



<div class="tab">

	<ul>

    	<li><a href="/marketing-toolbox"><b>Marketing Toolbox</b></a></li>

        <li><a href="/my-client-add"><b>Add Client </b></a></li>

        <li><a href="/my-client"><b>My Clients</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/profile-edit"><!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/edit_icon.png" /> -->Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

    </div>

    

    <!--<div class="ttlemane"><a href="/profile-edit"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/edit_icon.png" /></a></div> -->

    <div class="clear"></div>

    </h4>

<!--<p align="right"><a href="/marketing-toolbox"><b>Marketing Tools</b></a></p>



<p align="right"><a href="/my-client"><b>My Clients</b></a></p>



<p align="right"><a href="/my-client-add"><b>Client Add</b></a></p>



<p align="right"><a href="/reset-password/"><b>ReSet Password</b></a></p>-->





<div class="agent_signup_pro">





<div class="row">

<span class="one">First Name :</span> 

<span class="two"><?=$row['broker_name']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

<span class="one">Last Name :</span> 

<span class="two"><?=$row['last_name']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row">

<span class="one">Email :</span>

<span class="two"><?=$row['email']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

<span class="one">Address :</span>

<span class="two"><?=$row['address']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row">

<span class="one">City :</span>

<span class="two"><?=$row['city']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

<span class="one">State :</span>

<span class="two"><?=$row['state']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row">

<span class="one">Country :</span>

<span class="two"><?=$row['contry']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

<span class="one">Company :</span>

<span class="two"><?=$row['broker_company']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row">

<span class="one">Office Phone :</span>

<span class="two"><?=$row['office_phone']?></span>

<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

<span class="one">Mobile :</span>

<span class="two"><?=$row['mobile']?></span>

<div style="clear:both; height:0;"></div>

</div>









</div>

</div>

<?php

}elseif($_SESSION['broker_type']=='M'){

?>

<div class="agent_prof">

<h4 class="ttle">Manager Profile



<div class="tab">

	<ul>

    	<li><a href="/agent-list"><b>Agents List</b></a></li>

		<li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

         <li><a href="/profile-edit">Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

    </ul>

</div>

    <div class="clear"></div>

</h4>

<!--<p align="right"><a href="/marketing-toolbox"><b>Marketing Tools</b></a></p>



<p align="right"><a href="/my-client"><b>My Clients</b></a></p>



<p align="right"><a href="/my-client-add"><b>Client Add</b></a></p>



<p align="right"><a href="/reset-password/"><b>ReSet Password</b></a></p>-->



<div class="agent_signup_pro">







<div class="row">

	<span class="one">First Name :</span>

    <span class="two"><?=$row['broker_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">Last Name :</span>

	<span class="two"><?=$row['last_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row">

	<span class="one">User Name :</span>

	<span class="two"><?=$row['user_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">E-Mail :</span>

	<span class="two"><?=$row['email']?></span>

	<div style="clear:both; height:0;"></div>

</div>



</div>



</div>

<?php

}elseif($_SESSION['broker_type']=='AD'){

?>

<div class="agent_prof">

<h4 class="ttle">Administrator Profile 



<div class="tab">

	<ul>

   

    	<li><a href="/agent-list"><b>Agent List</b></a></li>

        <li><a href="/client-list"><b>Client List</b></a></li>

        <li><a href="/manager-add"><b>Add Administrator/Manager</b></a></li>

        <li><a href="/manager-list"><b>Administrator/Manager List</b></a></li>
        
        <li><a href="/properties-add"><b>Add Properties</b></a></li>

        <li><a href="/toolbox-upload"><b>Upload Marketing Toolbox</b></a></li>

        <li><a href="/my-documents"><b>My Documents</b></a></li>

        <li><a href="/my-training"><b>My Training</b></a></li>

        <li><a href="/profile-edit"><!--<img src="<?php bloginfo('stylesheet_directory'); ?>/images/edit_icon.png" /> -->Edit Profile</a></li>

        <li><a href="/reset-password/"><b>Reset Password</b></a></li>

        

    </ul>

</div>

    <div class="clear"></div>

</h4>

<!--<p align="right"><a href="/marketing-toolbox"><b>Marketing Tools</b></a></p>



<p align="right"><a href="/my-client"><b>My Clients</b></a></p>



<p align="right"><a href="/my-client-add"><b>Client Add</b></a></p>



<p align="right"><a href="/reset-password/"><b>ReSet Password</b></a></p>-->







<div class="agent_signup_pro">



<div class="row">

	<span class="one">First Name :</span>

	<span class="two"><?=$row['broker_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row grey">

	<span class="one">Last Name :</span>

	<span class="two"><?=$row['last_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>



<div class="row">

	<span class="one">User Name :</span>

	<span class="two"><?=$row['user_name']?></span>

	<div style="clear:both; height:0;"></div>

</div>

<div class="row grey">

	<span class="one">E-Mail :</span>

	<span class="two"><?=$row['email']?></span>

	<div style="clear:both; height:0;"></div>

</div>



</div>

</div>

<?php

}

?>



<?php get_footer(); ?>