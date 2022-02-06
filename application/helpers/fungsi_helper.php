<?php

use Dompdf\Dompdf;
use Dompdf\Options;

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

function active_class($url)
{
	$CI = &get_instance();

	return $CI->uri->segment(1) == $url;
}

function PDFGenerator($content, $filename, $paper, $orientation)
{
	// instantiate and use the dompdf class
	$options = new Options();
	$options->set('isRemoteEnabled', true);

	$dompdf = new Dompdf($options);



	$dompdf->parseDefaultView(true);
	$dompdf->loadHtml($content);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper($paper, $orientation);
	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	// Attachment 
	// true: akan download. 
	// false: preview di browser
	$dompdf->stream($filename, ['Attachment' => false]);
}
