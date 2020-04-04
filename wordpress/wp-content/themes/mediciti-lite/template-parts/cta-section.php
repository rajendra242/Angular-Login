<?php
$mediciti_lite_settings = mediciti_lite_get_theme_options();
$mediciti_lite_cta_description = $mediciti_lite_settings['cta_description'];
$mediciti_lite_cta_title = $mediciti_lite_settings['cta_title'];
$mediciti_lite_cta_button = $mediciti_lite_settings['cta_button'];
$mediciti_lite_cta_link = $mediciti_lite_settings['cta_link'];
$mediciti_lite_cta_background = $mediciti_lite_settings['cta_Backgroundimage'];

    if(($mediciti_lite_cta_button && $mediciti_lite_cta_link )|| $mediciti_lite_cta_description|| $mediciti_lite_cta_title ){?>

    <section id="promo" class="section promo text-center" style="background-image: url(<?php echo esc_url($mediciti_lite_cta_background); ?>);">
        <div class="container">
            <div class="row cta-wrap">
              
                   <div class="promo-content">
                    
                         <h2><?php echo esc_html($mediciti_lite_cta_title); ?> </h2>
                    
                        <p><?php echo esc_html($mediciti_lite_cta_description); ?> </p>
               </div>
                <?php 
                if($mediciti_lite_cta_button && $mediciti_lite_cta_link){
                    echo '<div class="cta-btn-wrap">';
                    echo '<a href="'.esc_url($mediciti_lite_cta_link).'" class="btn btn-default" target="_blank">'.esc_html($mediciti_lite_cta_button).'</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
<?php }?>
