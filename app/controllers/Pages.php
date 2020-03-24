<?php

class Pages extends Controller
{

   public function index()
   {  
      $parameters = [
         'items' => ['one', 'two', 'three'],
      ];
      
      // render to output
      $latte->render('template.latte', $parameters);
      $this->view('pages/index');
   }

}
