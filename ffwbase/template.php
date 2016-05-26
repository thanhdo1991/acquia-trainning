<?php
/**
 * @file
 * Default theme implementation to display a block.
 */

/**
 * Implements hook_preprocess_page().
 */
function ffwbase_preprocess_page(&$variables) {
  $acquia_img = theme(
    'acquia_img',
    array(
      'path' => drupal_get_path('theme', 'ffwbase') . '/images/acquia_image.png',
      'alt' => 'Acquia image',
      'width' => '100px',
      'attributes' => array(
        'class' => 'acquia_img_class',
      ),
    )
  );

  $variables['acquia_img'] = $acquia_img;
}

/**
 * Overrides theme_acquia_img().
 *   - Create wrapper for img element.
 */
function ffwbase_acquia_img($variables) {
  $attributes = $variables['attributes'];
  $attributes['src'] = file_create_url($variables['path']);

  foreach (array('width', 'height', 'alt', 'title') as $key) {

    if (isset($variables[$key])) {
      $attributes[$key] = $variables[$key];
    }
  }

  return '<div class="image-wrapper"><img' . drupal_attributes($attributes) . ' /></div>';
}

/**
 * Implements hook_page_alter().
 */
function ffwbase_page_alter(&$page) {
  $page['content']['ffw_list'] = array(
    '#type' => 'container',
  );
  $page['content']['ffw_list']['heading'] = array(
    '#type' => 'html_tag',
    '#tag' => 'h2',
    '#value' => t('This is ffw list demo'),
  );
  $page['content']['fff_list']['content'] = array(
    '#theme' => 'item_list',
    '#items' => array(
      'First item',
      'Second item',
      'Third item',
    ),
  );
}
