<?php
/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */ 
//The name of the folder.
$folder = 'result';

//Get a list of all of the file names in the folder.
$files = glob($folder . '/*');

//Loop through the file list.
foreach($files as $file){

    if(is_file($file)){
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

/**
 * Author  : Wahyu Arif Purnomo
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */