<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function login($post)
	{
		return $this->db->from('users')->where([
			'username' => $post['username'],
			'password' => sha1($post['password'])
		])->get();
	}

	public function get($user_id = null)
	{
		$this->db->from('users');

		if ($user_id) {
			$this->db->where('user_id', $user_id);
		}

		return $this->db->get();
	}

	public function create($request)
	{
		$data = [
			'name' => $request['name'],
			'username' => $request['username'],
			'password' => sha1($request['password']),
			'address' => $request['address'] ?: null,
			'level' => $request['level']
		];

		$this->db->insert('users', $data);
	}

	public function update($id, $request)
	{
		$data = [
			'name' => $request['name'],
			'username' => $request['username'],
			'address' => $request['address'] ?: null,
			'level' => $request['level']
		];

		if (isset($request['password'])) {
			$data['password'] = sha1($request['password']);
		}

		$this->db->update(
			'users',
			$data,
			['user_id' => $id]
		);
	}

	public function delete($id)
	{
		$this->db->delete('users', ['user_id' => $id]);
	}

	public function check_username($request)
	{
		return $this->db->where('username', $request['username'])
			->where('user_id !=', $request['user_id'])
			->get('users');
	}
}
