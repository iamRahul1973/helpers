<?php

if (!function_exists('print_array')) {
    /**
     * @param array|object $input
     */
    function print_array($input = [])
    {
        echo "<pre>", print_r($input) , "</pre>";
    }
}

if (!function_exists('pretty_dump')) {
    /**
     * @param array|object $input
     * @param bool $export
     */
    function pretty_dump($input, $export = false)
    {
        if ($export === true) {
            echo "<pre>", var_export($input) , "</pre>";
        } else {
            echo "<pre>", var_dump($input) , "</pre>";
        }
    }
}

if (!function_exists('hr')) {
    /**
     * @param int $count
     * @return string
     */
    function hr($count = 1) {
        $response = '';
        for ($i = 0; $i <= $count; $i++) {
            $response .= '<hr>';
        }
        return $response;
    }
}

if (!function_exists('br')) {
    /**
     * @param int $count
     * @return string
     */
    function br($count = 1) {
        $response = '';
        for ($i = 0; $i <= $count; $i++) {
            $response .= '<br>';
        }
        return $response;
    }
}

if (!function_exists('h')) {
    /**
     * @param int $hierarchy
     * @param string $text
     * @return string
     */
    function h($hierarchy, $text) {
        $response = '';
        if ($hierarchy >= 1 && $hierarchy <= 6) {
            $response .= '<h' . $hierarchy . '>' . $text . '</h' . $hierarchy . '>';
        } else {
            $response .= 'OOPS !!!';
        }
        return $response;
    }
}

if (!function_exists('_h')) {
    /**
     * @param int $hierarchy
     * @param string $text
     * @return string
     */
    function _h($hierarchy, $text) {
        $response = '';
        if ($hierarchy >= 1 && $hierarchy <= 6) {
            $response .= '<h' . $hierarchy . '>' . $text . '</h' . $hierarchy . '>';
        } else {
            $response .= 'OOPS !!!';
        }
        echo $response;
    }
}

if (!function_exists('em')) {
    /**
     * @param string $text
     * @return string
     */
    function em($text) {
        return '<em>' . $text . '</em>';
    }
}

if (!function_exists('strong')) {
    /**
     * @param string $string
     * @return string
     */
    function strong($string)
    {
        return '<strong>' . $string . '</strong>';
    }
}

if (!function_exists('_e')) {
    /**
     * @param string $string
     * @return void
     *
     * TODO : Add Some styling as well !
     * TODO : Create a success, error, info and warning functions
     */
    function _e($string)
    {
        echo '__ ' . strong(em($string)) . ' __';
    }
}