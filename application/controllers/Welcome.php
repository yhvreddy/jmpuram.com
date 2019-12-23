<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Welcome extends BaseController{
	
    public function __construct(){
        parent::__construct();
        $this->load->model('Model_default');
    }

    public function index(){
        $this->global['pageTitle'] = 'Welcome to Jm.puram..';
        $this->global['gallerylists']    =   $this->Model_default->selectorderbylimit('jmp_gallery',array('status'=>1),'id DESC',6,'');
        $this->global['events']  = $this->Model_default->selectorderbylimit('jmp_events',array('status'=>1),'DATE(start) ASC',3,'');
        $this->loadviews('jmp_homepage',$this->global);
    }

    public function aboutus(){
        $this->global['pageTitle']  =   'About village..!';
        $this->loadviews('jmp_aboutus',$this->global);
    }
    
    public function organization(){
        $this->global['pageTitle']  =   'About organization..!';
        $this->loadviews('jmp_org',$this->global);
    }
    
    public function aims(){
        $this->global['pageTitle']  =   'Organization aim..!';
        $this->loadviews('jmp_org_aims',$this->global);
    }
    
    public function members(){
        $this->global['pageTitle']  =   'Organization members..!';
        $this->global['orglists']   =   $this->Model_default->selectconduction('jmp_details',array('status'=>1,'in_organization'=>1));
        $this->loadviews('jmp_org_members',$this->global);
    }
    
     public function resources(){
        $this->global['pageTitle']  =   'Village resources..!';
        $this->loadviews('jmp_resources',$this->global);
    }
    
    public function temples(){
        $this->global['pageTitle']  =   'Village Temples..!';
        $this->loadviews('jmp_resources_temples',$this->global);
    }
    
    public function functionhalls(){
        $this->global['pageTitle']  =   'Village function halls..!';
        $this->loadviews('jmp_resources_functionhalls',$this->global);
    }
    
    public function education(){
        $this->global['pageTitle']  =   'Village Education details..!';
        $this->loadviews('jmp_resources_education',$this->global);
    }
    
    public function collegedetails(){
        $this->global['pageTitle']  =   'College details..!';
        $this->loadviews('jmp_resources_education_college',$this->global);
    }
    
    public function gallery(){
        $this->global['pageTitle']  =   'Village & Events gallery..!';
        $this->global['gallerylists']    =   $this->Model_default->selectconduction('jmp_gallery',array('status'=>1));
        $this->loadviews('jmp_gallery',$this->global);
    }
    
    public function galleryevent(){
        $id     = $this->uri->segment(2);
        $title  = $this->uri->segment(3);
        $this->global['pageTitle']  =   'Event '.$title;
        $this->global['gallerylists']    =   $this->Model_default->selectconduction('jmp_gallery',array('id'=>$id));
        $this->loadviews('jmp_gallery_details',$this->global);
    }
    
    public function events(){
        $this->global['pageTitle']  =   'Village events..!';
        $this->global['events']  = $this->Model_default->selectorderbylimit('jmp_events',array('status'=>1),'id DESC',12,'');
        $this->loadviews('jmp_events',$this->global);
    }
    
    public function contactus(){
        $this->global['pageTitle']  =   'village contact details..!';
        $this->loadviews('jmp_contactus',$this->global);
    }
    
}