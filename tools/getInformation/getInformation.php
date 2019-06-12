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
//error_reporting(0);

    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.2/me?fields=id,email,name,birthday,gender,friends,age_range&access_token=" . $token . "&limit=100");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    
    $decode = json_decode($wahyuarifpurnomo);
    $age = $decode->age_range->min;

    $climate->br()->info('Starting collect your Information..');
    echo "\n";
    progress($progress);

    $colorstring = getName($n);
    echo $colors->getColoredString("> Name : $decode->name \n> Email : $decode->email \n> ID : $decode->id \n> Birthday : $decode->birthday \n> Gender : $decode->gender \n> Age : $age", $warifp[$colorstring]) . "\n";

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