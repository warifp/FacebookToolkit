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
//error_reporting(0);
ini_set('memory_limit', '-1');  

    $input = $climate->input('List?');
    $list = $input->prompt();
    
    $getfile = file_get_contents($list);
    $data = explode("\r\n", $getfile);
    $data = array_unique($data);

    $no 		= 0;

    $save_result = "result/filter/yahoo.txt";

    $climate->br()->info('Starting filter email yahoo.com only from your list..');
    echo "\n";
    progress($progress);

foreach ($data as $key => $email) {
    $colorstring = getName($n);
	$explode = explode("@", $email);
	if(! is_numeric($explode[0]) && filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/marketplace.amazon|example|test|auto|cdiscount.com/", $explode[0])){
		
		if(preg_match("/yahoo.com/", $explode[1])){
			$x = fopen($save_result, "a+");
            fwrite($x, $email."\r\n");
            $no++;
			fclose($x);
		}
    }
    echo $no . "." . $colors->getColoredString(" $email", $warifp[$colorstring]) . "\n";
}

    $climate->br()->shout('Done, filtering your list.');
    sleep(3);
    $climate->br()->shout('File result saved in folder : ' .$save_result);

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