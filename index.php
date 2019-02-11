<?php get_header( 'test' ) //template name: testBD?>


<div class="container">
    <div class="row">
        <div class="col-12" style="margin: 120px;">
            <h1>Consulta</h1>
        </div>
    </div>
</div>

<?php
 error_reporting(0);

// global $wpdb;
// //  $result = $wpdb->get_results ( "SELECT * FROM  $wpdb->posts WHERE post_type = 'page'" );
// $result = $wpdb->get_results ( "SELECT * FROM  $wpdb->test WHERE mapa = 'lima'" );
// foreach ( $result as $page )
// {
//    echo $page->ID.'<br/>';
//    echo $page->post_status.'<br/>';
// }

global $wpdb;
    $result = $wpdb->get_results($wpdb->prepare(  "SELECT * FROM wp_hostels"));
    foreach ( $result as $page )
    {
        echo $page->nombre.'<br/>';
        echo $page->msn.'<br/>';
        echo $page->mapa.'<br/>';
    }
?>


<hr>
<hr>
<hr>

<?php
// $args = array(
//     'post_type' => 'Hostals',
//     'post_per_page' => 10,
//     'orderby' => 'title');
//     $loop = new WP_Query($args);
// while($loop->have_posts()): $loop->the_post();

//  the_field( 'nombre_hostal' ); 
//  the_field( 'mensaje_ubicacion' ); 
//  the_field( 'mapa' ); 

//  endwhile; wp_reset_postdata();
  ?>   








<?php get_footer(); ?>
