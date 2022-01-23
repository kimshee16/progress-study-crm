<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequiredDocumentsController extends CI_Controller {
	public function index()
	{
		$asset_url = base_url()."assets/";
		$data['title'] = "Required Documents";
		$data['asset_url'] = $asset_url;
		$this->load->view('requireddocuments/index', $data);
	}
}