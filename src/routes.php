<?php

Route::group(['namespace'=>'Dl\Panel\Controllers', 'middleware' => ['web']], function () {
    Route::get('login','AuthController@showLoginForm')->name('login');
    Route::post('login','AuthController@login');

    Route::post('logout','AuthController@logout')->name('logout');

    Route::get('register','AuthController@showRegistrationForm')->name('register');
    Route::post('register','AuthController@register');
});

Route::group(['namespace'=>'Dl\Panel\Controllers','prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['web','auth']], function () {

    Route::get('/', function () {
        return view('Panel::dashboard.pages.index');
    })->name('home');

    # USERS
    Route::get('/users/table', 'UserController@datatable')->name('users.table');
    Route::resource('/users', 'UserController');

    # TASKS
    Route::get('/todo/status/{id}', 'TodoController@toggleState')->name('todo.status');
    Route::resource('/todo', 'TodoController');

    # Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('edit', 'ProfileController@edit')->name('edit');
        Route::post('edit', 'ProfileController@AvatarUpdate')->name('updateAvatar');
        Route::post('update', 'ProfileController@update')->name('update');
    });

    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');

    # Roles
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', 'RoleController@index')->name('index');
        Route::get('create', 'RoleController@create')->name('create');
        Route::get('{id}/edit', 'RoleController@edit')->name('edit');
        Route::post('store', 'RoleController@store')->name('store');
        Route::put('{id}', 'RoleController@update')->name('update');
        Route::delete('delete/{id}', 'RoleController@destroy')->name('destroy');
    });



    # Specialties
    Route::resource('specialties','SpecialtyController');

    # Projects
    Route::resource('projects','ProjectController');

    # Settings
    Route::resource('settings','SettingController');


});
