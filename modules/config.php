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

$version        = "1.7";
$build          = "08 June 2019";
$name           = "Facebook Toolkit++";
$author         = "Wahyu Arif Purnomo";
$update         = "02 November 2019 17.23";
$url_based      = "https://graph.facebook.com";
$url_token      = "config/token.txt";
$cek_connection = "graph.facebook.com";
$progress;
$url_valid = "http://widhitools.000webhostapp.com/api/yahoo.php";
$url_brute = "https://m.facebook.com";
$token = file_get_contents($url_token);
$banner    = "
 _______  _______    _       _      ||
|       ||       | _| |_   _| |_    || Author  : $author
|    ___||_     _||_   _| |_   _|   || Version : $version
|   |___   |   |    |_|     |_|     || Build   : $build
|    ___|  |   |                    || Update  : $update
|   |      |   | Facebook Toolkit++ || Name    : $name
|___|      |___|        @2019       ||

[!] a tool to get Facebook data, and some Facebook bots, and extra tools found on Facebook Toolkit++

";

$data_socialmedia = [
    [
        "Facebook", "https://www.facebook.com/warifp",
    ],
    [
        "Instagram", "https://www.instagram.com/warifp",
    ],
    [
        "Twitter", "https://www.twitter.com/wahyuarifp",
    ],
    [
        "Linkedin", "https://id.linkedin.com/in/warifp",
    ],
    [
        "Github", "https://www.github.com/warifp",
    ],
];

$climate->arguments->add(
    [
        "menu" => [
            "prefix" => "m",
            "longPrefix" => "menu",
            "description" => "tool menu",
            "noValue" => true,
        ],
        "version" => [
            "prefix" => "v",
            "longPrefix" => "version",
            "description" => "version",
            "noValue" => true,
        ],
        "author" => [
            "prefix" => "a",
            "longPrefix" => "author",
            "description" => "owner",
            "noValue" => true,
        ],
        "update" => [
            "prefix" => "u",
            "longPrefix" => "update",
            "description" => "update version",
            "noValue" => true,
        ], "help" => [
            "prefix" => "h",
            "longPrefix" => "help",
            "description" => "help",
            "noValue" => true,
        ],
    ]
);
$climate->arguments->parse();

if ($climate->arguments->defined("menu")) {
    $climate->br()->info("please wait, load the list menu");
    sleep(7);
    progress($progress);
    $climate->bold()->backgroundRed()->Table($data_menu);
    exit;
} else if ($climate->arguments->defined("version")) {
    echo $version;
    exit;
} else if ($climate->arguments->defined("author")) {
    echo $author;
    exit;
} else if ($climate->arguments->defined("update")) {
    system("git fetch --all");
    system("git reset --hard origin/master");
    system("git pull origin master");
    exit;
} else if ($climate->arguments->defined("help")) {
    $climate->usage();
    exit;
} else {
}

$climate->br()->info("Oops, additional programs are needed to run this tool.");
sleep(5);
$climate->br()->info("Start a check for needs..");
progress($progress);
if (!fsockopen("$cek_connection", 80)) {
    die("" . $climate->br()->backgroundRed()->out("Could not open the server, connection issues?"));
}
if (phpversion() < "7.0.0") {
    die("" . $climate->br()->backgroundRed()->out("Your PHP Version is " . phpversion() . ", this PHP Version no support, please update to PHP Version 7."));
}
if (!function_exists("curl_init")) {
    die("" . $climate->br()->backgroundRed()->out("cURL not found! please install cURL"));
}

$climate->br()->backgroundGreen()->out("Congratulations, the requirements for the program have been fulfilled.");

sleep(5);
print $banner;
sleep(3);
$climate->table($data_socialmedia);
sleep(3);

/**
 * Token Validation Function 
 */

function tokenvalidation($url_based, $token)
{
    include_once 'vendor/autoload.php';
    $climate = new League\CLImate\CLImate;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_based . "/me/?access_token=" . $token);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);

    $decode = json_decode($wahyuarifpurnomo);

    if ($decode->error->message === "Malformed access token") {
        $climate->br()->backgroundRed()->out('Sorry, ' . $decode->error->message . ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        include_once $type . ".php";
        exit;
    } else if ($decode->error->message == 'The access token could not be decrypted') {
        $climate->br()->backgroundRed()->out('Sorry, ' . $decode->error->message . ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        include_once $type . ".php";
        exit;
    } else if ($decode->error->message == 'Error validating access token: The session has been invalidated because the user changed their password or Facebook has changed the session for security reasons.') {
        $climate->br()->backgroundRed()->out('Sorry, ' . $decode->error->message . ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        include_once $type . ".php";
        exit;
    } else if ($decode->error->message == 'An active access token must be used to query information about the current user') {
        $climate->br()->backgroundRed()->out('Sorry, ' . $decode->error->message . ', please correct it!');
        $type = "tools/getAccessToken/getAccessToken";
        include_once $type . ".php";
        exit;
    } else {
        $climate->br()->backgroundGreen()->out('Hooray, the token was successfully verified!');
        sleep(3);
        $climate->br()->info('Hello, welcome ' . $decode->name);
        sleep(7);
    }
    /**
     * End check token 
     */

    /**
     * Story 
     */
    $input = $climate->shout()->confirm('I have a story for you, do you want to hear it??');
    $location = $decode->location->name;
    $education = $decode->education[0]->school->name;
    if ($input->confirmed()) {
        $climate->br()->info('Based on the data I have about you, your name must be ' . $decode->name . ', you were born on ' . $decode->birthday . ', you are sex ' . $decode->gender . ', I know, you must live in ' . $location . ', hmmm.. i know, you`re ' . $decode->relationship_status . ', and you are still in school at ' . $education);
        sleep(3);
        $warifp = $climate->br()->shout()->input('Yes? [enter to continue]');
        $response = $warifp->prompt();
    } else {
    }
}
/**
 * End Token Validation Function 
 */
