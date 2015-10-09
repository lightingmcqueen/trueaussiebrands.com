<div class="featured-content">
<?php
$page_id = 137;
$page_data = get_page( $page_id );
$content = $page_data->post_content;
$title = $page_data->post_title;
echo $page_data->post_content;
?>
</div>
