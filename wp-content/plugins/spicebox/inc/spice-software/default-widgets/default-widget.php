<?php
$activate = array(
        'sidebar-1' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
        'footer-sidebar-1' => array(
            'text-1',
        ),
        'footer-sidebar-2' => array(
            'recent-posts-2',
        ),
        'footer-sidebar-3' => array(
            'categories-2'
        ),
        'footer-sidebar-4' => array(
            'search-2'
        ),
    );

    /* the default titles will appear */
    update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<img src="'.esc_url(SPICEB_PLUGIN_URL).'/inc/spice-software/images/logo-footer.png" alt="'.esc_attr("Logo","spicebox").'" />

            &nbsp;

            <p>Lorem ipsum dolor sit amet, ut ius audiam denique  tractatos, pro cu dicat quidam neglegentur. Vel mazim aliquid.</p>

            <address>
            <i class="fa-solid fa-location-dot"></i>Lorem Ipsum? dolor sit<br>
            <i class="fa fa-solid fa-envelope"></i><a href="mailto:abc@example.com">abc@example.com</a><br>
            <i class="fa fa-phone"></i><a href="tel:+99 999 999 99">+99 999 999 99</a><br>
            </address>
            '), 
        ));
        
    update_option('widget_recent-posts', array(
        1 => array('title' => 'Recent Posts'), 
        2 => array('title' => 'Recent Posts')));

    update_option('widget_categories', array(
        1 => array('title' => 'Categories'), 
        2 => array('title' => 'Categories')));

    update_option('widget_archives', array(
        1 => array('title' => 'Archives'), 
        2 => array('title' => 'Archives')));
        
    update_option('widget_search', array(
        1 => array('title' => 'Search'), 
        2 => array('title' => 'Search')));

    update_option('sidebars_widgets',  $activate);
    
?>