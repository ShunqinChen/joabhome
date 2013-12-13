<?php
$image = "";
$first_image = $wpdb->get_results(
"SELECT guid FROM $wpdb->posts WHERE post_parent = '$post->ID' "
."AND post_type = 'attachment' ORDER BY `post_date` ASC LIMIT 0,1"
);
//THE FOLLOWING IS NEW
$data = get_post_meta( $post->ID, 'key', true );
if ($data[ 'custom_thumb' ]) {
$image = $data[ 'custom_thumb' ]; 
} elseif ($first_image) {
//THE ABOVE IS NEW
    $image = $first_image[0]->guid;}
//IF THERE IS NO IMAGE, USE THIS ONE...
else {$image = "images/default.jpg";}
?>