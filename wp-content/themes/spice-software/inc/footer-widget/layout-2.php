<?php
	for($i=1; $i<=3; $i++)
		{
			echo '<div class="col-lg-4 col-md-4 col-sm-12">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}