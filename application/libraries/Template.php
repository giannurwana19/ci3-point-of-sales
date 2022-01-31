<?php

class Template
{
	public $template_data = [];
	public $CI;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI = &get_instance();
	}

	public function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	public function load($template = '', $view = '', $view_data = [], $return = false)
	{
		$this->set('content', $this->CI->load->view($view, $view_data, true));

		return $this->CI->load->view($template, $this->template_data, $return);
	}
}
