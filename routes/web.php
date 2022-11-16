<?php

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
Route::group(['middleware'=>['admin']],function(){
    Route::get('/', function () {
        $total_tasks=App\Tasks::count();
        $pending_tasks=App\Tasks::where('status','pending')->count();
        $completed_tasks=App\Tasks::where('status','completed')->count();
        $total_projects=App\Projects::count();
        $pending_projects=App\Projects::where('status','pending')->count();
        $completed_projects=App\Projects::where('status','completed')->count();
        $all_tasks=App\Tasks::limit(5)->get();
        return view('dashboard',['all_tasks'=>$all_tasks,'tasks'=>$total_tasks,'pending_tasks'=>$pending_tasks,
            'completed_tasks'=>$completed_tasks,'projects'=>$total_projects,'pending_projects'=>$pending_projects,
            'completed_projects'=>$completed_projects]);
    })->name('dashboard');
});

/** Category routes start */

Route::group(['middleware'=>['admin']],function(){
    Route::get('/categories','CategoryController@index')->name('category.index');
    Route::get('/categories/create','CategoryController@create')->name('category.create');
    Route::post('/categories/store','CategoryController@store')->name('category.store');
    Route::get('/categories/{id}/edit','CategoryController@edit')->name('category.edit');
    Route::post('/categories/{id}/update','CategoryController@update')->name('category.update');
    Route::delete('/categories/{id}/delete','CategoryController@destroy')->name('category.delete');
});

/** Category routes end */


/** Company routes start */
Route::group(['middleware'=>['admin']],function(){
    Route::get('/companies','CompanyController@index')->name('company.index');
    Route::get('/companies/create','CompanyController@create')->name('company.create');
    Route::post('/companies/store','CompanyController@store')->name('company.store');
    Route::get('/companies/{id}/edit','CompanyController@edit')->name('company.edit');
    Route::post('/companies/{id}/update','CompanyController@update')->name('company.update');
    Route::delete('/companies/{id}/delete','CompanyController@destroy')->name('company.destroy');
});
/** employee routes start */
Route::group(['middleware'=>['admin']],function(){
    Route::get('/employees','EmployeeController@index')->name('employee.index');
    Route::get('/employees/create','EmployeeController@create')->name('employee.create');
    Route::post('/employees/store','EmployeeController@store')->name('employee.store');
    Route::get('/employees/{id}/edit','EmployeeController@edit')->name('employee.edit');
    Route::post('/employees/{id}/update','EmployeeController@update')->name('employee.update');
    Route::delete('/employees/{id}/delete','EmployeeController@destroy')->name('employee.destroy');
});


/** Task routes start */

Route::group(['middleware'=>['admin']],function(){
    Route::get('/tasks/ongoing','TaskController@index')->name('task.ongoing');
    Route::get('/tasks/pending','TaskController@pending')->name('task.pending');
    Route::get('/tasks/completed','TaskController@completed')->name('task.completed');
    Route::get('/tasks/create','TaskController@create')->name('task.create');
    Route::post('/tasks/store','TaskController@store')->name('task.store');
    Route::get('/tasks/{id}/edit','TaskController@edit')->name('task.edit');
    Route::post('/tasks/{id}/update','TaskController@update')->name('task.update');
    Route::delete('/tasks/{id}/delete','TaskController@destroy')->name('task.delete');
    Route::post('/tasks/{id}/completed','TaskController@makeCompleted')->name('task.make_completed');
    Route::post('/tasks/{id}/pending','TaskController@makePending')->name('task.make_pending');
});

/** Task routes end */

/** Project routes start */

Route::group(['middleware'=>['admin']],function(){
    Route::get('/projects/all','ProjectController@index')->name('project.all');
    Route::get('/projects/ongoing','ProjectController@ongoing')->name('project.ongoing');
    Route::get('/projects/finished','ProjectController@completed')->name('project.finished');
    Route::get('/projects/create','ProjectController@create')->name('project.create');
    Route::post('/projects/store','ProjectController@store')->name('project.store');
    Route::get('/projects/{id}/edit','ProjectController@edit')->name('project.edit');
    Route::post('/projects/{id}/update','ProjectController@update')->name('project.update');
    Route::delete('/projects/{id}/delete','ProjectController@destroy')->name('project.delete');
    Route::post('/projects/{id}/make_completed','ProjectController@makeCompleted')->name('project.make_completed');
    Route::post('/projects/{id}/make_pending','ProjectController@makePending')->name('project.make_pending');    
});

/** Project routes end */

/** Project Tasks routes start */

Route::group(['middleware'=>['admin']],function(){
    Route::get('/project_tasks/all','ProjectTaskController@index')->name('project_task.all');   
    Route::get('/project_tasks/create','ProjectTaskController@create')->name('project_task.create'); 
    Route::post('/project_tasks/store','ProjectTaskController@store')->name('project_task.store');
    Route::get('/project_tasks/{id}/edit','ProjectTaskController@edit')->name('project_task.edit');
    Route::post('/project_tasks/{id}/update','ProjectTaskController@update')->name('project_task.update');
    Route::delete('/project_tasks/{id}/delete','ProjectTaskController@destroy')->name('project_task.delete');
    Route::post('/project_tasks/{id}/make_completed','ProjectTaskController@makeCompleted')->name('project_task.make_completed');
    Route::post('/project_tasks/{id}/make_pending','ProjectTaskController@makePending')->name('project_task.make_pending');
    Route::get('/project_tasks/pending','ProjectTaskController@pendingProjectTasks')->name('project_task.pending');
    Route::get('/project_tasks/finished','ProjectTaskController@finishedProjectTasks')->name('project_task.finished');
});

/** Project Tasks routes end */

/** Authentication routes start */

Route::group(['middleware' => 'guest'], function() {

    Route::get('/register','AuthController@register')->name('auth.register');
    Route::get('/login','AuthController@login')->name('auth.login');
    Route::post('/login','AuthController@authenticate')->name('auth.authenticate');

    Route::post('/register','AuthController@registration')->name('auth.registration');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/logout','AuthController@logout')->name('auth.logout');
});

/** Authentication routes end */