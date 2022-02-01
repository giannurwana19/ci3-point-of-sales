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
}
