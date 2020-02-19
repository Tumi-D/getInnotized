<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/13/2019
 * Time: 8:30 AM
 */

class Apikeys extends tableDataObject
{
     const TABLENAME  = 'apikeys';

    public static  function getApiDetails($apikey,  $type){

        global $connectedDb;

        if($type == 'count') {
            $getcount = "SELECT count(*) as ct  FROM apikeys WHERE apikey='$apikey' ";
            $connectedDb->prepare($getcount);
            $connectedDb->execute();
            return $connectedDb->fetchColumn();
        }elseif($type == 'singledata'){
            $getcount = "SELECT * FROM apikeys apikeys WHERE apikey='$apikey'";
            $connectedDb->prepare($getcount);
            $connectedDb->execute();
            return $connectedDb->singleRecord();
        }
    }

}