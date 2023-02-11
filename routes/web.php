<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\{HomeController, AuthController};
use App\Http\Controllers\admin\RoleController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');

// });

// admin

Route::get('admin/category', 'App\Http\Controllers\CategoryController@list')->middleware(['checkLogin', 'can:'.config('permissions.access.list-category')]);
Route::get('admin/category/add', 'App\Http\Controllers\CategoryController@create')->middleware('checkLogin');
Route::get('admin/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->middleware('checkLogin');
Route::get('admin/category/detail/{id}', 'App\Http\Controllers\CategoryController@detail')->middleware('checkLogin');
Route::get('admin/category/status/update/{id}', 'App\Http\Controllers\CategoryController@updateStatus')->middleware('checkLogin');
Route::get('admin/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->middleware('checkLogin');

Route::get('admin/category/getCategory', 'App\Http\Controllers\CategoryController@getCategory')->middleware('checkLogin');
Route::get('admin/category/getListCategory', 'App\Http\Controllers\CategoryController@getListCategory')->middleware('checkLogin');
Route::post('admin/category/add', 'App\Http\Controllers\CategoryController@postCreate')->middleware('checkLogin');
Route::post('admin/product/create', 'Modules\Dashboard\Http\Controllers\ProductController@postProductCreate')->middleware('checkLogin');
Route::post('admin/product/updateStatus', 'Modules\Dashboard\Http\Controllers\ProductController@updateStatus')->middleware('checkLogin');
Route::post('admin/product/deleteItem', 'Modules\Dashboard\Http\Controllers\ProductController@deleteItem')->middleware('checkLogin');
Route::post('admin/product/deleteImage', 'Modules\Dashboard\Http\Controllers\ProductController@deleteImage')->middleware('checkLogin');


Route::get('admin/news', 'App\Http\controllers\NewsController@list')->middleware(['checkLogin', 'can:'.config('permissions.access.list-news')]);
Route::get('admin/news/list', 'App\Http\controllers\NewsController@listNews')->middleware(['checkLogin']);
Route::get('admin/news/add', 'App\Http\controllers\NewsController@createNews')->middleware(['checkLogin', 'can:'.config('permissions.access.list-news')]);
Route::get('admin/news/edit/{id}', 'App\Http\controllers\NewsController@editNews')->middleware('checkLogin');
Route::post('admin/news/createNews', 'App\Http\controllers\NewsController@addNews')->middleware('checkLogin');
Route::post('admin/news/deleteNews', 'App\Http\controllers\NewsController@deleteNews')->middleware('checkLogin');
Route::get('admin/news/updateNews', 'App\Http\controllers\NewsController@updateNews')->middleware('checkLogin');

Route::post('admin/user/deleteUser', 'App\Http\controllers\AuthController@deleteUser')->middleware('checkLogin');
Route::get('admin/user/add', 'App\Http\controllers\AuthController@createUser')->middleware(['checkLogin', 'can:'.config('permissions.access.create-user')]);
Route::get('admin/user/edit/{id}', 'App\Http\controllers\AuthController@editUser')->middleware('checkLogin')->name('user.edit');
Route::post('admin/user/create', 'App\Http\controllers\AuthController@postCreateUser')->middleware('checkLogin')->name('user.postCreate');
Route::post('admin/user/update', 'App\Http\controllers\AuthController@postEditUser')->middleware('checkLogin')->name('user.postEdit');

// Route::get('admin/role/list', 'App\Http\controllers\admin\RoleController@list')->middleware('checkLogin')->name('role.list');
// Route::get('admin/role/add', 'App\Http\controllers\admin\RoleController@create')->middleware('checkLogin')->name('role.add');
// Route::post('admin/role/store', 'App\Http\controllers\admin\RoleController@store')->middleware('checkLogin')->name('role.create');
// Route::get('admin/role/edit/{id}', 'App\Http\controllers\admin\RoleController@edit')->middleware('checkLogin')->name('role.edit');
// Route::post('admin/role/update/{id}', 'App\Http\controllers\admin\RoleController@update')->middleware('checkLogin')->name('role.update');
Route::get('admin/role/list', [RoleController::class, 'list'])->middleware('checkLogin')->name('role.list');
Route::get('admin/role/add', [RoleController::class, 'create'])->middleware('checkLogin')->name('role.add');
Route::post('admin/role/store', [RoleController::class, 'store'])->middleware('checkLogin')->name('role.create');
Route::get('admin/role/edit/{id}', [RoleController::class, 'edit'])->middleware('checkLogin')->name('role.edit');
Route::post('admin/role/update/{id}', [RoleController::class, 'update'])->middleware('checkLogin')->name('role.update');

Route::get('admin/order', 'Modules\Dashboard\Http\controllers\OrderController@list')->middleware('checkLogin');
Route::get('admin/order/status/update', 'Modules\Dashboard\Http\controllers\OrderController@statusUpdate')->middleware('checkLogin');
Route::get('admin/order/cart', 'Modules\Dashboard\Http\controllers\OrderController@cartByOrder')->middleware('checkLogin');
Route::get('admin/config', 'Modules\Dashboard\Http\Controllers\ConfigController@create')->middleware('checkLogin');
Route::post('admin/config/create', 'Modules\Dashboard\Http\Controllers\ConfigController@postCreate')->middleware('checkLogin');
Route::get('admin/config/init', 'Modules\Dashboard\Http\Controllers\ConfigController@init')->middleware('checkLogin');
Route::get('admin/menu', 'Modules\Dashboard\Http\Controllers\MenuController@create')->middleware('checkLogin');
Route::get('admin/menu/detail/{id}', 'Modules\Dashboard\Http\Controllers\MenuController@show')->middleware('checkLogin');
Route::get('admin/menu/edit/{id}', 'Modules\Dashboard\Http\Controllers\MenuController@edit')->middleware('checkLogin');
Route::get('admin/menu/list', 'Modules\Dashboard\Http\Controllers\MenuController@list')->middleware('checkLogin');
Route::get('admin/menu/all', 'Modules\Dashboard\Http\Controllers\MenuController@all')->middleware('checkLogin');
Route::post('admin/menu/create', 'Modules\Dashboard\Http\Controllers\MenuController@postCreateMenu')->middleware('checkLogin');
Route::post('admin/menu/delete', 'Modules\Dashboard\Http\Controllers\MenuController@deleteMenu')->middleware('checkLogin');
Route::post('admin/menu/sort', 'Modules\Dashboard\Http\Controllers\MenuController@sortMenu')->middleware('checkLogin');

// Route::post('admin/logout', 'App\Http\controllers\AuthController@logout');
Route::post('admin/logout', [AuthController::class, 'logout']);
// Route::get('admin/logoutUser', 'App\Http\controllers\AuthController@logoutUser');
Route::get('admin/logoutUser', [AuthController::class, 'logoutUser']);
// Route::get('admin/login', 'App\Http\controllers\AuthController@loginUser');
Route::get('admin/login', [AuthController::class, 'loginUser']);
// Route::post('admin/postLoginUser', 'App\Http\controllers\AuthController@postLoginUser');
Route::post('admin/postLoginUser', [AuthController::class, 'postLoginUser']);

Route::get('/categories', [CategoryController::class, 'getListCategory']);
Route::get('/categories/nestedset', [CategoryController::class, 'index']);

Route::get('/categories/move/{id}/{type}', [CategoryController::class, 'move'])->name('category.move');
Route::get('categories/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
Route::post('/categories/update-tree', [CategoryController::class, 'updateTree'])->name('category.updateTree');
Route::post('/categories/datatable-serverside', [CategoryController::class, 'dataTable'])->name('category.dataTable');


// canans

Route::get('/', [HomeController::class, 'index']);
Route::get('home/bestSeller', [HomeController::class, 'bestSeller']);
Route::get('home/getListCategoryHome', [HomeController::class, 'getListCategoryHome']);
Route::get('home/getNewsHome', [HomeController::class, 'getNewsHome']);
Route::get('danh-muc/{id}/{slug}', 'App\Http\Controllers\CategoryController@viewCategory');
Route::get('category/listProduct/{id}', 'App\Http\Controllers\CategoryController@listProduct');
Route::get('san-pham/{id}/{slug}', 'App\Http\Controllers\ProductController@detail');
Route::get('product/detail/{id}', 'App\Http\Controllers\ProductController@getDetailProduct');
Route::post('product/addCart', 'App\Http\Controllers\ProductController@addCart');
Route::get('product/listCart', 'App\Http\Controllers\ProductController@listCart');
Route::get('product/cart/list', 'App\Http\Controllers\ProductController@listCartAjax');
Route::post('product/cart/updateQtyItem', 'App\Http\Controllers\ProductController@updateQtyItem');
Route::post('product/cart/deleteItemCart', 'App\Http\Controllers\ProductController@deleteItemCart');
Route::post('product/cart/order', 'App\Http\Controllers\ProductController@orderCart');
Route::get('tin-tuc', 'App\Http\Controllers\NewsController@listNewsFontend');
Route::get('tin-tuc/{id}/{slug}', 'App\Http\Controllers\NewsController@detail');

Route::get('gioi-thieu', 'App\Http\Controllers\ThuanvietController@gioithieu');
Route::get('giup-viec-gia-dinh', 'App\Http\Controllers\ThuanvietController@giupviecgiadinh');
Route::get('giup-viec-theo-gio', 'App\Http\Controllers\ThuanvietController@giupviectheogio');
Route::get('tap-vu-van-phong', 'App\Http\Controllers\ThuanvietController@tapvuvanphong');
Route::get('giup-viec-trong-tre', 'App\Http\Controllers\ThuanvietController@dichvutrongtre');
Route::get('cham-soc-nguoi-gia', 'App\Http\Controllers\ThuanvietController@chamsocnguoigia');
Route::get('giup-viec-pho-thong', 'App\Http\Controllers\ThuanvietController@giupviecphothong');
Route::get('doi-ngu-nhan-vien', 'App\Http\Controllers\ThuanvietController@doingunhanvien');
Route::get('cam-ket', 'App\Http\Controllers\ThuanvietController@camket');
Route::get('bang-gia', 'App\Http\Controllers\ThuanvietController@banggia');
Route::get('lien-he', 'App\Http\Controllers\ThuanvietController@lienhe');








// test
Route::get('qr-code', 'App\Http\Controllers\HomeController@QRcode');
Route::get('test-cart', 'App\Http\Controllers\HomeController@testCart');
Route::get('get-cart', 'App\Http\Controllers\HomeController@getCart');
Route::get('del-cart', 'App\Http\Controllers\HomeController@delCart');
Route::get('test-vue', 'App\Http\Controllers\HomeController@testVue');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
