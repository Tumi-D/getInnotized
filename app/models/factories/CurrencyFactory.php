<?php

use Faker\Factory;

/***
 * For more info on faker variables check faker tutorial at http://zetcode.com/php/faker   
 * or check this  github page https://github.com/fzaninotto/Faker for source code 
 * You use the store method if you decide to keep the tableDataObject Trait
 */
class  CurrencyFactory
{
   private static $number = 30;
   public function __contruct($number)
   {
      self::$number = $number;
   }

   public static function run()
   {
      $factory = Factory::create();
      for ($i = 0; $i < self::$number; $i++) {
         $currency = new CurrencyModel();
         //$currency->recordObject->firstname = $factory->firstName();
         //Add the other record objects
         $currency->store();
      }
   }
}
