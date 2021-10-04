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

ini_set('memory_limit', '-1');

$input = $climate->input('List?');
$list = $input->prompt();

$getfile = file_get_contents($list);
$data = explode("\r\n", $getfile);
$data = array_unique($data);

$no         = 0;

$save_result = "result/filter/yahoo.txt";

$climate->br()->info('Starting filter email yahoo.com only from your list..');
echo "\n";
progress($progress);

foreach ($data as $key => $email) {
    $colorstring = getName($n);
    $explode = explode("@", $email);
    if (!is_numeric($explode[0]) && filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/marketplace.amazon|example|test|auto|cdiscount.com/", $explode[0])) {

        if (preg_match("/yahoo.com/", $explode[1])) {
            $x = fopen($save_result, "a+");
            fwrite($x, $email . "\r\n");
            $no++;
            fclose($x);
        }
    }
    echo $no . "." . $colors->getColoredString(" $email", $warifp[$colorstring]) . "\n";
}

$climate->br()->shout('Done, filtering your list.');
sleep(3);
$climate->br()->shout('File result saved in folder : ' . $save_result);
