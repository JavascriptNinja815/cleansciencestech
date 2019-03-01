<?PHP
/*
Simfatic Forms Main Form processor script

This script does all the server side processing. 
(Displaying the form, processing form submissions,
displaying errors, making CAPTCHA image, and so on.) 

All pages (including the form page) are displayed using 
templates in the 'templ' sub folder. 

The overall structure is that of a list of modules. Depending on the 
arguments (POST/GET) passed to the script, the modules process in sequence. 

Please note that just appending  a header and footer to this script won't work.
To embed the form, use the 'Copy & Paste' code in the 'Take the Code' page. 
To extend the functionality, see 'Extension Modules' in the help.

*/

@ini_set("display_errors", 1);//the error handler is added later in FormProc
error_reporting(E_ALL & ~((defined('E_STRICT')?E_STRICT:0)|E_NOTICE));

require_once(dirname(__FILE__)."/includes/CleanSciencesTech-lib.php");
$formproc_obj =  new SFM_FormProcessor('CleanSciencesTech');
$formproc_obj->initTimeZone('default');
$formproc_obj->setFormID('4ed6f73d-dd68-4a70-a8f9-bcada6f25b89');
$formproc_obj->setFormKey('bc730360-ad9f-449b-bd34-8a6ec621a78f');
$formproc_obj->setLocale('en-US','yyyy-MM-dd');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(false);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_form_page_0.txt"));
$formproc_obj->AddElementInfo('Name','text','');
$formproc_obj->AddElementInfo('Email','text','');
$formproc_obj->AddElementInfo('Textbox2','text','');
$formproc_obj->AddElementInfo('Phone','text','');
$formproc_obj->SetHiddenInputTrapVarName('t8d24985eaace54e2b2ab');
$formproc_obj->SetFromAddress('forms@cleansciencestech.com');
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$validator =  new FM_FormValidator();
$validator->addValidation("Name","required","Please fill in Name");
$validator->addValidation("Email","email","The input for Email should be a valid email value");
$validator->addValidation("Textbox2","required","Please fill in Textbox2");
$validator->addValidation("Phone","required","Please fill in Phone");
$formproc_obj->addModule($validator);

$confirmpage =  new FM_ConfirmPage(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_confirm_page.txt"));
$confirmpage->SetButtonCode(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_confirm_button_code.txt"),sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_edit_button_code.txt"),sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_print_button_code.txt"));
$confirmpage->SetExtraCode(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_confirm_ie6_png_fix.txt"));
$formproc_obj->addModule($confirmpage);

$data_email_sender =  new FM_FormDataSender(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_email_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_email_body.txt"),'%Email%');
$data_email_sender->AddToAddr('dave <dave@dprowebdesign.com>');
$formproc_obj->addModule($data_email_sender);

$tupage =  new FM_ThankYouPage(sfm_readfile(dirname(__FILE__)."/templ/CleanSciencesTech_thank_u.txt"));
$formproc_obj->addModule($tupage);

$page_renderer->SetFormValidator($validator);
$formproc_obj->ProcessForm();

?>