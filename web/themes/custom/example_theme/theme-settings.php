<?php
/**
 * @file
 * Add custom theme settings to the ZURB Foundation sub-theme.
 */

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Implements hook_form_FORM_ID_alter().
 * @param $form
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 */
function example_theme_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  // Build link to style guide.
  $style_guide_link = Url::fromUri(Drupal::request()->getSchemeAndHttpHost() . '/' . drupal_get_path('theme', 'example_theme') . '/dist/styleguide.html');
  $link_options = array(
    'attributes' => array(
      'class' => array(
        'button',
      ),
      'target' => '_blank',
    ),
  );
  $style_guide_link->setOptions($link_options);

  // Style guide.
  $form['style_guide'] = array(
    '#type' => 'details',
    '#title' => t('Style Guide'),
    '#description' => t('Bundled with ZURB Template is Style Sherpa, ZURB\'s style guide tool.  To learn more about how you can customize your style guide see <a href=\'https://foundation.zurb.com/sites/docs/style-sherpa.html\' target=\'_blank\'>Style Sherpa Documentation</a>.'),
  );

  $form['style_guide']['link'] = array(
    '#type' => 'markup',
    '#prefix' => '<p>',
    '#markup' => Link::fromTextAndUrl(t('View Style Guide'), $style_guide_link)->toString(),
    '#suffix' => '</p>',
  );

  // Foundation Top Bar.
  $form['topbar'] = array(
    '#type' => 'details',
    '#title' => t('Foundation Top Bar'),
    '#description' => t('The Foundation Top Bar gives you a great way to display a complex navigation bar on small or large screens.'),
  );

  $form['topbar']['zurb_template_top_bar_enable'] = array(
    '#type' => 'select',
    '#title' => t('Enable'),
    '#description' => t('If enabled, the site name and main menu will appear in a bar along the top of the page.'),
    '#options' => array(
      0 => t('Never'),
      1 => t('Always'),
      2 => t('Mobile only'),
    ),
    '#default_value' => theme_get_setting('zurb_template_top_bar_enable'),
  );

  $form['topbar']['container']['zurb_template_top_bar_grid'] = array(
    '#type' => 'checkbox',
    '#title' => t('Contain to grid'),
    '#description' => t('Check this for your top bar to be set to your grid width.'),
    '#default_value' => theme_get_setting('zurb_template_top_bar_grid'),
  );

  $form['topbar']['container']['zurb_template_top_bar_sticky'] = array(
    '#type' => 'checkbox',
    '#title' => t('Sticky'),
    '#description' => t("Check this for your top bar to stick to the top of the screen when the user scrolls down. If you're using the Admin Menu module and have it set to 'Keep menu at top of page', you'll need to check this option to maintain compatibility."),
    '#default_value' => theme_get_setting('zurb_template_top_bar_sticky'),
  );

  $form['topbar']['container']['zurb_template_top_bar_is_hover'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hover to expand menu'),
    '#description' => t('Set this to false to require the user to click to expand the dropdown menu.'),
    '#default_value' => theme_get_setting('zurb_template_top_bar_is_hover'),
  );

  // Menu settings.
  $form['topbar']['container']['menu'] = array(
    '#type' => 'details',
    '#title' => t('Dropdown Menu'),
  );

  $form['topbar']['container']['menu']['zurb_template_top_bar_menu_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Menu text'),
    '#description' => t('Specify text to go beside the mobile menu icon or leave blank for none.'),
    '#default_value' => theme_get_setting('zurb_template_top_bar_menu_text'),
  );

  // Search settings.
  $form['topbar']['container']['search'] = array(
    '#type' => 'details',
    '#title' => t('Search Menu'),
  );

  $form['topbar']['container']['search']['zurb_template_top_bar_search'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Search Menu'),
    '#description' => t('Displays the Search menu in the Top Bar.'),
    '#default_value' => theme_get_setting('zurb_template_top_bar_search'),
  );

  /*
   * Hard-coded page elements.
   */
  $form['page_elements'] = array(
    '#type' => 'details',
    '#title' => t('Page Elements'),
    '#description' => t('Contains settings to toggle hard-coded elements in the page template.'),
  );

  $form['page_elements']['zurb_template_page_site_name'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show site name'),
    '#description' => t('Determines if the hard-coded site name should be displayed.'),
    '#default_value' => theme_get_setting('zurb_template_page_site_name'),
  );

  $form['page_elements']['zurb_template_page_site_logo'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show site logo'),
    '#description' => t('Determines if the hard-coded site logo should be displayed.'),
    '#default_value' => theme_get_setting('zurb_template_page_site_logo'),
  );

  $form['page_elements']['zurb_template_page_account_info'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Login/Signup information'),
    '#description' => t('Determines if the hard-coded login block should be displayed.'),
    '#default_value' => theme_get_setting('zurb_template_page_account_info'),
  );
}
