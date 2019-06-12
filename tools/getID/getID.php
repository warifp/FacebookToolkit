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

    $save_dir = "result/result_id.txt";
    
    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.2/me/friends/?fields=name,email&access_token=" . $token . "&limit=5000");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    
    $decode = json_decode($wahyuarifpurnomo);

    $total  = $decode->summary->total_count;
    $climate->br()->info('Found ' .$total . ' ID your friends');
    sleep(5);
    $climate->br()->info('Starting retrieve ID your friends..');
    echo "\n";
    progress($progress);
    $no = 0;
    foreach ($decode->data as $hasil) {
        $no++;
        $colorstring = getName($n);
        if (!empty($hasil->id)) {
            echo $no.".". $colors->getColoredString(" $hasil->name | $hasil->id", $warifp[$colorstring]) . "\n";
            $save = fopen($save_dir, 'a');
            fwrite($save, $hasil->id . "\n");
            fclose($save);
        }
    }

    echo "\n";
    $climate->br()->shout('Done, your result saved in folder "' .$save_dir . '"');
    
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