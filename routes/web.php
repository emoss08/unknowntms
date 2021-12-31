<?php

    use App\Http\Controllers\Account\SettingsController;
    use App\Http\Controllers\ArtisanController;
    use App\Http\Controllers\AuditController;
    use App\Http\Controllers\Auth\SocialiteLoginController;
    use App\Http\Controllers\CommoditiesController;
    use App\Http\Controllers\CustomerController;
    use App\Http\Controllers\Documentation\ReferencesController;
    use App\Http\Controllers\EquipmentTypeController;
    use App\Http\Controllers\LangController;
    use App\Http\Controllers\Logs\AuditLogsController;
    use App\Http\Controllers\Logs\SystemLogsController;
    use App\Http\Controllers\OrderTypesController;
    use App\Http\Controllers\PagesController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\TestQueueEmails;
    use App\Http\Controllers\TractorsController;
    use App\Http\Controllers\TrailersController;
    use App\Http\Controllers\UploadController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\UsersController;
    use Illuminate\Support\Facades\Route;
    use SebastianBergmann\Environment\Console;
    use RealRashid\SweetAlert\Facades\Alert;


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

    Route::get('/', function() {
        return redirect('index');
    });

    Route::post('/upload', [UploadController::class, 'store']);

    $menu = theme()->getMenu();
    array_walk($menu, function($val) {
        if(isset($val['path'])) {
            $route = Route::get($val['path'], [PagesController::class, 'index']);

            // Exclude documentation from auth middleware
            if(!Str::contains($val['path'], 'documentation')) {
                $route->middleware('auth');
            }
        }
    });

// Documentations pages
    Route::prefix('documentation')->group(function() {
        Route::get('getting-started/references', [ReferencesController::class, 'index']);
        Route::get('getting-started/changelog', [PagesController::class, 'index']);
    });

    /* begin::Auth Middleware */
    Route::middleware('auth')->group(function() {
        // Account pages
        Route::prefix('account')->group(function() {
            Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
            Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
            Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
            Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
        });

        // Logs pages
        Route::prefix('log')->name('log.')->group(function() {
            Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
            Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
        });
        /* begin::Middleware to throttle application **/
        Route::middleware(['throttle:application'])->group(function() {
            /** begin::Application Pages ( DO NOT CHANGE OR REMOVE OR PAGES WILL NOT WORK */
            Route::resource('ordertypes', OrderTypesController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
            Route::resource('customers', CustomerController::class);
            Route::resource('commodities', CommoditiesController::class);
            Route::resource('tractors', TractorsController::class);
            Route::resource('products', ProductController::class);
            Route::resource('trailers', TrailersController::class);
            Route::resource('equipmenttypes', EquipmentTypeController::class);
            Route::resource('artisan', ArtisanController::class);
            /** end::Application Pages ( DO NOT CHANGE OR REMOVE OR PAGES WILL NOT WORK */
        });
        /* end::Middleware to throttle application **/
        Route::get('analytics/trailers', [TrailersController::class, 'forAnalytics'])->name('trailers.dashboard');
        /** begin::Ajax Calls */
        Route::get('equipmenttype/showEquipTypes', [EquipmentTypeController::class, 'showEquipTypes'])->name('equipmenttype.showEquipTypes');
        Route::post('tractor/showTractorList', [TractorsController::class, 'showTractorList'])->name('tractors.showTractors');
        Route::post('commodity/showCommoditiesList', [CommoditiesController::class, 'showCommoditiesList'])->name('commodity.showCommoditiesList');
        Route::post('ordertype/showOrderTypesList', [OrderTypesController::class, 'showOrderTypesList'])->name('ordertypes.showOrderTypesList');
        Route::post('trailer/showTrailerList', [TrailersController::class, 'showTrailerList'])->name('trailer.showTrailerList');
        /** end::Ajax Calls */

        /** begin::GET for DataTables to produce data */
        Route::get('equipmenttype/list', [EquipmentTypeController::class, 'getEquipTypes'])->name('equipmenttype.list');
        Route::get('commodity/list', [CommoditiesController::class, 'getCommodities'])->name('commodities.ajax.index');
        Route::get('ordertype/list', [OrderTypesController::class, 'getOrderTypes'])->name('ordertype.list');
        Route::get('user/list', [UserController::class, 'getUsers'])->name('users.list');
        /** end::GET for DataTables to produce data */

        /* begin::Middleware to throttle Exports **/
        Route::middleware(['throttle:exports'])->group(function() {
            /** begin::Export records to excel and pdf */
            Route::get('equipmenttype/file-export', [EquipmentTypeController::class, 'fileExport'])->name('equip-file-export');
            Route::get('tractor/file-import-export', [TractorsController::class, 'fileImportExport']);
            Route::post('tractor/file-import', [TractorsController::class, 'fileImport'])->name('file-import');
            Route::get('tractor/file-export', [TractorsController::class, 'fileExport'])->name('file-export');
            Route::get('tractor/pdf', [TractorsController::class, 'createPDF'])->name('tractor.pdf');
            /** end::Export records to excel and pdf */
        });
        /* end::Middleware to throttle Exports **/
    });
    /* end::Auth Middleware */

    Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

    /**
     * Fallback URL for non-existent paths.
     */
    Route::fallback(function() {
        return redirect('index');
    });

    require __DIR__ . '/auth.php';
