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
$climate->br()->info('Starting unfriend or deleting your friends form data friends..');
echo "\n";
progress($progress);

$file = file_get_contents("$list");
$data = explode("\n", str_replace("\r", "", $file));
$x = 0;
for ($a = 0; $a < count($data); $a++) {
    $id   = $data[$a];
    $x++;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_based . "/me/friends?uid=" . $id . "&access_token=" . $token);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    $colorstring = getName($n);
    if ($wahyuarifpurnomo == true) {
        echo $x . "." . $colors->getColoredString(" ID : $id | Success unfriend ..", $warifp[$colorstring]) . "\n";
    } else {
        echo $x . "." . $colors->getColoredString(" ID : $id | Failed unfriend ..", $warifp[$colorstring]) . "\n";
    }
}

$climate->br()->shout('Done, unfriend or deleting your friends form data friends.');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
