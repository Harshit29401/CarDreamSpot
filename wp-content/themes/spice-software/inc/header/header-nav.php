<nav class="navbar navbar-expand-lg navbar-light custom <?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?>">
	<div class="container">
		<?php the_custom_logo();?>		
		<div class="custom-logo-link-url"> 
			<h2 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	    	</h2>
	    <?php
			$spice_software_description = get_bloginfo( 'description', 'display' );
			if ( $spice_software_description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $spice_software_description; ?></p>
			<?php endif;?>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'spice-software' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="<?php echo (!is_rtl()) ? "ml-auto" : "mr-auto"; ?>">
			<?php 
			$spice_software_shop_button = '<ul class="nav navbar-nav mr-auto">%3$s';
			   //Hence This condition only work when woocommerce plugin will be activate
		    if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $spice_software_target="_blank";}
		 	else { $spice_software_target="_self"; }
		 	if((get_theme_mod('after_menu_btn_txt')!='') && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
		 		$spice_software_shop_button .= '<li class="nav-item menu-item main-header-btn"><a target='.$spice_software_target.' class="spice_software_header_btn" href='.get_theme_mod('after_menu_btn_link','').'>'.get_theme_mod('after_menu_btn_txt').'</a></li>';
			endif;
			if((get_theme_mod('after_menu_html')!='') && (get_theme_mod('after_menu_multiple_option')=='html')):
				$spice_software_shop_button .= '<li class="nav-item html menu-item lite-html">'.get_theme_mod('after_menu_html').'</li>';

			endif;
			$spice_software_shop_button .= '<li class="nav-item"><div class="header-module">';
		   
		   //Hence This condition only work when woocommerce plugin will be activate
			if(get_theme_mod('search_btn_enable',false)==true){
		    $spice_software_shop_button .= '<div class="nav-search nav-light-search wrap">
		                           			<div class="search-box-outer">
	                            				<div class="dropdown">
                  									<a href="#" title="'.esc_attr__('Search','spice-software').'" class="search-icon condition has-submenu" aria-haspopup="true" aria-expanded="false">
               										<i class="fa fa-search"></i>
             										<span class="sub-arrow"></span></a>
             										<ul class="dropdown-menu pull-right search-panel"  role="group" aria-hidden="true" aria-expanded="false">
                             							<li class="panel-outer">
                             								<div class="form-container">
                               									 <form role="'.esc_attr('Search','spice-software').'" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
                                									 <label>
                                  										<input type="search" class="search-field" placeholder="'.esc_attr__('Search','spice-software').'" value="" name="s" autocomplete="off">
                                 									 </label>
                                 									<input type="submit" class="search-submit" value="'.esc_attr__('Search','spice-software').'">
                                								 </form>                   
                               								</div>
                             							</li>
                           							</ul>
	                       						</div>
		                     				</div>
		                   				</div>';
		                   			}
			   if ( class_exists( 'WooCommerce' ) ) {
			   		if(get_theme_mod('cart_btn_enable',false)==true ){		   	  
					   $spice_software_shop_button .='<div class="cart-header ">';
					      global $woocommerce; 
					      $spice_software_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
					      $spice_software_shop_button .= '<a class="cart-icon" href="'.esc_url($spice_software_link).'" >';
					      
					      if ($woocommerce->cart->cart_contents_count == 0){
					          $spice_software_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
					        }
					        else
					        {
					          $spice_software_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
					        }
					           
					        $spice_software_shop_button .= '</a>';
					        
					        $spice_software_shop_button .= '<a href="'.esc_url($spice_software_link).'" ><span class="cart-total">'.sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce->cart->cart_contents_count, 'spice-software' ), $woocommerce->cart->cart_contents_count).'</span></a>';
					       $spice_software_shop_button .='</div>';
					    }
					}
				$spice_software_shop_button .= '</div></li>';
			   $spice_software_shop_button .= '</ul>'; 
			   $spice_software_menu_class='';
			    wp_nav_menu( array
			             (
			             'theme_location'=> 'spice-software-primary', 
			             'menu_class'    => 'nav navbar-nav mr-auto '.$spice_software_menu_class.'',
			             'items_wrap'    => $spice_software_shop_button,
			             'fallback_cb'   => 'spice_software_fallback_page_menu',
			             'walker'        => new Spice_Software_Nav_Walker()
			             )); ?>
	        </div>
		</div>
	</div>
</nav>