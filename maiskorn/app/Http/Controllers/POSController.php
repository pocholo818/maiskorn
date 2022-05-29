<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
     /**
     * The table products.
     *
     * @var string
     */
    protected $productsTable = 'products';
     /**
     * The table products.
     *
     * @var string
     */
    protected $ordersTables = 'orders';


    //returns pos view
    public function index()
    {
        $products = DB::table('products')->get();
 
        return view('pos.pos', ['products' => $products]);
    }

    //returns PRINT view
    public function print()
    {
 
        return view('pos.print');
    }


      /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $orders = new Orders();

        $orders->fill($request->all());;
        $orders->save();


        return response()->json(['success'=>'Order is successful']);
    }
}
