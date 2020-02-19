<?php

class Pages extends Controller
{

   public function index()
   {
      $approvedbusinesses = Business::getBusinessData(2);
      $pendingbusinesses = Business::getBusinessData(1);
      // exit();
      
      $data = ['approved'=>$approvedbusinesses, 'pending'=>$pendingbusinesses ];

      $this->view('pages/index', $data);
   }

   public function changeStatus($id)
   {
      $business = new Business($id);
      if ($business !== null) {
         $businesses = Business::listAll();
         ($business->recordObject->status == 1) ? $business->recordObject->status = 2 : $business->recordObject->status = 1;
         if ($business->store()) {
            $otpId = Otp::getOtp();
            $tp = new Otp($otpId);
            $pin = $tp->recordObject->value;
            $email = sendMail("Your OTP PIN: {$pin}", $business->recordObject->businessname, "OTP PIN", $business->recordObject->email);

            //email fxn
            if ($email == 'true') {
               //   echo "email sent";
                 //Update OTP status coulmn value to 1
                 $tp->recordObject->status = 1;
                 $tp->recordObject->expires_at = time();
                 $tp->store();
                 header('location: /');
              }else {
                 echo "Email failed!";
                 // Handle error
              }
         }
         
      }
      header('location: /');
   }
   public function usersetup()
   {
      $this->view('pages/usersetup');
   }
   public function useradmin()
   {
      $this->view('pages/useradmin');
   }
   public function uploads()
   {
      $this->view('pages/uploads');
   }
   public function terminal()
   {
      $this->view('pages/terminal');
   }
   public function supermanage()
   {
      $this->view('pages/supermanage');
   }
   public function subregister()
   {
      $this->view('pages/subregister');
   }
   public function account()
   {
      $this->view('pages/account');
   }
   public function activities()
   {
      $this->view('pages/activities');
   }
   public function acompare()
   {
      $this->view('pages/acompare');
   }
   public function client()
   {
      $this->view('pages/client');
   }
   public function changeaccount()
   {
      $this->view('pages/changeaccount');
   }
   public function contract()
   {
      $this->view('pages/contract');
   }
   public function settings()
   {
      $this->view('pages/settings');
   }
   public function dashboard()
   {
      $this->view('pages/dashboard');
   }
   public function reports()
   {
      $this->view('pages/reports');
   }
   public function nic()
   {
      $this->view('pages/nic');
   }
   public function areport()
   {
      $this->view('pages/areport');
   }
   public function bills()
   {
      $this->view('pages/bills');
   }
   public function funds()
   {
      $this->view('pages/funds');
   }
   public function deposit()
   {
      $this->view('pages/deposit');
   }
   public function compare()
   {
      $this->view('pages/compare');
   }
   public function metro()
   {
      $this->view('pages/metro');
   }
   public function openaccount()
   {
      $this->view('pages/openaccount');
   }
   public function moreuploads()
   {
      $this->view('pages/moreuploads');
   }
   public function reset()
   {
      $this->view('pages/reset');
   }
   public function fdatest()
   {
      $this->view('pages/fdatest');
   }
   public function haccount()
   {
      $this->view('pages/haccount');
   }
   public function saccount()
   {
      $this->view('pages/saccount');
   }
   public function iaccount()
   {
      $this->view('pages/iaccount');
   }
   public function partneredit()
   {
      $this->view('pages/partneredit');
   }
   public function rgdservice()
   {
      $this->view('pages/rgdservice');
   }
   public function renewal()
   {
      $this->view('pages/renewal');
   }
   public function customers()
   {
      $this->view('pages/customers');
   }
   public function editcustomer()
   {
      $this->view('pages/editcustomer');
   }
   public function editmerchant()
   {
      $this->view('pages/editmerchant');
   }
   public function details()
   {
      $this->view('pages/details');
   }
   public function detailsnew()
   {
      $this->view('pages/detailsnew');
   }
   public function musers()
   {
      $this->view('pages/musers');
   }
   public function owner()
   {
      $this->view('pages/owner');
   }
   public function moneytransfers()
   {
      $this->view('pages/moneytransfers');
   }
   public function international()
   {
      $this->view('pages/international');
   }
   public function collections()
   {
      $this->view('pages/collections');
   }
   public function broker()
   {
      $this->view('pages/broker');
   }
   public function baccount()
   {
      $this->view('pages/broker');
   }
   public function agent()
   {
      $this->view('pages/agent');
   }
   public function agentadmin()
   {
      $this->view('pages/agentadmin');
   }
   public function agentcollections()
   {
      $this->view('pages/agentcollections');
   }
   public function agentdetails()
   {
      $this->view('pages/agentdetails');
   }
   public function branch()
   {
      $this->view('pages/branch');
   }
   public function businessedit()
   {
      $this->view('pages/businessedit');
   }
   public function businessreg()
   {
      $this->view('pages/businessreg');
   }
   public function payquotation()
   {
      $this->view('pages/payquotation');
   }
   public function backadmin()
   {
      $this->view('pages/backadmin');
   }
   public function agentmanage()
   {
      $this->view('pages/agentmanage');
   }
   public function maccount()
   {
      $this->view('pages/maccount');
   }
   public function maccount1()
   {
      $this->view('pages/maccount1');
   }
   public function manageaccount()
   {
      $this->view('pages/manageaccount');
   }
   public function managefunds()
   {
      $this->view('pages/managefunds');
   }
   public function agentview()
   {
      $this->view('pages/agentview');
   }
   public function agentrenewal()
   {
      $this->view('pages/agentrenewal');
   }
   public function agentterminal()
   {
      $this->view('pages/agentterminal');
   }
   public function companydetails($id=null)
   {
      if ($id == null) {
         header('location: /');
      }
      $company = new Business($id);

      $this->view('pages/companydetails', $company);
   }
   public function document()
   {
      $this->view('pages/agentterminal');
   }
   public function individualregister()
   {
      $this->view('pages/individualregister');
   }
   public function individualreg()
   {
      $this->view('pages/individualreg');
   }
   public function individualedit()
   {
      $this->view('pages/individualedit');
   }
   public function rates()
   {
      $this->view("pages/rates");
   }
   public function services()
   {
      $this->view("pages/services");
   }
   public function servicecustomers()
   {
      $this->view("pages/servicecustomers");
   }
   public function momo()
   {
      $this->view("pages/momo");
   }
   public function createmerchant()
   {
      $this->view("pages/createmerchant");
   }

   public function reviewmerchant($location_id, $business_id)
   {
      $location = new Location($location_id);
      $location = $location->recordObject;
      $data['location'] = $location;

      $business = new Business($business_id);
      $business = $business->recordObject;
      $data['business'] = $business;


      $this->view("pages/reviewmerchant", $data);
   }
   public function review()
   {
      $this->view("pages/review");
   }
}
