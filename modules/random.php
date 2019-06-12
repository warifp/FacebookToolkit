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
$n=1; 
function getName($n) { 
    $characters = '123456789'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

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