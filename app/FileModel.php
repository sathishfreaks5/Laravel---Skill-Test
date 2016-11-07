<?php

namespace App;

use File;

trait FileModel
{

    
    /**
     * Get Products storage path
     *
     * @return mixed
     */
    public static function getProductsStoragePath()
    {
        return products_data_path();
    }

    /**
     * Get all products from json file
     *
     * @param array $collumns
     * @return mixed
     */
    public static function all($collumns = ['*'])
    {
        $instance = new static;

        $instance->createFileIfNotExists();

        $products = $instance->getProductsFromFile();

        return $products;
    }

    /**
     * Get a product by id
     *
     * @param $productId
     * @return mixed
     */
    public static function find($productId)
    {
        $instance = new static;

        return $instance->getProductsFromFile($productId);
    }

    /**
     * Create a new product or
     * update an existing one
     *
     * @param array $attributes
     */
    public function save(array $attributes = [])
    {
        $products = Product::all();

        // new product
        if ( ! isset($this->id)) {

            $productId = count($products);

            $this->id = $productId;
        }

        $products[$this->id] = $this;

        File::put(self::getProductsStoragePath(), json_encode($products));
    }

    public static function destroy($productId)
    {
        $products = Product::all();

        unset($products[$productId]);

        // reindex
        $products = array_values($products);

        File::put(self::getProductsStoragePath(), json_encode($products));
    }

    /**
     * Creates the file if not exists
     */
    private function createFileIfNotExists()
    {
        if ( ! File::exists(self::getProductsStoragePath())) {
            file_put_contents(self::getProductsStoragePath(), "", LOCK_EX);
        }
    }

    /**
     * Reads products from json file
     *
     * @param int $productId
     * @return array|Product
     */
    public function getProductsFromFile($productId = null)
    {
        $products = json_decode(File::get(self::getProductsStoragePath()));
        if ( ! is_array($products)) {
            return array();
        }

        // create a Product instance
        // from stdClass values
        if ($productId !== null) {
            $productAttributes = $products[$productId];
            $product = new $this((array) $productAttributes);
            $product->id = $productAttributes->id;

            return $product;
        }

        return $products;
    }
}