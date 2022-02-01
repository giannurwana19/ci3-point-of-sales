<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$users = $this->user_model->get();

		$this->template->load('template', 'user/user_data', ['users' => $users]);
	}

	public function add()
	{
		$this->template->load('template', 'user/user_form_add');
	}
}
