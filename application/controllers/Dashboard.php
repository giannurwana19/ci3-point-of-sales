<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->load('template', 'dashboard');
	}
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
