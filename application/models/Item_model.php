<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
	public function get($item_id = null)
	{
		$this->db->from('item');

		if ($item_id) {
			$this->db->where(compact('item_id'));
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'barcode' => $request['barcode'],
			'name' => $request['name'],
			'category_id' => $request['category_id'],
			'unit_id' => $request['unit_id'],
			'price' => $request['price'],
		];

		$this->db->insert('item', $data);
	}

	public function update($item_id, $request)
	{
		$data = [
			'barcode' => $request['barcode'],
			'name' => $request['name'],
			'category_id' => $request['category_id'],
			'unit_id' => $request['unit_id'],
			'price' => $request['price'],
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('item', $data, compact('item_id'));
	}

	public function delete($item_id)
	{
		$this->db->delete('item', compact('item_id'));
	}
}
