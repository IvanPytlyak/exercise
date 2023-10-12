<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ClassesExerciseTwo\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * productService контейнер для хранения отсортированного массива
     *
     * @var mixed
     */
    private $productService;


    /**
     * __construct
     *
     * @return void массив продуктов/ контейнер для хранения отсортированного массива
     */


    public function __construct()
    {
        if (session()->has('products')) {
            $products = session('products');
            $this->productService = new ProductService($products);
        } else {
            session()->flash('warning', "Сессия не существует");
            $this->productService = new ProductService([]);
        }
    }



    /**
     * addProduct
     *
     * @param  mixed $request данные из формы
     * @return void сохранение в сессии массива products
     */

    public function addProduct(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $stock = $request->input('stock');
        $promotionType = $request->input('promotionType');
        $stockStatus = $request->input('stockStatus');

        $promotionType = empty($promotionType) ? null : $promotionType;
        $stockStatus = empty($stockStatus) ? null : $stockStatus;

        $product = new Product($id, $name, $price, $stock, $promotionType, $stockStatus);

        $badgeId = $request->input('badge_id');
        $badge = $this->findBadgeById($badgeId);

        if ($badge) {
            $product->addBadge($badge);
        }

        session()->push('products', $product);

        return redirect()->route('products');
    }



    /**
     * showProducts Метод для отображения списка товаров на сайте    
     *
     * @return void Получаем отфильтрованные товары
     */

    public function showProducts()
    {
        $products = session('products', []);
        $productService = new ProductService($products);
        $filteredProducts = $productService->getSellableProducts();

        return view('products', compact('filteredProducts'));
    }



    /**
     * updateProduct
     *
     * @param  mixed $request данные из формы
     * @return void сохраняем обновленные данные в сессии
     */

    public function updateProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $newPrice = $request->input('new_price');

        $products = session('products', []);
        foreach ($products as $product) {
            if ($product->getId() == $productId) {
                $product->setPrice($newPrice);
                break;
            }
        }

        session(['products' => $products]);

        return redirect()->route('products');
    }



    private function findBadgeById($badgeId)
    {
        $badges = session('badges', []);

        foreach ($badges as $badge) {
            if ($badge->getId() == $badgeId) {
                return $badge;
            }
        }
        return null;
    }
}
