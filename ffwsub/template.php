<?php
/**
 * @file
 * Template for ffwbase theme.
 */

/**
 * Implements hook_preprocess_page().
 */
function ffwsub_preprocess_page(&$variables) {
  // Override style file from admin menu module.
  $admin_menu_dir = drupal_get_path('theme', 'ffwsub') . '/css/admin_menu.css';

  if (file_exists($admin_menu_dir)) {
    drupal_add_css($admin_menu_dir);
  }

  // Add font google by drupal_add_css..
  drupal_add_css('http://fonts.googleapis.com/css?family=Sancreek', array('type' => 'external'));

  // Style inline by drupal_add_css.
  drupal_add_css('body {font-size: 20px;}', array('type' => 'inline'));

  // Add style to page when is front page or not.
  $front_style = drupal_get_path('theme', 'ffwsub') .'/css/front.css';
  $not_front_style = drupal_get_path('theme', 'ffwsub') .'/css/not_front.css';

  if (file_exists($front_style) && drupal_is_front_page()) {
    $include_style = $front_style;
  }
  elseif (file_exists($not_front_style)) {
    $include_style = $not_front_style;
  }

  if (isset($include_style)) {
    drupal_add_css($include_style, array('type' => 'external'));
  }
}
