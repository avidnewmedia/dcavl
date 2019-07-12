<?php

/**
 * Implements hook_theme_suggestions_HOOK().
 * @param array $suggestions
 * @param array $variables
 */
function STARTER_theme_suggestions_input_alter(array &$suggestions, array $variables) {
  // Be sure that the parent form id exists.
  if (!empty($variables['element']['#parent_form_id'])) {

    // Create template suggestions for add to cart forms.
    if (substr($variables['element']['#parent_form_id'], 0, 54) === 'commerce_order_item_add_to_cart_form_commerce_product_') {
      $new_suggestions = [
        'input__commerce_order_item_add_to_cart_form_commerce_product',
        'input__commerce_order_item_add_to_cart_form_commerce_product__' . $variables['element']['#type'],
      ];
      $suggestions = array_merge($new_suggestions, $suggestions);
    }

    // Create template suggestions for shopping cart view form.
    if (substr($variables['element']['#parent_form_id'], 0, 38) === 'views_form_commerce_cart_form_default_') {
      $new_suggestions = [
        'input__views_form_commerce_cart_form_default',
        'input__views_form_commerce_cart_form_default__' . $variables['element']['#type'],
        'input__views_form_commerce_cart_form_default__' . $variables['element']['#type'] . '__' . str_replace('-', '_', $variables['element']['#id']),
      ];
      $suggestions = array_merge($new_suggestions, $suggestions);

    }

  }
}

/**
 * Implements hook_theme_suggestions_HOOK().
 * @param array $suggestions
 * @param array $variables
 */
function STARTER_theme_suggestions_container_alter(array &$suggestions, array $variables) {
  // Be sure that the parent form id exists.
  if (!empty($variables['element']['#parent_form_id'])) {

    // Create template suggestions for add to cart forms.
    if (substr($variables['element']['#parent_form_id'], 0, 38) === 'views_form_commerce_cart_form_default_') {
      $new_suggestions = [
        'container__views_form_commerce_cart_form_default',
        'container__views_form_commerce_cart_form_default__' . $variables['element']['#type'],
      ];
      $suggestions = array_merge($new_suggestions, $suggestions);
    }

  }
}

/**
 * Implements hook_theme_suggestions_form_alter().
 */
function STARTER_theme_suggestions_form_alter(array &$suggestions, array $variables) {
  // Be sure that the parent form id exists.
  if (!empty($variables['element']['#parent_form_id'])) {

    // Create template suggestion for add to cart forms.
    if ($variables['element']['#wrapper_id'] == 'commerce-product-add-to-cart-form') {
      $suggestions = array_merge(array('form__commerce_product_add_to_cart_form'), $suggestions);
    }

  }
}
