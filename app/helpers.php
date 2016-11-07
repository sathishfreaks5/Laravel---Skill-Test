<?php

use App\Products;

/**
 * Clean interface for flash messages
 * flash('Title', 'message ...') // will output a info message
 *
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */
function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

/**
 * Products data storage path
 * @return string   products storage path
 */
function products_data_path()
{
    return storage_path('json/products_data/products.json');
}
