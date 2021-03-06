<?php
defined('ABSPATH') or die;

/**
 * @package    whizzy
 * @category   core
 */
interface WhizzyHTMLElement extends WhizzyHTMLTag {

	/**
	 * @param string meta key
	 * @return boolean true if key exists, false otherwise
	 */
	function hasmeta( $key );

	/**
	 * @return mixed value or default
	 */
	function getmeta( $key, $default = null );

	/**
	 * @return static $this
	 */
	function setmeta( $key, $value );

	/**
	 * Set the key if it's not already set.
	 *
	 * @param string key
	 * @param string value
	 */
	function ensuremeta( $key, $value );

	/**
	 * If the key is currently a non-array value it will be converted to an
	 * array maintaning the previous value (along with the new one).
	 *
	 * @param  string name
	 * @param  mixed  value
	 * @return static $this
	 */
	function addmeta( $name, $value );

	/**
	 * @return WhizzyMeta form meta
	 */
	function meta();

} # interface
