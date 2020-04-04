<?php
$mediciti_lite_settings = mediciti_lite_get_theme_options();
$mediciti_lite_blog_description = $mediciti_lite_settings['blog_description'];
$mediciti_lite_blog_meta = $mediciti_lite_settings['mediciti_lite_entry_meta_blog'];

// for blog option
$mediciti_lite_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'desc',
    'orderby' => 'menu_order date',

);
$mediciti_lite_query = new WP_query($mediciti_lite_args);
$mediciti_lite_loop = 1;

if ($mediciti_lite_query->have_posts()):
    ?>
    <div class="blog-section section">
        <div class="container">
            <div class="row">
                <?php
                $mediciti_lite_blog_posts_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => 1,
                    'post__in' => (array)$mediciti_lite_blog_description,
                );
                $mediciti_lite_blog_variable = get_posts($mediciti_lite_blog_posts_args);
                echo '<div class="section-title">';
                foreach ($mediciti_lite_blog_variable as $mediciti_lite_key => $mediciti_lite_blog_value) {
                    $mediciti_lite_content = wp_kses_post($mediciti_lite_blog_value->post_content);
                    $mediciti_lite_content = preg_replace('/<img[^>]+./', '', $mediciti_lite_content);
                    echo '<h2>' . wp_kses_post(wp_trim_words($mediciti_lite_blog_value->post_title, 16)) . '</h2>';
                    echo '<p>' . wp_kses_post(wp_trim_words($mediciti_lite_content, 10)) . '</p>';
                }
                echo '</div>';
                while ($mediciti_lite_query->have_posts()) : $mediciti_lite_query->the_post();
                    global $post;
                    $mediciti_lite_post_format = get_post_format($post->ID);

                    $mediciti_lite_blog_image = wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'full');;
                    $mediciti_lite_post_formats = get_post_format($post->ID);
                    $mediciti_lite_archive_year = get_the_time('Y');
                    $mediciti_lite_archive_month = get_the_time('m');

                if ($mediciti_lite_loop <= 3):
                    ?>
                    <div class="col-md-4">
                        <div class="post-wrap">
                            <?php
                            if ($mediciti_lite_post_format == 'video') {
                                $mediciti_lite_category = get_the_category();
                                echo '<div class="post-video-wrap"><div class="post-img-meta">
                            </div></div>';
                            }
                            mediciti_lite_blog_post_format($mediciti_lite_post_format, $post->ID);
                            ?>
                            <div class="post-review">
                                 <?php
                                if($mediciti_lite_blog_meta == 'show-meta') {
                                    $comment_count = get_comments_number();
                                    $mediciti_lite_archive_year = get_the_time('Y');
                                    $mediciti_lite_archive_month = get_the_time('m');
                                    echo '<div class="entry-meta">';
                                    echo '<div class="author">';
                                    echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '">';
                                    ?>
                                    <span class="author-img"><?php echo get_avatar(get_the_author_meta('ID'), 32, '', 'author-image', '') ?></span>

                                    <?php echo '<span class="screen-reader-text">' . get_the_author() . '</span></a></div>';
                                    if ($comment_count >= 0 && comments_open()) {
                                        echo '<div class="comments"><a href="' . esc_url(get_comments_link($post->ID)) . '"><i class="fa fa-comments-o"></i>';
                                        printf(
                                        /* translators: %s: comment number */
                                            _n('<span>%s</span>', '<span>%s</span>', get_comments_number($post->ID), 'mediciti-lite'), absint(number_format_i18n(get_comments_number($post->ID))));
                                        echo '</a></div>';
                                    }
                                    echo '<div class="date"><a href="' . esc_url(get_month_link($mediciti_lite_archive_year, $mediciti_lite_archive_month)) . '"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="screen-reader-text" >' . esc_html(get_the_date()) . '</span></a></div></div>';
                                }
                                ?>
                                <h2 class="screen-reader-text"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                               
                                <p class="post-description"><?php echo wp_kses_post(mediciti_lite_get_excerpt(get_the_ID(), 125)); ?></p>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                   class="btn btn-default" class="screen-reader-text"><?php echo esc_html__('Read more', 'mediciti-lite'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php $mediciti_lite_loop++; endif; endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif;