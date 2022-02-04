<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
	public function get($unit_id = null)
	{
		$this->db->from('unit');

		if ($unit_id) {
			$this->db->where(compact('unit_id'));
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'name' => $request['name'],
		];

		$this->db->insert('unit', $data);
	}

	public function update($unit_id, $request)
	{
		$data = [
			'name' => $request['name'],
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('unit', $data, compact('unit_id'));
	}

	public function delete($unit_id)
	{
		$this->db->delete('unit', compact('unit_id'));
	}
}
