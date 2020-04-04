<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


/**
 * Multiple select customize control class.
 */
class Mediciti_Lite_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
}

class mediciti_lite_Support_Control extends WP_Customize_Control {

    /**
     * Render the content on the theme customizer page
     */
    public $type = "mediciti-lite-support";

    public function render_content() {
        //Add Theme instruction, Support Forum, Demo Link, Rating Link

        ?><p>
        <a class="mediciti-lite-support" target="_blank" href="<?php echo esc_url('https://docs.yudleethemes.com/?docs=mediciti-lite'); ?>"><span class="dashicons dashicons-book-alt"></span><?php echo  esc_html__('Documentation', 'mediciti-lite') ?></a>

        <a class="mediciti-lite-support" target="_blank" href="<?php echo  esc_url('http://yudleethemes.com/my-tickets/') ?>"><span class="dashicons dashicons-edit"></span><?php echo esc_html__('Create a Ticket', 'mediciti-lite') ?></a>

        <a class="mediciti-lite-support" target="_blank" href="<?php echo ('http://yudleethemes.com/product/pasal-pro/?add-to-cart=711'); ?>"><span class="dashicons dashicons-star-filled"></span><?php echo esc_html__('Buy Premium', 'mediciti-lite') ?></a>

        <a class="support-image mediciti-lite-support" target="_blank" href="<?php echo  esc_url('https://yudleethemes.com/support/') ?>"><img src = "<?php echo esc_url(get_template_directory_uri() . '/assets/img/wparmy.png') ?>" /> <?php echo esc_html__('Request Customization', 'mediciti-lite'); ?></a>
        </p>
        <?php
    }
}

function mediciti_lite_theme_customize_style() {
     wp_enqueue_script( 'mediciti-lite-customizer-jss', get_template_directory_uri() . '/inc/customizer/assets/customizer.js', array('jquery'), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mediciti_lite_theme_customize_style');

if ( class_exists( 'WP_Customize_Control' ) ) {
      /**
       * Class to create a post control
       */
    if ( ! class_exists( 'mediciti_lite_Post_Dropdown_control' ) ) {
      class mediciti_lite_Page_Dropdown_control extends WP_Customize_Control {
            /**
             * Render the content on the theme customizer page
             */
            public function render_content() {
              $none = get_theme_mod($this->id);
                if (isset($none[0])) {
                  $none_selected = $none[0];
                } else {
                  $none_selected = get_theme_mod($this->id);
                }
              ?>
                  <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple="multiple" data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
                          <option value="none" <?php selected($none_selected, 'none' ); ?>><?php esc_html_e( 'None','mediciti-lite' ); ?></option>
                              <?php  $posts = get_posts( array( 'posts_per_page'=> -1, 'post_type'=>'page' ) );
                              foreach ( $posts as $post ) { ?>
                                   <option value="<?php echo esc_attr($post->ID); ?>" <?php selected( $post->ID); ?>><?php echo esc_html($post->post_title); ?></option>
                <?php } ?>
                      </select>
                  </label><br><br>
                  <?php
              }
          }
    }

  }

  // for customizer pro option

  class Mediciti_lite_pro extends WP_Customize_Section {
  /**
   * The type of customize section being rendered.
   *
   * @since  1.0.0
   * @access public
   * @var    string
   */
  public $type = 'mediciti-lite-customize-pro';
  /**
   * Custom button text to output.
   *
   * @since  1.0.0
   * @access public
   * @var    string
   */
  public $button_text = '';
  /**
   * Custom pro button URL.
   *
   * @since  1.0.0
   * @access public
   * @var    string
   */
  public $button_url = '';
  /**
   * Default priority of the section.
   *
   * @since  1.0.0
   * @access public
   * @var    string
   */
  public $priority = 999;
  /**
   * Add custom parameters to pass to the JS via JSON.
   *
   * @since  1.0.0
   * @access public
   * @return void
   */
  public function json() {
    $json = parent::json();
    $theme = wp_get_theme();
    $json['button_text'] = esc_html(
      $this->button_text
      ? $this->button_text
      : $theme->get( 'Name' )
    );
    $json['button_url']  = esc_url(
      $this->button_url
      ? $this->button_url
      : $theme->get( 'ThemeURI' )
    );
    return $json;
  }
  /**
   * Outputs the Underscore.js template.
   *
   * @since  1.0.0
   * @access public
   * @return void
   */
  protected function render_template() { ?>

    <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

      <h3 class="accordion-section-title">
        {{ data.title }}

        <# if ( data.button_text && data.button_url ) { #>
          <a href="{{ data.button_url }}" class="button button-secondary alignright" target="_blank">{{ data.button_text }}</a>
        <# } #>
      </h3>
    </li>
  <?php }
}