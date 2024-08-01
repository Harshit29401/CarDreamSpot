<?php

/**
 * Template Name: Home
 *
 * This template is used to display a comparison of products.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spice-software-dark02
 */

get_header();

/* Remove breadcrumb and page header */
echo do_shortcode('[hide_breadcrumbs_and_title]');
?>

<section class="homepage-title-section">
    <div class="overlay"></div>

    <div class="homepage-container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="page-title text-center text-white homepage-title">
                    <h1 class="text-white">Own your<span class="vehica-text-primary"> dream ride</span></h1>
                </div>
                <div class="woocommerce-notices-wrapper"></div>
                <div class="filter-container">
                    <form class="filter" method="get" action="http://localhost/carproject/">
                        <div class="attribute-filter">
                            <h4>Make</h4>
                            <select name="pa_make">
                                <option value="">All Makes</option>
                                <option value="audi">Audi</option>
                                <option value="ford">Ford</option>
                                <option value="holden">Holden</option>
                                <option value="jeep">JEEP</option>
                                <option value="land-rover">Land Rover</option>
                                <option value="mercedes-benz">Mercedes-Benz</option>
                            </select>
                        </div>
                        <div class="attribute-filter">
                            <h4>Model</h4>
                            <select name="pa_model">
                                <option value="">All Models</option>
                                <option value="commodore">Commodore</option>
                                <option value="gts">GTS</option>
                                <option value="mustang">Mustang</option>
                                <option value="r8-clubsport">R8 Clubsport</option>
                                <option value="range-rover-sport">RANGE ROVER SPORT</option>
                                <option value="s3">S3</option>
                                <option value="wrangler">Wrangler</option>
                            </select>
                        </div>
                        <div class="attribute-filter">
                            <input type="submit" value="Search">
                        </div>
                    </form>
                </div>
                <!-- <p class="woocommerce-result-count"> -->
            </div>
        </div>
    </div>
</section>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="homepage-content-section">
            <?php
            the_content();
            
            ?>

        </section><!-- Home Page Content Section -->
    </main><!-- #main -->
</div>
<!-- #primary -->
<?php
get_footer();
