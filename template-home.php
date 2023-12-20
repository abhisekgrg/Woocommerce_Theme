<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/utility.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title><?php bloginfo('name')| bloginfo('description');?></title>
</head>

<body>

    <?php
   //Template Name:Home
   get_header();
   ?>
    <div class="hero-section flex align-items">
        <?php
     
     $query = new WP_Query( array( 'pagename' => 'Home' ) );
             $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id());
        ?>
        <img src="<?php echo $imagepath[0]; ?>" alt="">
        <div class="container flex flex-column rowg-2">

            <h1 class="heading1 zindex-1"><?php the_excerpt(); ?></h1>
            <h2 class="heading4 zindex-1"><?php the_content(); ?></h2>
            <button class="button zindex-2"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Shop now</button>
        </div>
    </div>



    <div class="container">

        <div class="featured-section flex justify-content-sb columng-3" style="padding:50px 0;">
            <?php
                   $post = array('post_type'=>'post','post_status'=>'publish', 'posts_per_page' => 4,'category_name'=>'featured','order' => 'ASC', );
                   $postquery = new wp_query($post);
                   while ($postquery->have_posts()){
                       $postquery->the_post();
                       $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id());
                       ?>
            <span class="featured-block align-items flex columng-1">

                <span class="circle flex justify-content align-items">
                    <img src="<?php echo $imagepath['0']; ?>" alt="" width="28px">
                </span>
                <div class="featured-title flex flex-column" style="row-gap:5px;">

                    <h3 class="heading4 fw-6" style="text-align:center;"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </span>
            <?php } ?>
        </div>
    </div>
    </div>

    </div>

    <div class="container" style="padding-bottom:50px;">
        <div class="row">
            <div class="col-3 flex flex-column rowg-2">
                <div class="category-block">
                    <h3 class="heading3 fw-7">Browse Categories</h3>
                 </div>
                <div class="nav flex-column nav-pills border" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">Women's Fashion</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Health & Beauty</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">Men’s Fashion</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">Watches & Accessories</a>
                 </div>
                 </div>
                 <div class="col-9">
                 <div class="product-home-title flex justify-content-sb">
                    <h2 class="heading2 fw-6">Latest Product</h2>
                    <h4 class="heading5 flex columng-1 justify-contetn align-items">See all<i
                            class="fa-solid fa-arrow-right"></i></h4>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="grid">
                            <?php $post = array('post_type'=>'product','post_status'=>'publish','posts_per_page' => 6,'order' => 'ASC',
                              'tax_query'      => array(
                                                         array(
                                                               'taxonomy' => 'product_cat', // taxonomy name
                                                               'field'    => 'slug',
                                                                'terms'    => 'women', // category slug
                                                                  ),
                                                                ),
                                                             );
                               $postquery = new wp_query($post);
                               while ($postquery->have_posts()){
                                $postquery->the_post();
                                $product      = wc_get_product(get_the_ID());
                                $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id());
                                $sale_price   = $product->get_sale_price();
                                $regular_price = $product->get_regular_price();
                                  ?>

                            <div class="card effect" style="border:1px solid #DDE0E5;">
                                <img src="<?php echo $imagepath[0]; ?>" class="card-img-top" alt="...">
                                <div class="card-body flex flex-column rowg-1">
                                    <div class="flex justify-content-sb">

                                      <a href="<?php the_permalink(); ?>">  <h5 class="card-title heading5 fw-6 black"><?php the_title(); ?></h5></a>
                                     
                                        <?php   echo do_shortcode('[yith_wcwl_add_to_wishlist]')?>
                                    </div>
                                    <?php if ($sale_price) : ?>
                                    <p class="card-text flex columng-1 ">
                                        <del class="regular-price fw-6 heading5"
                                            style="color:#1B46C24D;"><?php echo wc_price($regular_price); ?></del>
                                        <span
                                            class="sale-price fw-6 heading5"><?php echo wc_price($sale_price); ?></span>
                                    </p>
                                    <?php else : ?>
                                    <p class="card-text">
                                        <span
                                            class="regular-price fw-6 heading5"><?php echo wc_price($regular_price); ?></span>
                                    </p>
                                    <?php endif; ?>


                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">..adsfdsafasdf</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">..sadf.</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">.adsf
                    </div>
                </div>
            </div>
      </div>
  </div>




            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>
            <?php
            get_footer();
            ?>
</body>

</html>