<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
	}

	public function index()
	{
		$data['customers'] = $this->customer_model->get();

		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function create()
	{
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->phone = null;
		$customer->address = null;
		$customer->gender = null;

		$data['customer'] = $customer;
		$data['page'] = 'add';

		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function proccess()
	{
		$post = $this->input->post(null, true);

		if (isset($post['add'])) {
			$this->customer_model->create($post);

			response_message('customer', 'ditambah');
		} else if (isset($post['edit'])) {
			$this->customer_model->update($post['customer_id'], $post);

			response_message('customer', 'diubah');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data['customer'] = $this->customer_model->get($id)->row();
		$data['page'] = 'edit';

		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function delete($id)
	{
		$this->customer_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script>
				alert('Data berhasil dihapus');
				window.location.href = '" . site_url('customer') . "'</script>";
		} else {
			echo "<script>
				alert('Data gagal dihapus');
				window.location.href = '" . site_url('customer') . "'</script>";
		}
	}
}
