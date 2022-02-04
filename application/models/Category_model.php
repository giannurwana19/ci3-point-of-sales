<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function get($category_id = null)
	{
		$this->db->from('category');

		if ($category_id) {
			$this->db->where(compact('category_id'));
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'name' => $request['name'],
		];

		$this->db->insert('category', $data);
	}

	public function update($category_id, $request)
	{
		$data = [
			'name' => $request['name'],
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('category', $data, compact('category_id'));
	}

	public function delete($category_id)
	{
		$this->db->delete('category', compact('category_id'));
	}
}
