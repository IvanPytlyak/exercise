<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Product;
use Illuminate\Http\Request;
use App\ClassesExerciseTwo\ProductService;

class BadgeController extends Controller
{

    private $id;
    private $name;
    private $color;
    private $semantic;
    private $sortingOrder;


    /**
     * addPBadge
     *
     * @param  mixed $request
     * @return void сохраняем обновленные данные в сессии
     */

    public function addPBadge(Request $request)
    {
        $id = $request->input('id_badge');
        $name = $request->input('name_badge');
        $color = $request->input('color');
        $semantic = $request->input('semantic');
        $sortingOrder = $request->input('sorting_order');

        $badge = new Badge($id, $name, $color, $semantic, $sortingOrder);
        session()->push('badge', $badge);

        return redirect()->route('products');
    }
}
