<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}

	public function index()
	{
		$data['categorys'] = $this->category_model->get();

		$this->template->load('template', 'product/category/category_data', $data);
	}

	public function create()
	{
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;

		$data['category'] = $category;
		$data['page'] = 'add';

		$this->template->load('template', 'product/category/category_form', $data);
	}

	public function proccess()
	{
		$post = $this->input->post(null, true);

		if (isset($post['add'])) {
			$this->category_model->create($post);

			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			redirect('category');
		} else if (isset($post['edit'])) {
			$this->category_model->update($post['category_id'], $post);

			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('category');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data['category'] = $this->category_model->get($id)->row();
		$data['page'] = 'edit';

		$this->template->load('template', 'product/category/category_form', $data);
	}

	public function delete($id)
	{
		$this->category_model->delete($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
			redirect('category');
		}
	}
}
