<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SanPhamController;
// use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;
// use Pusher\Pusher;



Route::prefix('admin')->middleware('checkAdmin')->group(function () {
	Route::prefix('san-pham')->group(function () {
	    Route::get('/', [SanPhamController::class , 'getSanPham'])->name('sanpham');
	});

// 	Route::prefix('bai-viet')->group(function () {
// 	    Route::get('/', 'BaiVietController@getBaiViet')->name('baiviet');

// 	});
// 	Route::prefix('user')->group(function () {
// 	    Route::get('/', 'UserController@getUser')->name('user');

// 	});
// 	Route::prefix('comment')->group(function () {
// 	    Route::get('/', 'CommentController@getComment')->name('comment');
// 	});
// 	Route::prefix('message')->group(function () {
// 	    Route::get('/', 'MessageController@getMessage')->name('message');

// 	});
// 	Route::prefix('thong-ke')->group(function () {
// 	    Route::get('/', 'ThongKeController@getThongKe')->name('thongke');

// 	});
// 	Route::prefix('slide')->group(function () {
// 	    Route::get('/', 'SlideController@getSlide')->name('slide');

// 	});
   
});

// Trang chu
Route::get('/', [ClientController::class, 'getTrangChu'])->name('trangchu');
Route::get('register', [ClientController::class, 'getRegister'])->name('dangky');
Route::post('register', [ClientController::class, 'postRegister'])->name('postRegister');
// Route::post('check-username', 'ClientController@checkUsername');
Route::get('login', [ClientController::class, 'getLogin'])->name('dangnhap');
Route::post('login', [ClientController::class, 'postLogin'])->name('dangnhap');
Route::get('logout', [ClientController::class, 'getLogout'])->name('dangxuat');
Route::post('load-san-pham', [ClientController::class, 'loadSanPham']);
Route::post('dang-bai', [ClientController::class, 'dangBai'])->name('dangbai');
// Route::post('chi-tiet-san-pham', 'ClientController@loadChiTietSanPham');
// Route::post('xoa-san-pham', 'ClientController@xoaSanPham');

// Son Trang
Route::get('son-trang', [PostsController::class, 'getSonTrang'])->name('sontrang');
// Route::get('product-status', 'PostsController@productStatus');

// Tra dao quan
Route::get('tra-dao-quan', [ClientController::class, 'getTraDaoQuan'])->name('tradaoquan');

//##############################
// Route::get('xoa-cache', function(){
// 	return Cache::pull('sanpham');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
