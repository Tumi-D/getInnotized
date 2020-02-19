<?php
class Register extends Controller
{

    public function index()
    {
        phpinfo();
    }

    public function admin()
    {
        $this->view('register/addadmin');
    }
    public function customer()
    {
        $this->view('register/addcustomer');
    }
}
