<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->model(['category_model', 'unit_model']);
		$this->config_upload();
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
		$item->image = null;

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
			if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Barcode {$post['barcode']} sudah dipakai barang lain");
				redirect('item/create');
			} else {
				if ($_FILES['image']['name']) {
					if ($this->upload->do_upload('image')) {
						$post['image'] = $this->upload->data('file_name');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);

						redirect('item/create');
					}
				}

				$this->item_model->create($post);
			}
		} else if (isset($post['edit'])) {
			if ($this->item_model->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Barcode {$post['barcode']} sudah dipakai barang lain");
				redirect("item/edit/{$post['item_id']}");
			} else {
				if ($_FILES['image']['name']) {
					$old_image = $this->item_model->get($post['item_id'])->row()->image;

					if ($old_image) {
						unlink("uploads/products/$old_image");
					}

					if ($this->upload->do_upload('image')) {
						$post['image'] = $this->upload->data('file_name');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);

						redirect("item/edit/{$post['item_id']}");
					}
				}

				$this->item_model->update($post['item_id'], $post);
			}
		} else {
			show_404();
		}

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('item');
		}
	}

	public function edit($id)
	{
		$data['item'] = $this->item_model->get($id)->row();
		$data['page'] = 'edit';

		$data['categories'] = $this->category_model->get()->result();

		$units[null] = '-- Pilih --';
		foreach ($this->unit_model->get()->result_array() as  $unit) {
			$units[$unit['unit_id']] = $unit['name'];
		};

		$data['units'] = $units;
		$data['selected_unit'] = $data['item']->unit_id;

		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function delete($id)
	{
		$old_image = $this->item_model->get($id)->row()->image;

		if ($old_image) {
			unlink("uploads/products/$old_image");
		}

		$this->item_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('item');
		}
	}

	public function barcode_qrcode($id)
	{
		$data['item'] = $this->item_model->get($id)->row();
		$data['generator'] = new Picqer\Barcode\BarcodeGeneratorPNG();

		$this->template->load('template', 'product/item/barcode_qrcode', $data);
	}

	private function config_upload()
	{
		$config['upload_path']          = './uploads/products';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 1024;
		$config['file_name']			= 'item-product-' . uniqid();

		$this->load->library('upload', $config);
	}
}
