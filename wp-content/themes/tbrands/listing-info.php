<?php if (!empty($listing)) { ?>
<div class="listing-info">
<address>
  <strong><?php the_title(); ?></strong><br>
<?php if (get_field('contact_name')) { ?>
<strong><?php the_field('contact_name'); ?></strong> <br />
<?php } ?>
<?php if (get_field('address')) { ?> 
<?php the_field('address'); ?> <br />
<?php } ?>
<?php if (get_field('suburb')) { ?> 
<?php the_field('suburb'); ?>, <?php the_field('state'); ?>, <?php the_field('post_code'); ?> <br />
<?php } ?>
<?php if (get_field('email')) { ?> 
<i class="fa fa-envelope-o mainc"></i><span class='email lt-mr-10'><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a><span> <br />
<?php } ?>
<?php if (get_field('phone')) { ?>
<i class="fa fa-phone mainc"></i><abbr class="lt-mr-10" title="Phone">P:</abbr><span class="lt-mr-10"><a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a></span>
<?php } ?>
<?php if (get_field('website')) { ?>
<i class="fa fa-globe mainc"></i><span class="lt-mr-10"><a href="<?php the_field('website'); ?>"><?php the_field('website'); ?></a></span>
<?php } ?>
<?php if (get_field('facebook')) { ?>
<span class='lt-mr-10'><i class="fa fa-facebook mainc"></i><span class="lt-mr-10"><a href="<?php the_field('facebook'); ?>" target="_blank">Facebook</a></span></span>
<?php } ?>
<?php if (get_field('linkedin')) { ?>
<span class='lt-mr-10'><i class="fa fa-linkedin mainc"></i><span class="lt-mr-10"><a href="<?php the_field('linkedin'); ?>" target="_blank">Linked In</a></span></span>
<?php } ?>
<?php if (get_field('twitter')) { ?>
<span class='lt-mr-10'><i class="fa fa-twitter mainc"></i><span class="lt-mr-10"><a href="<?php the_field('twitter'); ?>" target="_blank">Twitter</a></span></span>
<?php } ?>
</address>
</div>
<hr />
<?php } ?>
