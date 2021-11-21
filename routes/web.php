<?php

    use App\Http\Controllers\Account\SettingsController;
    use App\Http\Controllers\ArtisanController;
    use App\Http\Controllers\AuditController;
    use App\Http\Controllers\Auth\SocialiteLoginController;
    use App\Http\Controllers\CommoditiesController;
    use App\Http\Controllers\Documentation\ReferencesController;
    use App\Http\Controllers\EquipmentTypeController;
    use App\Http\Controllers\LangController;
    use App\Http\Controllers\Logs\AuditLogsController;
    use App\Http\Controllers\Logs\SystemLogsController;
    use App\Http\Controllers\OrderTypesController;
    use App\Http\Controllers\PagesController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\TestQueueEmails;
    use App\Http\Controllers\TractorsController;
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

    Route::get ('/', function () {
        return redirect ('index');
    });

    $menu = theme ()->getMenu ();
    array_walk ($menu, function ($val) {
        if (isset($val['path'])) {
            $route = Route::get ($val['path'], [PagesController::class, 'index']);

            // Exclude documentation from auth middleware
            if (!Str::contains ($val['path'], 'documentation')) {
                $route->middleware ('auth');
            }
        }
    });

// Documentations pages
    Route::prefix ('documentation')->group (function () {
        Route::get ('getting-started/references', [ReferencesController::class, 'index']);
        Route::get ('getting-started/changelog', [PagesController::class, 'index']);
    });

    /* begin::Auth Middleware */
    Route::middleware ('auth')->group (function () {
        // Account pages
        Route::prefix ('account')->group (function () {
            Route::get ('settings', [SettingsController::class, 'index'])->name ('settings.index');
            Route::put ('settings', [SettingsController::class, 'update'])->name ('settings.update');
            Route::put ('settings/email', [SettingsController::class, 'changeEmail'])->name ('settings.changeEmail');
            Route::put ('settings/password', [SettingsController::class, 'changePassword'])->name ('settings.changePassword');
        });

        // Logs pages
        Route::prefix ('log')->name ('log.')->group (function () {
            Route::resource ('system', SystemLogsController::class)->only (['index', 'destroy']);
            Route::resource ('audit', AuditLogsController::class)->only (['index', 'destroy']);
        });
        /* begin::Middleware to throttle application **/
        Route::middleware (['throttle:application'])->group (function () {
            /** begin::Application Pages ( DO NOT CHANGE OR REMOVE OR PAGES WILL NOT WORK */
            Route::resource ('ordertypes', OrderTypesController::class);
            Route::resource ('roles', RoleController::class);
            Route::resource ('users', UsersController::class);
            Route::resource ('commodities', CommoditiesController::class);
            Route::resource ('tractors', TractorsController::class);
            Route::resource ('equipmenttypes', EquipmentTypeController::class);
            Route::resource ('artisan', ArtisanController::class);
            /** end::Application Pages ( DO NOT CHANGE OR REMOVE OR PAGES WILL NOT WORK */
        });
        /* end::Middleware to throttle application **/

        /** begin::Ajax Calls */
        Route::post ('equipmenttype/showEquipTypes', [EquipmentTypeController::class, 'showEquipTypes'])->name ('equipmenttype.showEquipTypes');
        Route::post ('tractor/showTractorList', [TractorsController::class, 'showTractorList'])->name ('tractors.showTractors');
        Route::post ('commodity/showCommoditiesList', [CommoditiesController::class, 'showCommoditiesList'])->name ('commodity.showCommoditiesList');
        Route::post ('ordertype/showOrderTypesList', [OrderTypesController::class, 'showOrderTypesList'])->name ('ordertypes.showOrderTypesList');
        /** end::Ajax Calls */

        /** begin::GET for DataTables to produce data */
        Route::get ('equipmenttype/list', [EquipmentTypeController::class, 'getEquipTypes'])->name ('equipmenttype.list');
        Route::get ('tractor/list', [TractorsController::class, 'getTractors'])->name ('tractors.list');
        Route::get ('commodity/list', [CommoditiesController::class, 'getCommodities'])->name ('commodity.list');
        Route::get ('ordertype/list', [OrderTypesController::class, 'getOrderTypes'])->name ('ordertype.list');
        /** end::GET for DataTables to produce data */

        /* begin::Middleware to throttle Exports **/
        Route::middleware (['throttle:exports'])->group(function () {
            /** begin::Export records to excel and pdf */
            Route::get('equipmenttype/file-export', [EquipmentTypeController::class, 'fileExport'])->name('equip-file-export');
            Route::get ('tractor/file-import-export', [TractorsController::class, 'fileImportExport']);
            Route::post ('tractor/file-import', [TractorsController::class, 'fileImport'])->name ('file-import');
            Route::get ('tractor/file-export', [TractorsController::class, 'fileExport'])->name ('file-export');
            Route::get ('tractor/pdf', [TractorsController::class, 'createPDF'])->name ('tractor.pdf');
            /** end::Export records to excel and pdf */
        });
        /* end::Middleware to throttle Exports **/

        /**     begin::Artisan Control Center Command Paths      */
        /**     begin::Throttling Middleware for Artisan commands  - Reference RouteServiceProvider.php for Policy    */
        // begin::Run System Scheduler
        Route::middleware (['throttle:artisan'])->group (function () {
            Route::get ('system-schedule', function () {
                Artisan::call ('schedule:run');

                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Getting the user id of the user who ran the command
                $currentuser = auth()->user()->id;

                // Logging the Command & User ID
                Log::warning ('System Scheduled Task Artisan Command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('system-schedule');
            // end::Run System Scheduler

            // begin::Clean Activity Log
            Route::get ('activity-log', function () {
                Artisan::call ('activitylog:clean');
                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Storing the user id of the user who ran the command
                $currentuser = auth ()->user()->id;

                // Logging the Command & User ID
                Log::warning ('Activity Log artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('activity-log');
            // end::Clean Activity Log

            // begin::Restart Queued Jobs
            Route::get ('queue-restart', function () {
                Artisan::call ('queue:restart');
                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Storing the user id of the user who ran the command
                $currentuser = auth ()->user ()->id;
                Log::warning ('Queue Restart artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('queue-restart');
            // end::Restart Queued Jobs
            // begin::Flush Failed Jobs
            Route::get ('queue-flush', function () {
                Artisan::call ('queue:flush');
                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Storing the user id of the user who ran the command
                $currentuser = auth ()->user ()->id;
                Log::warning ('Queue Flush artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('queue-flush');
            // end::Flush Failed Jobs
            // begin::Cache View Files
            Route::get ('view-cache', function () {
                Artisan::call ('view:cache');
                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Storing the user id of the user who ran the command
                $currentuser = auth()->user()->id;

                Log::warning ('View Cache artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('view-cache');
            // end::Cache View Files
            // begin::Clear Cached View Files
            Route::get ('view-clear', function () {
                Artisan::call ('view:cache');
                // Notification varaiable
                $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
                // Storing the user id of the user who ran the command
                $currentuser = auth()->user ()->id;

                Log::warning ('Clear Cache View Files artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
                return redirect()->back()->with('notification', $notification);
            })->name ('view-clear');
            // end::Clear Cached View Files
        });
        /**     end::Artisan Control Center Command Paths      */
        /**     end::Throttling Middleware for Artisan commands  - Reference RouteServiceProvider.php for Policy    */
    });
    /* end::Auth Middleware */

    Route::get ('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

    /**
     * Fallback URL for non-existent paths.
     */
    Route::fallback (function () {
        return redirect ('index');
    });

    require __DIR__ . '/auth.php';
