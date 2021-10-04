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

error_reporting(0);

/**
 * Library 
 */

require_once 'vendor/autoload.php';
require_once 'modules/color.php';
require_once 'modules/random.php';

$climate = new League\CLImate\CLImate;

require_once 'modules/progress.php';
require_once 'modules/menu.php';
require_once 'modules/config.php';

/**
 * End Library 
 */
sleep(3);

/**
 * Check token 
 */
$climate->br()->info('Wait a minute, is check and validating access to Facebook tokens..');
$climate->br();
sleep(5);
progress($progress);

if ($token === "") {
    $climate->br()->backgroundRed()->out('Oops, Facebook access token is not detected');
    $type = "tools/getAccessToken/getAccessToken";
    include_once $type . ".php";
    exit;
} else {
    $climate->br()->backgroundBlue()->out('Well, access to Facebook tokens was detected');
    sleep(3);
}

/**
 * Token validation and story 
 */
tokenvalidation($url_based, $token);
/**
 * End Token validation and story 
 */

/**
 * Arguments Usage 
 */
echo "\n";
$climate->usage();
/**
 * End Arguments Usage 
 */

/**
 * Select 
 */
$input_pilih = $climate->br()->shout()->input('> Enter your choice (1-29) : ');

$pilih = $input_pilih->prompt();
/**
 * End Select 
 */

if ($pilih > 29 or $pilih < 1) {
    $climate->br()->error('Options not available, please choose existing ones!');

    /**
     * Enter Select return 
     */
    $input_pilih = $climate->br()->shout()->input('> Enter your choice (1-29) : ');

    $pilih = $input_pilih->prompt();
    /**
     * End Select return 
     */

    if ($pilih > 29 or $pilih < 1) {
        $type = "wahyuarifpurnomo";
    }
}
if ($pilih == 1) {
    $type = "tools/getAccessToken/getAccessToken";
    $namatools = "\e[1;32mget Token\e[0m";
} elseif ($pilih == 2) {
    $type = "tools/getInformation/getInformation";
    $namatools = "\e[1;32maccount information\e[0m";
} elseif ($pilih == 3) {
    $type = "tools/getID/getID";
    $namatools = "\e[1;32mdump ID your friends\e[0m";
} elseif ($pilih == 4) {
    $type = "tools/getEmail/getEmail";
    $namatools = "\e[1;32mdump email your friends\e[0m";
} elseif ($pilih == 5) {
    $type = "tools/getName/getName";
    $namatools = "\e[1;32mdump name your friends\e[0m";
} elseif ($pilih == 6) {
    $type = "tools/getBirthday/getBirthday";
    $namatools = "\e[1;32mdump birthday your friends\e[0m";
} elseif ($pilih == 7) {
    $type = "tools/getGender/getGender";
    $namatools = "\e[1;32mdump gender your friends\e[0m";
} elseif ($pilih == 8) {
    $type = "tools/getLocation/getLocation";
    $namatools = "\e[1;32mdump location your friends\e[0m";
} elseif ($pilih == 9) {
    $type = "tools/getLink/getLink";
    $namatools = "\e[1;32mdump url profile your friends\e[0m";
} elseif ($pilih == 10) {
    $type = "tools/getPhone/getPhone";
    $namatools = "\e[1;32mdump mobile number your friends\e[0m";
} elseif ($pilih == 11) {
    $type = "tools/getReligion/getReligion";
    $namatools = "\e[1;32mdump religion your friends\e[0m";
} elseif ($pilih == 12) {
    $type = "tools/getRelationship/getRelationship";
    $namatools = "\e[1;32mdump relationship your friends\e[0m";
} elseif ($pilih == 13) {
    $type = "tools/getUsername/getUsername";
    $namatools = "\e[1;32mdump username your friends\e[0m";
} elseif ($pilih == 14) {
    $type = "tools/getBio/getBio";
    $namatools = "\e[1;32mdump bio your friends\e[0m";
} elseif ($pilih == 15) {
    $type = "tools/getAbout/getAbout";
    $namatools = "\e[1;32mdump about your friends\e[0m";
} elseif ($pilih == 16) {
    $type = "tools/getYahooFilter/getYahooFilter";
    $namatools = "\e[1;32mfilter email your friends\e[0m";
} elseif ($pilih == 17) {
    $type = "tools/getYahooMailValidation/getYahooMailValidation";
    $namatools = "\e[1;32mvalidation email your friends\e[0m";
} elseif ($pilih == 18) {
    $type = "tools/clean/clean";
    $namatools = "\e[1;32mclean folder result\e[0m";
} elseif ($pilih == 19) {
    $type = "tools/getDeletePost/getDeletePost";
    $namatools = "\e[1;32mdelete your all post\e[0m";
} elseif ($pilih == 20) {
    $type = "tools/getUnfriend/getUnfriend";
    $namatools = "\e[1;32munfriend all\e[0m";
} elseif ($pilih == 21) {
    $type = "tools/getConfirmationFriends/getConfirmationFriends";
    $namatools = "\e[1;32mconfirmation all friends\e[0m";
} elseif ($pilih == 22) {
    $type = "tools/getConfirmationFriendsMale/getConfirmationFriendsMale";
    $namatools = "\e[1;32mconfirmation your all male friends\e[0m";
} elseif ($pilih == 23) {
    $type = "tools/getConfirmationFriendsFemale/getConfirmationFriendsFemale";
    $namatools = "\e[1;32mconfirmation your all male friends\e[0m";
} elseif ($pilih == 24) {
    $type = "tools/getDataFriends/getDataFriends";
    $namatools = "\e[1;32mview all data your friends\e[0m";
} elseif ($pilih == 25) {
    $type = "tools/getIDMemberGroup/getIDMemberGroup";
    $namatools = "\e[1;32mview all data ID member group\e[0m";
} elseif ($pilih == 26) {
    $type = "tools/getUsernameMemberGroup/getUsernameMemberGroup";
    $namatools = "\e[1;32mview all data username member group\e[0m";
} elseif ($pilih == 27) {
    $type = "tools/getLinkMemberGroup/getLinkMemberGroup";
    $namatools = "\e[1;32mview all data link member group\e[0m";
} elseif ($pilih == 28) {
    $type = "tools/getBruteID/getBruteID";
    $namatools = "\e[1;32mbrute force your friends by ID\e[0m";
} elseif ($pilih == 29) {
    $type = "tools/getBruteIDMemberGroup/getBruteIDMemberGroup";
    $namatools = "\e[1;32mbrute force Member Group by ID\e[0m";
}
if ($type == "wahyuarifpurnomo") {
    $climate->br()->error("You don't choose anywhere tools.");
} else {
    $climate->br()->info('You have selected tools ' . $namatools);
    $climate->br()->info('load the tool you requested');
    $climate->br();
    progress($progress);

    include_once $type . ".php";
}
