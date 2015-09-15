<?php

Route::group(array('prefix'=>'admin'), function(){
    Route::resource('menus', 'Admin\menusController',array('except'=>array('show')));
    Route::resource('services', 'Admin\servicesController',array('except'=>array('show')));
    Route::resource('serviceCategories', 'Admin\serviceCategoriesController',array('except'=>array('show')));
    Route::resource('contentFiles', 'Admin\contentFilesController',array('except'=>array('show')));
    Route::get('services/attachments', ['as' => 'admin.services.attachments', 'uses'=>'Admin\servicesController@showcontents' ]);
    Route::get('services/{service}/contentFiles/{contentFile}', ['as' => 'admin.services.attachments.store', 'uses'=>'Admin\servicesController@storecontent' ]);
    Route::get('services/{service}/contentFiles/{contentFile}/remove', ['as' => 'admin.services.attachments.remove', 'uses'=>'Admin\servicesController@removecontent' ]);
});