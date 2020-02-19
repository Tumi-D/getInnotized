<?php

/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/14/2019
 * Time: 2:08 AM
 */

class FrameworkApi extends Controller
{

    public function userdata($userid = null)
    {

        $rs = new RestApi();
        $token  = $rs->getBearerToken();
        $tokenResponse  = $rs->verifyToken($token);

        print_r($tokenResponse);
    }
}
