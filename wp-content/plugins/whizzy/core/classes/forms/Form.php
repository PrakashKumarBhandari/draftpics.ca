<?php
defined('ABSPATH') or die;

/**
 * @package    whizzy
 * @category   core
 */
class WhizzyFormImpl extends WhizzyHTMLElementImpl implements WhizzyForm {

	/** @var array templates */
	protected $fields = null;

	/**
	 * @param array|null $config
	 * @return WhizzyFormImpl|WhizzyHTMLElementImpl|WhizzyHTMLTagImpl
	 */
	static function instance( $config = null ) {
		$i = new self;
		$i->configure( $config );

		return $i;
	}

	/**
	 * Apply configuration.
	 *
	 * @param null|array $config
	 */
	protected function configure( $config = null ) {
		if ( $config === null ) {
			$config = array( 'template-paths' => array(), 'fields' => array() );
		}

		// setup errors
		$this->errors = array();

		// setup default autocomplete
		$this->autocomplete = whizzy::instance( 'WhizzyMeta', array() );

		// setup fields
		$this->fields = whizzy::instance( 'WhizzyMeta', $config['fields'] );
		unset( $config['fields'] );

		// invoke htmltag instance configuration
		parent::configure( $config );

		// setup paths
		$this->setmeta( 'template-paths', $config['template-paths'] );

		// it's probably wiser to explicitly provide the right page url
		$this->set( 'action', '' );
		$this->set( 'method', 'POST' );
	}

	/**
	 * Shorthand.
	 *
	 * @param $path
	 * @return static $this
	 */
	function addtemplatepath( $path ) {
		return $this->addmeta( 'template-paths', $path );
	}

	/**
	 * Note: the field configuration parameter is indented for use when
	 * invoking fields as part of creating other fields (ie. embeded field
	 * configuration inside custom fields). It is not meant for overwriting
	 * configuration and will not accept partial configuration; albeit the
	 * minimal field configuration is fairly minimal.
	 *
	 * @param string field name
	 * @param array  complete field configuration
	 * @return string
	 */
	function field( $fieldname, $fieldconfig = null ) {
		if ( $fieldconfig === null ) {
			$fieldconfig = $this->fields->get( $fieldname );
		}

		return whizzy::instance( 'WhizzyFormField', $fieldconfig )
			->setmeta( 'form', $this )
			->setmeta( 'name', $fieldname );
	}

	// Errors
	// ------------------------------------------------------------------------

	/** @var array field errors */
	protected $errors = null;

	/**
	 * @return static $this
	 */
	function errors( $errors ) {
		$this->errors = $errors;

		return $this;
	}

	/**
	 * @param string field name
	 * @return array error keys with messages
	 */
	function errors_for( $fieldname ) {
		if ( isset( $this->errors[ $fieldname ] ) ) {
			return $this->errors[ $fieldname ];
		} else { // no errors set
			return array();
		}
	}


	// Autocomplete
	// ------------------------------------------------------------------------

	/** @var WhizzyMeta autocomplete */
	protected $autocomplete = null;

	/**
	 * Autocomplete meta object passed on by the processor.
	 *
	 * @param WhizzyMeta autocomplete values
	 * @return static $this
	 */
	function autocomplete( WhizzyMeta $autocomplete ) {
		$this->autocomplete = $autocomplete;

		return $this;
	}

	/**
	 * Retrieves the value registered for auto-complete. This will not fallback
	 * to the default value set in the configuration since fields are
	 * responsible for managing their internal complexity.
	 *
	 * Typically the autocomplete values are what the processor passes on to
	 * the form.
	 *
	 * @return mixed
	 */
	function autovalue( $key, $default = null ) {
		return $this->autocomplete->get( $key, $default );
	}

	// Rendering
	// ------------------------------------------------------------------------

	/**
	 * @return string
	 */
	function __toString() {
		return $this->startform();
	}

	/**
	 * @return string
	 */
	function startform() {
		return "<form {$this->htmlattributes()}>";
	}

	/**
	 * @return string
	 */
	function endform() {
		return '</form>';
	}

	/**
	 * @param string template path
	 * @param array  configuration
	 * @return string
	 */
	function fieldtemplate( $templatepath, $conf = array() ) {
		$config = whizzy::instance( 'WhizzyMeta', $conf );

		return $this->fieldtemplate_render( $templatepath, $config );
	}

	/**
	 * @param string template path
	 * @param WhizzyMeta configuration
	 * @return string
	 */
	protected function fieldtemplate_render( $_template_path, WhizzyMeta $conf ) {
		// variables which we wish to expose to template
		$form = $this; # $this will also work

		ob_start();
		include $_template_path;

		return ob_get_clean();
	}

} # class
