<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Gallery extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('Model_default');
        $this->load->model('Model_dashboard');
    }

	public function setup(){
	    $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Gallery Setup..!"; 
        $data['gtypes'] = $this->Model_default->selectconduction('jmp_upload_types',array('status'=>1));
		$this->loadview('Gallery/setup.php',$data);
	}
    
    public function savesetup(){
        extract($_REQUEST);
        $insertdata =   array('name'=>$uploadtype,'note'=>$uploadnote);
        $tablename  =   'jmp_upload_types';
        $savedata   =   $this->Model_default->insertid($tablename,$insertdata);
        if($savedata != 0){
            $this->session->set_flashdata('success', 'Successfully Saved.');
            redirect(base_url('dashboard/gallery/setup'));
        }else{
            $this->session->set_flashdata('error', 'Failed to Save.');
            redirect(base_url('dashboard/gallery/setup'));
        }   
    }
    
    public function editsetup(){
        extract($_REQUEST);
        print_r($_REQUEST);
        $id = $this->uri->segment(4);
        if(isset($id) && $id != ''){
            $conduction =   array('id'=>$id);
            $insertdata =   array('name'=>$uploadtype,'note'=>$uploadnote);
            $tablename  =   'jmp_upload_types';
            $savedata   =   $this->Model_default->updatedata($tablename,$insertdata,$conduction);
            if($savedata != 0){
                $this->session->set_flashdata('success', 'Successfully Update.');
                redirect(base_url('dashboard/gallery/setup'));
            }else{
                $this->session->set_flashdata('error', 'Failed to update.');
                redirect(base_url('dashboard/gallery/setup'));
            }   
        }else{
            $this->session->set_flashdata('error', 'Invalid request.');
            redirect(base_url('dashboard/gallery/setup'));
        }
    }
    
    public function newgallery(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Gallery Setup..!"; 
        $data['gtypes'] = $this->Model_default->selectconduction('jmp_upload_types',array('status'=>1));
        $data['gevents']    =   $this->Model_default->selectconduction('jmp_events',array('status'=>1));
		$this->loadview('Gallery/newgallery.php',$data);
    }
    
    public function savegallery(){
        extract($_REQUEST);
        //insert first event data
        $insertdata = array(
            'title'         =>  $uploadtitle,
            'upload_type'   =>  $uploadtype,
            'note'          =>  $uploadnote,
            'event_date'    =>  date('Y-m-d',strtotime($eventdate)),
            'event_tags'    =>  serialize($eventslink),
            'updated'       =>  date('Y-m-d H:i:s')
        );
        $savedata   =   $this->Model_default->insertid('jmp_gallery',$insertdata);
        if($savedata != 0){
            $this->createdir('uploads/events/'.date('Y-m-d',strtotime($eventdate)),'uploads/events/'.date('Y-m-d',strtotime($eventdate)));
            if($uploadtype == 1){
                $uploadfiles = $this->multiuploadfiles('uploads/events/'.date('Y-m-d',strtotime($eventdate)),'uploadsource','jpg|png|jpeg|JPEG',FALSE,'','');
            }else if($uploadtype == 2){
                $uploadfiles = $this->multiuploadfiles('uploads/events/'.date('Y-m-d',strtotime($eventdate)),'uploadsource','mp4|avi|vob|wmv',FALSE,'','');
            }else if($uploadtype == 3){
                $uploadfiles = $this->multiuploadfiles('uploads/events/'.date('Y-m-d',strtotime($eventdate)),'uploadsource','jpg|png|jpeg|JPEG|mp4|avi|vob|wmv',FALSE,'','');
            }
            if($uploadfiles['status'] == 1){
                foreach($uploadfiles['uploaddata'] as $uploads){
                    $insertsource = array('event_id'=>$savedata,'names'=>$uploads);
                    $this->Model_default->insertid('jmp_gallery_files',$insertsource);
                }    
                $this->session->set_flashdata('success', 'Successfully uploaded Event Gallery.');
                redirect(base_url('dashboard/gallery/gallerylist'));
            }else{
                $this->Model_default->deleterecord('jmp_gallery_files',array('event_id'=>$savedata));
                $this->Model_default->deleterecord('jmp_gallery',array('id'=>$savedata));
                $this->session->set_flashdata('error', 'Failed to Save Gallery event.');
                redirect(base_url('dashboard/gallery/newgallery'));
            }
        }else{
            $this->session->set_flashdata('error', 'Failed to Save Gallery event.');
            redirect(base_url('dashboard/gallery/newgallery'));
        }
    }
    
    
    public function gallerylist(){
        $logindata = $this->session->userdata;
	    $id =   $logindata['uid'];
        $userdetails = $this->Model_default->selectconduction('jmp_details',array('id'=>$id));
        $data['userdetails'] = $userdetails[0];
        
        $data['pagetitle'] = "Gallery List..!"; 
        $data['gallerylists']    =   $this->Model_default->selectconduction('jmp_gallery',array('status'=>1));
		$this->loadview('Gallery/gallerylist.php',$data);
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
