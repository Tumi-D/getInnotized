<?php

use Faker\Factory;


/***
 * For more info on faker variables check faker tutorial at http://zetcode.com/php/faker   
 * or check this  github page https://github.com/fzaninotto/Faker for source code 
 */
class  ServicesFactory
{
   private static $number = 5;
   public function __contruct($number)
   {
      self::$number = $number;
   }

   public static function run()
   {
      $factory = Factory::create();
      for ($i = 0; $i < self::$number; $i++) {
         $services = new ServiceModel();
         $services->service_name = $factory->firstName();
         $services->service_type = $factory->firstName();
         $services->service_use = $factory->sentence(4);
         $services->billingcycle = $factory->randomElement(['Yearly', 'Monthly', 'Quaterly', 'Weekly']);
         $services->billingtype = $factory->randomElement(['Postpaid Billing', 'Order-Based Billing', 'Delivery-Based Billing', 'Credit and Debit Memos']);
         $services->category = $factory->randomElement(['Banking', 'E-Services', 'Payments']);
         $services->curency  = $factory->randomElement(['GHC', 'USD', 'EURO']);
         $services->rate = $factory->randomElement([20 / 100, 5 / 100, 10 / 100]);
         $services->customerid = rand(1, 20);
         $services->servicedate = date('d  M  Y');
         $services->userid = rand(1, 20);
         $services->activedate = date('d  M  Y');
         $services->setupfee = $factory->randomElement([400000.00, 5500500.00, 940000.00]);
         $services->servicelimit = $factory->randomElement([1000000.00, 55005000.00, 9400000.00]);
         $services->save();
      }
   }
}
