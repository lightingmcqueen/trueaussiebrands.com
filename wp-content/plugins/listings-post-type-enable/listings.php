<?php
/*
Plugin Name: Listings Post Type Enable
Description: This is a theme - specific plugin for the Directory WordPress Theme, that creates a custom post type called 'Listings' that is obligatory for this theme to  function.It also registers a widget,thar returns recent listings.
Version: 0.1.0
Author: Alex Itsios
Author URI: http://ketchupthemes.com
*/
DEFINE ('PLUGIN_PATH',plugin_dir_path( __FILE__ ));

// Register Custom Post Type +  custom taxonomies
function ketchupthemes_directory_post_type_register() {

    $labels = array(
        'name'                => _x( 'Listings', 'Post Type General Name', 'directory' ),
        'singular_name'       => _x( 'Listing', 'Post Type Singular Name', 'directory' ),
        'menu_name'           => __( 'Directory', 'directory' ),
        'parent_item_colon'   => __( 'Parent Item:', 'directory' ),
        'all_items'           => __( 'All Listings', 'directory' ),
        'view_item'           => __( 'View Listing', 'directory' ),
        'add_new_item'        => __( 'Add New Listing', 'directory' ),
        'add_new'             => __( 'Add New', 'directory' ),
        'edit_item'           => __( 'Edit Listing', 'directory' ),
        'update_item'         => __( 'Update Listing', 'directory' ),
        'search_items'        => __( 'Search Listing', 'directory' ),
        'not_found'           => __( 'Not found', 'directory' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'directory' ),
    );
    $args = array(
        'label'               => __( 'listing', 'directory' ),
        'description'         => __( 'Post Type Description', 'directory' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-feedback',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'listing', $args );

}
// Hook into the 'init' action
add_action( 'init', 'ketchupthemes_directory_post_type_register', 0 );

// Register Custom Taxonomy
function ketchupthemes_listing_category() {

    $labels = array(
        'name'                       => _x( 'Listing Categories', 'Taxonomy General Name', 'directory' ),
        'singular_name'              => _x( 'Listing Category', 'Taxonomy Singular Name', 'directory' ),
        'menu_name'                  => __( 'Listing Categories', 'directory' ),
        'all_items'                  => __( 'All Items', 'directory' ),
        'parent_item'                => __( 'Parent Listing Category', 'directory' ),
        'parent_item_colon'          => __( 'Parent Listing Category', 'directory' ),
        'new_item_name'              => __( 'New Listing Category', 'directory' ),
        'add_new_item'               => __( 'Add New Listing Category', 'directory' ),
        'edit_item'                  => __( 'Edit Listing Category', 'directory' ),
        'update_item'                => __( 'Update Listing Category', 'directory' ),
        'separate_items_with_commas' => __( 'Separate Listing Categories with commas', 'directory' ),
        'search_items'               => __( 'Search Listing Categories', 'directory' ),
        'add_or_remove_items'        => __( 'Add or remove Listing Categories', 'directory' ),
        'choose_from_most_used'      => __( 'Choose from the most used Listing Category', 'directory' ),
        'not_found'                  => __( 'Not Found', 'directory' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'listing-category', array( 'listing' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ketchupthemes_listing_category', 0 );

// Register Custom Taxonomy
function ketchupthemes_listing_tag() {

    $labels = array(
        'name'                       => _x( 'Listing Tags', 'Taxonomy General Name', 'directory' ),
        'singular_name'              => _x( 'Listing Tag', 'Taxonomy Singular Name', 'directory' ),
        'menu_name'                  => __( 'Listing Tags', 'directory' ),
        'all_items'                  => __( 'All Listing Tags', 'directory' ),
        'parent_item'                => __( 'Parent Listing Tag', 'directory' ),
        'parent_item_colon'          => __( 'Parent Listing Tag', 'directory' ),
        'new_item_name'              => __( 'New Listing Tag', 'directory' ),
        'add_new_item'               => __( 'Add New Listing Tag', 'directory' ),
        'edit_item'                  => __( 'Edit Listing Tag', 'directory' ),
        'update_item'                => __( 'Update Listing Tag', 'directory' ),
        'separate_items_with_commas' => __( 'Separate Listing Tags with commas', 'directory' ),
        'search_items'               => __( 'Search Listing Tags', 'directory' ),
        'add_or_remove_items'        => __( 'Add or remove Listing Tags', 'directory' ),
        'choose_from_most_used'      => __( 'Choose from the most used Listing Tag', 'directory' ),
        'not_found'                  => __( 'Not Found', 'directory' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'listing-tag', array( 'listing' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ketchupthemes_listing_tag', 0 );

//Register Widget
function directory_recent_listings_widget_init() {
    register_widget('ketchupthemes_Widget_Recent_Listings');
}
add_action('widgets_init', 'directory_recent_listings_widget_init');
class ketchupthemes_Widget_Recent_Listings extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'ketchupthemes-widget_recent_listings', 'description' => __( "Your site&#8217;s most recent Listings.") );
        parent::__construct('ketchupthemes-recent-topics', __('Directory Recent Listings','directory'), $widget_ops);
        $this->alt_option_name = 'ketchupthemes-widget_recent_listings';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('ketchupthemes-widget_recent_listings', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Directory Recent Listins','directory' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
             $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        
       

        $r = new WP_Query( apply_filters( 'widget_posts_args', 
        array( 'posts_per_page' => $number,'post_type'=>'listing',
        'no_found_rows' => true, 
        'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>           
                <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
            <?php if ( $show_date ) : ?>
                <span class="post-date">
                <span class="label label-primary font10">
                <?php echo get_the_date('d/m/Y'); ?>
                </span>
                </span>
            <?php else : ?>
            <?php endif; ?>
          
            </li>
             
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('ketchupthemes-widget_recent_listings', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['ketchupthemes-widget_recent_listings']) )
            delete_option('ketchupthemes-widget_recent_listings');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('ketchupthemes-widget_recent_listings', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        
       
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','knowify' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number','directory' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date','knowify' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date','directory' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
        
        
<?php
    }
}
