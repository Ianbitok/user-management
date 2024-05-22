<?php
class Accounts{

    //properties
    public $account_no = "2436783334"
    public $account_name = "John Doe";

    //methods
    public function get_aacout_no(){
        echo $this->account_no;
    }
}

// create an object
$account = new account ();
//var_dump($account);
$account 