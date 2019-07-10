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

function get_asset_url($path) {
    return get_theme_file_uri() . '/assets/' . $path;
}

function prepare_cpt_labels($singular_name, $plural_name = null, $extra = []) {

    if (is_null($plural_name)) {
        $plural_name = $singular_name . 's';
    }

    $labels = [
        'name' => $singular_name,
        'singular_name' => $singular_name,
        'menu_name' => $plural_name,
        'name_admin_bar' => $plural_name,
        'add_new' => "Add New ",
        'add_new_item' => "Add New {$singular_name}",
        'edit' => "Edit",
        'edit_item' => "Edit {$singular_name}",
        'new_item' => "New {$singular_name}",
        'all_items' => "All {$plural_name}",
        'view' => "View",
        'view_item' => "View {$singular_name}",
        'search_items' => "Search {$plural_name}",
        'not_found' => "No {$plural_name} found",
        'not_found_in_trash' => "No {$plural_name} found in trash"
    ];

    if (!empty($extra) && is_array($extra)) {
        $labels = array_merge($labels, $extra);
    }

    return $labels;
}

function prepare_cpt_args($args = []) {
    $new_args = [
        'public' => $args['public'] ?? true,
        'menu_position' => $args['menu_position'] ?? '',
        'supports' => $args['supports'] ?? ['title', 'editor', 'thumbnail'],
        'taxonomies' => $args['taxonomies'] ?? [],
        'menu_icon' => $args['menu_icon'] ?? '',
        'has_archive' => $args['has_archive'] ?? true,
        'show_ui' => $args['show_ui'] ?? true,
        'show_in_menu' => $args['show_in_menu'] ?? true,
        'show_in_nav_menus' => $args['show_in_nav_menus'] ?? true,
        'show_in_admin_bar' => $args['show_in_admin_bar'] ?? true
    ];

    // If provided array contains anything other than the new args
    // Then, append it to the result
    $map_args = array_map('json_encode', $args);
    $map_new_args = array_map('json_encode', $new_args);
    $array_diff = array_diff_assoc($map_args, $map_new_args);
    $array_diff = array_map('json_decode', $array_diff);

    if (!empty($array_diff)) {
        $new_args = array_merge($new_args, $array_diff);
    }

    return $new_args;
}

/**
 * @param $data array
 * @return bool|null
 */
function save_meta_info($data) {
    if (!is_array($data) || empty($data)) {
        return false;
    }

    global $post;

    foreach ($data as $key => $value) {

        // Don't store custom data twice
        if ( 'revision' === $post->post_type ) {
            return false;
        }

        if ( get_post_meta( $post->ID, $key, false ) ) {
            // If the custom field already has a value, update it.
            update_post_meta( $post->ID, $key, $value );
        } else {
            // If the custom field doesn't have a value, add it.
            add_post_meta( $post->ID, $key, $value);
        }

        if (empty($value)) {
            delete_post_meta($post->ID, $key);
        }

    }
}

// Don’t cry because it’s over, smile because it happened.