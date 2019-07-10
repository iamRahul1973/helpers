<?php

/* ------------------------------------------------------
 * | URL HELPERS
 * ------------------------------------------------------ */

if (!function_exists('upload_path')) {
    /**
     * @param $filePath
     * @return string
     */
    function upload_path($filePath) {
        return asset('/uploads/' . $filePath);
    }
}

if (!function_exists('adminAssets')) {
    /**
     * @param string $path
     * @return string
     */
    function adminAssets($path) {
        return asset('/admin/' . $path);
    }
}

if (!function_exists('sendResponse')) {
    /**
     * @param $response array|object
     * @return \Illuminate\Http\JsonResponse
     */
    function sendResponse($response) {
        return response()->json($response)->header('Content-Type', 'application/json');
    }
}

/**
 * @return \Illuminate\Http\JsonResponse
 */
function preventIfNotPost() {
    $response = new stdClass();
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $response->status = false;
        $response->response_text = 'Bad Request. Only Post Method Allowed';
        return sendResponse($response);
    } elseif (empty($_POST)) {
        $response->status = false;
        $response->response_text = 'Bad Request. Nothing in the POST array';
        return sendResponse($response);
    }
}