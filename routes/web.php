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

Route::get('/', function () {
    return redirect('index');
});

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    Route::resource('ordertypes', OrderTypesController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UsersController::class);
    Route::resource('commodities', CommoditiesController::class);
    Route::resource('tractors', TractorsController::class);
    Route::resource('equipmenttypes', EquipmentTypeController::class);
    Route::resource('artisan', ArtisanController::class);

    /** GET for DataTables to produce data */
    Route::get('equipmenttype/list', [EquipmentTypeController::class, 'getEquipTypes'])->name('equipmenttype.list');
    Route::get('tractor/list', [TractorsController::class, 'getTractors'])->name('tractors.list');
    /** Mail Functions */
    Route::get('sending-queue-emails', [TestQueueEmails::class,'sendTestEmails']);

    Route::get('equipmenttype/file-export', [EquipmentTypeController::class, 'fileExport'])->name('equip-file-export');
    /** Export records to excel and pdf */
    Route::get('tractor/file-import-export', [TractorsController::class, 'fileImportExport']);
    Route::post('tractor/file-import', [TractorsController::class, 'fileImport'])->name('file-import');
    Route::get('tractor/file-export', [TractorsController::class, 'fileExport'])->name('file-export');
    Route::get('tractor/pdf', [TractorsController::class, 'createPDF'])->name('tractor.pdf');

    /**     Artisan Control Center Command Paths      */
    Route::get('system-schedule', function () {
        Artisan::call('schedule:run');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Getting the user id of the user who ran the command
        $currentuser = auth()->user()->id;

        // Logging the Command & User ID
        Log::warning('System Scheduled Task Artisan Command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('system-schedule');

    Route::get('activity-log', function () {
        Artisan::call('activitylog:clean');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Storing the user id of the user who ran the command
        $currentuser = auth()->user()->id;

        // Logging the Command & User ID
        Log::warning('Activity Log artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('activity-log');

    Route::get('queue-restart', function () {
        Artisan::call('queue:restart');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Storing the user id of the user who ran the command
        $currentuser = auth()->user()->id;
        Log::warning('Queue Restart artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('queue-restart');

    Route::get('queue-flush', function () {
        Artisan::call('queue:flush');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Storing the user id of the user who ran the command
        $currentuser = auth()->user()->id;
        Log::warning('Queue Flush artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('queue-flush');

    Route::get('view-cache', function () {
        Artisan::call('view:cache');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Storing the user id of the user who ran the command
        $currentuser = auth()->user()->id;

        Log::warning('View Cache artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('view-cache');

    Route::get('view-clear', function () {
        Artisan::call('view:cache');

        // Notification varaiable
        $notification = array(
            'message' => 'Successfully ran command!',
            'alert-type' => 'success',
            'closeButton' => true,
        );

        // Storing the user id of the user who ran the command
        $currentuser = auth()->user()->id;

        Log::warning('Clear Cache View Files artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        return redirect()->back()->with($notification);
    })->name('view-clear');

});


// Order Type Route
/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

/**
 * Fallback URL for non-existent paths.
 */
Route::fallback(function () {
    return redirect('index');
});

require __DIR__.'/auth.php';
