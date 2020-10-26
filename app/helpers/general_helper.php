<?php

// use PHPMailer\PHPMailer\PHPMailer;
use Latte\Engine;

function generateApikey()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((float) microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = chr(123)
            . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12)
            . chr(125);
        $guid = $uuid;
        $str = array("{", "}");
        return str_replace($str, "", $guid);
    }
}

function privilege($accountype)
{
    if ($accountype == 'Merchant') {
        $access = 100;
    }
    if ($accountype == 'Super Agent') {
        $access = 110;
    }
    return $access;
}


function randomToken($length = 5)
{
    if (!isset($length) || intval($length) <= 8) {
        $length = 32;
    }
    if (function_exists('random_bytes')) {
        return bin2hex(random_bytes($length));
    }
    if (function_exists('openssl_random_pseudo_bytes')) {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }
}

function view($path,$data)
{
    try {
        $path = APPROOT."\\views\\$path.latte";
        $latte = new Engine;
        $latte->setTempDirectory(APPROOT."\\temp\\");
        // render to output
        $latte->render($path, $data);
    } catch (\Throwable $th) {
        echo json_encode($th->getMessage());
    }
   
    // or render to string
    // $html = $latte->renderToString('template.latte', $params);
}



function testinput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function Salt()
{
    return substr(strtr(base64_encode(hex2bin(randomToken(5))), '+', '.'), 0, 44);
}
