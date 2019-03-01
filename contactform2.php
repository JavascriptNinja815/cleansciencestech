<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/contact-form-attachment.html
*/
require_once("include/fgcontactform.php");
require_once("include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('dave@dprowebdesign.com,mmeyer@cleansciencestech.com,jkaye@calogic.net,bkaye@cleansciencestech.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('E6bZFICMgOhOnxI');

$formproc->AddFileUploadField('photo','pdf',2024);

if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
        
         <link rel="stylesheet" href="style.css" media="screen" />
          <link rel="stylesheet" type="text/css" media="all" href="../fonts.css" /> 
<!--[if IE]> 
<link rel="stylesheet" type="text/css" media="all" href="../ie-fonts.css" /> 
<![endif]--> 
<script type="text/javascript" src="//use.typekit.net/hbs1bnz.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script type="text/javascript">
document.write(unescape("%3Cscript src='" + document.location.protocol + "//www.webtraxs.com/trxscript.php' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
_trxid = "cleansciencestech";
webTraxs();
</script>
<noscript><img src="http://www.webtraxs.com/webtraxs.php?id=cleansciencestech&st=img" alt=""></noscript>
</head>
<body>

<!-- Form Code Start -->
 <div id="content" class="container content-padding">
<div class="contact-form">
<form id='contactus'  action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>



<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='hidden'   name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>


<div class="container">
<div class="one-full">
<div class='one-half'>
    <label for='name' >First Name* </label>
    <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='lname' >Last Name* </label>
    
    <input type='text' name='lname' id='lname' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" />
</div>
</div>
</div>
<div class="container">
<div class="one-full">

<div class='one-half'>
    <label for='email' >Email Address*</label>
    <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" />
    <span id='contactus_email_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='phone' >Phone* </label>
    
    <input type='text' name='phone' id='phone' value='<?php echo $formproc->SafeDisplay('phone') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
</div>


<div class="container">
<div class='one-full'>
    <label for='cname' >Company Name* </label>
    
    <input type='text' name='companyname' id='cname' value='<?php echo $formproc->SafeDisplay('cname') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
<div class="container">
<div class="one-full">
<div class='one-half'>
    <label for='address' >Address*</label>
    <input type='text' name='address' id='address' value='<?php echo $formproc->SafeDisplay('address') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='city' >City*</label>
    
    <input type='text' name='city' id='city' value='<?php echo $formproc->SafeDisplay('city') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
</div>
<div class="container">

<div class="one-full">
<div class='one-half'>
    <label for='state' >State*</label>
    
 <!--   <input type='text' name='state' id='state' value='<?php echo $formproc->SafeDisplay('state') ?>' maxlength="50" />
-->
  
   <select class="border-sel"   name='state' id='state'>  
    <option value="AL"><?php echo $formproc->SafeDisplay('Alabama') ?>Alabama</option>
    <option value="AK"><?php echo $formproc->SafeDisplay('Alaska') ?>Alaska</option>
    <option value="AZ">Arizona <?php echo $formproc->SafeDisplay('Arizona') ?></option>
    <option value="AR">Arkansas<?php echo $formproc->SafeDisplay('Arkansas') ?></option>
    <option value="CA">California<?php echo $formproc->SafeDisplay('California') ?></option>
    <option value="CO">Colorado<?php echo $formproc->SafeDisplay('Colorado') ?></option>
    <option value="CT">Connecticut<?php echo $formproc->SafeDisplay('Connecticut') ?></option>
    <option value="DE">Delaware<?php echo $formproc->SafeDisplay('Delaware') ?></option>
    <option value="DC">District Of Columbia<?php echo $formproc->SafeDisplay('Arizona') ?></option>
    <option value="FL">Florida<?php echo $formproc->SafeDisplay('Florida') ?></option>
    <option value="GA">Georgia<?php echo $formproc->SafeDisplay('Georgia') ?></option>
    <option value="HI">Hawaii<?php echo $formproc->SafeDisplay('Hawaii') ?></option>
    <option value="ID">Idaho<?php echo $formproc->SafeDisplay('Idaho') ?></option>
    <option value="IL">Illinois<?php echo $formproc->SafeDisplay('Illinois') ?></option>
    <option value="IN">Indiana<?php echo $formproc->SafeDisplay('Indiana') ?></option>
    <option value="IA">Iowa<?php echo $formproc->SafeDisplay('Iowa') ?></option>
    <option value="KS">Kansas<?php echo $formproc->SafeDisplay('Arizona') ?></option>
    <option value="KY">Kentucky<?php echo $formproc->SafeDisplay('Kentucky') ?></option>
    <option value="LA">Louisiana<?php echo $formproc->SafeDisplay('Louisiana') ?></option>
    <option value="ME">Maine<?php echo $formproc->SafeDisplay('Maine') ?></option>
    <option value="MD">Maryland<?php echo $formproc->SafeDisplay('Maryland') ?></option>
    <option value="MA">Massachusetts<?php echo $formproc->SafeDisplay('Massachusetts') ?></option>
    <option value="MI">Michigan<?php echo $formproc->SafeDisplay('Michigan') ?></option>
    <option value="MN">Minnesota<?php echo $formproc->SafeDisplay('Minnesota') ?>/option>
    <option value="MS">Mississippi<?php echo $formproc->SafeDisplay('Mississippi') ?></option>
    <option value="MO">Missouri<?php echo $formproc->SafeDisplay('Missouri') ?></option>
    <option value="MT">Montana<?php echo $formproc->SafeDisplay('Montana') ?></option>
    <option value="NE">Nebraska<?php echo $formproc->SafeDisplay('Nebraska') ?></option>
    <option value="NV">Nevada<?php echo $formproc->SafeDisplay('Nevada') ?></option>
    <option value="NH">New Hampshire<?php echo $formproc->SafeDisplay('New Hampshire') ?></option>
    <option value="NJ">New Jersey<?php echo $formproc->SafeDisplay('New Jersey') ?></option>
    <option value="NM">New Mexico<?php echo $formproc->SafeDisplay('New Mexico') ?></option>
    <option value="NY">New York<?php echo $formproc->SafeDisplay('New York') ?></option>
    <option value="NC">North Carolina<?php echo $formproc->SafeDisplay('North Carolina') ?></option>
    <option value="ND">North Dakota<?php echo $formproc->SafeDisplay('North Dakota') ?></option>
    <option value="OH">Ohio<?php echo $formproc->SafeDisplay('Ohio') ?></option>
    <option value="OK">Oklahoma<?php echo $formproc->SafeDisplay('Oklahoma') ?></option>
    <option value="OR">Oregon<?php echo $formproc->SafeDisplay('Oregon') ?></option>
    <option value="PA">Pennsylvania<?php echo $formproc->SafeDisplay('Pennsylvania') ?></option>
    <option value="RI">Rhode Island<?php echo $formproc->SafeDisplay('Rhode Island') ?></option>
    <option value="SC">South Carolina<?php echo $formproc->SafeDisplay('South Carolina') ?></option>
    <option value="SD">South Dakota<?php echo $formproc->SafeDisplay('South Dakota') ?></option>
    <option value="TN">Tennessee<?php echo $formproc->SafeDisplay('Tennesse') ?></option>
    <option value="TX">Texas<?php echo $formproc->SafeDisplay('Texas') ?></option>
    <option value="UT">Utah<?php echo $formproc->SafeDisplay('Utah') ?></option>
    <option value="VT">Vermont<?php echo $formproc->SafeDisplay('Vermont') ?></option>
    <option value="VA">Virginia<?php echo $formproc->SafeDisplay('Virginia') ?></option>
    <option value="WA">Washington<?php echo $formproc->SafeDisplay('Washington') ?></option>
    <option value="WV">West Virginia<?php echo $formproc->SafeDisplay('West Virginia') ?></option>
    <option value="WI">Wisconsin<?php echo $formproc->SafeDisplay('Wisconsin') ?></option>
    <option value="WY">Wyoming<?php echo $formproc->SafeDisplay('Wyoming') ?></option>


</select>

    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='zip' >Zip*</label>
    
    <input type='text' name='zip' id='zip' value='<?php echo $formproc->SafeDisplay('zip') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
</div>
<div class="container">
<div class="one-full">

<div class='one-half'>
    <label for='partD' >Part Description*</label>
    
    <input type='text' name='partD' id='partD' value='<?php echo $formproc->SafeDisplay('partD') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='partnumber' >Part Number*</label>
    
    <input type='text' name='partnumber' id='partnumber' value='<?php echo $formproc->SafeDisplay('partnumber') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
</div>
<div class="container">
<div class="one-full">
<div class='one-half'>
    <label for='quantity' >Annual Estimated Quantity*</label>
    
    <input type='text' name='quantity' id='quantity' value='<?php echo $formproc->SafeDisplay('quantity') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='one-half'>
    <label for='duedate' >Requested Due Date*</label>
    
    <input type='text' name='duedate' id='duedate' value='<?php echo $formproc->SafeDisplay('duedate') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
</div>

</div>
</div>
<div class="container">
<div class="one-full">
<div class='one-half'>
    <label for='message' >Required Process*</label>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea rows="10" cols="50" name='process' id='process'><?php echo $formproc->SafeDisplay('process') ?></textarea>
</div>
<div class='one-half'>
    <label for='message' >Special Instructions  &amp; Comments</label>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
</div>
</div>
</div>
<div class="container">
<div class='one-full'>
<div class='one-half'>
    <label for='photo' >Engineering Print - PDF Only</label>
    <input type="file" name='photo' id='photo' />
    <span id='contactus_photo_errorloc' class='error'></span>
</div>

<div class='one-half'>
    <label for='formhow' >How did you hear about us?</label>
    
    <select class="border-sel" name="formhow">
   
    <option value="Advertisement">Advertisement<?php echo $formproc->SafeDisplay('Advertisement') ?></option>
    <option value="Truck">CST Delivery Truck<?php echo $formproc->SafeDisplay('Truck') ?></option>
    <option value="Representative">CST Representative<?php echo $formproc->SafeDisplay('Representative') ?></option>
    <option value="Sales">CST Sales Person<?php echo $formproc->SafeDisplay('Sales') ?></option>
    <option value="Email1"> Email<?php echo $formproc->SafeDisplay('Email1') ?></option>
    <option value="Dmail">Direct Mail<?php echo $formproc->SafeDisplay('Dmail') ?></option>
    <option value="IA">Industry Association<?php echo $formproc->SafeDisplay('IA') ?></option>
    <option value="IC">Industry Catalog / Directory<?php echo $formproc->SafeDisplay('IC') ?></option>
    <option value="Search">Online Search<?php echo $formproc->SafeDisplay('Search') ?></option>
    <option value="Article">Published Article<?php echo $formproc->SafeDisplay('Article') ?></option>
    <option value="Supplier">Supplier<?php echo $formproc->SafeDisplay('Supplier') ?></option>
    <option value="TS">Trade Show/Conference/Presentation<?php echo $formproc->SafeDisplay('TS') ?></option>
    <option value="Work">Work Colleague<?php echo $formproc->SafeDisplay('Work') ?></option>
    <option value="Other">Other<?php echo $formproc->SafeDisplay('Other') ?></option>
</select>
    <span id='contactus_name_errorloc' class='error'></span>
</div>
</div>
</div>
<div class="container">
<div class="sep10"></div>
</div>
<div class="container">
<div class='one-full'>
    <div><label for='other' >If "Other", please specify:</label>
    
    <input type='text' name='other' id='other' value='<?php echo $formproc->SafeDisplay('other') ?>' maxlength="50" />
    <span id='contactus_name_errorloc' class='error'></span>
    </div>
</div>
</div>
<div class="container">
<div class='one-full'>
    <div><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
    <label for='scaptcha' >Enter the code above here</label>
    <input type='text' name='scaptcha' id='scaptcha' maxlength="10" />
    <span id='contactus_scaptcha_errorloc' class='error'></span>
    <div class='short_explanation'>Can't read the image?
    <a href='javascript: refresh_captcha_img();'>Click here to refresh</a>.</div>
</div>
</div>
<div class="container">
<div class='one-full'>

    <input type='submit' name='Submit' value='Submit' />
</div>
</div>

</form>
</div>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->
</div>
<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

    frmvalidator.addValidation("photo","file_extn=pdf","Upload images only. Supported file types are: pdf");

    frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

    document.forms['contactus'].scaptcha.validator
      = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
                    document.images['scaptcha_img']);

    function SCaptcha_Validate()
    {
        return document.forms['contactus'].scaptcha.validator.validate();
    }

    frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

    function refresh_captcha_img()
    {
        var img = document.images['scaptcha_img'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
    }

// ]]>
</script>


</body>
</html>