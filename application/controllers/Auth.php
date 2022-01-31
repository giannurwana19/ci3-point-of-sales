<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, true);

		if (isset($post['login'])) {
			$query = $this->user_model->login($post);

			if ($query->num_rows() > 0) {
				$user = $query->row();
				$userdata = [
					'user_id' => $user->user_id,
					'level' => $user->level
				];

				$this->session->set_userdata($userdata);

				echo "<script>
				alert('Login berhasil'); 
				window.location.href = '" . site_url('dashboard') . "'</script>";
			} else {
				echo "<script>
				alert('Login gagal');
				window.location.href = '" . site_url('auth/login') . "'</script>";
			}
		}
	}
}

?>

<script>
	window.location.href
</script>
