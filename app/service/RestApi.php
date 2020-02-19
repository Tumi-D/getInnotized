<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/12/2019
 * Time: 1:41 PM
 */

use \Firebase\JWT\JWT;

class RestApi
{

    protected $request;
    protected $serviceName;
    protected $param;

    public function __construct()
    {


        // Verifying the request method
//        if($_SERVER['REQUEST_METHOD'] !== 'POST' || $_SERVER['REQUEST_METHOD'] !== 'GET' ){
//            echo $_SERVER['REQUEST_METHOD'];
//
//           $this->throwErrror(REQUEST_METHOD_NOT_VALID,  'Request Method is not valid');
//        }
//
//        // Getting post data from stream
//        $handler = fopen('php://input', 'r');
//        $this->request = stream_get_contents($handler);
//
//        //Validating the request
//        $this->validateRequest();

        $this->validateRequestMethod();

    }

    public function validateRequestMethod(){
        $serverRequest = $_SERVER['REQUEST_METHOD'];
        if($serverRequest == 'POST'){
            // Getting post data from stream
            $handler = fopen('php://input', 'r');
            $this->request = stream_get_contents($handler);

            //Validating the request
            $this->validateRequest();
        }

    }

    public function validateRequest(){
        if($_SERVER['CONTENT_TYPE'] !== 'application/json'){
            $this->throwErrror(REQUEST_CONTENTTYPE_NOT_VALID, 'Request Content-type not valid');
        }

        $data = json_decode($this->request, true);

        if(!isset($data['name']) || $data['name'] == ''){
            $this->throwErrror(API_NAME_REQUIRED, 'API name required');
        }

        $this->serviceName = $data['name'];

        if(!isset($data['param'])){
            $this->throwErrror(API_PARAM_REQUIRED, 'API parameters required');
        }
        $this->param =  $data['param'];

        if(!is_array($this->param)){
            $this->throwErrror(API_PARAM_REQUIRED, 'API parameters required');
        }


    }

    public function processApi(){
        try {
            $res = new JwtToken();
            $rMethod = new reflectionMethod('JwtToken', $this->serviceName);
            if (!method_exists($res, $this->serviceName)) {
                $this->throwErrror(API_DOES_NOT_EXIST, 'API does not exist');
            }
            $rMethod->invoke($res);
        } catch(Exception $e){
            $this->throwErrror(API_DOES_NOT_EXIST, 'API does not exist');
        }
    }

    public function validateRequestParameters($fieldname, $value, $datatype, $required = true){

        if($required == true && empty($value) == true){
            $this->throwErrror(VALIDATE_PARAMETER_REQUIRED, "$fieldname parameter is required" );
        }

        switch ($datatype){
            CASE BOOLEAN:
                if(!is_bool($value)){
                    $this->throwErrror(VALIDATE_DATATYPE_REQUIRED, "Datatype is not valid for $fieldname. It must be a boolean");
                }
                break;
            CASE INT:
                if(!is_numeric($value)){
                    $this->throwErrror(VALIDATE_DATATYPE_REQUIRED, "Datatype is not valid for $fieldname. It must numeric");
                }
                break;
            CASE STRING:
                if(!is_string($value)){
                    $this->throwErrror(VALIDATE_DATATYPE_REQUIRED, "Datatype is not valid for $fieldname. It must be a string");
                }
                break;

            default:
                $this->throwErrror(VALIDATE_DATATYPE_REQUIRED, "Datatype is not valid for $fieldname");
                break;
        }

        return $value;
    }

    public function validateFieldNames($requirefieldnames){
        $fieldarray = array_keys($this->param);

        foreach($requirefieldnames as $field){
            if(!in_array($field, $fieldarray)){
                $this->throwErrror(INCORRECT_FIELD_NAME, "Incorrect field names passed ");
            }
        }
    }

    public function throwErrror($code, $message){

        header('content-type: application/json');
        $errormsg  = ['error'=>["status"=>$code,  'message'=>$message]];
        echo json_encode($errormsg);
        exit;
    }



    public function returnResponse($code, $data){

        header('content-type: application/json');
        $responsemsg  = ['response'=>["status"=>$code,  'result'=>$data]];
        echo json_encode($responsemsg);
        exit;
    }


    // Get Authorization Token
    public function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();

            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }


    // Get access token from header
    public function getBearerToken() {
        $headers = $this->getAuthorizationHeader();

        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }

        header('content-type: application/json');
        $errormsg  = ['error'=>["status"=>AUTHORIZATION_HEADER_NOT_FOUND,  'message'=>'Access Token Not Found']];
        echo json_encode($errormsg);
        exit;

    }


    public function verifyToken($token){

        try{
            $payload  = JWT::decode($token, SECRET_KEY, ['HS256']);
          
            if(isset($payload->userId)){
                $this->returnResponse(SUCCESS_RESPONSE, 'Success');
            }else{
               $this->throwErrror(INVALID_AUTH_TOKEN, 'Invalid Authorization token');
            }
        }catch(Exception $e){
            $this->throwErrror(JWT_PROCESSING_ERROR,  $e->getMessage() );
        }

    }





}