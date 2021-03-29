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


if ( ! function_exists('config'))
{
	/**
	 * @param mixed $config
	 * 
	 * @return string
	 */
	function config($config): string
	{
        return get_instance()->config->item($config);
	}
	
}
