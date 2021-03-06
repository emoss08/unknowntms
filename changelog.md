
#### Setup Instructions
1. Migrate Database and run seeders.
```php
php artisan migrate:fresh --seed
```
2. Run seeder for permissions table (Has to be run on it's own.).
```php
php artisan db:seed --class=PermissionTableSeeder
```
3. Start local webserver.
```php
php artisan serve
```

## Changelog 10/22/2021

1. Inital commit (Project setup with Metronic Integration).
2. Created index.blade.php for OrderTypes
3. Setup migration file for OrderTypes
4. Added Customer Service to aside menu
5. Added OrderTypes Submit form with sweetalert integration.
6. Added support for Spanish language.

## Changelog 10/23/2021

1. Added profanity filter.
2. Updated MVC (Model, View, Controler) for Order Types.
3. Fixed "Update" order type modal issue.
4. Updated sweetalert 2 to show "Record Updated Successfully!" instead of "New Record Processed Successfully!".
5. Added belongsto function into OrderTypes model, to show order types relationship to user modal.

   5.1. Code Example -
```php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
```
6. Started on MVC for commodity codes.
7. Finished MVC for commodities.
8. Database migration for commodities completed.

   8.1. Code Example -
```php
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->id();
            $table->string('is_active');
            $table->string('commodity_id');
            $table->string('description');
            $table->string('entered_by');
            $table->timestamps();
        });
    }
```

## Changelog 10/24/2021

1. Added migrations for Tractors module.
2. Re-organized the Master Files widget within the Aside Menu.
3. Added Model for Tractors module.
4. Added auditble tracking for tractors.

## Changelog 10/25/2021

1. Finished Controller for Tractors.
2. Started work on View file for Tractors
3. Worked on View File for Tractors Master File

## Changelog 10/28/2021
1. Created MVC for Equipment Types
2. Finished "Add Tractor" functionality
   2.1 - Form Completed
   2.2 - Jquery for SweetAlert2 Complete

## Changelog 10/31/2021
1. Fixed issue with Select2 dropdown not being able to search in modal.


##### Snippet:
![alt text](https://werewlf.com/select2.PNG "Select2 Fix")

2. Added Export to Excel to Tractors Master File
3. Changed card header design

![alt text](https://werewlf.com/newcard.PNG "Select2 Fix")
## Changelog 10/31/2021

1. Finished export to PDF functionality
2. Changed card header design (Made Actions from yesterday into single icon button)
3. Started on MVC for locations

## Changelog 11/2/2021

1. Finished MVC for equipment types.
2. Re-configured form validation for equipment types on specific fields.
3. Created database seeder with pre-filled equipment types

   3.1. Code -

```php
class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipment_types =
            [
                [
                    'status' => 'Active',
                    'equip_type_id' => 'DV',
                    'description' => 'Dry Van Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'FB',
                    'description' => 'Flat Bed Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'CT',
                    'description' => 'Conestoga Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'RGN',
                    'description' => 'RGN (Removable Gooseneck) Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'SRGN',
                    'description' => 'Stretch RGN Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'LT',
                    'description' => 'Lowboy Trailer',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'RF',
                    'description' => 'Refrigerated (Reefer) Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'ST',
                    'description' => 'Specialized Trailers',
                    'entered_by' => 'sysadmin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];

        DB::table('equipment_type')->insert($equipment_types);
    }
}
```


## Changelog 11/8/2021

1. Added Tractors Seeder & Commodities Seeder to Database Seeders.
2. Fixed Commodities update issue (is_active call was still being made, needed to change to status.)
3. Error & Success message alert added to Equipment Type on update.
4. Change post requests for Equipment Type to EquipTypeRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentTypeRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required',
            'description' => 'required|max:255',
        ];
    }

public function messages()
    {
        return [
            'status.required' => 'Status is required',
            'equip_type_id.required' => 'Equipment Type ID is required',
            'equip_type_id.unique' => 'Equipment Type ID is already taken',
            'description.required' => 'Description is required',
            'description.max' => 'Description must be less than 255 characters',
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'equip_type_id' => 'Equipment Type ID',
            'description' => 'Description',
        ];
    }
}


```


## Changelog 11/9/2021
1. Changed Datatable for Equipments to render from erver side processing using Ajax.
2. Changed Database query for Equipment Types. Instead of running a query for all records it runs for the records being shown and/or processed.

```sql

-- Page 1 query
  
select count(*) as aggregate from [equipment_type]

-- Page 2 query

select * from (select *, row_number() over (order by [status] asc) as row_num from [equipment_type]) as temp_table where row_num between 8 and 14 order by row_num

```

3. Removed equiptype_table.js and edit-submit.js from Equipment Types.
4. Export to Excel for Equipment Types completed.
5. Built job that purges old data from the system in specific modules.
6. Purge data set to purge Equipment Types with Equipment Type ID set to In-Active. (Tested & Confirmed Functioning as expected).

##### Cron Job will need to be made on the server itself with the following command to run all scheduled system tasks or windows scheduled task for local web servers

```php

Local web server:

Program\Script - PHP

Argument - /path/to/artisan schedule:run
  
Cron Job command -
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
  
Note - Artisan is usually inside of the application file.

```

7. Added Laravel Telescope for monitoring system functions.
8. Began work on equipment maintenance planning dashboard.
9. Changed path for Equipment Types to equipmenttypes from equipmenttype
10. Fixed minor performance bugs.

## Changelog 11/10/2021

1. Created functionality that will run php artisan schedule:run in windows task scheduler - Reference: https://stillat.com/blog/2016/12/07/laravel-task-scheduling-running-the-task-scheduler
2. Split all Equipment Type content into individual blade files. ( Path - ***equipmenttype\partials***. ) - Partials will contain tables, modals, and other content used in Equipment Type. Reasoning is each component will be rendered differently if there is an error it will not break the entire page ,but if a component does not show that is the component with the problem.


## Changelog 11/11/2021

1. Fixed Form Validation to show on edit for each Equipment Type.
2. Started on Artisan Control Center - Artisan Control Center will house shortcuts for system administrators to run Artisan commands inside of the system.
3. Finished Artisan Control Center.
4. Added Search widget to Equipment Type view.

## Changelog 11/13/2021

1. Added each individual equipment type in dropdown for searching.
2. Changed Artisan command routes to provide more information, and provide user with better experience.

```php
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
```

3. Added Laravel Telescope to system menu.
4. Improved form validation for Tractors Master file.
5. Modified daterangepicker for Tractors Master files to be more user friendly.
6. Added scheduled job to delete In-Active Tractors.

## Changelog 11/14/2021

1. Changed tractors master file to use ajax to render data.
2. Added search functionality to tractors master file.
3. Fixed form validation for each tractor in tractors master file.
4. Changed routes for export to PDF and export to Excel for Tractors Master file.
5. Fixed minor bugs. (Tag Expiration Date, and Tag Expiration Date was not showing on edit modal for each tractor)
6. Fixed select2 issue for Tag State & Driver dropdown in Tractors Master file.

## Changelog 11/15/2021
1. Added request policy for Tractors Master file.
2. Changed Gate on Tractors and Equipment Type Controllers.
```php
        if (! Gate::allows('tractor-create', $input)) {
            return abort(401);
        }
        Tractors::create($input);
```
3. Added Middleware to prevent throttling for Artisan Commands (Artisan Control Center Commands can only be run once every minute).
4. Added Middleware to prevent throttling for Export files.
5. Added Middleware to prevent throttling for Application Pages. (10000 request can be made per minute before user is kicked out of system)

## Changelog 11/17/2021
1. AJAX call added to Select2 element for Tractors master file search functionality.
2. AJAX call added to Select2 element for Commodities master file search functionality.
3. Updated database seeders to inject more base information.
4. Completed Commodities MVC.

## Changelog 11/20/2021
1. Implementation of SweetAlert2 globally.

## Changelog 11/21/2021
1. New Design for Artisan Control Center.

#### Snippet - Artisan Control Center
![alt text](https://werewlf.com/artisan.png "Artisan Control Center")

## Changelog 11/22/2021
1. Removal of old Artisan Command routes.
2. Fix Artisan Commands not firing from Artisan Control Center.
3. LiveWire Components added to Artisan Control Center.
4. Middleware for Artisan Control Center.
5. Trailer Master file added.

## Changelog 11/23/2021
- No Changes

## Changelog 11/24/2021
1. Added notification to email when a new tractor is created.

## Changelog 11/25/2021
- No Changes

## Changelog 11/26/2021
- No Changes

## Changelog 11/27/2021
1. Added mutators to Tractors Master file.
2. Added mutators to Commodities Master file.
3. Added mutators to Equipment Type Master file.
4. Added mutators to Trailers Master file.
5. Added mutators to Order Type Master file.
6. Added REDIS for caching data.

## Changelog 11/28/2021
1. Added REDIS caching globally.
   - Note: Before running Artisan Command (Run System Scheduler), you must run Artisan Cache:Clear & Artisan modelCache:clear to clear cache.

## Changelog 12/5/2021
1. New theme implementation.
2. Removed REDIS caching on Tractors Master file & Trailers Master File.
