<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->load('template', 'supplier/supplier_data');
	}
}

/* End of file Supplier.php and path \application\controllers\Supplier.php */
