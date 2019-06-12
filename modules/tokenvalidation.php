<?php
/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */
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
        exit;
    }else if($decode->error->message == 'The access token could not be decrypted') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        exit;
    }else if($decode->error->message == 'Error validating access token: The session has been invalidated because the user changed their password or Facebook has changed the session for security reasons.') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
        exit;
    }else if($decode->error->message == 'An active access token must be used to query information about the current user') {
        $climate->br()->backgroundRed()->out('Sorry, ' .$decode->error->message. ', please correct it!');
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

/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */