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

$input = $climate->br()->input('List?');
$list = $input->prompt();

$file = file_get_contents("$list");
$data = explode("\n", str_replace("\r", "", $file));
$x = 0;
$save_live = "result/validation/live.txt";
$save_dead = "result/validation/dead.txt";

$climate->br()->info('Starting validation your email..');
echo "\n";
progress($progress);

for ($a = 0; $a < count($data); $a++) {
    $email   = $data[$a];
    $x++;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_valid . '?email=' . $email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, true);
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers   = array();
    $headers[] = 'Connection: Keep-Alive';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $hasil = json_decode($result);
    curl_close($ch);

    $colorstring = getName($n);

    if ($hasil->status === "live") {
        echo $x . "." . $colors->getColoredString(" $email | ", $warifp[$colorstring]) . "\e[1;92mLive\e[0m\n";
        $warifp = fopen($save_live, "a+");
        fwrite($warifp, $email . "\r\n");
    } else {
        echo $x . "." . $colors->getColoredString(" $email | ", $warifp[$colorstring]) . "\e[0;31mDead\e[0m\n";
        $warifp = fopen($save_dead, "a+");
        fwrite($warifp, $email . "\r\n");
    }
}

$climate->br()->shout('Done, validation your list.');
sleep(3);
$climate->br()->shout('File result saved in folder :');
$climate->shout('Live : ' . $save_live);
$climate->shout('Dead : ' . $save_dead);
