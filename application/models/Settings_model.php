<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{
	protected $settings_table = 'settings';

	/**
	 * Get all rows of settings
	 *
	 * @return mixed
	 */
	public function get_all()
	{
		if (! $this->db->table_exists($this->settings_table))
		{
			return false;
		}

		return $this->db->get($this->settings_table)->result();
	}
}