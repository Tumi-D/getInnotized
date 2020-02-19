<?php

use Faker\Factory;

/***
 * For more info on faker variables check faker tutorial at http://zetcode.com/php/faker   
 * or check this  github page https://github.com/fzaninotto/Faker for source code 
 */
class  BusinessFactory
{
   private static $number = 2;
   public function __contruct($number)
   {
      self::$number = $number;
   }

   public static function run()
   {
      $factory = Factory::create();
      for ($i = 0; $i < self::$number; $i++) {
         //  $business = new Business();
         //  $business->recordObject->firstname = $factory->firstName();
         // //Add the other record objects
         //  $business->store();
      }
   }
}
