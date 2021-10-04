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

$save_dir = "result/result_relationship.txt";
$save_dir_name = "result/result_name-relationship.txt";

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

$list = "tmp/id.log" or die("File ID not found!");
$climate->br()->info('Retrieve ID success');
sleep(3);
$climate->br()->info('Starting retrieve relationship status your friends..');
echo "\n";
progress($progress);

$file = file_get_contents("$list");
$data = explode("\n", str_replace("\r", "", $file));
$x = 0;
for ($a = 0; $a < count($data); $a++) {
    $id   = $data[$a];
    $x++;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_based . "/" . $id . "?access_token=" . $token);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);

    $decode = json_decode($wahyuarifpurnomo);
    $colorstring = getName($n);
    echo $x . "." . $colors->getColoredString(" $decode->name | $decode->relationship_status", $warifp[$colorstring]) . "\n";

    $save = fopen($save_dir, 'a');
    $save_name = fopen($save_dir_name, 'a');

    fwrite($save, $decode->relationship_status . "\n");
    fwrite($save_name, $decode->name . "|" . $decode->relationship_status . "\n");

    fclose($save);
    fclose($save_name);
}

$climate->br()->shout('Done, your result saved in folder "' . $save_dir . '" and "' . $save_dir_name . '".');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
