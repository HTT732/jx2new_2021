<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Pusher\Pusher;

class PostsController extends Controller
{
    // function getSonTrang () {
    // 	$countSP = SanPham::all()->count();
    // 	Session::put('countProduct', $countSP);
    // 	$sp0 = SanPham::all()->first(); 
    // 	$timeabc = $sp0->created_at->diffForHumans();

    //     $slide = Slide::all()->toJson();
    //     $sanpham = User::join('products', 'users.id', 'products.idUser')->join('like_views', 'products.idLikeView', 'like_views.id')->join('server_games', 'products.idServer', 'server_games.id')->join('images', 'products.id', 'images.idSanPham')->select('users.id', 'users.username', 'users.nickname', 'users.sdt', 'users.fb', 'users.level', 'products.id', 'products.tieude', 'products.thumbnail', 'products.noidung', 'products.kieugia', 'products.gia', 'products.created_at', 'server_games.servername', 'like_views.sum_like', 'like_views.sum_view')->selectRaw('GROUP_CONCAT(images.name) as images')->groupBy('users.id', 'users.username', 'users.nickname', 'users.sdt', 'users.fb', 'users.level', 'products.id', 'products.tieude', 'products.thumbnail', 'products.noidung', 'products.kieugia', 'products.gia', 'products.created_at', 'server_games.servername', 'like_views.sum_like', 'like_views.sum_view')->orderBy('products.id', 'DESC')->get()->toJson();
    //     return view('clients.posts', compact('slide','sanpham','countSP', 'timeabc'));
    // }
    // 
    function getSonTrang () {
    	$all = Product::all();
        $countSP = $all->count();
    	Session::put('countProduct', $countSP);
    	$sp0 = $all->first(); 
        

    	$timeabc = $sp0->created_at->diffForHumans();

        $slide = Slider::all()->toJson();
        $sanpham = User::join('products', 'users.id', 'products.userID')->join('like_views', 'products.likeViewID', 'like_views.id')->join('server_games', 'products.serverID', 'server_games.id')->leftJoin('images', 'products.id', 'images.productsID')->select('users.id', 'users.username', 'users.nickname', 'users.sdt', 'users.fb', 'users.level', 'products.id', 'products.title', 'products.thumbnail', 'products.content', 'products.priceType', 'products.price', 'products.created_at', 'server_games.servername', 'like_views.likeCount', 'like_views.viewCount')->selectRaw('GROUP_CONCAT(images.name) as images')->groupBy('users.id', 'users.username', 'users.nickname', 'users.sdt', 'users.fb', 'users.level', 'products.id', 'products.title', 'products.thumbnail', 'products.content', 'products.priceType', 'products.price', 'products.created_at', 'server_games.servername', 'like_views.likeCount', 'like_views.viewCount')->orderBy('products.id', 'DESC')->get()->toJson();
        return view('clients.posts', compact('slide','sanpham','countSP', 'timeabc'));
    }

}
