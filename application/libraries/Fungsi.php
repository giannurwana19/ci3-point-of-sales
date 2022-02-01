<?php

class Fungsi
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->model('user_model');
	}

	public function user_login()
	{
		$user_id = $this->CI->session->userdata('user_id');
		$userdata = $this->CI->user_model->get($user_id)->row();

		return $userdata;
	}
}
