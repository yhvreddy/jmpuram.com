<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class BaseController extends CI_Controller {

	protected $regid = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $usertype = '';
	
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

	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {

		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			redirect (base_url());
		}else{

      $this->regid 		= $this->session->userdata('regid');
      $this->name 		= $this->session->userdata('fname');
      $this->email 		= $this->session->userdata('email');
      $this->mobile 	= $this->session->userdata('mobile');
      $this->usertype = $this->session->userdata('usertype');

			$this->global['regid'] = $this->regid;
			$this->global['name'] = $this->name;
			$this->global['email'] = $this->email;
			$this->global['mobile'] = $this->mobile;
			$this->global['usertype'] = $this->usertype;
		}
	}

	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->sess_destroy ();
		redirect ( base_url());
	}

	/**
		* This function used to load views
	 * @param {string} $viewName : This is view name
	 * @param {mixed} $headerInfo : This is array of header information
	 * @param {mixed} $pageInfo : This is array of page information
	 * @param {mixed} $footerInfo : This is array of footer information
	 * @return {null} $result : null
	**/
  function loadviews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
    $this->load->view('header', $headerInfo);
    $this->load->view($viewName, $pageInfo);
    $this->load->view('footer', $footerInfo);
  }
	
	public function pre($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}