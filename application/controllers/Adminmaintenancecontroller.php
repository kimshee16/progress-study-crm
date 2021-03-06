<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmaintenancecontroller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
	}

	public function index()
	{
		$sql1 = "SELECT * FROM region";
	    $query1 = $this->db->query($sql1);
	    $region = $query1->result();

	    $sql2 = "SELECT * FROM events";
	    $query2 = $this->db->query($sql2);
	    $events = $query2->result();

	    $sql2 = "SELECT * FROM officer";
	    $query2 = $this->db->query($sql2);
	    $officer = $query2->result();

	    $sql3 = "SELECT * FROM officerassignment oa inner join officer o on oa.oaid = o.officer_id inner join region r on oa.region_id = r.region_id";
	    $query3 = $this->db->query($sql3);
	    $officerassignment = $query3->result();

	    $sql2 = "SELECT * FROM emailcontents LIMIT 1";
	    $query2 = $this->db->query($sql2);
	    $emailcontents = $query2->result();

	    $sql2 = "SELECT * FROM parameters LIMIT 1";
	    $query2 = $this->db->query($sql2);
	    $parameters = $query2->result();

	    $sql2 = "SELECT * FROM privilege";
	    $query2 = $this->db->query($sql2);
	    $privilege = $query2->result();

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_officers'] = $row3->privilege_manage_officers;
		        $data['privilege_manage_commissions'] = $row3->privilege_manage_commissions;
		        $data['privilege_manage_channel'] = $row3->privilege_manage_channel;
		        $data['privilege_manage_parameters'] = $row3->privilege_manage_parameters;
		        $data['privilege_manage_privilege'] = $row3->privilege_manage_privilege;
		        $data['privilege_manage_database'] = $row3->privilege_manage_database;
		        $data['privilege_manage_offices'] = $row3->privilege_manage_offices;
		        $data['privilege_staff_bonus'] = $row3->privilege_staff_bonus;
		        $data['privilege_manage_events'] = $row3->privilege_manage_events;
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

        $asset_url = base_url()."assets/";
		$data['title'] = "Admin Maintenance";
		$data['asset_url'] = $asset_url;
		
		$data['region'] = $region;
		$data['officer'] = $officer;
		$data['officerassignment'] = $officerassignment;
		$data['emailcontents'] = $emailcontents;
		$data['parameters'] = $parameters;
		$data['privilege'] = $privilege;
		$data['events'] = $events;

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
			$this->load->view('maintenance/index', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
		
	}

	public function newregion()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Region";
		$data['asset_url'] = $asset_url;

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
			$this->load->view('maintenance/newregion', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveregion()
	{

		$data = array(
					'region_name' => $this->input->post('regionname'),
					'region_description' => $this->input->post('regiondescription')
				);
		$this->db->insert('region', $data);
		redirect('adminmaintenance');
	}

	public function newofficer()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Officer";
		$data['asset_url'] = $asset_url;

		$sql1 = "SELECT * FROM offices";
	    $query1 = $this->db->query($sql1);
	    $offices = $query1->result();

	    $sql2 = "SELECT * FROM region";
	    $query2 = $this->db->query($sql2);
	    $region = $query2->result();

	    $sql3 = "SELECT * FROM mastersetting where details = 'for roles'";
	    $query3 = $this->db->query($sql3);
	    $mastersetting = $query3->result();

	    $this->db->where('privilege_id', $this->session->officer_role_id);
        $query3 = $this->db->get('privilege');

		foreach ($query3->result() as $row3)
		{
		        $data['privilege_manage_providers'] = $row3->privilege_manage_providers;
		        $data['privilege_manage_reporting'] = $row3->privilege_manage_reporting;
		        $data['privilege_manage_studentapps'] = $row3->privilege_manage_studentapps;
		}

	    $data['offices'] = $offices;
	    $data['region'] = $region;
	    $data['mastersetting'] = $mastersetting;

		if($this->session->officer_role == "") {
			redirect(base_url()."index.php/messages");
		} else {
			if(isset($this->session->officer_name)) {
				$this->load->view('maintenance/newofficer', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveofficer()
	{

		$data = array(
					'region_name' => $this->input->post('regionname'),
					'region_description' => $this->input->post('regiondescription')
				);
		$this->db->insert('region', $data);
		redirect('adminmaintenance');
	}

	public function do_upload()
        {
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $data = array('error' => $this->upload->display_errors());
                        $this->load->view('newofficer', $data);
                }
                else
                {
                	$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

                	$data = array(
								'officer_login_name' => $this->input->post('loginname'),
			                	'officer_name' => $this->input->post('name'),
			                	'officer_last_logged_date' => date("Y-m-d"),
			                	'officer_password' => $this->input->post('password'),
			                	'officer_role' => $this->input->post('role'),
			                	'officer_status' => 'active',
			                	'officer_photo' => $file_name,
			                	'officer_office_id' => $this->input->post('office'),
			                	'email' => $this->input->post('email'),
			                	'officer_region' => $this->input->post('region'),
			                	'user_role_id' => $this->input->post('role')
							);

					$this->db->insert('officer', $data);
                    redirect('adminmaintenance');
                }
                
        }

    public function newassignment()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "New Region Assignment";
		$data['asset_url'] = $asset_url;

		$sql1 = "SELECT * FROM officer";
	    $query1 = $this->db->query($sql1);
	    $officer = $query1->result();

	    $sql2 = "SELECT * FROM region";
	    $query2 = $this->db->query($sql2);
	    $region = $query2->result();

	    $data['officer'] = $officer;
	    $data['region'] = $region;

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
				$this->load->view('maintenance/newassignment', $data);
			} else {
				redirect(base_url()."?error3=1");
			}
		}
	}

	public function saveassignment()
	{
		$data = array(
					'officer_id' => $this->input->post('officer'),
					'region_id' => $this->input->post('region'),
					'city' => $this->input->post('city'),
					'datecreated' => date("Y-m-d"),
					'bactive' => 1
				);
		$this->db->insert('officerassignment', $data);
		redirect('adminmaintenance');
	}

	public function saveemailcontent()
	{
		$this->db->set('iaremailheader', $this->input->post('iaremailheader'));
		$this->db->set('iaremailbody', $this->input->post('iaremailbody'));
		$this->db->set('iaremailfooter', $this->input->post('iaremailfooter'));
		$this->db->set('memailheader', $this->input->post('memailheader'));
		$this->db->set('memailbody', $this->input->post('memailbody'));
		$this->db->set('memailfooter', $this->input->post('memailfooter'));
		$this->db->set('remailheader', $this->input->post('remailheader'));
		$this->db->set('remailbody', $this->input->post('remailbody'));
		$this->db->set('remailfooter', $this->input->post('remailfooter'));
		$this->db->update('emailcontents');
		redirect('adminmaintenance');
	}

	public function saveparameters()
	{
		$this->db->set('account_name', $this->input->post('account_name'));
		$this->db->set('bank_name', $this->input->post('bank_name'));
		$this->db->set('branch_name', $this->input->post('branch_name'));
		$this->db->set('bsb_no', $this->input->post('bsb_no'));
		$this->db->set('account_no', $this->input->post('account_no'));
		$this->db->set('invoice_due_day', $this->input->post('invoice_due_day'));
		$this->db->set('invoice_prefix', $this->input->post('invoice_prefix'));
		$this->db->set('address', $this->input->post('address'));
		$this->db->set('phoneno', $this->input->post('phoneno'));
		$this->db->set('faxno', $this->input->post('faxno'));
		$this->db->set('email', $this->input->post('email'));
		$this->db->set('abn', $this->input->post('abn'));
		$this->db->set('redeemable_point', $this->input->post('redeemable_point'));
		$this->db->update('parameters');
	}

	public function updatepriviledge()
	{
		$this->db->set('privilege_manage_clients', $this->input->post('privilege_manage_clients'));
		$this->db->set('privilege_manage_officers', $this->input->post('privilege_manage_officers'));
		$this->db->set('privilege_manage_providers', $this->input->post('privilege_manage_providers'));
		$this->db->set('privilege_manage_studentapps', $this->input->post('privilege_manage_studentapps'));
		$this->db->set('privilege_manage_studentdocs', $this->input->post('privilege_manage_studentdocs'));
		$this->db->set('privilege_manage_commissions', $this->input->post('privilege_manage_commissions'));
		$this->db->set('privilege_manage_prapps', $this->input->post('privilege_manage_prapps'));
		$this->db->set('privilege_manage_prdocs', $this->input->post('privilege_manage_prdocs'));
		$this->db->set('privilege_manage_prfeereceived', $this->input->post('privilege_manage_prfeereceived'));
		$this->db->set('privilege_manage_prfeepaid', $this->input->post('privilege_manage_prfeepaid'));
		$this->db->set('privilege_manage_reporting', $this->input->post('privilege_manage_reporting'));
		$this->db->set('privilege_manage_channel', $this->input->post('privilege_manage_channel'));
		$this->db->set('privilege_manage_parameters', $this->input->post('privilege_manage_parameters'));
		$this->db->set('privilege_manage_privilege', $this->input->post('privilege_manage_privilege'));
		$this->db->set('privilege_manage_database', $this->input->post('privilege_manage_database'));
		$this->db->set('$privilege_manage_offices', $this->input->post('$privilege_manage_offices'));
		$this->db->set('$privilege_view_fees', $this->input->post('$privilege_view_fees'));
		$this->db->set('$privilege_staff_bonus', $this->input->post('$privilege_staff_bonus'));
		$this->db->set('privilege_manage_events', $this->input->post('privilege_manage_events'));
		$this->db->update('privilege');
	}

	


}