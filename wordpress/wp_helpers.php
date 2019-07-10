<?php

/**
 * @param $path string
 * @return string
 */
function get_assets_url($path) {
    return get_template_directory_uri() . '/assets/' . $path;
}

/* ------------------------------------------------------
 * | WORDPRESS HELPERS
 * ------------------------------------------------------ */

/**
 * @return false|string
 */
function get_custom_logo_url() {
    return wp_get_attachment_url(get_theme_mod('custom_logo'));
}

/**
 * @param $function_name string
 */
function get_ajax_support($function_name) {
    add_action('wp_ajax_' . $function_name, $function_name);
    add_action('wp_ajax_nopriv_' . $function_name, $function_name);
}