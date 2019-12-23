<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Default_controller extends BaseController{
	
    public function __construct(){
        parent::__construct();
        $this->load->model('model_default');
    }

    public function stateslist(){
        extract($_REQUEST);
        $stateslist = $this->model_default->selecteddata('app_states',array('status'=>1,'country_id'=>$country));
        echo json_encode($stateslist);
    }

    public function districtlist(){
        extract($_REQUEST);
        $districtlist = $this->model_default->selecteddata('app_cities',array('status'=>1,'state_id'=>$stateid));
        echo json_encode($districtlist);
    }

   
    
    
}