<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Crisp_News
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function custom_widgets()
{

  register_sidebar(array(
    'name'          => 'Default Sidebar Bottom',
    'id'            => 'default_sidebar_bottom',
    'before_widget' => '<aside class="card small mb-3 mt-3 default_sidebar make-me-sticky">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="fs-6 card-header">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => 'Default Sidebar Top',
    'id'            => 'default_sidebar_top',
    'before_widget' => '<aside class="card small mb-3 default_sidebar">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="fs-6 card-header">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => 'Footer Widget 1',
    'id'            => 'footer_widget1',
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-name"><h4 class="fs-4 fw-600">',
    'after_title'   => '</h4><div class="border-foot"></div></div>',
  ));

  register_sidebar(array(
    'name'          => 'Footer Widget 2',
    'id'            => 'footer_widget2',
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-name"><h4 class="fs-4 fw-600">',
    'after_title'   => '</h4><div class="border-foot"></div></div>',
  ));
}
add_action('widgets_init', 'custom_widgets');
