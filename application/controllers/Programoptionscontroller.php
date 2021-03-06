<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programoptionscontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}
	
	public function newprogramoption($client_id)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Options";
		$data['asset_url'] = $asset_url;
		$data['client_id'] = $client_id;

		//$poidnew = 0;

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('programoptions/newprogramoptions', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveprogramoptions() {
		$data = array(
					'provider_id' => $this->input->post('provider_id'),
					'sp_id' => $this->input->post('sp_id'),
					'indicativeannualcost' => $this->input->post('indicativeannualcost'),
					'duration' => $this->input->post('duration'),
					'location' => $this->input->post('location'),
					'englishrequirement' => $this->input->post('englishrequirement'),
					'intake' => $this->input->post('intake'),
					'importanttoconsider' => $this->input->post('importanttoconsider'),
					'migrationpathway' => $this->input->post('migrationpathway'),
					'prepby' => $this->session->officer_id,
					'prepdate' => date("Y-m-d"),
					'client_id' => $this->input->post('client_id'),
					'status' => ''
				);
		$this->db->insert('programoptions', $data);
		redirect('editclientinfo2/'.$this->input->post('client_id'));
	}

	public function updateprogramoptions() {
		$this->db->set('provider_id', $this->input->post('provider_id'));
		$this->db->set('sp_id', $this->input->post('sp_id'));
		$this->db->set('indicativeannualcost', $this->input->post('indicativeannualcost'));
		$this->db->set('duration', $this->input->post('duration'));
		$this->db->set('location', $this->input->post('location'));
		$this->db->set('englishrequirement', $this->input->post('englishrequirement'));
		$this->db->set('intake', $this->input->post('intake'));
		$this->db->set('importanttoconsider', $this->input->post('importanttoconsider'));
		$this->db->set('migrationpathway', $this->input->post('migrationpathway'));
		$this->db->set('client_id', $this->input->post('client_id'));
		$this->db->where('poid', $this->input->post('poid'));
		$this->db->update('programoptions');

		redirect('editclientinfo2/'.$this->input->post('client_id'));
	}

	public function editprogramoption($poid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Options";
		$data['asset_url'] = $asset_url;
		$data['poid'] = $poid;

		//$poidnew = 0;

		$sql6 = "SELECT * FROM programoptions po inner join education_provider s on po.provider_id = s.provider_id inner join schoolprograms sp on sp.spid = po.sp_id where po.poid = '$poid'";
        $query6 = $this->db->query($sql6);
        $programoptions = $query6->result();

        $sql7 = "SELECT * FROM programoptionsdetails pod where poid = '$poid'";
        $query7 = $this->db->query($sql7);
        $programoptionsdetails = $query7->result();

        $data['programoptions'] = $programoptions;
        $data['programoptionsdetails'] = $programoptionsdetails;

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('programoptions/editprogramoptions', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function newprogramoptiondetails($poid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Option Details";
		$data['asset_url'] = $asset_url;
		$data['poid'] = $poid;

		//$poidnew = 0;

		$sql = "SELECT * FROM education_provider";
	    $query = $this->db->query($sql);
	    $schools = $query->result();

	    $data['schools'] = $schools;

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}
		
		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('programoptions/newprogramoptiondetails', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function editprogramoptiondetails($podid)
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Program Option Details";
		$data['asset_url'] = $asset_url;
		$data['podid'] = $podid;

		//$poidnew = 0;

		$sql7 = "SELECT * FROM programoptionsdetails pod where poid = '$podid'";
        $query7 = $this->db->query($sql7);
        $programoptionsdetails = $query7->result();

		$data['programoptionsdetails'] = $programoptionsdetails;

		$this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('programoptions/editprogramoptiondetails', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveprogramoptiondetails() {
		$data = array(
					'poid' => $this->input->post('poid'),
					'expensestype' => $this->input->post('expensestype'),
					'perperson' => $this->input->post('perperson'),
					'amountrequired' => $this->input->post('amountrequired'),
					'numberoffamily' => $this->input->post('numberoffamily'),
					'amounttoaccess' => $this->input->post('amounttoaccess'),
					'confirmaccesstofunds' => $this->input->post('confirmaccesstofunds')
				);
		$this->db->insert('programoptionsdetails', $data);
		redirect(base_url().'index.php/editprogramoptions/'.$this->input->post('poid'));
	}

	public function updateprogramoptiondetails() {
		$this->db->set('expensestype', $this->input->post('expensestype'));
		$this->db->set('perperson', $this->input->post('perperson'));
		$this->db->set('amountrequired', $this->input->post('amountrequired'));
		$this->db->set('numberoffamily', $this->input->post('numberoffamily'));
		$this->db->set('amounttoaccess', $this->input->post('amounttoaccess'));
		$this->db->set('confirmaccesstofunds', $this->input->post('confirmaccesstofunds'));
		$this->db->where('podid', $this->input->post('podid'));
		$this->db->update('programoptionsdetails');

		redirect(base_url().'index.php/editprogramoptions/'.$this->input->post('podid'));
	}

}