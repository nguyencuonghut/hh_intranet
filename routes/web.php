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

Route::group(['middleware' => ['web']], function() {
    Route::get('/', 'PageController@getHome');
    // News
    Route::get('news', ['uses' => 'PageController@getNewsIndex', 'as' => 'news.index']);
    Route::get('news/{id}', ['uses' => 'PageController@getNewsSingle', 'as' => 'news.single']);
    // Event
    Route::get('events', ['uses' => 'PageController@getEventIndex', 'as' => 'events.index']);
    Route::get('events/{id}', ['uses' => 'PageController@getEventSingle', 'as' => 'events.single']);
    // Announcement
    Route::get('announcements', ['uses' => 'PageController@getAnnouncementIndex', 'as' => 'announcements.index']);
    Route::get('announcements/{id}', ['uses' => 'PageController@getAnnouncementSingle', 'as' => 'announcements.single']);
    // Employee
    Route::get('staffs', ['uses' => 'PageController@getEmployeeIndex', 'as' => 'staffs.index']);
    Route::get('staffs/{id}', ['uses' => 'PageController@getEmployeeSingle', 'as' => 'staffs.single']);
    // Form
    Route::get('forms', ['uses' => 'PageController@getFormIndex', 'as' => 'forms.index']);
    Route::get('forms/{id}', ['uses' => 'PageController@getFormSingle', 'as' => 'forms.single']);
    // Relax
    Route::get('relaxs', ['uses' => 'PageController@getRelaxIndex', 'as' => 'relaxs.index']);
    Route::get('relaxs/{id}', ['uses' => 'PageController@getRelaxSingle', 'as' => 'relaxs.single']);


    Route::get('organization', ['uses' => 'PageController@getOrganization', 'as' => 'organization.company']);
    Route::get('organization/hcns', ['uses' => 'PageController@getOrganizationHCNS', 'as' => 'organization.hcns']);
    Route::get('organization/ketoan', ['uses' => 'PageController@getOrganizationKetoan', 'as' => 'organization.ketoan']);
    Route::get('organization/ksnb', ['uses' => 'PageController@getOrganizationKSNB', 'as' => 'organization.ksnb']);
    Route::get('organization/kinhdoanh', ['uses' => 'PageController@getOrganizationKinhdoanh', 'as' => 'organization.kinhdoanh']);
    Route::get('organization/sanxuat', ['uses' => 'PageController@getOrganizationSanxuat', 'as' => 'organization.sanxuat']);
    Route::get('organization/baotri', ['uses' => 'PageController@getOrganizationBaotri', 'as' => 'organization.baotri']);
    Route::get('organization/thumua', ['uses' => 'PageController@getOrganizationThumua', 'as' => 'organization.thumua']);
    Route::get('organization/qlcl', ['uses' => 'PageController@getOrganizationQLCL', 'as' => 'organization.qlcl']);
    Route::get('organization/kythuat', ['uses' => 'PageController@getOrganizationKythuat', 'as' => 'organization.kythuat']);

    // Contact
    Route::get('contact', ['uses' => 'PageController@getContact', 'as' => 'contact.hcns']);
    Route::get('contact/ketoan', ['uses' => 'PageController@getContactKetoan', 'as' => 'contact.ketoan']);
    Route::get('contact/ksnb', ['uses' => 'PageController@getContactKSNB', 'as' => 'contact.ksnb']);
    Route::get('contact/kinhdoanh', ['uses' => 'PageController@getContactKinhdoanh', 'as' => 'contact.kinhdoanh']);
    Route::get('contact/sanxuat', ['uses' => 'PageController@getContactSanxuat', 'as' => 'contact.sanxuat']);
    Route::get('contact/baotri', ['uses' => 'PageController@getContactBaotri', 'as' => 'contact.baotri']);
    Route::get('contact/thumua', ['uses' => 'PageController@getContactThumua', 'as' => 'contact.thumua']);
    Route::get('contact/qlcl', ['uses' => 'PageController@getContactQLCL', 'as' => 'contact.qlcl']);
    Route::get('contact/kythuat', ['uses' => 'PageController@getContactKythuat', 'as' => 'contact.kythuat']);


    Route::get('tool', 'PageController@getTool');

    // Upload file to post
    Route::get('upload/files/{filename}', ['uses' => 'PageController@getFile', 'as' => 'file.single']);

    // CRUD post
    Route::resource('/admin/posts', 'PostController');

    // CRUD category of post
    Route::resource('/admin/categories', 'CategoryController', ['except' => ['create']]);

    // CRUD picture for gallery and banner
    Route::resource('/admin/pics', 'PictureController');

    // CRUD type [gallery/banner] of picture
    Route::resource('/admin/types', 'TypeController', ['except' => ['create']]);

    // CRUD video
    Route::resource('/admin/videos', 'VideoController');

    //CRUD departments
    Route::resource('/admin/departments', 'DepartmentController');

    //CRUD staffs
    Route::resource('/admin/employees', 'EmployeeController');
});
