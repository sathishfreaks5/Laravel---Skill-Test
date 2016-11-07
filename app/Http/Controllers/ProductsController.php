<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->createViewWith(new Product(), route('products.store'), 'POST');
    }

    /**
     * Store product from form
     *
     * @param ProductsRequest $request
     * @return mixed
     */
    public function store(ProductsRequest $request)
    {
        $this->addNewProduct($request);

        return $this->refreshListWithMessage('Product added successfully.');
    }

    /**
     * Load form with select product data
     *
     * @param $productId
     * @return mixed
     */
    public function edit($productId)
    {
        $product = $this->getProduct($productId);

        return $this->createViewWith($product, route('products.update', ['products' => $productId]), 'PATCH', 'info', 'Edit Product');
    }

    /**
     * Load form for delete action
     *
     * @param $productId
     * @return html
     */
    public function delete($productId)
    {
        $product = $this->getProduct($productId);

        return $this->createViewWith($product, route('products.destroy', ['products' => $productId]), 'DELETE', 'danger', 'Delete Product', 'readonly');
    }

    /**
     * Destroy a product from storage
     *
     * @param $productId
     * @return html
     */
    public function destroy($productId)
    {
        Product::destroy($productId);

        return $this->refreshListWithMessage('Product deleted successfully.');
    }

    /**
     * Update a given product
     *
     * @param ProductsRequest $request
     * @param $productId
     * @return mixed
     */
    public function update(ProductsRequest $request, $productId)
    {
        Product::find($productId)
            ->fill($request->all())
            ->save();

        return $this->refreshListWithMessage('Product updated successfully.');
    }


    /**
     * Get product by id
     *
     * @param $productId
     * @return Product
     */
    private function getProduct($productId)
    {
        return Product::find($productId);
    }

    /**
     * @param $products
     * @return int
     */
    private function getTotal($products)
    {
        $total = 0;
        foreach ($products as $product) {
            $total += $product->quantity * $product->price;
        }

        return $total;
    }

    /**
     * Load the create view
     * with form and list of products
     *
     * @param Product $product
     * @param string $url
     * @param string $method
     * @param string $actionClass
     * @param string $actionText
     * @param string $readonly
     * @return html response
     * @internal param $products
     * @internal param $total
     */
    private function createViewWith($product, $url, $method = 'GET', $actionClass = 'primary', $actionText = 'Add Product', $readonly = '')
    {
        $products = $this->getAllProducts();

        $total = $this->getTotal($products);

        $html = view('products.create', ['products' => $products, 'product' => $product, 'total' => $total, 'url' => $url, 'method' => $method, 'actionClass' => $actionClass, 'actionText' => $actionText, 'readonly' => $readonly])->render();

        return response($html);
    }

    /**
     * Append the new product to the list
     *
     * @param ProductsRequest $request
     * @return void
     */
    private function addNewProduct(ProductsRequest $request)
    {
        $product = new Product($request->all());

        $product->save();
    }


    /**
     * Refresh the products list after a change
     *
     * @param $message
     * @internal param $products
     * @internal param $total
     * @return html
     */
    private function refreshListWithMessage($message)
    {
        $products = $this->getAllProducts();

        $total = $this->getTotal($products);

        flash()->success('Success!', $message);

        $html = view('products.list', ['products' => $products, 'total' => $total])->render();

        return response($html);
    }

    /**
     * Return collection of products
     *
     * @return array
     */
    private function getAllProducts()
    {
        return Product::all();
    }
}
