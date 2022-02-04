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

function response_message($url, $message)
{
	$CI = &get_instance();
	$url = site_url($url);

	if ($CI->db->affected_rows() > 0) {
		echo "<script>
				alert('Data berhasil $message');
				window.location.href = '" . $url . "'</script>";
	} else {
		echo "<script>
				alert('Data gagal dihapus');
				window.location.href = '" . $url . "'</script>";
	}
}
