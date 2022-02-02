<?php

function check_already_login()
{
	$CI = &get_instance();
	$user_session = $CI->session->userdata('user_id');

	if ($user_session) {
		redirect('dashboard');
	}
}

function check_not_login()
{
	$CI = &get_instance();
	$user_session = $CI->session->userdata('user_id');

	if (!$user_session) {
		redirect('auth/login');
	}
}

function check_admin()
{
	$CI = &get_instance();

	if ($CI->fungsi->user_login()->level != 1) {
		redirect('dashboard');
	}
}
