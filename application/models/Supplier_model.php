<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('supplier');

		if ($id) {
			$this->db->where('supplier', $id);
		}

		return $this->db->get();
	}

	public function delete($supplier_id)
	{
		$this->db->delete('supplier', compact('supplier_id'));
	}
}
