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

//The name of the folder.
$folder = 'result';

//Get a list of all of the file names in the folder.
$files = glob($folder . '/*');

//Loop through the file list.
foreach ($files as $file) {

    if (is_file($file)) {
        //Use the unlink function to delete the file.
        unlink($file);
    }
}

echo "\n";
$climate->info('Start cleaning folder "' . $folder . '"');
sleep(3);
echo "\n";
$climate->info('Cleaning "' . $folder . '"');
progress($progress);
echo "\n";
$climate->info('Done cleaning "' . $folder . '"');
