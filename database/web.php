<?php


/*Route::get('/test',function(){
	return App\User::find(1)->profile;   //categore is the method of the model where we definr relationship
});*/




Route::get('/',[
	'uses' => 'FrontEndController@index',
	'as'   => 'index'
]);


Route::get('/post/{slug}',[

			'uses'  => 'FrontEndController@singlePost',
			'as'    => 'post.single'
]);


Route::get('/category/{id}',[
	'uses'  => 'FrontEndController@category',
	'as'    => 'category.single'
]);

Route::get('/tag/{id}',[
	'uses'  => 'FrontEndController@tag',
	'as'    => 'tag.single'
]);


Route::get('/results',function(){

   $post = \App\Post::where('title','like','%'.request('query').'%')->get();
   					  

	return view('result')->with('posts',$post)
						 ->with('title','Searching For:'.request('query'))
          			     ->with('settings',\App\Setting::first())
			             ->with('categories',\App\Category::take(5)->get())
			             ->with('query',request('query'));

});


Route::post('/subscribe',function(){

	$email = request('email');
	Newsletter::subscribe($email);

	Session::flash('subscribe','Successfully Subscribed');

	return redirect()->back();
});


Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){


	    Route::get('/dashboard',[
	    	'uses' => 'HomeController@index',
	    	'as'   => 'home'
	    ]);

		Route::get('/post/create',[

			'uses' => 'PostController@create',

			'as'   => 'post.create'
		]);

		Route::get('/posts',[

			'uses' => 'PostController@index',

			'as'   => 'posts'
		]);

		Route::post('/post/store',[

			'uses' => 'PostController@store',

			'as'   => 'post.store'
		]);

		Route::get('/post/trashed',[

			'uses' => 'PostController@trashed',

			'as'   => 'post.trashed'
		]);

		Route::get('/post/kill/{id}',[

			'uses' => 'PostController@kill',

			'as'   => 'post.kill'
		]);

		Route::get('/post/restore/{id}',[

			'uses' => 'PostController@restore',

			'as'   => 'post.restore'
		]);

		Route::get('/post/delete/{id}',[

			'uses' => 'PostController@destroy',

			'as'   => 'post.delete'
		]);

		Route::get('/post/edit/{id}',[

			'uses' => 'PostController@edit',

			'as'   => 'post.edit'
		]);

		Route::post('/post/update/{id}',[

			'uses' => 'PostController@update',

			'as'   => 'post.update'
		]);















		Route::get('/categories',[

			'uses' => 'CategoriesController@index',

			'as'   => 'categories'
		]);


		Route::get('/category/create',[

			'uses' => 'CategoriesController@create',

			'as'   => 'category.create'
		]);

		Route::post('/category/store',[

			'uses' => 'CategoriesController@store',

			'as'   => 'category.store'
		]);

		

		Route::get('/category/edit/{id}',[

			'uses' => 'CategoriesController@edit',

			'as'   => 'category.edit'
		]);

		Route::post('/category/update/{id}',[

			'uses' => 'CategoriesController@update',

			'as'   => 'category.update'
		]);

		Route::get('/category/delete/{id}',[

			'uses' => 'CategoriesController@destroy',

			'as'   => 'category.delete'
		]);





















		Route::get('/tags',[

			'uses' => 'TagsController@index',

			'as'   => 'tags'
		]);


		Route::get('/tags/create',[

			'uses' => 'TagsController@create',

			'as'   => 'tag.create'
		]);

		Route::post('/tags/store',[

			'uses' => 'TagsController@store',

			'as'   => 'tag.store'
		]);

		

		Route::get('/tags/edit/{id}',[

			'uses' => 'TagsController@edit',

			'as'   => 'tag.edit'
		]);


		Route::post('/tags/update/{id}',[

			'uses' => 'TagsController@update',

			'as'   => 'tag.update'
		]);

		Route::get('/tags/delete/{id}',[

			'uses' => 'TagsController@destroy',

			'as'   => 'tag.delete'
		]);











		Route::get('/users',[

			'uses' => 'UsersController@index',

			'as'   => 'users'
		]);

		Route::get('/users/create',[

			'uses' => 'UsersController@create',

			'as'   => 'user.create'
		]);

		Route::post('/users/store',[

			'uses' => 'UsersController@store',

			'as'   => 'user.store'
		]);


		Route::get('/users/admin/{id}',[

			'uses' => 'UsersController@admin',

			'as'   => 'user.admin'
		]);


		Route::get('/users/not-admin/{id}',[

			'uses' => 'UsersController@not_admin',

			'as'   => 'user.not.admin'
		]);


		Route::get('users/profile',[
			'uses' => 'ProfilesController@index',
			'as'   => 'user.profile'
		]);

		Route::post('users/profile/update',[
			'uses' => 'ProfilesController@update',
			'as'   => 'user.profile.update'
		]);

		Route::get('users/delete/{id}',[
			'uses' => 'UsersController@destroy',
			'as'   => 'user.delete'
		]);



		Route::get('settings/',[
			'uses'  => 'SettingsController@index',
			'as'    =>  'settings'
		]);

		Route::post('settings/update',[
			'uses'  => 'SettingsController@update',
			'as'    => 'setting.update'
		]);


		

});






