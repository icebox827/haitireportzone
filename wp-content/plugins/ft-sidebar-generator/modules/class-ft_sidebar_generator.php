<?php
/**
 * Returns the main instance of FT_Sidebar_Generator to prevent the need to use globals.
 * @return object FT_Sidebar_Generator
 */
function FT_Sidebar_Generator() {
	return FT_Sidebar_Generator::instance();
}

FT_Sidebar_Generator();

/**
 * Main FT_Sidebar_Generator Class
 * @class FT_Sidebar_Generator
 */
final class FT_Sidebar_Generator {
	/**
	 * FT_Sidebar_Generator The single instance of FT_Sidebar_Generator.
	 * @var 	object
	 * @access  private
	 */
	private static $_instance = null;

	protected $_menu_parent = '';
	protected $_sidebars = null;

	/**
	 * The token
	 * @var     string
	 * @access  public
	 */
	public $token;

	/**
	 * Plugin version number
	 * @var     string
	 * @access  public
	 */
	public $version;

	// WPAdmin - Start
	/**
	 * The wp-admin object.
	 * @var     object
	 * @access  public
	 */
	public $admin;

	/**
	 * Constructor function
	 * @access  public
	 *
	 */
	public function __construct( $widget_areas = array() ) {
		$this->token 			= 'ft-sidebar-generator';
		$this->plugin_url 		= plugin_dir_url( __FILE__ );
		$this->plugin_path 		= plugin_dir_path( __FILE__ );
		$this->version 			= '1.0.0';

		register_activation_hook( __FILE__, array( $this, 'install' ) );

		add_action( 'init', array( $this, 'fts_setup' ) );
	}

	/**
	 * Main FT_Sidebar_Generator Instance
	 * Ensures only one instance of FT_Sidebar_Generator is loaded
	 * @static
	 * @see FT_Sidebar_Generator()
	 * @return Main FT_Sidebar_Generator instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	}

	/**
	 * Installation
	 * Runs on activation only
	 * @access  public
	 *
	 */
	public function install() {
		$this->_log_version_number();
	}

	/**
	 * Log the version number of the plugin
	 * @access  private
	 *
	 */
	private function _log_version_number() {
		update_option( $this->token . '-version', $this->version );
	}

	/**
	 * SetUp all
	 */
	public function fts_setup() {
		$theme = wp_get_theme();

			$this->_menu_parent = 'themes.php';
			$this->register_taxonomy();
			$this->register_sidebars();
			add_action( 'admin_menu', array( $this, 'ft_register_menu' ), 11 );
			add_action( 'admin_head', array( $this, 'ft_menu_highlight' ) );
			add_filter( 'manage_edit-ft_sidebars_columns', array( $this, 'ft_manage_columns' ) );
			add_filter( 'manage_ft_sidebars_custom_column', array( $this, 'ft_manage_custom_columns' ), 10, 3 );
			add_filter( 'manage_edit-ft_sidebars_sortable_columns', array( $this, 'ft_sortable_columns' ) );
			add_action( 'admin_head', array( $this, 'ft_admin_head' ) );
	}

	/**
	 * Register Sidebars Taxonomy
	 */
	protected function register_taxonomy() {

		$labels = array(
			'name' 					=> esc_html__( 'Sidebars', 'ft-sidebar-generator' ),
			'singular_name' 		=> esc_html__( 'Sidebar', 'ft-sidebar-generator' ),
			'menu_name' 			=> esc_html_x( 'Sidebars', 'Admin menu name', 'ft-sidebar-generator' ),
			'search_items' 			=> esc_html__( 'Search Sidebars', 'ft-sidebar-generator' ),
			'all_items' 			=> esc_html__( 'All Sidebars', 'ft-sidebar-generator' ),
			'parent_item' 			=> esc_html__( 'Parent Sidebar', 'ft-sidebar-generator' ),
			'parent_item_colon' 	=> esc_html__( 'Parent Sidebar:', 'ft-sidebar-generator' ),
			'edit_item' 			=> esc_html__( 'Edit Sidebar', 'ft-sidebar-generator' ),
			'update_item' 			=> esc_html__( 'Update Sidebar', 'ft-sidebar-generator' ),
			'add_new_item' 			=> esc_html__( 'Add New Sidebar', 'ft-sidebar-generator' ),
			'new_item_name' 		=> esc_html__( 'New Sidebar Name', 'ft-sidebar-generator' ),
		);

		$args = array(
			'hierarchical' 			=> false,
			'labels' 				=> $labels,
			'public' 				=> false,
			'show_in_nav_menus' 	=> false,
			'show_ui' 				=> true,
			'capabilities' 			=> array( 'manage_options' ),
			'query_var' 			=> false,
			'rewrite' 				=> false,
		);

		register_taxonomy(
			'ft_sidebars',
			apply_filters( 'ft_taxonomy_objects_sidebars', array() ),
			apply_filters( 'ft_taxonomy_args_sidebars', $args )
		);

	}

	/**
	 * Return sidebars
	 */
	public function get_sidebars() {

		if ( is_null( $this->_sidebars ) ) {
			$this->_sidebars = get_terms(
				'ft_sidebars',
				array(
					'hide_empty' => false,
				)
			);
		}

		return $this->_sidebars;

	}

	/**
	 * If has sidebar
	 */
	public function has_sidebars() {

		$sidebars = $this->get_sidebars();
		return ! empty( $sidebars );

	}

	/**
	 * Register the Sidebar
	 */
	public function register_sidebars() {

		if ( ! self::has_sidebars() ) {
			return;
		}
		
		$sidebars = self::get_sidebars();
		
		foreach ( $sidebars as $sidebar ) {
			$sidebar_classes = array( 'ft-sidebar' );
			
			register_sidebar(
				array(
					'id'            => 'fts-' . sanitize_title( $sidebar->name ),
					'name'          => $sidebar->name,
					'description'   => $sidebar->description,
					'before_widget' => '<div class="sidebar-box %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);

		}

	}

	/**
	 * Register Sidebars menu
	 */
	public function ft_register_menu() {

		add_submenu_page(
			$this->_menu_parent,
			esc_html__( 'Sidebars', 'ft-sidebar-generator' ),
			esc_html__( 'Sidebars', 'ft-sidebar-generator' ),
			'manage_options',
			'edit-tags.php?taxonomy=ft_sidebars'
		);

	}

	/**
	 * If has sidebar
	 */
	public function ft_menu_highlight() {

		global $parent_file, $submenu_file;
		
		if ( 'edit-tags.php?taxonomy=ft_sidebars' === $submenu_file ) {
			$parent_file = $this->_menu_parent;
		}

	}

	/**
	 * Name of the Columns
	 */
	public function ft_manage_columns( $columns ) {

		$col 		= $columns;
		$columns 	= array(
			'cb' 			=> $col['cb'],
			'name' 			=> $col['name'],
			'ID' 			=> esc_html__( 'ID', 'ft-sidebar-generator' ),
			'description' 	=> $col['description'],
		);
		
		return $columns;

	}

	/**
	 * Sortable columns.
	 */
	public function ft_sortable_columns( $ft_sortable_columns ) {

		$ft_sortable_columns['ID'] = 'ID';
		return $ft_sortable_columns;

	}

	/**
	 * Adding prefix to the ID column.
	 */
	public function ft_manage_custom_columns( $value, $column_name, $term_id ) {

		$term = get_term( $term_id, 'ft_sidebars' );

		switch ( $column_name ) {
			case 'ID' :
				$value = 'fts-' . sanitize_title( $term->name );
				break;
		}
		
		return $value;

	}
	
	/**
	 * Hiding the slug input field
	 */
	public function ft_admin_head() {

		if ( 'edit-ft_sidebars' !== get_current_screen()->id ) {
			return;
		} ?>

		<style>#the-list tr.inline-editor .inline-edit-col label:last-child, #addtag div.form-field.term-slug-wrap, #edittag tr.form-field.term-slug-wrap { display: none; }</style>

	<?php
	}

} // End Class