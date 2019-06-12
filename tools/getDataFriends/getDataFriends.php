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
error_reporting(0);

    $input = $climate->br()->input('Username or ID?');
    $id = $input->prompt();

    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_based . "/" . $id . "?access_token=" . $token);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    
    $decode = json_decode($wahyuarifpurnomo);
        $location = $decode->location->name;
        $colorstring = getName($n);
        echo $colors->getColoredString("> Name : $decode->name \n> Email : $decode->email \n> Phone : $decode->mobile_phone \n> ID : $decode->id \n> Location : $location \n> Bio : $decode->bio \n> Birthday : $decode->birthday \n> Gender : $decode->gender \n> Website : $decode->website \n> Link Profile : $decode->link \n> Religion : $decode->religion \n> Status : $decode->relationship_status \n", $warifp[$colorstring]) . "\n";
    
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