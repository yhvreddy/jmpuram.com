<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Citizens extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
        $this->load->model('Model_dashboard');
    }

    public function newcitizens(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Add New Citizens..!"; 
		$this->loadview('Ctizens/newctizen.php',$data);
    }
    
    public function savecitizens(){
        extract($_REQUEST);
        $this->createdir('uploads/citizens/'.date('Y-m-d'),'uploads/citizens/'.date('Y-m-d'));
        $upload = $this->uploadfiles('uploads/citizens/'.date('Y-m-d'),'uploadsource','*',FALSE,'','');
        if($upload['status'] != 0){
            $uploadfile = 'uploads/citizens/'.date('Y-m-d').'/'.$upload['uploaddata']['file_name'];
        }else{
            $uploadfile = '';
        }
        //insert first event data
        $insertdata = array(
            'first_name'        =>  $first_name,
            'last_name'         =>  $last_name,
            'middel_name'       =>  $middel_name,
            'mobile'            =>  $mobile,
            'email'             =>  $email_id,
            'address'           =>  '',
            'dob'               =>  date('Y-m-d',strtotime($eventdate)),
            'age'               =>  $age,
            'qualification'     =>  $qualification,
            'professional'      =>  $professional,
            'rationcard_num'    =>  $rationcard_num,
            'pancard'           =>  $pancard,
            'addhaar_num'       =>  $addhaar_num,
            'image'             =>  $uploadfile,
            'father_name'       =>  $father_name,
            'mother_name'       =>  $mother_name,
            'updated'           =>  date('Y-m-d H:i:s'),
            'married_type'      =>  $marriedtype,
            'note'              =>  $uploadnote,
        );
        $savedata   =   $this->Model_default->insertid('jmp_details',$insertdata);
        if($savedata != 0){  
            $this->session->set_flashdata('success', 'Successfully added.');
            redirect(base_url('dashboard/citizens/citizenslist'));
        }else{
            $this->session->set_flashdata('error', 'Failed to added.');
            redirect(base_url('dashboard/citizens/newcitizens'));
        }
    }
    
    public function citizenslist(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Citizens List..!"; 
        $data['citizenslists']    =   $this->Model_default->selectconduction('jmp_details',array('status'=>1));
		$this->loadview('Ctizens/citizenslist.php',$data);
    }
    
    
    
    public function citizentoorg(){
        $id = $this->uri->segment(4);
        if(isset($id) && $id != ''){
            $conduction = array('id'=>$id);
            $updatedata = array('in_organization'=>1,'updated'=>date('Y-m-d H:i:s'));
            $update  =  $this->Model_default->updatedata('jmp_details',$updatedata,$conduction);
            if($update != 0){  
                $this->session->set_flashdata('success', 'Successfully added community.');
                redirect(base_url('dashboard/citizens/citizenslist'));
            }else{
                $this->session->set_flashdata('error', 'Failed to add in community.');
                redirect(base_url('dashboard/citizens/citizenslist'));
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid request to join community.');
            redirect(base_url('dashboard/citizens/citizenslist'));
        }
    }
    
    public function citizentounorg(){
        $id = $this->uri->segment(4);
        if(isset($id) && $id != ''){
            $conduction = array('id'=>$id);
            $updatedata = array('in_organization'=>0,'updated'=>date('Y-m-d H:i:s'));
            $update  =  $this->Model_default->updatedata('jmp_details',$updatedata,$conduction);
            if($update != 0){  
                $this->session->set_flashdata('success', 'Successfully added community.');
                redirect(base_url('dashboard/citizens/citizenslist'));
            }else{
                $this->session->set_flashdata('error', 'Failed to add in community.');
                redirect(base_url('dashboard/citizens/citizenslist'));
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid request to join community.');
            redirect(base_url('dashboard/citizens/citizenslist'));
        }
    }
    
    public function gallerydelete(){
        $id = $this->uri->segment(4);
        if(isset($id) && $id != ''){
            $data = $this->Model_default->selectconduction('jmp_gallery_files',array('event_id'=>$id));
            foreach($data as $files){
                @unlink(base_url().$files->names);
            }
            $delete  = $this->Model_default->deleterecord('jmp_gallery_files',array('event_id'=>$id));
            $deletes = $this->Model_default->deleterecord('jmp_gallery',array('id'=>$id));
            if($delete != 0 & $deletes != 0){
                $this->session->set_flashdata('success', 'Successfully deleted Event Gallery.');
                redirect(base_url('dashboard/gallery/gallerylist'));
            }else{
                $this->session->set_flashdata('error', 'Failed to deleted Event Gallery.');
                redirect(base_url('dashboard/gallery/gallerylist'));
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid request to deleted Event Gallery.');
            redirect(base_url('dashboard/gallery/gallerylist'));
        }
    }
    
}
