<?php
	for($i=1; $i<=2; $i++)
		{
			echo '<div class="col-lg-6 col-md-6 col-sm-12">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}