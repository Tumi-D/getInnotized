<?php
class Pages extends PostController
{

    public function createmerchant()
    {
        // $email = isset($_POST['housenumber']) ? $_POST['housenumber'] : '';
        $natureofbusiness  = $_POST['natureofbusiness'];
        $telephone = $_POST['telephone'];
        $atelephone = $_POST['atelephone'];
        $tin = $_POST['tin'];
        $businessname  = $_POST['businessname'];
        $businessemail = $_POST['businessemail'];
        $website = $_POST['website'];
        $businesstype  = $_POST['accounttype'];
        $businesscategory =  $_POST['businesscategory'];
        $revenue = $_POST['revenue'];
        $numberofemployees = $_POST['numberofemployees'];
        $numberofbranches = $_POST['numberofbranches'];
        $averagerevenue = $_POST['averagerevenue'];



        //Save  Businesss
        $business = new Business();
        $business->recordObject->businessname =  $businessname;
        $business->recordObject->email =  $businessemail;
        $business->recordObject->natureofbusiness = $natureofbusiness;
        $business->recordObject->tinnumber = $tin;
        $business->recordObject->mobile = $atelephone;
        $business->recordObject->website = $website;
        $business->recordObject->accounttype = $businesstype;
        $business->recordObject->businesscategory = $businesscategory;
        $business->recordObject->revenue = $revenue;
        $business->recordObject->numberofemployees = $numberofemployees;
        $business->recordObject->numberofbranches = $numberofbranches;
        $business->recordObject->telephone = $telephone;
        $business->recordObject->averagerevenue = $averagerevenue;
        $business->recordObject->status = 1;
        $business->store();

        //Extract business id
        $business_id =  $business->recordObject->busid;

        $popularname = $_POST['popularname'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $region = $_POST['region'];
        $assembly = $_POST['assembly'];
        $unitno = $_POST['unitno'];
        $housenumber = isset($_POST['housenumber']) ? $_POST['housenumber'] : '';
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $buildingno = $_POST['buildingno'];

        //Save Location
        $location = new Location();
        $location->recordObject->popularname =  $popularname;
        $location->recordObject->city = $city;
        $location->recordObject->street = $street;
        $location->recordObject->region = $region;
        $location->recordObject->assembly = $assembly;
        $location->recordObject->unitno =  $unitno;
        $location->recordObject->housenumber = $housenumber;
        $location->recordObject->longitude = $longitude;
        $location->recordObject->latitude = $latitude;
        $location->recordObject->buildingno = $buildingno;
        $location->store();

        //Extract location id
        $location_id =  $location->recordObject->location_id;
        $locationBusiness = LocationBusiness::saveBusinessLocation($location_id, $business_id);
        if ($locationBusiness) {
            $data['success'] = "Saved  All Data Succesfully";
            $_SESSION["success"] = $data['success'];
            $data['location_id'] =  $location_id;
            $data['business_id'] =  $business_id;
            $this->view('pages/createmerchant', $data);
        } else {
            $error = "Failed To Save  All Data Successfuly";
            $_SESSION["error"] = $error;
            $this->view('pages/createmerchant', $error);
        }
    }
}
