    <ul class="row product-listings list-unstyled">
        <?php
$connected = get_connected_meta('cruise_to_port', 'port-type','embarkation', 'object');
//$related = p2p_type('cruise_to_port')->get_related( get_queried_object());
$the_query = new WP_Query( array(
    'connected_type' => 'cruise_to_port',
    'connected_items' => $connected->post,
    'post__not_in' => array(get_queried_object()->ID),
    'nopaging' => true,
    'connected_meta' => array(
        array(
            'key' => 'port-type',
            'value' => 'embarkation'
        )
    )
));
        $template = 'categories-list.php';

        // run the loop based on the query
        if ($the_query->have_posts()) {
            global $post;
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
            <li id="post-<?php the_ID(); ?>" class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-panel">
                       <?php fc_get_shared_template_parts($template); ?>
               </div>
           </li>

           <?php
           endwhile; 
       }
       wp_reset_postdata();
       ?>
   </ul>