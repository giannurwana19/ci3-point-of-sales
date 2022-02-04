<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
	public function get($supplier_id = null)
	{
		$this->db->from('supplier');

		if ($supplier_id) {
			$this->db->where(compact('supplier_id'));
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'name' => $request['name'],
			'phone' => $request['phone'],
			'address' => $request['address'],
			'description' => $request['description']
		];

		$this->db->insert('supplier', $data);
	}

	public function update($supplier_id, $request)
	{
		$data = [
			'name' => $request['name'],
			'phone' => $request['phone'],
			'address' => $request['address'],
			'description' => $request['description'],
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('supplier', $data, compact('supplier_id'));
	}

	public function delete($supplier_id)
	{
		$this->db->delete('supplier', compact('supplier_id'));
	}
}
