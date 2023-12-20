<?php
get_header();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title();?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/utility.css">
</head>

<body>
    <div class="section-banner flex">
        <div class="container container-banner flex align-items justify-content gradient-overlay">
            <div class="banner-title flex align-items">
                <h2 class="banner-h2">Blog</h2>
                <h3 class="banner-h3"> <a style="color:white;text-decoration:none;" href="<?php echo site_url(); ?>">
                        Home</a> / Blog</h3>
            </div>
        </div>
    </div>



    <div class="section-space">
        <div class="container blog-container flex columng-3">
            <div class="blog-grid-leftside">
                <?php
            
                $post = array('post_type'=>'post','post_status'=>'publish','posts_per_page' => 10,'category_name'=>'php,java');
               $postquery = new wp_query($post);
                while ($postquery->have_posts()){
               $postquery->the_post();
                  $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id());
               ?>


                <!-- blog1 -->
                <div class="blog-rec">
                    <img class="blog-img" src="<?php echo $imagepath[0]; ?>" alt="">

                    <div class="blog-rec-container">
                        <div class="blog-date">
                            <img src="<?php echo bloginfo('template_directory') ?>/image/calendar.png" alt=""
                                class="blog-calender" />
                            <div class="blog-date-text"><?php echo get_the_date(); ?></div>
                        </div>
                        <div class="blog-title"><?php the_title(); ?></div>
                        <div class="blog-expert">

                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-button">Read More >></div>
                        </a>
                    </div>
                </div>
                <?php } ?>

            </div>
            <?php include'sidebar.php'; ?>
          

        </div>
    </div>
    </div>


    <?php get_footer(); ?>

</body>

</html>