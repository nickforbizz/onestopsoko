<?php

/**
 * Display status with a badge
 * @param $status
 * @return string
 */


if (!function_exists('status')) {
    function status($status): string
    {
        $status = strtolower($status);
        switch ($status) {
            case 'active':
            case 'sent':
            case 'published':
            case 'success':
            case 'paid':
                return '<span class="badge badge-success">' . ucfirst($status) . '</span>';

            case 'pending':
            case 'processing':
                return '<span class="badge badge-info">' . ucfirst($status) . '</span>';

            case 'deactivated':
            case 'failed':
                return '<span class="badge badge-danger">' . ucfirst($status) . '</span>';

            case 'suspended':
                return '<span class="badge badge-warning">' . ucfirst($status) . '</span>';

            default:
                return '<span class="badge badge-secondary">' . ucfirst($status) . '</span>';
        }
    }
}

if (!function_exists('upload_image')) {
    /**
     * Upload an image to a collection
     * @param $model
     * @param $file
     * @param $collection
     * @return mixed
     */
    function upload_image($model, $file, $collection)
    {
        $model->clearMediaCollection($collection);
        return $model->addMedia($file)->toMediaCollection($collection);
    }
}

if (!function_exists('format_date')) {
    /**
     * @param $date
     * @return string
     */
    function format_date($date): string
    {
        $timestamp = strtotime($date);

        if ($timestamp !== false) {
            $formattedDate = date('M, d Y', $timestamp);
            return $formattedDate;
        } else {
            return "Invalid date and time format.";
        }

    }
}

if (!function_exists('format_date_time')) {
    /**
     * @param $date
     * @return string
     */
    function format_date_time($date): string
    {
        return date('M, d Y h:i', strtotime($date));

    }
}

if (!function_exists('replace')) {
    function replace($needle, $replacement, $number)
    {
        if (startsWith($number, $needle)) {
            $pos = strpos($number, $needle);
            $length = strlen($needle);
            $number = substr_replace($number, $replacement, $pos, $length);
        }
        return $number;
    }
}

if (!function_exists('startsWith')) {

    function startsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('formatPhone')) {

    function formatPhone($number)
    {
        $number = preg_replace('/\s+/', '', $number);
        $number = trim($number);
        $whitelists = array('7', '07', '25407', '+2547', '+25407');
        $new_whitelists = array('01', '1', '25401', '2541', '+2541', '+25401');
        foreach ($whitelists as $replacement) {
            $number = replace($replacement, '2547', $number);
        }
        foreach ($new_whitelists as $replacement) {
            $number = replace($replacement, '2541', $number);
        }
        return $number;
    }

    if (!function_exists('get_model')) {
        function get_model($id, $model)
        {
            $modelClass = "App\\Models\\$model";
            return $modelClass::where('id', $id)->first();
        }
    }

    if (!function_exists('store_image')) {
        function store_image($image)
        {
            $code = mt_rand(000000, 999999);
            $imageName = time() . $code . '.' . $image->extension();
            $image->move(public_path('assets/img/products'), $imageName);
            return $imageName;
        }
    }

    if (!function_exists('get_model_items')) {
        function get_model_items($id, $model, $column)
        {
            $modelClass = "App\\Models\\$model";
            return $modelClass::where($column, $id)->get();
        }
    }

}


