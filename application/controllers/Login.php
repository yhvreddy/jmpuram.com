<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require APPPATH . '/libraries/BaseController.php';

class Login extends CI_Controller {

    public function __construct(){
        @parent::__construct();
        $this->load->model('model_default');
        $this->load->library('session');
    }

    public function index(){
        $this->isLoggedIn();   
	}

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $data['owner'] = $this->model_login->ownaccountcnt();
            $data['pageTitle'] = "Login account";
            $this->load->view('login_page',$data);
        }else {
            $data = $this->session->userdata;
            redirect(base_url('dashboard'));
        }
    }

    /**
     * This function used to logged in user
     */
    public function loginaccount(){
        extract($_REQUEST);

        $UserIdCheck=$this->model_default->selectdata('app_users',array('email'=>$username));
        if(count($UserIdCheck) != 0){
            $password1 = $this->input->post('passWord');
        }else{
            $this->session->set_flashdata('error', "Couldn't find your Email Id");
            redirect(base_url());
        }
        
        $result = $this->model_default->selectdata('app_users',array('email'=>$username,'password'=>$password));
        if(count($result) != 0) {

            if($result['0']->status == 1){
                $sessionArray=array();
                foreach ($result as $res) {
                    $sessionArray = array(
                        'uid'       =>  $res->id,
                        'regid'     =>  $res->reg_id,
                        'fname'     =>  $res->firstname,
                        'lname'     =>  $res->lastname,
                        'email'     =>  $res->email,
                        'usertype'  =>  $res->usertype,
                        'mobile'    =>  $res->mobile,
                        'isLoggedIn'=> TRUE,
                    );
                }

                $this->session->set_userdata($sessionArray);
                redirect(base_url('dashboard'));
            }else{
                $this->session->set_flashdata('error', 'Your account is temporarily termenated..!');
                redirect(base_url());
            }

        }else{
            $this->session->set_flashdata('error', 'wrong password');
            redirect(base_url());
        }
    }

	public function signup(){
        $data['pageTitle'] = "Create New account";
        $this->load->view('register_page',$data);
    }

    public function savesignupdata(){
        extract($_REQUEST);
        $uid = 'APID'.date('m').date('d').'S'.random_string('nozero',2);
        $ckemail = $this->model_default->selectdata('app_users',array('email'=>$email));
        if(count($ckemail) != 0){
            $this->session->set_flashdata('error',$email.' Already Exits..!');
            redirect(base_url('signup'));
        }else{
            $storedata = array(
                'reg_id'    =>  $uid,
                'firstname' =>  $firstname,
                'lastname'  =>  $lastname,
                'email'     =>  $email,
                'mobile'    =>  $mobilenumber,
                'password'  =>  $password,
                'usertype'  =>  1,
                'country_id'=>  101,
                'updated'   =>  date('Y-m-d H:i:s')
            );

            $insertdata = $this->model_default->insertdata('app_users',$storedata);

            if($insertdata != 0){
                $this->session->set_flashdata('success','Successfully Signup..! Reg Id'.strtoupper($uid));
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error','Failed to signup account');
                redirect(base_url('signup'));
            }

        }
    }

    //logout session
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
