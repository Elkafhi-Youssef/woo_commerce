<?php
namespace Swatchly;

/**
 * Admin class.
 */
class Admin {
    /**
     * Constructor.
     */
    public function __construct() {
        new Admin\Woo_Config();
        new Admin\Attribute_Taxonomy_Metabox();
        new Admin\Product_Metabox();

        // Add a top-level custom menu called "Swatchly" for the plugin
        add_action( 'admin_menu', array( $this, 'add_top_level_menu' ), 10 );

        // Bind admin page link to the plugin action link.
        add_filter( 'plugin_action_links_swatchly/swatchly.php', array($this, 'action_links_add'), 10, 4 );

        // Admin assets hook into action.
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

        add_action('admin_footer', array( $this, 'pro_version_notice' ));
    }

    /**
     * Top level menu for the plugin
     */
    public function add_top_level_menu(){
        add_menu_page( 
            __( 'Swatchly Settings', 'swatchly' ),
            __( 'Swatchly', 'swatchly' ),
            'manage_options',
            'swatchly-admin',
            '', // leave it empty to add custom submenus under this menu
            'dashicons-ellipsis',
            57
        );
    }

    /**
     * Action link add.
     */
    public function action_links_add( $actions, $plugin_file, $plugin_data, $context ){

        $settings_page_link = sprintf(
            /*
             * translators:
             * 1: Settings label
             */
            '<a href="'. esc_url( get_admin_url() . 'admin.php?page=swatchly-admin' ) .'">%1$s</a>',
            esc_html__( 'Settings', 'swatchly' )
        );

        array_unshift( $actions, $settings_page_link );

        return $actions;
    }

    /**
     * Enqueue admin assets.
     */
    public function enqueue_admin_assets() {
        $current_screen = get_current_screen();

        if (
            $current_screen->post_type == 'product' ||
            $current_screen->base == 'toplevel_page_swatchly-admin'
        ) {
            if( $current_screen->base == 'post' ){
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'wp-color-picker-alpha',  SWATCHLY_ASSETS . '/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), SWATCHLY_VERSION, true );
            }

            add_thickbox();
            wp_enqueue_style( 'swatchly-admin', SWATCHLY_ASSETS . '/css/admin.css', array(), SWATCHLY_VERSION );
            wp_enqueue_script( 'swatchly-admin', SWATCHLY_ASSETS . '/js/admin.js', array('jquery'), SWATCHLY_VERSION, true );


            // inline js for the settings submenu
            $is_swatchly_setting = isset( $_GET['page'] ) ? sanitize_text_field($_GET['page']) : '';
            $is_swatchly_setting = $is_swatchly_setting == 'swatchly-admin' ? 1 : 0;
            wp_add_inline_script( 'swatchly-admin', 'var swatchly_is_settings_page = '. esc_js( $is_swatchly_setting ) .';');

            $localize_vars = array();
            if(get_post_type() == 'product'){
                $localize_vars['product_id'] = get_the_id();
            } else {
                $localize_vars['product_id'] = '';
            }

            $localize_vars['nonce']                   = wp_create_nonce('swatchly_product_metabox_save_nonce');
            $localize_vars['i18n']['saving']          = esc_html__('Saving...', 'swatchly');
            $localize_vars['i18n']['choose_an_image'] = esc_html__('Choose an image', 'swatchly');
            $localize_vars['i18n']['use_image']       = esc_html__('Use image', 'swatchly');
            $localize_vars['pl_override_global']      = swatchly_get_option('pl_override_global');
            $localize_vars['sp_override_global']      = swatchly_get_option('sp_override_global');
            wp_localize_script( 'swatchly-admin', 'swatchly_params', $localize_vars );
        }
    }

    /**
     * Pro version notice
     */
    public function pro_version_notice(){
    ?>
        <a href="#TB_inline?height=250&width=400&inlineId=swatchly_pro_notice" class="thickbox swatchly_trigger_pro_notice" style="display: none;"><?php echo esc_html__('Pro Notice', 'swatchly') ?></a> 
        <div id="swatchly_pro_notice" style="display: none;">
            <div class="swatchly_pro_notice_wrapper">
                <h3><?php echo esc_html__('Pro Version is Required!', 'swatchly') ?></h3>
                <p><?php echo esc_html__('This feature is available in the pro version.', 'swatchly') ?></p>
                <a target="_blank" href="https://hasthemes.com/plugins/swatchly-product-variation-swatches-for-woocommerce-products/"><?php echo esc_html__('More Details', 'swatchly') ?></a>
            </div>
        </div>
    <?php
    }
}