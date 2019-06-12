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
$version = 1.4;
$author = "Wahyu Arif Purnomo";
$build = "8 June 2019";
$update = "12 June 2019";
$name = "Facebook Toolkit++";
$url_based = "https://graph.facebook.com";
$url_valid = "http://widhitools.000webhostapp.com/api/yahoo.php";
$token = file_get_contents('config/token.txt');

$banner     = "
 _______  _______    _       _      ||
|       ||       | _| |_   _| |_    || Author  : $author
|    ___||_     _||_   _| |_   _|   || Version : $version
|   |___   |   |    |_|     |_|     || Build   : 08 June 2019
|    ___|  |   |                    || Update  : $update
|   |      |   | Facebook Toolkit++ || Name    : $name
|___|      |___|        @2019       ||

[!] a tool to get Facebook data, and some Facebook bots, and extra tools found on Facebook Toolkit++

";
$data_socialmedia = [
    [
      'Facebook',
      'https://www.facebook.com/warifp',
    ],
    [
      'Instagram',
      'https://www.instagram.com/warifp',
    ],
    [
      'Twitter',
      'https://www.twitter.com/wahyuarifp',
    ],
    [
      'Linkedin',
      'https://id.linkedin.com/in/warifp',
    ],
    [
      'Github',
      'https://www.github.com/warifp',
    ],
];

$climate->arguments->add([
    'menu' => [
        'prefix'      => 'm',
        'longPrefix'  => 'menu',
        'description' => 'display the tool menu',
        'noValue'     => true,
    ],
    'version' => [
        'prefix'      => 'v',
        'longPrefix'  => 'version',
        'description' => 'display version',
        'noValue'     => true,
    ],
    'author' => [
        'prefix'      => 'a',
        'longPrefix'  => 'author',
        'description' => 'display the maker or owner',
        'noValue'     => true,
    ],
    'update' => [
        'prefix'      => 'u',
        'longPrefix'  => 'update',
        'description' => 'display the date of the latest update',
        'noValue'     => true,
    ],
    'help' => [
        'prefix'      => 'h',
        'longPrefix'  => 'help',
        'description' => 'Help output',
        'noValue'     => true,
    ],
]);

$climate->arguments->parse();

if($climate->arguments->defined('menu')){
    $climate->br()->info('please wait, load the list menu');
    sleep(7);
    progress($progress);
    $climate->bold()->backgroundRed()->Table($data_menu);
    exit;
}else if($climate->arguments->defined('version')){
    echo $version;
    exit;
}else if($climate->arguments->defined('author')){
    echo $author;
    exit;
}else if($climate->arguments->defined('update')){
    echo $update;
    exit;
}else if($climate->arguments->defined('help')){
    $climate->usage();
    exit;
}else{

}
print $banner;
sleep(3);
$climate->table($data_socialmedia);

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