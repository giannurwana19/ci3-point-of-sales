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
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;

		$data['supplier'] = $supplier;
		$data['page'] = 'add';

		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	public function proccess()
	{
		$post = $this->input->post(null, true);

		if (isset($post['add'])) {
			$this->supplier_model->create($post);

			response_message('supplier', 'ditambah');
		} else if (isset($post['edit'])) {
			$this->supplier_model->update($post['supplier_id'], $post);

			response_message('supplier', 'diubah');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data['supplier'] = $this->supplier_model->get($id)->row();
		$data['page'] = 'edit';

		$this->template->load('template', 'supplier/supplier_form', $data);
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
				alert('Data gagal dihapus');
				window.location.href = '" . site_url('supplier') . "'</script>";
		}
	}
}
