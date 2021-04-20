<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
class SanPhamController extends Controller
{
     function getSanPham () {
     	$sanpham = Product::all();

    	return view('admins.sanpham', ['sanpham'=>$sanpham]);
    }
}