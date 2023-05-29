<?php

namespace App\Http\Controllers\Order;

use App\Models\Order\Cart;
use Illuminate\Http\Request;
use App\Models\Screencast\Playlist;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\CartResource;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        return CartResource::collection(Auth::user()->carts()->with('playlist', 'user')->latest()->get());
    }

    public function store(Playlist $playlist){

        if(!Auth::user()->alreadyInCart($playlist)){
            Auth::user()->addToCart($playlist);

            return response()->json([
                'message' => 'Added In The Cart',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Playlist Already In The Cart',
            ], 405);
        }

    }
}
