<?php


use Faker\Factory;

/***
 * For more info on faker variables check faker tutorial at http://zetcode.com/php/faker   
 * or check this  github page https://github.com/fzaninotto/Faker for source code 
 */
class  OtpFactory
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
         $otp = new Otp();
         $otp->recordObject->pin = generateOtp();
         $otp->recordObject->status = 0;
         //Add the other record objects
         $otp->store();
      }
   }
}
