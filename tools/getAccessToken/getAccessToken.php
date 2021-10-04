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

/* End Library */
define('API_SECRET', '62f8ce9f74b12f84c123cc23437a4a32');
define('BASE_URL', 'https://api.facebook.com/restserver.php');
/**
 * End Library 
 */

$save_dir = "config/token.txt";

$input_username = $climate->br()->info()->input('Username?');
$username = $input_username->prompt();

$input_password = $climate->br()->info()->input('Password?');
$password = $input_password->prompt();

sleep(3);

$climate->br()->info('Starting get access token facebook..');
echo "\n";
progress($progress);

function sign_creator(&$data)
{
    $sig = "";
    foreach ($data as $key => $value) {
        $sig .= "$key=$value";
    }
    $sig .= API_SECRET;
    $sig = md5($sig);
    return $data['sig'] = $sig;
}
function cURL($method = 'GET', $url = false, $data)
{
    $c = curl_init();
    $user_agents = array(
        "Mozilla/5.0 (Linux; Android 5.0.2; Andromax C46B2G Build/LRX22G) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/37.0.0.0 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/60.0.0.16.76;]",
        "[FBAN/FB4A;FBAV/35.0.0.48.273;FBDM/{density=1.33125,width=800,height=1205};FBLC/en_US;FBCR/;FBPN/com.facebook.katana;FBDV/Nexus 7;FBSV/4.1.1;FBBK/0;]",
        "Mozilla/5.0 (Linux; Android 5.1.1; SM-N9208 Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.81 Mobile Safari/537.36",
        "Mozilla/5.0 (Linux; U; Android 5.0; en-US; ASUS_Z008 Build/LRX21V) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.8.0.718 U3/0.8.0 Mobile Safari/534.30",
        "Mozilla/5.0 (Linux; U; Android 5.1; en-US; E5563 Build/29.1.B.0.101) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.10.0.796 U3/0.8.0 Mobile Safari/534.30",
        "Mozilla/5.0 (Linux; U; Android 4.4.2; en-us; Celkon A406 Build/MocorDroid2.3.5) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1"
    );
    $useragent = $user_agents[array_rand($user_agents)];
    $opts = array(
        CURLOPT_URL => ($url ? $url : BASE_URL) . ($method == 'GET' ? '?' . http_build_query($data) : ''),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT => $useragent
    );
    if ($method == 'POST') {
        $opts[CURLOPT_POST] = true;
        $opts[CURLOPT_POSTFIELDS] = $data;
    }
    curl_setopt_array($c, $opts);
    $d = curl_exec($c);
    curl_close($c);
    return $d;
}
$data = array(
    "api_key" => "882a8490361da98702bf97a021ddc14d",
    "credentials_type" => "password",
    "email" => $username,
    "format" => "JSON",
    "generate_machine_id" => "1",
    "generate_session_cookies" => "1",
    "locale" => "en_US",
    "method" => "auth.login",
    "password" => $password,
    "return_ssl_resources" => "0",
    "v" => "1.0"
);

sign_creator($data);
$response = cURL('GET', false, $data);
$decode = json_decode($response);

$save_token = $decode->access_token;

$save = fopen($save_dir, 'w');
fwrite($save, $save_token);

$climate->br()->info('Your token ' . $save_token);
$climate->br()->shout('Done, your token saved in folder ' . $save_dir);

/**
 * Reference : https://github.com/minhkhoa2000/Facebook-Api/
 */
