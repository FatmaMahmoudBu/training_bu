<?php
Route::get('/', 'HomeController@index');
Route::get('icons', 'HomeController@icons');
Route::get('docs', 'HomeController@apiDocs');
### commands
Route::get('commands', 'CommandsController@index');
Route::post('command/exe', 'CommandsController@exe');
Route::get('laravel/commands', 'CommandsController@command');
Route::post('command/otherExe', 'CommandsController@otherExe');
Route::post('laravel/haveCommand', 'CommandsController@haveCommand');
Route::get('exportImport', 'CommandsController@exportEmportModels');
Route::post('export', 'CommandsController@export');
Route::post('import', 'CommandsController@import');


### relations
Route::get('relation', 'RelationController@index');
Route::post('relation/exe', 'RelationController@exe');
Route::get('getCols/{model}', 'RelationController@getCols');
Route::post('relation/rollback', 'RelationController@rollback');

#### user control
Route::get('user', 'UserController@index');
Route::get('user/item/{id?}', 'UserController@show');
Route::post('user/item', 'UserController@store');
Route::post('user/item/{id}', 'UserController@update');
Route::get('user/{id}/delete', 'UserController@destroy');
Route::get('user/{id}/view', 'UserController@getById');
Route::get('user/pluck', 'UserController@pluck');


#### translation
Route::get('translation', 'TranslationController@index');
Route::get('translation/readFile/{file}', 'TranslationController@readFile');
Route::post('translation/save', 'TranslationController@save');
Route::get('translation/getAllContent/{file}', 'TranslationController@getAllContent');
Route::post('translation/both/save', 'TranslationController@bothSave');

#### permissions
Route::get('custom-permissions', 'Development\CustomPermissionsController@index');
Route::get('custom-permissions/readFile/{file}', 'Development\CustomPermissionsController@readFile');
Route::post('custom-permissions/save', 'Development\CustomPermissionsController@save');
Route::get('getControllerByType/{type}', 'Development\PermissionController@getControllerByType');
Route::get('getMethodByController/{controller}/{type}', 'Development\PermissionController@getMethodByController');


#### group control
Route::get('group', 'GroupController@index');
Route::get('group/item/{id?}', 'GroupController@show');
Route::post('group/item', 'GroupController@store');
Route::post('group/item/{id}', 'GroupController@update');
Route::get('group/{id}/delete', 'GroupController@destroy');
Route::get('group/{id}/view', 'GroupController@getById');
Route::get('group/pluck', 'GroupController@pluck');

#### role control
Route::get('role', 'RoleController@index');
Route::get('role/item/{id?}', 'RoleController@show');
Route::post('role/item', 'RoleController@store');
Route::post('role/item/{id}', 'RoleController@update');
Route::get('role/{id}/delete', 'RoleController@destroy');
Route::get('role/{id}/view', 'RoleController@getById');
Route::get('role/pluck', 'RoleController@pluck');
#### permission control
Route::get('permission', 'Development\PermissionController@index');
Route::get('permission/item/{id?}', 'Development\PermissionController@show');
Route::post('permission/item', 'Development\PermissionController@store');
Route::post('permission/item/{id}', 'Development\PermissionController@update');
Route::get('permission/{id}/delete', 'Development\PermissionController@destroy');
Route::get('permission/{id}/view', 'Development\PermissionController@getById');
Route::get('permission/pluck', 'PermissionController@pluck');
#### home control
Route::get('home/{pages?}/{limit?}', 'HomeController@index');
#### setting control
Route::get('setting', 'SettingController@index');
Route::get('setting/item/{id?}', 'SettingController@show');
Route::post('setting/item', 'SettingController@store');
Route::post('setting/item/{id}', 'SettingController@update');
Route::get('setting/{id}/delete', 'SettingController@destroy');
Route::get('setting/{id}/view', 'SettingController@getById');
Route::get('setting/pluck', 'SettingController@pluck');
#### menu control
Route::get('menu', 'MenuController@index');
Route::get('menu/item/{id?}', 'MenuController@show');
Route::post('menu/item', 'MenuController@store');
Route::post('menu/item/{id}', 'MenuController@update');
Route::get('menu/{id}/delete', 'MenuController@destroy');
Route::get('menu/{id}/view', 'MenuController@getById');
Route::post('update/menuItem', 'MenuController@menuItem');
Route::post('addNewItemToMenu', 'MenuController@addNewItemToMenu');
Route::get('deleteMenuItem/{id}', 'MenuController@deleteMenuItem');
Route::get('getItemInfo/{id}', 'MenuController@getItemInfo');
Route::post('updateOneMenuItem', 'MenuController@updateOneMenuItem');
Route::get('menu/pluck', 'MenuController@pluck');
#### log control
Route::get('log', 'LogController@index');
Route::get('log/item/{id?}', 'LogController@show');
Route::post('log/item', 'LogController@store');
Route::post('log/item/{id}', 'LogController@update');
Route::get('log/{id}/delete', 'LogController@destroy');
Route::get('log/{id}/view', 'LogController@getById');
Route::get('log/pluck', 'LogController@pluck');
#### contact control
Route::get('contact', 'ContactController@index');
Route::get('contact/item/{id?}', 'ContactController@show');
Route::post('contact/item', 'ContactController@store');
Route::post('contact/item/{id}', 'ContactController@update');
Route::get('contact/{id}/delete', 'ContactController@destroy');
Route::get('contact/{id}/view', 'ContactController@getById');
Route::post('contact/replay/{id}', 'ContactController@replayEmail');
Route::get('contact/pluck', 'ContactController@pluck');

#### page control
Route::get('page', 'PageController@index');
Route::get('page/item/{id?}', 'PageController@show');
Route::post('page/item', 'PageController@store');
Route::post('page/item/{id}', 'PageController@update');
Route::get('page/{id}/delete', 'PageController@destroy');
Route::get('page/{id}/view', 'PageController@getById');
Route::get('page/pluck', 'PageController@pluck');
#### page comment
Route::post('page/add/comment/{id}', 'PageCommentController@addComment');
Route::post('page/update/comment/{id}', 'PageCommentController@updateComment');
Route::get('page/delete/comment/{id}', 'PageCommentController@deleteComment');

#### categorie control
Route::get('categorie', 'CategorieController@index');
Route::get('categorie/item/{id?}', 'CategorieController@show');
Route::post('categorie/item', 'CategorieController@store');
Route::post('categorie/item/{id}', 'CategorieController@update');
Route::get('categorie/{id}/delete', 'CategorieController@destroy');
Route::get('categorie/{id}/view', 'CategorieController@getById');
Route::get('categorie/pluck', 'CategorieController@pluck');

#### faculty control
Route::get('faculty' , 'FacultyController@index');
Route::get('faculty/item/{id?}' , 'FacultyController@show');
Route::post('faculty/item' , 'FacultyController@store');
Route::post('faculty/item/{id}' , 'FacultyController@update');
Route::get('faculty/{id}/delete' , 'FacultyController@destroy');
Route::get('faculty/{id}/view' , 'FacultyController@getById');
Route::get('faculty/pluck', 'FacultyController@pluck');
#### department control
Route::get('department' , 'DepartmentController@index');
Route::get('department/item/{id?}' , 'DepartmentController@show');
Route::post('department/item' , 'DepartmentController@store');
Route::post('department/item/{id}' , 'DepartmentController@update');
Route::get('department/{id}/delete' , 'DepartmentController@destroy');
Route::get('department/{id}/view' , 'DepartmentController@getById');
Route::get('department/pluck', 'DepartmentController@pluck');

require_once __DIR__ . '/news.php';

#### image control
Route::get('image' , 'ImageController@index');
Route::get('image/item/{id?}' , 'ImageController@show');
Route::post('image/item' , 'ImageController@store');
Route::post('image/item/{id}' , 'ImageController@update');
Route::get('image/{id}/delete' , 'ImageController@destroy');
Route::get('image/{id}/view' , 'ImageController@getById');
Route::get('image/pluck', 'ImageController@pluck');
#### gallery control
Route::get('gallery' , 'GalleryController@index');
Route::get('gallery/item/{id?}' , 'GalleryController@show');
Route::post('gallery/item' , 'GalleryController@store');
Route::post('gallery/item/{id}' , 'GalleryController@update');
Route::get('gallery/{id}/delete' , 'GalleryController@destroy');
Route::get('gallery/{id}/view' , 'GalleryController@getById');
Route::get('gallery/pluck', 'GalleryController@pluck');
#### slider control
Route::get('slider' , 'SliderController@index');
Route::get('slider/item/{id?}' , 'SliderController@show');
Route::post('slider/item' , 'SliderController@store');
Route::post('slider/item/{id}' , 'SliderController@update');
Route::get('slider/{id}/delete' , 'SliderController@destroy');
Route::get('slider/{id}/view' , 'SliderController@getById');
Route::get('slider/pluck', 'SliderController@pluck');
#### team control
Route::get('team' , 'TeamController@index');
Route::get('team/item/{id?}' , 'TeamController@show');
Route::post('team/item' , 'TeamController@store');
Route::post('team/item/{id}' , 'TeamController@update');
Route::get('team/{id}/delete' , 'TeamController@destroy');
Route::get('team/{id}/view' , 'TeamController@getById');
Route::get('team/pluck', 'TeamController@pluck');
#### workshop control
Route::get('workshop' , 'WorkshopController@index');
Route::get('workshop/item/{id?}' , 'WorkshopController@show');
Route::post('workshop/item' , 'WorkshopController@store');
Route::post('workshop/item/{id}' , 'WorkshopController@update');
Route::get('workshop/{id}/delete' , 'WorkshopController@destroy');
Route::get('workshop/{id}/view' , 'WorkshopController@getById');
Route::get('workshop/pluck', 'WorkshopController@pluck');
#### administration control
Route::get('administration' , 'AdministrationController@index');
Route::get('administration/item/{id?}' , 'AdministrationController@show');
Route::post('administration/item' , 'AdministrationController@store');
Route::post('administration/item/{id}' , 'AdministrationController@update');
Route::get('administration/{id}/delete' , 'AdministrationController@destroy');
Route::get('administration/{id}/view' , 'AdministrationController@getById');
Route::get('administration/pluck', 'AdministrationController@pluck');
#### school control
Route::get('school' , 'SchoolController@index');
Route::get('school/item/{id?}' , 'SchoolController@show');
Route::post('school/item' , 'SchoolController@store');
Route::post('school/item/{id}' , 'SchoolController@update');
Route::get('school/{id}/delete' , 'SchoolController@destroy');
Route::get('school/{id}/view' , 'SchoolController@getById');
Route::get('school/pluck', 'SchoolController@pluck');
#### trainee control
Route::get('trainee' , 'TraineeController@index');
Route::get('trainee/item/{id?}' , 'TraineeController@show');
Route::post('trainee/item' , 'TraineeController@store');
Route::post('trainee/item/{id}' , 'TraineeController@update');
Route::get('trainee/{id}/delete' , 'TraineeController@destroy');
Route::get('trainee/{id}/view' , 'TraineeController@getById');
Route::get('trainee/pluck', 'TraineeController@pluck');
#### supervisor control
Route::get('supervisor' , 'SupervisorController@index');
Route::get('supervisor/item/{id?}' , 'SupervisorController@show');
Route::post('supervisor/item' , 'SupervisorController@store');
Route::post('supervisor/item/{id}' , 'SupervisorController@update');
Route::get('supervisor/{id}/delete' , 'SupervisorController@destroy');
Route::get('supervisor/{id}/view' , 'SupervisorController@getById');
Route::get('supervisor/pluck', 'SupervisorController@pluck');
#### supervisor_trainee control
Route::get('supervisor_trainee' , 'Supervisor_traineeController@index');
Route::get('supervisor_trainee/item/{id?}' , 'Supervisor_traineeController@show');
Route::post('supervisor_trainee/item' , 'Supervisor_traineeController@store');
Route::post('supervisor_trainee/item/{id}' , 'Supervisor_traineeController@update');
Route::get('supervisor_trainee/{id}/delete' , 'Supervisor_traineeController@destroy');
Route::get('supervisor_trainee/{id}/view' , 'Supervisor_traineeController@getById');
Route::get('supervisor_trainee/pluck', 'Supervisor_traineeController@pluck');
#### evaluation control
Route::get('evaluation' , 'EvaluationController@index');
Route::get('evaluation/item/{id?}' , 'EvaluationController@show');
Route::post('evaluation/item' , 'EvaluationController@store');
Route::post('evaluation/item/{id}' , 'EvaluationController@update');
Route::get('evaluation/{id}/delete' , 'EvaluationController@destroy');
Route::get('evaluation/{id}/view' , 'EvaluationController@getById');
Route::get('evaluation/pluck', 'EvaluationController@pluck');
#### attendance control
Route::get('attendance' , 'AttendanceController@index');
Route::get('attendance/item/{id?}' , 'AttendanceController@show');
Route::post('attendance/item' , 'AttendanceController@store');
Route::post('attendance/item/{id}' , 'AttendanceController@update');
Route::get('attendance/{id}/delete' , 'AttendanceController@destroy');
Route::get('attendance/{id}/view' , 'AttendanceController@getById');
Route::get('attendance/pluck', 'AttendanceController@pluck');
#### assignment control
Route::get('assignment' , 'AssignmentController@index');
Route::get('assignment/item/{id?}' , 'AssignmentController@show');
Route::post('assignment/item' , 'AssignmentController@store');
Route::post('assignment/item/{id}' , 'AssignmentController@update');
Route::get('assignment/{id}/delete' , 'AssignmentController@destroy');
Route::get('assignment/{id}/view' , 'AssignmentController@getById');
Route::get('assignment/pluck', 'AssignmentController@pluck');