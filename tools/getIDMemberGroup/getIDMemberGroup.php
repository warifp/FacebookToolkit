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

$save_dir = "result/result_IDmembergroup_" . $name_group . ".txt";
$save_dir_name = "result/result_name-IDmembergroup_" . $name_group . ".txt";

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

        $save = fopen($save_dir, 'a');
        $save_name = fopen($save_dir_name, 'a');

        fwrite($save, $hasil->id . "\n");
        fwrite($save_name, $hasil->name . "|" . $hasil->id . "\n");

        fclose($save);
        fclose($save_name);
    }
}

$climate->br()->shout('Done, your result saved in folder "' . $save_dir . '" and "' . $save_dir_name . '".');
$climate->br()->info('Cleaning log..');
echo "\n";
progress($progress);
$delete = "tmp/id_membergroup.log";
unlink($delete) or die("\e[1;31mCouldn't delete file, file not found\e[0m");
sleep(3);
$climate->br()->info('Done cleaning log.');
