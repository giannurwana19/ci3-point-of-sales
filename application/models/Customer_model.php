<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer_model extends CI_Model
{
	public function get($customer_id = null)
	{
		$this->db->from('customer');

		if ($customer_id) {
			$this->db->where(compact('customer_id'));
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'name' => $request['name'],
			'phone' => $request['phone'],
			'address' => $request['address'],
			'gender' => $request['gender']
		];

		$this->db->insert('customer', $data);
	}

	public function update($customer_id, $request)
	{
		$data = [
			'name' => $request['name'],
			'phone' => $request['phone'],
			'address' => $request['address'],
			'gender' => $request['gender'],
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('customer', $data, compact('customer_id'));
	}

	public function delete($customer_id)
	{
		$this->db->delete('customer', compact('customer_id'));
	}
}
