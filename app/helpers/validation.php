<?php

use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;
use Twilio\TwiML\Voice\Say;

/**
 *validate() checks various validation rules and returns specific errors for said rules
 *per method specified examples as a json or to a specific route.
 * @param  array
 * @param  array
 * @return array
 */
function validate($rules = [], $page = '', $exceptions = [])
{
    // sendSMS();
    // validatePhoneNumber('0267205395');
    foreach ($rules as $key => $value) {
        $key = $_POST[$key] = isset($_POST[$key]) ? $_POST[$key] : '';
    }


    // makeCall();
    $errors = array();
    if (empty($rules)) {
        // extract($_POST);
        $postfields = (array_keys($_POST));
        foreach ($postfields as $key => $post) {
            if (testinput(empty($_POST[$post])) && !in_array($post, $exceptions)) {
                $message = array($post => array($post . ' field is required'));
                $errors = $message + $errors;
            }
        }
    } else {
        $errors = checkIsRequired($rules, $errors);
        $errors = checkForString($rules, $errors);
        $errors = checkUniqueFields($rules, $errors);
        $errors = checkEmailValidity($rules, $errors);
        $errors = checkMinLength($rules,  $errors);
        $errors = checkMaxLength($rules,  $errors);
        $errors = checkIFNumeric($rules, $errors);
        $errors = validateFiles($rules, $errors);
        $errors = checkForUrl($rules, $errors);
        $errors = sanitizeErrors($errors);
        // return $errors;
        $errorinfo = array(
            'error' => $errors,
            // 'version' => "1.0.0",
            // 'company' => "Softmasters Group",
            "software" => COMPANYNAME
        );
        //Update will implement later
        if (count((array) $errors) && $page != '' && $page != "json") {
            $data['error'] =   $errors;
            $error = new Controller();
            $error->view($page, $data);
            die;
        } elseif ($page != '' && $page == 'json' && count((array) $errors)) {
            header('Content-Type,application/json');
            echo json_encode($errorinfo);
            die;
        } elseif ($page == '') {
            return $errors;
        }
        else {
            return $errors;
        }
    }
}

/**
 *checkPhoneValidity() checks if parameter is required
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function checkPhoneValidity($rules = [],  $errors = array())
{

    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (!empty(testinput($_POST[$key]) && in_array('phone', $array))) {
            $message = array($key => array($key . 'Invalid  phone number'));
            array_push($errors, $message);
        }
    }
    return $errors;
}


/*checkIFNumeric checks if value is a number
* @param  array rules
* @param  array errors
* @return array errors
*/
function checkIFNumeric($rules = [],  $errors = array())
{

    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (!empty(testinput($_POST[$key]) && in_array('numeric', $array) && !is_numeric(testinput($_POST[$key])))) {
            $message = array($key => array($key . ' value must be a number'));
            array_push($errors, $message);
        }
    }

    return $errors;
}

/**
 *checkIsRequired checks if parameter is required
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function checkIsRequired($rules = [],  $errors = array())
{

    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (testinput(isset($_POST[$key]) && empty($_POST[$key]) && in_array('required', $array))) {
            $message = array($key => array($key . ' field is required'));
            array_push($errors, $message);
        }
    }
    return $errors;
}

/**
 * checkMinLength checks if minimum length is reached
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function checkMinLength($rules = [],  $errors = array())
{
    foreach ($rules as $key => $myvalue) {
        $array = explode('|', $myvalue);
        foreach ($array as $int => $value) {
            if (preg_match('/min/', $value) && !empty($_POST[$key])) {
                $max = explode(':', $value);
                $maxvalue = $max[1];
                $value = $_POST[$key];
                $value = (string) $value;
                $maxvalue = (int) $maxvalue;
                $valuelength = strlen($value);
                $message = array($key => array($key . " must be > or = {$maxvalue}"));
                $maxvalue > $valuelength ? array_push($errors, $message) : '';
            }
        }
    }
    return $errors;
}

/**
 *checks if maximum length is reached
 * @param  mixed
 * @return bool
 */
function checkMaxLength($rules = [],  $errors = array())
{

    foreach ($rules as $key => $myvalue) {
        $array = explode('|', $myvalue);
        foreach ($array as $int => $value) {
            if (preg_match('/max/', $value)) {
                $max = explode(':', $value);
                $maxvalue = $max[1];
                $value = $_POST[$key];
                $value = (string) $value;
                $maxvalue = (int) $maxvalue;
                $valuelength = strlen($value);
                $message = array($key => array($key . ' exceeded maximum length must be < or = ' . $maxvalue . " value entered is " . $valuelength));
                $maxvalue < $valuelength ? array_push($errors, $message) : '';
            }
        }
    }
    return $errors;
}

/**
 *checks if email is valid
 * @param  mixed
 * @return bool
 */
function checkEmailValidity($rules = [],  $errors = array())
{
    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo ("$email is a valid email address");
    // } else {
    //     echo ("$email is not a valid email address");
    // }
    // !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", testinput($_POST[$key])
    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (in_array('email', $array) && !empty($_POST[$key]) && !filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
            $message = array($key => array($key . ' is invalid  .Email  is incorrect'));
            array_push($errors, $message);
        }
    }
    return $errors;
}


/**
 *Checks if input is a valid String
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function checkForString($rules = [],  $errors = array())
{
    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (in_array('string', $array) && !empty($_POST[$key]) && !preg_match('/^[A-Za-z_-]*$/', testinput($_POST[$key]))) {
            // dd($_POST[$key] . "  Is not a string see value is" . $key);
            $message = array($key => array($key . ' Invalid string input please enter string'));
            array_push($errors, $message);
        }
    }
    return $errors;
}

/**
 *Checks if input is a valid Url
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function checkForUrl($rules = [],  $errors = array())
{
    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (in_array('url', $array) && !empty($_POST[$key]) && !filter_var($_POST[$key], FILTER_VALIDATE_URL)) {
            $message = array($key => array($key . 'url invalid <b>hint:</b>please add <b>http/https</b> to url'));
            array_push($errors, $message);
        }
    }
    return $errors;
}
/**
 *checkUniqueFields() checks if input is a unique in specified table
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function  checkUniqueFields($rules = [],  $errors = array())
{
    foreach ($rules as $key => $myvalue) {
        $array = explode('|', $myvalue);
        foreach ($array as $int => $value) {
            if (preg_match('/unique/', $value) && !empty($_POST[$key])) {
                $table = explode(':', $value);
                $querytable = $table[1];

                // dd($querytable);
                if (checkifFieldExists($querytable, testinput($_POST[$key]))) {
                    $message = array($key => array("Sorry! " . $key . ' is already being used'));
                    array_push($errors, $message);
                }
            }
        }
    }
    return $errors;
}


/**
 *Checks if database for the value being looked for exists
 * @param  array rules
 * @param  array errors
 * @return bool validity
 */
function checkifFieldExists($table, $values)
{
    $columns = getAllColumns($table);
    $count = 0;
    global $connectedDb;
    foreach ($columns as $key => $value) {
        $field =  $columns[$key]->Field;
        if (!preg_match('/id/', $field)) {
            $getuniquecount = "SELECT count(*) as count from $table where $field  LIKE '%$values%'";
            $rl = $connectedDb->prepare($getuniquecount);
            $count = $connectedDb->fetchColumn();
            if ($count > 0) {
                return true;
            }
        }
    }
}


/**
 *Validate Files
 * @param  array rules
 * @param  array errors
 * @return array errors
 */
function validateFiles($rules = [],  $errors = array())
{
    foreach ($rules as $key => $value) {
        $array = explode('|', $value);
        if (in_array('file', $array)) {
            foreach ($array as $int => $value) {
                if (preg_match('/mimes/', $value) && !empty($_FILES[$key])) {
                    $mimes = explode(':', $value);
                    $filemimes = explode(',', $mimes[1]);
                    $info = new SplFileInfo($_FILES[$key]['name']);
                    $fileextension = $info->getExtension();
                    if (!in_array($fileextension, $filemimes)) {
                        $message = array($key => array("Sorry, only $mimes[1] files are allowed"));
                        array_push($errors, $message);
                    }
                }
                if (preg_match('/size/', $value) && !empty($_FILES[$key])) {
                    $size = explode(':', $value);
                    $filesize = (int) $size[1];
                    if ($filesize < $_FILES[$key]['size']) {
                        $message = array($key => array("Sorry, your file is too large uploaded {$_FILES[$key]['size']}"));
                        array_push($errors, $message);
                        // break;
                    }
                }
            }
            if (in_array('empty', $array) && empty($_FILES)) {
                $message = array($key => array("$key file is required"));
                array_push($errors, $message);
            }
        }
        // if(in_array('file.*', $array)) {
        //     if (in_array('empty', $array)){
        //         foreach ($array as $int => $value) {
        //             foreach ($_FILES as $name => $file) {
        //                 if (empty($file)) {
        //                     $message = array($key => array("$key file at index[$name] is empty"));
        //                     array_push($errors, $message);
        //                 }
        //                 if (preg_match('/size/', $value) && !empty($file)) {
        //                     $size = explode(':', $value);
        //                     $filesize = (int) $size[1];
        //                     if ($filesize < $file['size']) {
        //                         $message = array($key => array("Sorry, $key file at index[$name]  is too large"));
        //                         array_push($errors, $message);
        //                     }
        //                 }
        //             }
        //         }
               
        //     }
        // }
    }
    return $errors;
}

/**
 *Checks if database for the value being looked for exists
 * @param  array rules
 * @param  array errors
 * @return bool validity
 */
function checkIFValueExistsOnColumn($table, $column, $value)
{
    global $connectedDb;
    $getuniquecount = "SELECT count(*) as count from $table where $column  LIKE '%$value%'";
    $connectedDb->prepare($getuniquecount);
    $count = $connectedDb->fetchColumn();
    if ($count > 0) {
        return true;
    }
}


/**
 *Actually  returns all table info 
 * @param  array table
 * @param  array errors
 */
function getAllColumns($table)
{
    $database = DB_NAME;
    global $connectedDb;
    $getfield = "SHOW COLUMNS FROM $database.$table";
    $connectedDb->prepare($getfield);
    $connectedDb->execute();
    $getfield = $connectedDb->resultSet();
    return $getfield;
}

function array_combine_($keys, $values)
{
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, function (&$v) {
        $v = (count($v) == 1) ? array_pop($v) : $v;
    });
    return $result;
}

/**
 * Joins all keys and return error object 
 * @param  array errors
 * @return array errors
 */
function sanitizeErrors($errors)
{
    $values = array();
    $keys = array();
    foreach ($errors as $key => $value) {
        foreach ($value as $newkey => $newvalue) {
            $values[] = $newvalue[0];
            $keys[] = $newkey;
        }
    }
    $newerrors =  array_combine_($keys, $values);
    $object = (object) $newerrors;
    return  $object;
}



/**
 * Show Errors
 * @param  mixed errorbject with valuekey
 * @return bool true
 */
function errors($valuekey)
{
    if (isset($valuekey)) {
        $errors = $valuekey;
        if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            echo $errors;
        }
        return true;
    } else {
        return false;
    }
}

/**
 * Show Errors
 * @param  mixed errorbject with valuekey
 * @return bool true
 */
function bootstrapErrors($valuekey)
{
    if (isset($valuekey)) {
        $errors = $valuekey;
        if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                echo "<div id='manyalerts' class='alert alert-danger alert-dismissible'> <strong>Error!  </strong>$error<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
            }
        } else {
            echo "<div id='singlealert' class='alert alert-danger alert-dismissible'> <strong>Error!   </strong>$errors<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
        }
        return true;
    } else {
        return false;
    }
}

/**
 * Show Errors
 * @param  mixed errorbject with valuekey
 * @return bool true
 */
function Toast($valuekey, $type = 'error')
{
    if (isset($valuekey)) {
        $data = $valuekey;
        if (is_array($data)) {
            foreach ($data as $key => $error) {
                echo "<script>toastr.{$type}'('$data')</script>";
            }
        } else {
            echo "<script>toastr.{$type}('$data')</script>";
        }
        return true;
    } else {
        return false;
    }
}

/**
 * Show Errors
 * @param  mixed errorbject with valuekey
 * @return bool true
 */
function bootstrapSuccess($valuekey)
{
    if (isset($valuekey)) {
        $errors = $valuekey;
        if (is_array($errors)) {
            foreach ($errors as $key => $error) {
                echo "<div id='manyalerts' class='alert alert-success alert-dismissible'> <strong>Success!  </strong>$error<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
            }
        } else {
            echo "<div id='singlealert' class='alert alert-success alert-dismissible'> <strong>Success!   </strong>$errors<button type='button' class='close' data-dismiss='alert'>&times;</button></div> ";
        }
        return true;
    } else {
        return false;
    }
}

