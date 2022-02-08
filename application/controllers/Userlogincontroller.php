<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLoginController extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}


	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "User Login";
		$data['asset_url'] = $asset_url;
		$this->load->view('userlogin/index',$data);
	}

	public function logintypical () {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->db->select('*');
        $this->db->from('officer');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $row = $query->row();
	    
	    if ($password == $row->officer_password) {
	    	if ($row->officer_status == "active") {
	    		$session_data = array(
				   	'officer_name' => $row->officer_name,
					'officer_role' => $row->officer_role,
				   	'officer_status' => $row->officer_status,
					'officer_id' => $row->officer_id,
					'email' => $email
				);
				$this->session->set_userdata($session_data);
				redirect('dashboard');
	    	} else {
	    		echo "<script>alert('This user was already inactive!');</script>";
	    		$this->returntologin();
	    	}
		} else {
			echo "<script>alert('Incorrect email or password!');</script>";
			$this->returntologin();
		}
	}

	/*public function logingoogle () {

	}*/

	public function returntologin() {
		$asset_url = base_url()."assets/";
		$data['title'] = "User Login";
		$data['asset_url'] = $asset_url;
		$this->load->view('userlogin/index',$data);
	}

	public function signout () {
		
	}

}