<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		check_not_login();
	}

	public function index()
	{
		$users = $this->user_model->get();

		$this->template->load('template', 'user/user_data', ['users' => $users]);
	}

	public function add()
	{
		$this->_validate();

		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			$request = $this->input->post(null, true);

			$this->user_model->create($request);

			if ($this->db->affected_rows() > 0) {
				echo "<script>
				alert('Data berhasil disimpan');
				window.location.href = '" . site_url('user') . "'</script>";
			} else {
				echo "<script>
				alert('Data user gagal disimpan');
				window.location.href = '" . site_url('user') . "'</script>";
			}
		}
	}

	public function edit($id)
	{
	}

	public function delete($id)
	{
		if ($this->input->method() == 'post') {
			$this->user_model->delete($id);

			if ($this->db->affected_rows() > 0) {
				echo "<script>
				alert('Data berhasil dihapus');
				window.location.href = '" . site_url('user') . "'</script>";
			} else {
				echo "<script>
				alert('Data user gagal dihapus');
				window.location.href = '" . site_url('user') . "'</script>";
			}
		} else {
			show_404();
		}
	}

	private function _validate()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password', 'required|matches[password]|min_length[6]', ['matches' => '%s tidak sesuai dengan password']);
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
		$this->form_validation->set_message('is_unique', 'Nama sudah ada, {field} harus unik');
	}
}
