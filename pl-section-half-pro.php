<?php
/*

  Plugin Name: PageLines Section Half & Half Pro

  Description: A simple way to have to equal height content sections.

  Author:      iHeart PageLines

  Version:     3.0.1

  PageLines:   PL_Section_Half_Pro

  Tags:         half

  Category:     framework, sections

  Filter:       component

*/

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/AiresDagraca/pl-section-half-pro',
    __FILE__,
    'pl-section-half-pro'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('58252f7d0cccac674bc33af8327485482988bd77');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');


/** A guard to prevent the section from being loaded if platform isn't installed or at the wrong time */
if( ! class_exists('PL_Section') ){
  return;
}

class PL_Section_Half_Pro extends PL_Section {

  /**
   * This function will load on all site page loads, both front and back end.
   * Use it for hooks, global settings, etc...
   */
  function section_persistent(){

  }

  /**
   * Include extra scripts and styles here
   * Use the pl_script and pl_style functions (which enqueues the files)
   */
  function section_styles(){

  }

  /**
   * Return the option array for the section.
   */
  function section_opts(){

    $options   = array();

    $options[] = array(
       'type'       => 'select',
        'key'      => 'format',
        'label'     => __( 'Half & Half Format', 'pl-section-elements' ),
        'opts'=> array(
          'half-half'      => array( 'name' => __( '50/50', 'pl-section-half' ) ),
          'half-third'  => array( 'name' => __( '60/40', 'pl-section-half' ) ),
          'half-third-two'  => array( 'name' => __( '40/60', 'pl-section-half' ) ),
          'half-fourth'  => array( 'name' => __( '75/25', 'pl-section-half' ) ),
          'half-fourth-two'  => array( 'name' => __( '25/75', 'pl-section-half' ) ),
        ),
    );

    $options[] = array(
    'type'      => 'multi',
    'title'     => __('Left Configuration', 'xolani'),
    'opts'  => array(
      array(
        'type'    => 'dragger',
        'label'   => __( 'Left Minimum Height', 'pl-section-slider' ),
        'opts'    => array(
          array(
            'key'     => 'left_min_height',
            'min'     => 200,
            'max'     => 700,
            'def'     => 200,
            'unit'    => 'Min (px)'
          )
        ),
      ),
      pl_std_opt( 'title', array('key' => 'left_title', 'label' => 'Title')),
      pl_std_opt( 'text', array('key' => 'left_text', 'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit ultricies tempor. Maecenas vel maximus mauris, sed malesuada metus.
       Maecenas a quam sit amet lorem mollis pharetra at a sapien. Etiam laoreet sapien at urna vulputate lacinia. Nullam lobortis ante quis nulla posuere pellentesque. Pellentesque habitant morbi ')),
      array(
        'key'				=> 'left_item',
        'label'			=> __( 'Half Features List', 'pl-section-halftwo' ),
        'type'			=> 'textarea',
        ),
      array(
      'title'      => __( 'Primary Button', 'pl-section-splashup' ),
      'type'      => 'multi',
      'stylize'    => 'button-config',
      'opts'      => pl_button_link_options( 'half_secondary', array(
        'half_secondary'      => 'http://www.pagelines.com/',
        'half_secondary_text' => 'Learn More',
        'half_secondary'      => '#',
        'half_secondary_size'         => 'lg'
      ) )
    ),
        pl_std_opt( 'background_color', array('key' => 'left_bg', 'label' => 'Background Color', 'default' => '#ffffff')),
        pl_std_opt( 'background_image', array('key' => 'left_img', 'label' => 'Background Image')),
        pl_std_opt( 'scheme', array('key' => 'left_scheme', 'label' => 'Scheme')),
    ),
);

      $options[] = array(
      'type'      => 'multi',
      'title'     => __('Right Configuration', 'xolani'),
      'opts'  => array(
        array(
          'type'    => 'dragger',
          'label'   => __( 'Right Minimum Height', 'pl-section-slider' ),
          'opts'    => array(
            array(
              'key'     => 'right_min_height',
              'min'     => 0,
              'max'     => 400,
              'def'     => 200,
              'unit'    => 'Min (px)'
            )
          ),
        ),
        pl_std_opt( 'title', array('key' => 'right_title', 'label' => 'Title')),
        pl_std_opt( 'text', array('key' => 'right_text', 'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit ultricies tempor. Maecenas vel maximus mauris, sed malesuada metus.
         Maecenas a quam sit amet lorem mollis pharetra at a sapien. Etiam laoreet sapien at urna vulputate lacinia. Nullam lobortis ante quis nulla posuere pellentesque. Pellentesque habitant morbi ')),
        array(
          'key'				=> 'right_item',
          'label'			=> __( 'Plan Features List', 'pl-section-halftwo' ),
          'type'			=> 'textarea',
          ),
        array(
        'title'      => __( 'Primary Button', 'pl-section-splashup' ),
        'type'      => 'multi',
        'stylize'    => 'button-config',
        'opts'      => pl_button_link_options( 'half_primary', array(
          'half_primary'      => 'http://www.pagelines.com/',
          'half_primary_text' => 'Learn More',
          'half_primary'      => '#',
          'half_primary_size'         => 'lg'
        ) )
      ),
          pl_std_opt( 'background_color', array('key' => 'right_bg', 'label' => 'Background Color', 'default' => '#fcfcfc')),
          pl_std_opt( 'background_image', array('key' => 'right_img', 'label' => 'Background Image')),
          pl_std_opt( 'scheme', array('key' => 'right_scheme', 'label' => 'Scheme')),
      ),
    );


    return $options;
  }

  /**
   * The section HTML output
   */
  function section_template(){ ?>

<div class="ihp-half-wrapper">
  <div class="ihp-half-container pl-row" data-bind="class: 'format-' + format()">
<!-- half -->
    <div class="half-block half-left pl-alignment-default-center" data-bind="plbg: left_img, style: {'background-color': left_bg}, plclassname: [left_scheme()], plstyle: {'min-height': $root.left_min_height() ? $root.left_min_height() + 'px' : ''}">
    <div class="block-inside">
      <h2 class="" data-bind="pltext: left_title"></h2>
        <p class="" data-bind="plshortcode: left_text"><?php echo $this->opt('left_text');?></p>
          <div class="half-list" >
            <ul class="list-unstyled list-items" data-bind="pllist: left_item"></ul>
          </div>
          <!-- half btn -->
          <div class="hlaf-btns" data-bind="visible: half_secondary">
            <a class="pl-btn" href="#" data-bind="plbtn: 'half_secondary', plattr: {'target': ( half_secondary_newwindow() == 1 ) ? '_blank' : ''}" ></a>
          </div>
        </div>
    </div>
<!-- half -->
    <div class="half-block half-right pl-alignment-default-center" data-bind="plbg: right_img, style: {'background-color': right_bg}, plclassname: [right_scheme()], plstyle: {'min-height': $root.right_min_height() ? $root.right_min_height() + 'px' : ''}">
     <div class="block-inside">
        <h2 class="" data-bind="pltext: right_title"></h2>
        <p class="" data-bind="plshortcode: right_text"><?php echo $this->opt('right_text');?></p>
          <div class="half-list">
            <ul class="list-unstyled list-items" data-bind="pllist: right_item"></ul>
          </div>
          <!-- half btn -->
          <div class="hlaf-btns" data-bind="visible: half_primary">
            <a class="pl-btn" href="#" data-bind="plbtn: 'half_primary', plattr: {'target': ( half_primary_newwindow() == 1 ) ? '_blank' : ''}" ></a>
          </div>
        </div>
    </div>
<!-- end half -->
  </div>
</div>


    <?php
  }

}
