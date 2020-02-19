<?php


class LocationBusiness extends tableDataObject
{
    const TABLENAME = 'location_business';

    public static function saveBusinessLocation($location_id, $business_id)
    {
        global $connectedDb;
        $query = "INSERT INTO `location_business` VALUES ($location_id, $business_id)";
        $data = $connectedDb->prepare($query);
        $data = true;
        return $data;
    }
}
