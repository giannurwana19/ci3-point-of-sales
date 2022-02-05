<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model(['category_model', 'unit_model']);
	}

	public function index()
	{
		$data['items'] = $this->item_model->get();

		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function create()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->name = null;
		$item->barcode = null;
		$item->category_id = null;
		$item->unit_id = null;
		$item->price = null;

		$data['item'] = $item;
		$data['page'] = 'add';
		$data['categories'] = $this->category_model->get()->result();

		$units[null] = '-- Pilih --';
		foreach ($this->unit_model->get()->result_array() as  $unit) {
			$units[$unit['unit_id']] = $unit['name'];
		};

		$data['units'] = $units;
		$data['selected_unit'] = null;

		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function proccess()
	{
		$post = $this->input->post(null, true);

		if (isset($post['add'])) {
			$this->item_model->create($post);

			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('item');
		} else if (isset($post['edit'])) {
			$this->item_model->update($post['item_id'], $post);

			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('item');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data['item'] = $this->item_model->get($id)->row();
		$data['page'] = 'edit';

		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function delete($id)
	{
		$this->item_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('item');
		}
	}
}
