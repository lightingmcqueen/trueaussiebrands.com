<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package sparkling
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


		<div class="row ">
			
			<?php 

			$args = array( 'hide_empty' => 0 );

			$terms = get_terms( 'listing-category', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$count = count( $terms );
				$i = 0;
				$term_list = '';
				foreach ( $terms as $term ) {

					$term_list .= '<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
					<div id="osc_servicebox_2" class="osc_servicebox "><i class="fa fa-align-justify"></i>
					<p></p>
					<h3>' . $term->name . '</h3>
					<div class="osc_servicebox_content">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce ullamcorper pulvinar tortor, ut blandit dui porttitor in. Duis pretium mattis blandit. Morbi eu euismod lorem.</div>
					<p><a class="osc_servicebox_readmore_css btn btn-lg" href="' . get_term_link( $term ) . '">Read More</a></p>
					</div>
					</div>';
					
				}
				echo $term_list;
			}

			?>
			
		</div>
		<?php get_template_part( 'content', 'page' ); ?>
		
	<?php endwhile; // end of the loop. ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
