<?php

/**
 * @category  Social_Engineering
 * @package   FacebookToolkit++
 * @author    Wahyu Arif Purnomo <hi@warifp.co>
 * @copyright 2019 WARIFP
 * @license   MIT License <https://opensource.org/licenses/MIT>
 * @version   1.7
 * @link      https://github.com/warifp/FacebookToolkit
 * @since     15 June 2019
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
