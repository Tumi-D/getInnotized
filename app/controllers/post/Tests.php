<?php

/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 4/13/2019
 * Time: 7:00 AM
 */

class Tests extends PostController
{

    public function ap()
    {

        $rs = new RestApi();
        $rs->processApi();
    }
}
