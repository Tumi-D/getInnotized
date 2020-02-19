<?php

/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/13/2019
 * Time: 6:34 AM
 */

class Tests extends Controller
{

    public function index()
    {

        phpinfo();
    }
    public function createmerchant()
    {
        $url =  "http://webservices.ucomgh.com/licencedetailsnew.php?pin=" . "1234";

        echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_error($ch);
        print_r($response);
        die;
        $response = preg_replace('/[^(\x20-\x7F)]*/', '', $response);
        $obj = json_decode($response, TRUE);

        $nobj = json_decode($response, TRUE);
    }

    public function name()
    {

        $datatosave = [
            'data' =>
            ['name' => 'Kofi', 'location' => 'Accra', 'age' => 12],
            ['name' => 'Ama', 'location' => 'Ridge', 'age' => 21],
            ['name' => 'Esi', 'location' => 'Dansoman', 'age' => 32],
            ['name' => 'Yaw', 'location' => 'Spintex', 'age' => 52],

        ];

        foreach ($datatosave as $data) {
            $name = $data['name'];
            $location = $data['location'];
            $age = $data['age'];

            $ts = new Testdata();

            $ts->recordObject->firstname = $name;

            $ts->recordObject->lastname = $name;

            $ts->recordObject->location = $location;

            $ts->recordObject->age = $age;

            $ts->store();
        }

        // print_r($record);

        exit;

        // $this->view('pages/name',$people);
    }

    public function listdata()
    {
        $rows = TestData::listAll();

        $this->view('pages/listtabledata', $rows);
    }

    public function updatedata($id)
    {

        $row = new TestData($id);

        $row->recordObject->firstname = 'Greg';

        if ($row->store() == true) {

            $updatedata =  $row->recordObject;

            $data = ['status' => 'success', 'udDataedData' => $updatedata];
            $this->view('pages/listtabledata', $data);
            exit;
        }
    }

    public function selectrow($id)
    {
        $row = new TestData($id);

        $singledata = $row->recordObject;

        print_r($singledata);
    }

    public function deleterow($id)
    {
        $row = new TestData($id);
        $row->deleteFromDB();
    }


    public function fakeOtp()
    {

        // try {
        //     for ($i = 0; $i < 99; $i++) {
        //         $otpdata = new OTP();
        //         $otpdata->recordObject->value = substr(randomToken(), 0, 5);
        //         $otpdata->store();
        //     }
        // } catch (\Throwable $th) {
        // }
        // echo  sendMail($content = "My dhope mail");
        echo generateOtp(5);
    }
    public function runTests()
    {
        $services = new ServiceModel();
        echo json_encode($services::find(10));
    }
}
