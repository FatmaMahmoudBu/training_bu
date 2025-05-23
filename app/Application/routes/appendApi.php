<?php
/*
#user
Route::post('users/login', 'UserApi@login');
Route::get('users/getById/{id}', 'UserApi@getById');
Route::get('users/delete/{id}', 'UserApi@delete');
Route::post('users/add', 'UserApi@add');
Route::post('users/update', 'UserApi@update');
Route::get('users', 'UserApi@index');
Route::get('users/getUserByToken', 'UserApi@getUserByToken');

#page
Route::get('page/getById/{id}', 'PageApi@getById');
Route::get('page/delete/{id}', 'PageApi@delete');
Route::post('page/add', 'PageApi@add');
Route::post('page/update/{id}', 'PageApi@update');
Route::get('page', 'PageApi@index');

#categorie
Route::get('categorie/getById/{id}', 'CategorieApi@getById');
Route::get('categorie/delete/{id}', 'CategorieApi@delete');
Route::post('categorie/add', 'CategorieApi@add');
Route::post('categorie/update/{id}', 'CategorieApi@update');
Route::get('categorie', 'CategorieApi@index');










#faculty
Route::get('faculty/getById/{id}', 'FacultyApi@getById');
Route::get('faculty/delete/{id}', 'FacultyApi@delete');
Route::post('faculty/add', 'FacultyApi@add');
Route::post('faculty/update/{id}', 'FacultyApi@update');
Route::get('faculty', 'FacultyApi@index');

#department
Route::get('department/getById/{id}', 'DepartmentApi@getById');
Route::get('department/delete/{id}', 'DepartmentApi@delete');
Route::post('department/add', 'DepartmentApi@add');
Route::post('department/update/{id}', 'DepartmentApi@update');
Route::get('department', 'DepartmentApi@index');


*/


#image
Route::get('image/getById/{id}', 'ImageApi@getById');
Route::get('image/delete/{id}', 'ImageApi@delete');
Route::post('image/add', 'ImageApi@add');
Route::post('image/update/{id}', 'ImageApi@update');
Route::get('image', 'ImageApi@index');

#gallery
Route::get('gallery/getById/{id}', 'GalleryApi@getById');
Route::get('gallery/delete/{id}', 'GalleryApi@delete');
Route::post('gallery/add', 'GalleryApi@add');
Route::post('gallery/update/{id}', 'GalleryApi@update');
Route::get('gallery', 'GalleryApi@index');

#slider
Route::get('slider/getById/{id}', 'SliderApi@getById');
Route::get('slider/delete/{id}', 'SliderApi@delete');
Route::post('slider/add', 'SliderApi@add');
Route::post('slider/update/{id}', 'SliderApi@update');
Route::get('slider', 'SliderApi@index');

#team
Route::get('team/getById/{id}', 'TeamApi@getById');
Route::get('team/delete/{id}', 'TeamApi@delete');
Route::post('team/add', 'TeamApi@add');
Route::post('team/update/{id}', 'TeamApi@update');
Route::get('team', 'TeamApi@index');

#workshop
Route::get('workshop/getById/{id}', 'WorkshopApi@getById');
Route::get('workshop/delete/{id}', 'WorkshopApi@delete');
Route::post('workshop/add', 'WorkshopApi@add');
Route::post('workshop/update/{id}', 'WorkshopApi@update');
Route::get('workshop', 'WorkshopApi@index');

#administration
Route::get('administration/getById/{id}', 'AdministrationApi@getById');
Route::get('administration/delete/{id}', 'AdministrationApi@delete');
Route::post('administration/add', 'AdministrationApi@add');
Route::post('administration/update/{id}', 'AdministrationApi@update');
Route::get('administration', 'AdministrationApi@index');

#school
Route::get('school/getById/{id}', 'SchoolApi@getById');
Route::get('school/delete/{id}', 'SchoolApi@delete');
Route::post('school/add', 'SchoolApi@add');
Route::post('school/update/{id}', 'SchoolApi@update');
Route::get('school', 'SchoolApi@index');

#trainee
Route::get('trainee/getById/{id}', 'TraineeApi@getById');
Route::get('trainee/delete/{id}', 'TraineeApi@delete');
Route::post('trainee/add', 'TraineeApi@add');
Route::post('trainee/update/{id}', 'TraineeApi@update');
Route::get('trainee', 'TraineeApi@index');

#supervisor
Route::get('supervisor/getById/{id}', 'SupervisorApi@getById');
Route::get('supervisor/delete/{id}', 'SupervisorApi@delete');
Route::post('supervisor/add', 'SupervisorApi@add');
Route::post('supervisor/update/{id}', 'SupervisorApi@update');
Route::get('supervisor', 'SupervisorApi@index');

#supervisor_trainee
Route::get('supervisor_trainee/getById/{id}', 'Supervisor_traineeApi@getById');
Route::get('supervisor_trainee/delete/{id}', 'Supervisor_traineeApi@delete');
Route::post('supervisor_trainee/add', 'Supervisor_traineeApi@add');
Route::post('supervisor_trainee/update/{id}', 'Supervisor_traineeApi@update');
Route::get('supervisor_trainee', 'Supervisor_traineeApi@index');

#evaluation
Route::get('evaluation/getById/{id}', 'EvaluationApi@getById');
Route::get('evaluation/delete/{id}', 'EvaluationApi@delete');
Route::post('evaluation/add', 'EvaluationApi@add');
Route::post('evaluation/update/{id}', 'EvaluationApi@update');
Route::get('evaluation', 'EvaluationApi@index');

#attendance
Route::get('attendance/getById/{id}', 'AttendanceApi@getById');
Route::get('attendance/delete/{id}', 'AttendanceApi@delete');
Route::post('attendance/add', 'AttendanceApi@add');
Route::post('attendance/update/{id}', 'AttendanceApi@update');
Route::get('attendance', 'AttendanceApi@index');

#assignment
Route::get('assignment/getById/{id}', 'AssignmentApi@getById');
Route::get('assignment/delete/{id}', 'AssignmentApi@delete');
Route::post('assignment/add', 'AssignmentApi@add');
Route::post('assignment/update/{id}', 'AssignmentApi@update');
Route::get('assignment', 'AssignmentApi@index');