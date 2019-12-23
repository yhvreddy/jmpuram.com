<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class BaseController extends CI_Controller {
	
	protected $id 			= '';
	protected $global 		= array ();
	protected $isLoggedIn 	= '';
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 * Data to output to the user
	 * running the script; otherwise, exit
	**/

	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}

	//This function used to check the user is logged in or not
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			redirect(base_url());
		}else{

	      	$this->id 			= $this->session->userdata('id');
	      	$this->isLoggedIn 	= $this->session->userdata('isLoggedIn');

			$this->global['id'] 		= $this->id;
			$this->global['isLoggedIn'] = $this->isLoggedIn;
		}
	}

    //load views by default loaded header and footer
    function loadview($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
        $this->load->view('header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('footer', $footerInfo);
    }
    
    //manual load view
    function loadviews($headerview = "",$viewName = "", $footerview = "", $pageInfo = NULL){
        $this->load->view($headerview, $pageInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view($footerview, $pageInfo);
    }
    
	//print pre
	public function print_r($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
  	}
    
    //mail function
    public function sendemail($viewpage = "",$viewdetails = NULL,$fromid=NULL,$toid = NULL,$title=NULL,$attachment = NULL){
        $config = Array(
            //'protocol' => 'sendmail',
            //'smtp_host' => 'your domain SMTP host',
            //'smtp_port' => 25,
            //'smtp_user' => 'SMTP Username',
            //'smtp_pass' => 'SMTP Password',
            //'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $subject = $title;
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);

        $body = $this->load->view($viewpage,$viewdetails,TRUE);
        
        $result = $this->email
            ->from($fromid)
            //->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
            ->to($toid)
            ->subject($subject)
            ->message($body)
            //->AddAttachment($attachment)
            ->attach($attachment)
            ->send();

        if($result == 'true'){
            return 1;
        }else{
            return 0;
        }
        //echo json_encode($responce);
        //echo '<br />';
        //echo $this->email->print_debugger();
        //exit;
    }
  
	//ipaddress
    public function getipaddress(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

	//creating Directory
	public function createdir($checkpath,$createpath){
		if(!is_dir($checkpath)){
            if(mkdir($createpath, 0777, true)){
                return TRUE;
            }else{
                  return FALSE;
            }
		}else{
              return TRUE;
		}
	}

  	//Single file uploading
   	public function uploadfiles($uploadpath=NULL,$uploadfile=NULL,$formats=NULL,$renaming=NULL,$width=NULL,$height=NULL){

        $upload_config = array(
            'upload_path'   =>  $uploadpath,
            'allowed_types' =>  $formats,
            'encrypt_name'  =>  $renaming,
        );
        $this->load->library('upload', $upload_config);
        $this->upload->initialize($upload_config);
        
        if(!$this->upload->do_upload($uploadfile)) {
            $report = $this->upload->display_errors();
            $uploaddata = array('status'=>0,'upload'=>'failed','uploaddata'=>$report);
            return $uploaddata;
        }else{
            if($width != '' && $height != ''){
                $upload_config['image_library'] = 'gd2';
                $upload_config['source_image'] = $uploadpath.$fileData["file_name"];
                $upload_config['create_thumb'] = FALSE;
                $upload_config['maintain_ratio'] = FALSE;
                $upload_config['quality'] = '500%';
                $upload_config['width'] = $width;
                $upload_config['height'] = $height;
                $this->load->library('image_lib', $upload_config);
                $this->image_lib->resize();
            }
            $fileData = $this->upload->data();
            $uploaddata = array('status'=>1,'upload'=>'success','uploaddata'=>$fileData);
            return $uploaddata;
        }
   	}

	//multipul files uplaoding
	public function multiuploadfiles($uploadpath=NULL,$uploadfile=NULL,$formats=NULL,$renaming=NULL,$width=NULL,$height=NULL){
		// If file upload form submitted
        $uploadfiles = array();
		$filesCount = count(array_filter($_FILES[$uploadfile]['name']));
		if($filesCount > 0){
		  	for($i = 0; $i < $filesCount; $i++){
				$_FILES['file']['name']     = $_FILES[$uploadfile]['name'][$i];
				$_FILES['file']['type']     = $_FILES[$uploadfile]['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES[$uploadfile]['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES[$uploadfile]['error'][$i];
				$_FILES['file']['size']     = $_FILES[$uploadfile]['size'][$i];
				
				// File upload configuration
				$upload_config = array(
					'upload_path'   =>  $uploadpath,
					'allowed_types' =>  $formats,
					'encrypt_name'  =>  $renaming,
                );
							
				// Load and initialize upload library
				$this->load->library('upload',$upload_config);
					$this->upload->initialize($upload_config);
				
				// Upload file to server
				if($this->upload->do_upload('file')){
					$fileData = $this->upload->data();
					/*if($width != '' && $height != ''){
                        $upload_config['image_library'] = 'gd2';
                        $upload_config['source_image'] = $uploadpath.$fileData["file_name"];
                        $upload_config['create_thumb'] = FALSE;
                        $upload_config['maintain_ratio'] = FALSE;
                        $upload_config['quality'] = '500%';
                        $upload_config['width'] = $width;
                        $upload_config['height'] = $height;
                        $this->load->library('image_lib', $upload_config);
                        $this->image_lib->resize();
					}*/ 
				    $uploadfiles[] = $uploadpath.'/'.$fileData['file_name'];
					$status = 1;
					$report = array();
					$upload = 'Success';
				}else{
					$uploadfiles = '';
					$report = $this->upload->display_errors();
					$status = 0;
					$upload = 'Failed';
				}
		  	}
		  	//$uploadedfiles = rtrim(',',$uploadfiles);
		  	$uploaddata = array('status'=>$status,'upload'=>$upload,'report'=>$report,'uploaddata'=>$uploadfiles);
			return $uploaddata;
		}else{
			$uploaddata = array('status'=>0,'upload'=>'Failed','uploaddata'=>'');
			return $uploaddata;
		}
	}
}