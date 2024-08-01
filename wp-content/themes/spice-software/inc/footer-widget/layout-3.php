<?php
	for($i=1; $i<=4; $i++)
		{
			echo '<div class="col-lg-3 col-md-3 col-sm-12">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}