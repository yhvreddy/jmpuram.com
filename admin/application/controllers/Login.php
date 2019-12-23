<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Login extends BaseController{

	public function __construct(){
		parent::__construct();
        $this->load->model('Model_default');
	}
	//login account access page
    public function index(){
        $this->isLoggedIn();
	}

    //This function used to check the user is logged in or not
    function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $data['pageTitle']	= 'Login Account.';
		    $this->load->view('login_page',$data);
        }else {
            redirect(base_url().'dashboard');
        }
        
    }

	//Login account access
    public function loginAccessAccount(){
        extract($_REQUEST);
        
        $checkemail = $this->Model_default->rowcountcondition('jmp_register_users',array('email'=>$userName));
        if($checkemail != 0){
            $password1 = $this->input->post('passWord');
            $password1 = md5($password1);
        }else{
            $this->session->set_flashdata('error', "Couldn't find your Email Id or Username");
            redirect(base_url());
        }
        
        $result = $this->Model_default->selectconduction('jmp_register_users',array('password'=>$password1,'email' => $userName,'status'=>1));
        
        //check user is exist or not
        if(count($result[0]) != 0) {
            if($result[0]->status == 1){
                $sessionArray=array();
                foreach ($result as $value) {
                    $sessionArray = array(
                        'id'    =>  $value->id,
                        'role'  =>  $value->role,
                        'uid'   =>  $value->user_id,
                        'isLoggedIn' => TRUE,
                    );
                    $this->session->set_userdata($sessionArray);
                    $this->session->set_flashdata('success', 'Successfully Login');
                    $this->session->set_flashdata('text', 'Welcome ' . $value->full_name);
                    redirect('dashboard?login=success');
                }
            }else{
                $this->session->set_flashdata('error', 'Sorry Your account is temporarily termenated.<br>please contact authorized person..!');
                redirect(base_url());
            }

        }else{
            $this->session->set_flashdata('error', 'wrong password');
            redirect(base_url());
        }
        
    }

	//create new user account
	public function registerAccount(){
		$data['pageTitle']	= 'Create new account..!';
        $this->load->view('register_page',$data);
    }

	//save register Details
	public function newRegisterAccount(){
		extract($_REQUEST);
		$this->print_r($_REQUEST);
		$checkmobile = $this->Model_default->rowcountcondition('jmp_register_users',array('mobile'=>$Mobile));
		if($checkmobile != 0){
            $this->session->set_flashdata('error', 'Mobile Number is alrady Exits.');
            redirect(base_url('user/registeraccount'));
        }else{
            $checkemail = $this->Model_default->rowcountcondition('jmp_register_users',array('email'=>$Mailid));
            if($checkemail != 0){
                $this->session->set_flashdata('error', 'Email is alrady exits.');
                redirect(base_url('user/registeraccount'));
            }else{
                $insertdata = array(
                    'full_name' =>  $Fname,
                    'mobile'    =>  $Mobile,
                    'email'     =>  $Mailid,
                    'password'  =>  md5($Password),
                    'updated'   =>  date('Y-m-d H:i:s')
                );
                $tablename  = 'jmp_register_users';
                $savedata   =   $this->Model_default->insertid($tablename,$insertdata);
                if($savedata != 0){
                    $this->session->set_flashdata('success', 'Your account successfully created.');
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('error', 'Failed to create Account.');
                    redirect(base_url('user/registeraccount'));
                }
            }
        }
	}

	//forget password
    public function forgetpassword(){
        $data['pageTitle']	= 'Forget Account Password.';
        $this->load->view('forgetpassword_page',$data);
    }

    //save forget password
    public function saveForgetPassword(){
	    extract($_REQUEST);
	    $this->print_r($_REQUEST);
        $regusers = $this->Model_default->selectconduction('jmp_register_users',array('email'=>$email_id));
        if(count($regusers) != 0){
            $sessionArray = array(
                'id' => $regusers[0]->id,
                'isLoggedIn' => TRUE,
            );
            $this->session->set_userdata($sessionArray);
            $this->session->set_flashdata('success', 'Please Change Password');
            $this->session->set_flashdata('text', 'Hello ' . $regusers[0]->full_name.' Reset your Password');
            redirect('user/changepassword/'.$regusers[0]->id.'/change?request=true');
        }else{
            $this->session->set_flashdata('error', 'Invalid Register Email');
            $this->session->set_flashdata('text', 'Please Enter valied register email id');
            redirect('user/forgetpassword');
        }
    }

    //Change password
    public function Changepassword(){
	    extract($_REQUEST);
	    $one = $this->uri->segment(3);
	    if(isset($one) && isset($request) && $request=='true') {
            $regusers = $this->Model_default->selectconduction('jmp_register_users',array('id'=>$one));
            if(count($regusers) != 0) {
                $data['pageTitle'] = 'Change Account Password.';
                $data['reg_id'] = $regusers[0]->id;
                $data['emails'] = $regusers[0]->email;
                $data['mobile'] = $regusers[0]->mobile;
                $this->load->view('changepassword_page', $data);
            }else{
                $this->session->set_flashdata('error', 'Invalid Request to change password');
                redirect('user/forgetpassword');
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid Request to change password');
            redirect('user/forgetpassword');
        }
    }

    //save new Change Password
    public function savenewChangePassword(){
	    extract($_REQUEST);
	    //$this->print_r($_REQUEST);
        if($new_password == $confirm_password) {
            $conduction = array('id' => $id, 'email' => $email_id, 'mobile' => $mobile);
            $updatedata = array('password' => md5($new_password));
            $tablename  = 'jmp_register_users';
            $savedata   =   $this->Model_default->updatedata($tablename,$updatedata,$conduction);
            if($savedata != 0){
                $this->session->set_flashdata('success', 'Your account Password successfully changed.');
                $sessionArray = array('id','isLoggedIn');
                $this->session->unset_userdata($sessionArray);
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error', 'Failed to change Account password.please try again.');
                $sessionArray = array('id','isLoggedIn');
                $this->session->unset_userdata($sessionArray);
                redirect('user/forgetpassword');
            }
        }else{
            $this->session->set_flashdata('error', 'New Passowrd and confirm password should be same.');
            redirect('user/changepassword/'.$id.'/change?request=true');
        }
    }

    //session destroy
    public function logout(){
        //$this->session->sess_destroy();
        $sessionArray = array('id','isLoggedIn');
        $this->session->unset_userdata($sessionArray);
        $this->session->set_flashdata('success','Your account is successfully Logout..!');
		redirect(base_url());
    }
}
