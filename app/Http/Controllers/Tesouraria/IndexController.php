<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 28/11/2017
 * Time: 20:24
 */

namespace App\Http\Controllers\Tesouraria;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('tesouraria.index');
    }
}