<?php
class Otp extends tableDataObject
{
    const TABLENAME = 'otp';

    public static function getOtp()
    {
        global $connectedDb;
        $query = "SELECT otp.`otp_id` FROM  otp WHERE otp.`status` = 0  LIMIT 1 ";
        $connectedDb->prepare($query);
        $connectedDb->execute();
        return $connectedDb->fetchColumn();
    }
    public static function checkOtp($value)
    {
        global $connectedDb;
        $query = "SELECT otp.`pin`  FROM  otp WHERE otp.`pin` = $value";
        $connectedDb->prepare($query);
        $connectedDb->execute();
        return $connectedDb->fetchColumn();
    }
}
