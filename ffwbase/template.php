<?php

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
