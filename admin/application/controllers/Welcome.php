<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Welcome extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
    }

	public function dashboard()
	{
	    $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        $data['pagetitle'] = "welcome to dashboard";
		$this->loadview('welcome_message',$data);
	}
}
