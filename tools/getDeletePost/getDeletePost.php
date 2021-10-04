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
curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.0/me?fields=feed.limit(500)&access_token=" . $token);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$wahyuarifpurnomo = curl_exec($curl);
curl_close($curl);

$decode = json_decode($wahyuarifpurnomo);

$climate->br()->info('Required retrieve ID Post');
sleep(3);
$climate->br()->info('Starting retrieve ID Post..');
echo "\n";
progress($progress);

$no = 0;
foreach ($decode->feed->data as $hasil) {
    $no++;
    $colorstring = getName($n);
    if (!empty($hasil->id)) {
        echo $no . "." . $colors->getColoredString(" $hasil->message | $hasil->id", $warifp[$colorstring]) . "\n";
        $save = fopen('tmp/id_post.log', 'a');
        fwrite($save, $hasil->id . "\n");
        fclose($save);
    }
}

$list = "tmp/id_post.log" or die("File ID not found!");
$climate->br()->info('Retrieve ID Post success');
sleep(3);
$climate->br()->info('Starting deleting your post..');
echo "\n";
progress($progress);


$file = file_get_contents("$list");
$data = explode("\n", str_replace("\r", "", $file));
$x = 0;
for ($a = 0; $a < count($data); $a++) {
    $id   = $data[$a];
    $x++;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_based . "/" . $id . "?method=delete&access_token=" . $token);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);

    $decode = json_decode($wahyuarifpurnomo);
    $colorstring = getName($n);
    if ($wahyuarifpurnomo === "true") {
        echo $x . "." . $colors->getColoredString(" POST ID : $id | Post deleted ..", $warifp[$colorstring]) . "\n";
    } else {
        echo $x . "." . $colors->getColoredString(" $wahyuarifpurnomo", $warifp[$colorstring]) . "\n";
    }
}

$climate->br()->shout('Done, deleting your post.');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id_post.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
