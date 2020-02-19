<?php
class Business extends tableDataObject

{  
    const TABLENAME = 'business';


    public static function getBusinessData($status){
        global $connectedDb;
        $getrecord = "SELECT * from business where status = $status ";
        $connectedDb->prepare($getrecord);
        return $connectedDb->resultSet();
    }



}
