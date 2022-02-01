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
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirmation', 'Password', 'required|matches[password]', ['matches' => '%s tidak sesuai dengan password']);
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');;
		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter');;
		$this->form_validation->set_message('is_unique', 'Nama sudah ada, {field} harus unik');;

		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			echo "<pre>";
			print_r($this->input->post());
			echo "</pre>";
			die;
			echo 'proses simpan data user';
		}
	}
}
