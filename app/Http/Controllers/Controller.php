<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $search = request()->query('q');
        if($search){
            $articles = Article::where('title', 'LIKE', "%$search%")->get();
            // var_dump($articles);
        }else{
            $articles = Article::all();
        }
        return view('index', compact('articles','search'));
    }

    public function soloAdmin(Request $request)
    {
        if (! Gate::allows('validar-admin')) {
            abort(403);
        }

        $carrito = DB::table('cart_items')
        ->join('carts', 'cart_items.cart_id', '=', 'carts.id')
        ->join('products', 'cart_items.product_id', '=', 'products.id')
        ->join('users', 'carts.user_id', '=', 'users.id')
        ->select('cart_items.quantity', 'products.name', 'products.price', DB::raw('cart_items.quantity * products.price as subtotal'))
        ->where('carts.user_id', $request->user()->id)
        ->get();

        $total = 0;
        foreach($carrito as $item){
            $total += (float) $item->subtotal;
        }
        $total = round($total, 2);

        return view('solo-admin', compact('carrito', 'total'));

    }
}
