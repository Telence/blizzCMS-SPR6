<?php 

if ( ! function_exists('lang'))
{
	/**
	 * Get priority name
	 *
	 * @param int $code
	 * @return string
	 */
	function lang($line): string
	{
        return get_instance()->lang->line($line);
	}
}

