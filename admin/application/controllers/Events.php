<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Events extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
        $this->load->model('Model_dashboard');
    }
    
    //enote for superadmin or admin only to save guide for like prof
    public function index($externaldata = NULL){
        $this->addevents();
    }
    
    //events add
    public function addevents(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Events..!"; 
        $data['events'] = $this->Model_default->selectconduction('jmp_events',array('status'=>1));
		$this->loadview('Events/events.php',$data);
    }

    //calendar addEvent
    public function saveeventdetails(){
        extract($_REQUEST);
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $userdetails = $userdetails[0];
        $this->createdir('uploads/events/'.date('Y-m-d'),'uploads/events/'.date('Y-m-d'));
        $upload = $this->uploadfiles('uploads/events/'.date('Y-m-d'),'uploadsource','*',FALSE,'','');
        if($upload['status'] != 0){
            $uploadfile = 'uploads/events/'.date('Y-m-d').'/'.$upload['uploaddata']['file_name'];
        }else{
            $uploadfile = '';
        }
        $saveevent = array(
            'title'=>$title,
            'start'=>$start,
            'end'=>$end,    
            'color'=>$color,
            'note'=>$eventdescription,
            'updated'   =>  date('Y-m-d H:i:s'),
            'cover_image'   =>  $uploadfile,  
        );
        $enquiry = $this->Model_default->insertdata('jmp_events',$saveevent);
        if($enquiry != 0){
            $this->session->set_flashdata('success', 'Successfully save Event..!');
            $this->session->set_flashdata('text','Event '.$title);
            redirect(base_url('dashboard/events/addevents'));
        }else{
            $this->session->set_flashdata('error', 'Failed to save Event..!');
            $this->session->set_flashdata('text','Event '.$title);
            redirect(base_url('dashboard/events/addevents'));
        }
    }

    //calendar edit Event
    public function calendareditEvent(){
        extract($_REQUEST);
        //$this->print_r($_REQUEST);
        //exit;
        $schooldata = $this->session->userdata['school'];
        $regid      =   $this->session->userdata['regid'];
        $schoolid   = $schooldata->school_id;
        $branchid   = $schooldata->branch_id;
        $conduction = array('school_id'=>$schoolid,'branch_id'=>$branchid,'sno'=>$id);
        if(isset($delete) && $delete == 'yes'){
            $saveevent = array('status'=>0);
            $enquiry = $this->Model_default->updatedata('sms_events', $saveevent, $conduction);
            if ($enquiry != 0) {
                $this->session->set_flashdata('success', 'Successfully Delete Event..!');
                $this->session->set_flashdata('text', 'Event ' . $title);
                redirect(base_url('dashboard/academiccalendar'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Delete Event..!');
                $this->session->set_flashdata('text', 'Event : ' . $title);
                redirect(base_url('dashboard/academiccalendar'));
            }
        }else{
            $saveevent = array('title'=>$title,'color'=>$color,'contant'=>$eventdescription);
            $enquiry = $this->Model_default->updatedata('sms_events', $saveevent, $conduction);
            if ($enquiry != 0) {
                $this->session->set_flashdata('success', 'Successfully save Event Changes..!');
                $this->session->set_flashdata('text', 'Event ' . $title);
                redirect(base_url('dashboard/academiccalendar'));
            } else {
                $this->session->set_flashdata('error', 'Failed to save Event Changes..!');
                $this->session->set_flashdata('text', 'Event : ' . $title);
                redirect(base_url('dashboard/academiccalendar'));
            }
        }
    }

    //change event date
    public function changeEventdates(){
        extract($_REQUEST);
        //$this->print_r($_REQUEST);
        $schooldata = $this->session->userdata['school'];
        $schoolid   = $schooldata->school_id;
        $branchid   = $schooldata->branch_id;
        $id     = $Event[0];
        $start  = $Event[1];
        $end    = $Event[2];
        $conduction = array('school_id'=>$schoolid,'branch_id'=>$branchid,'sno'=>$id);
        $saveevent = array('start'=>$start,'end'=>$end);
        $enquiry = $this->Model_default->updatedata('sms_events', $saveevent, $conduction);
        if($enquiry != 0) {
            $json = array("key" => 1,"msg" => "Successfully saved Changes");
        }else{
            $json = array("key" => 1,"msg" => "Failed to save Changes");
        }
        header('content-type: application/json');
        echo json_encode($json);
    }

    //savenewenote
    public function eventslist(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Events list..!"; 
        $data['events'] = $this->Model_default->selectconduction('jmp_events',array('status'=>1));
		$this->loadview('Events/eventslist.php',$data);
    }
    
}
