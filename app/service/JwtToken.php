<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/13/2019
 * Time: 7:08 AM
 */

use \Firebase\JWT\JWT;

class JwtToken extends RestApi
{

    public function __construct()
    {
        parent::__construct();
    }

    public function generateToken(){

        //Setting the required filednames for the api method
        $requiredfieldname  = ['apikey'];

        //Validating the fieldnames in the method
        $this->validateFieldNames($requiredfieldname);

        $apikey = $this->validateRequestParameters('apikey', $this->param['apikey'], STRING);

        // Verifying api key
        $usercount =  Apikeys::getApiDetails($apikey, 'count');
        if($usercount == 0){
            $this->returnResponse(INVALID_USER_CREDENTIALS, 'Incorrect API Key provided');
        }

        $userdata = Apikeys::getApiDetails($apikey, 'singledata');
        $userid  = $userdata->apid;
        $payload = [
            'iat'=> time(),
            'iss'=> 'localhost',
            'exp'=> time() + (3600),
            'userId'=> $userid
        ];
        try {
            $token = JWT::encode($payload, SECRET_KEY);
            $data = ['token' => $token];
            $this->returnResponse(SUCCESS_RESPONSE, $data);
        }catch (Exception $e){
            $this->throwErrror(JWT_PROCESSING_ERROR,  $e->getMessage() );
        }

    }


    public function loginuser(){

        $requiredfieldname  = ['username', 'password'];
        //Validating the fieldnames in the method
        $this->validateFieldNames($requiredfieldname);

        $username = $this->validateRequestParameters('username', $this->param['username'], STRING);
        $password = $this->validateRequestParameters('password', $this->param['password'], STRING);

        $token  = $this->getBearerToken();
        $tokenResponse  = $this->verifyToken($token);

        print_r($tokenResponse);

    }




}