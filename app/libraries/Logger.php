<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2/23/2018
 * Time: 7:11 AM
 */


/**
 * Class Logger
 *
 * This class needs no actual methods for writing logs.
 *
 * Simply create a new Logger object, set the properties, and
 * new Logger($message) - Logger will do only a little to set defaults
 * if needed before calling store.
 *
 * Log categories are maintained in the table logcategories simply
 * to enforce specific values in that log column. For reference, look at
 * that table, but initial categories are
 * -- 'administrator action'
 * -- 'customer action'
 * -- 'system - general'
 * -- 'system - scheduled'
 * -- 'information' (default if not set)
 *
 * The only requirement is that
 * logmessage must be set by the caller.
 *
 */
class Logger extends tableDataObject {

    const TABLENAME = 'systemlog';

    public function __construct($logmessage,$logcategory = null,$user = null,$diagnostic = null, $cid = null){

        parent::__construct();

        $ro =& $this->recordObject;

        foreach (['logmessage','user','logcategory','diagnostic','cid'] as $logproperty){
            if ($$logproperty != null){
                $ro->$logproperty = $$logproperty;
            }
        }
        if(defined('MUTEDEBUG') && $logcategory == 'debug'){
            /*
             * this condition mutes the logging of debug entries
             * becuase the systemlog gets HUGE too quickly.
             *
             * TODO - determine if we need to do something other than logging in the db here
             */
        } else {
        $this->store();
    }
    }

    public function store($forcenulls = false){

        parent::store($forcenulls);

        if($this->recordObject->logcategory == 'error') {

            /*
             * Check for the global currentUserEmail and use it if set.
             *
             * Altering this below to capture the user if it was passed
             * as a parameter, but is not present in the global constants.
             * 23-01-2019
             */
            if(isset($GLOBALS['currentUserEmail'])){
                $logUser = $GLOBALS['currentUserEmail'];
            } elseif(isset($this->recordObject->user)) {
                $logUser = $this->recordObject->user;
            } else {
                $logUser = '(No user at time of error)';
            }

            $emails  = implode( ',', EMAILS_FOR_ERROR_ALERT);

            $subject = 'Marketplace Application Errors (' . URLROOT . ')';
            $message =   'User: '. $logUser .
                         '<br/><br/>'. 'Timestamp: '.date('Y-m-d H:i:s').'<br/><br/>'.
                         'Message: '.  $this->recordObject->logmessage;

            sendEmail('noreply@commehr.de', $emails, $subject,  $message, 'Marketplace Application');


        }
        return true;
    }

    public static function logView($days = 1,$debug = false,$cids=null){
        global $connectedDb;

        if($debug === false){
            $debugc = " and logcategory != 'debug' ";
        } else {
            $debugc = "";
        }

        if ($cids === null){
            $cidquery = "";
        }
        else{
            $cidarray = implode(" or cid = ",$cids);
            $cidquery = 'and cid ='.$cidarray;
        }

        $logQ = "select * from systemlog 
                  where logtimestamp >= date_sub(now(),interval $days day)
                  $debugc $cidquery
                  order by logtimestamp desc limit 1000";
        $connectedDb->prepare($logQ);
        $logentries = $connectedDb->resultSet();
        return $logentries;
    }

    public static function getDiag($id){
        global $connectedDb;
        $dQ = "select diagnostic from systemlog where idsystemlog = $id";
        $connectedDb->prepare($dQ);
        $dinfo = $connectedDb->fetchColumn();
        if(unserialize($dinfo) !== false){
            return unserialize($dinfo);
        } else {
            return $dinfo;
        }
    }

}
