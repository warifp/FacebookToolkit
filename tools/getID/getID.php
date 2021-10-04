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

$save_dir = "result/result_id.txt";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.2/me/friends/?fields=name,email&access_token=" . $token . "&limit=5000");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$wahyuarifpurnomo = curl_exec($curl);
curl_close($curl);

$decode = json_decode($wahyuarifpurnomo);

$total  = $decode->summary->total_count;
$climate->br()->info('Found ' . $total . ' ID your friends');
sleep(5);
$climate->br()->info('Starting retrieve ID your friends..');
echo "\n";
progress($progress);
$no = 0;
foreach ($decode->data as $hasil) {
    $no++;
    $colorstring = getName($n);
    if (!empty($hasil->id)) {
        echo $no . "." . $colors->getColoredString(" $hasil->name | $hasil->id", $warifp[$colorstring]) . "\n";
        $save = fopen($save_dir, 'a');
        fwrite($save, $hasil->id . "\n");
        fclose($save);
    }
}

echo "\n";
$climate->br()->shout('Done, your result saved in folder "' . $save_dir . '"');
