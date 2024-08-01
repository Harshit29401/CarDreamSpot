<?php
/**
 * Template file for sidebar
 */
if (is_active_sidebar('sidebar-1')) :
    ?>
    <div class="col-lg-4 col-md-5 col-sm-12">
        <div class="sidebar s-l-space">
            <?php dynamic_sidebar('sidebar-1'); ?>								
        </div>
    </div>
<?php endif; ?>