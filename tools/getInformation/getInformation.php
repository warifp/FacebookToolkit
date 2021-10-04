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
