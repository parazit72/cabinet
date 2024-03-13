<?php

use App\Http\Controllers\AdminFileManagerController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostCollectionController;
use App\Http\Controllers\CommentCollectionController;
use App\Http\Controllers\AdminAuthLogController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminMetricController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\ReviewCollectionController;
use App\Http\Controllers\AdminFooterMenuController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminHomeSettingController;
use App\Http\Controllers\AdminAboutSettingController;
use App\Http\Controllers\AdminPageSettingController;
use Illuminate\Support\Facades\Route;

use App\Models\Message;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/v1/admin/login', [LoginController::class, 'login'])->withoutMiddleware(['auth:sanctum', 'inactive.token'])->name('login');

Route::resource('/v1/admin/user', UserController::class)->names('admin.user');
Route::resource('/v1/admin/post', PostController::class)->names('admin.post');
Route::resource('/v1/admin/postTag', PostTagController::class)->names('admin.postTag');
Route::resource('/v1/admin/newsletter', NewsletterController::class)->names('admin.newsletter');
Route::resource('/v1/admin/postCollection', PostCollectionController::class)->names('admin.postCollection');
Route::resource('/v1/admin/comment', CommentCollectionController::class)->names('admin.comment');
Route::resource('/v1/admin/review', ReviewCollectionController::class)->names('admin.review');
Route::resource('/v1/admin/authlog', AdminAuthLogController::class, ['names' => 'admin.authlog']);
Route::resource('/v1/admin/service', AdminServiceController::class, ['names' => 'admin.service']);
Route::resource('/v1/admin/slider', AdminSliderController::class, ['names' => 'admin.slider']);
Route::resource('/v1/admin/metric', AdminMetricController::class, ['names' => 'admin.metric']);
Route::resource('/v1/admin/customer', AdminCustomerController::class, ['names' => 'admin.customer']);
Route::resource('/v1/admin/message', AdminMessageController::class, ['names' => 'admin.message']);
Route::resource('/v1/admin/footer_menu', AdminFooterMenuController::class, ['names' => 'admin.footer_menu']);
Route::resource('/v1/admin/menu', AdminMenuController::class, ['names' => 'admin.menu']);
Route::resource('/v1/admin/page', AdminPageController::class, ['names' => 'admin.page']);
Route::resource('/v1/admin/home_setting', AdminHomeSettingController::class, ['names' => 'admin.home_setting']);
Route::resource('/v1/admin/about_setting', AdminAboutSettingController::class, ['names' => 'admin.about_setting']);
Route::resource('/v1/admin/page_setting', AdminPageSettingController::class, ['names' => 'admin.page_setting']);

Route::post('/v1/admin/fileUpload/', [AdminFileManagerController::class, 'upload'])->name('admin.fileUpload');
Route::post('/v1/admin/fileUpload/{format?}', [AdminFileManagerController::class, 'uploadValidation'])->name('admin.fileUpload.validate');

Route::post('/v1/admin/message/{id}', [AdminMessageController::class, 'read'])->name('admin.message.read');

// Route::resource('/v1/admin/postCategory', PostCategoryController::class)->names('admin.postCategory');
Route::get('/v1/admin/sidebar', function () {

    $unreadMessageCount = Message::where('status', 'UnRead')->count();

    $menu = [];

    $menu[] = (object)[
        'title' => 'Dashboard',
        'link'  => '/admin/custom/dashboard',
        'icon'  => 'DashboardOutlined',
        'name'  => 'dashboard',
    ];

    $menu[] = (object)[
        'title' => 'Home',
        'icon'  => 'HomeOutlined',
        'name'  => 'home',
        'children' => [
            [
                'title' => 'Slider',
                'link' => '/admin/slider',
                'icon' => 'FileImageOutlined',
                'name' => 'slider',
            ],
            [
                'title' => 'Metrics',
                'link'  => '/admin/metric',
                'icon'  => 'SketchOutlined',
                'name'  => 'metric',
            ],
            [
                'title' => 'Customer',
                'link'  => '/admin/customer',
                'icon'  => 'LikeOutlined',
                'name'  => 'customer',
            ],
            [
                'title' => 'Review',
                'link'  => '/admin/review',
                'icon'  => 'CommentOutlined',
                'name'  => 'review',
            ],
            [
                'title' => 'Home Setting',
                'link' => '/admin/page_setting/create-edit?id=1',
                'icon' => 'SettingOutlined',
                'name' => 'page_setting/create-edit?id=1',
            ],
        ]
    ];

    $menu[] = (object)[
        'title' => 'Solutions',
        'icon'  => 'ToolOutlined',
        'name'  => 'service',
        'children' => [
            [
                'title' => 'Solutions',
                'link' => '/admin/service',
                'icon' => 'ToolOutlined',
                'name' => 'service',
            ],
            [
                'title' => 'Solutions Setting',
                'link' => '/admin/page_setting/create-edit?id=2',
                'icon' => 'SettingOutlined',
                'name' => 'page_setting/create-edit?id=2',
            ],
        ]
    ];

    $menu[] = (object)[
        'title' => 'Blog',
        'icon'  => 'BookOutlined',
        'name'  => 'book',
        'children' => [
            [
                'title' => 'Post',
                'link'  => '/admin/post',
                'icon'  => 'FormOutlined',
                'name'  => 'post',
            ],
            [
                'title' => 'Blog Setting',
                'link' => '/admin/page_setting/create-edit?id=3',
                'icon'  => 'SettingOutlined',
                'name' => 'page_setting/create-edit?id=3',
            ],
        ]
    ];

    $menu[] = (object)[
        'title' => 'About',
        'icon'  => 'FileTextOutlined',
        'name'  => 'about',
        'children' => [
            [
                'title' => 'About us',
                'link' => '/admin/about_setting/create-edit?id=1',
                'icon' => 'FileTextOutlined',
                'name' => 'page/create-edit?id=1',
            ],

        ]
    ];

    $menu[] = (object)[
        'title' => 'Setting',
        'icon'  => 'SettingOutlined',
        'name'  => 'setting',
        'children' => [
            [
                'title' => 'Menus',
                'link' => '/admin/menu',
                'icon' => 'MenuOutlined',
                'name' => 'menu',
            ],
            [
                'title' => 'Auth logs',
                'link' => '/admin/authlog',
                'icon' => 'DatabaseOutlined',
                'name' => 'authlog',
            ],
            [
                'title' => 'User',
                'link'  => '/admin/user',
                'icon'  => 'UserOutlined',
                'name'  => 'user',
            ]
        ]
    ];

    $menu[] = (object)[
        'title' => 'Other Page',
        'link'  => '/admin/page',
        'icon'  => 'FileTextOutlined',
        'name'  => 'page',
    ];

    $menu[] = (object)[
        'title' => 'Newsletter',
        'link'  => '/admin/newsletter',
        'icon'  => 'MailOutlined',
        'name'  => 'newsletter',
    ];

    $menu[] = (object)[
        'title' => 'Messages',
        'link'  => '/admin/message',
        'icon'  => 'MessageOutlined',
        'name'  => 'message',
        'badge'  => $unreadMessageCount,
    ];

    return collect($menu);
});

Route::get('/v1/admin/mehr-panel', fn () => (object)['name' => config('app.name')]);

Route::post('/v1/admin/logout', [LoginController::class, 'logout'])
    ->name('admin.logout');
