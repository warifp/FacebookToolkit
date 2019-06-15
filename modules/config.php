<?php
require_once('vendor/system.php');
/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Update  : 15 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */

/** Cek Additional */
$climate->br()->info('Oops, additional programs are needed to run this tool.');
sleep(5);
$climate->br()->info('Start a check for needs..');
progress($progress);

if(!fsockopen("$cek_connection", 80)) {
    die ("" . $climate->br()->backgroundRed()->out("Could not open the server, connection issues?"));
}  

if(phpversion() < "7.0.0"){
    die ("" . $climate->br()->backgroundRed()->out("Your PHP Version is " . phpversion() . ", this PHP Version no support, please update to PHP Version 7."));
}

if(!function_exists('curl_init')) {
    die ("" . $climate->br()->backgroundRed()->out("cURL not found! please install cURL"));
}

$climate->br()->backgroundGreen()->out('Congratulations, the requirements for the program have been fulfilled.');
sleep(5);
/** End Cek Additional */

print $banner;
sleep(3);
$climate->table($data_socialmedia);
sleep(3);

/** Cek Status */
if($status == "hidup"){

} else if($status == "autoupdate"){
    $climate->br()->backgroundRed()->out('This tool is being updated automatically..');
    system('git pull');
    exit;
} else if($status == "update"){
    $climate->br()->backgroundRed()->out('Sorry, this tool has expired, the latest version is available : ' . $update . ', please update again.');
    $climate->br()->info("usage : 'php run.php -update' or 'php run.php -u'");
    exit;
} else {
    exit;
}
/** End Cek Status */

/** Token Validation Function */

function tokenvalidation($url_based, $token){
    require_once('vendor/autoload.php');
    $climate = new League\CLImate\CLImate;

    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_based . "/me/?access_token=" . $token);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    
    $decode = json_decode($wahyuarifpurnomo);

    if($decode->error->message === "Malformed access token"){
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        require_once($type.".php");
        exit;
    }else if($decode->error->message == 'The access token could not be decrypted') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        require_once($type.".php");
        exit;
    }else if($decode->error->message == 'Error validating access token: The session has been invalidated because the user changed their password or Facebook has changed the session for security reasons.') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        require_once($type.".php");
        exit;
    }else if($decode->error->message == 'An active access token must be used to query information about the current user') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        require_once($type.".php");
        exit;
    }else{
        $climate->br()->backgroundGreen()->out('Hooray, the token was successfully verified!');
        sleep(3);
        $climate->br()->info('Hello, welcome ' .$decode->name);
        sleep(7);
    }
/** End check token */

/** Story */
$input = $climate->shout()->confirm('I have a story for you, do you want to hear it??');
$location = $decode->location->name;
$education = $decode->education[0]->school->name;
if ($input->confirmed()) {
    $climate->br()->info('Based on the data I have about you, your name must be ' . $decode->name .', you were born on ' . $decode->birthday . ', you are sex ' . $decode->gender .', I know, you must live in ' . $location . ', hmmm.. i know, you`re ' . $decode->relationship_status . ', and you are still in school at ' . $education);
    sleep(3);
    $warifp = $climate->br()->shout()->input('Yes? [enter to continue]');
    $response = $warifp->prompt();
} else {

}}
/** End Token Validation Function */
/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Version : 1.5
 * Update  : 15 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */