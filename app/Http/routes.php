<?php

Route::group(array('prefix'=>'admin'), function(){
    Route::resource('menus', 'Admin\menusController',array('except'=>array('show')));
    Route::resource('services', 'Admin\servicesController',array('except'=>array('show')));
    Route::resource('serviceCategories', 'Admin\serviceCategoriesController',array('except'=>array('show')));
    Route::resource('contentFiles', 'Admin\contentFilesController',array('except'=>array('show')));
});