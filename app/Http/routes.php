<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix'=>'admin'), function(){
Route::resource('tenders','Admin\TendersController', array('except'=>array('show')));
Route::resource('careers','Admin\CareersController', array('except'=>array('show')));
Route::resource('contentFiles', 'Admin\contentFilesController',array('except'=>array('show')));

Route::get('careers/attachments', ['as' => 'admin.careers.attachments', 'uses'=>'Admin\CareersController@showcontents' ]);
Route::get('careers/{career}/contentFiles/{contentFile}', ['as' => 'admin.careers.attachments.store', 'uses'=>'Admin\CareersController@storecontent' ]);
Route::get('careers/{career}/contentFiles/{contentFile}/remove', ['as' => 'admin.careers.attachments.remove', 'uses'=>'Admin\CareersController@removecontent' ]);

Route::get('contentFiles/contentsDash', ['as' => 'admin.contentFiles.dash', 'uses'=>'Admin\contentFilesController@showallcontents' ]);

Route::get('tenders/attachments', ['as' => 'admin.tenders.attachments', 'uses'=>'Admin\TendersController@showcontents' ]);
Route::get('tenders/{tender}/contentFiles/{contentFile}', ['as' => 'admin.tenders.attachments.store', 'uses'=>'Admin\TendersController@storecontent' ]);
Route::get('tenders/{tender}/contentFiles/{contentFile}/remove', ['as' => 'admin.tenders.attachments.remove', 'uses'=>'Admin\TendersController@removecontent' ]);
});
