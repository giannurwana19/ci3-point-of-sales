<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_model');
	}

	public function index()
	{
		$data['suppliers'] = $this->supplier_model->get();

		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	public function create()
	{
	}

	public function edit()
	{
	}

	public function delete($id)
	{
		$this->supplier_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>
				alert('Data berhasil dihapus');
				window.location.href = '" . site_url('supplier') . "'</script>";
		} else {
			echo "<script>
				alert('Data user gagal dihapus');
				window.location.href = '" . site_url('supplier') . "'</script>";
		}
	}
}
