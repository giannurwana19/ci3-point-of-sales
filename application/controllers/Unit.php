<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('unit_model');
	}

	public function index()
	{
		$data['units'] = $this->unit_model->get();

		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function create()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;

		$data['unit'] = $unit;
		$data['page'] = 'add';

		$this->template->load('template', 'product/unit/unit_form', $data);
	}

	public function proccess()
	{
		$post = $this->input->post(null, true);

		if (isset($post['add'])) {
			$this->unit_model->create($post);

			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('unit');
		} else if (isset($post['edit'])) {
			$this->unit_model->update($post['unit_id'], $post);

			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('unit');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data['unit'] = $this->unit_model->get($id)->row();
		$data['page'] = 'edit';

		$this->template->load('template', 'product/unit/unit_form', $data);
	}

	public function delete($id)
	{
		$this->unit_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('unit');
		}
	}
}
