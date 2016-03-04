<?php

Route::group(['middleware' => ['web']], function () {

    // Routes that (may) need a session

    Route::get('/', function () {
        # return view('welcome');
        return 'Hello welcome to my Laravel application!';
    });

    Route::get('/books', 'BookController@getIndex');
    Route::get('/book/create', 'BookController@getCreate');
    Route::get('/book/{id}', 'BookController@getShow');
    Route::post('/book/create', 'BookController@postCreate');

    Route::get('/practice', function() {
        /*
        echo 'app.url: '.config('app.url');
        echo '<br>app.env: '.config('app.env');


        $data = Array('foo' => 'bar');
        Debugbar::info($data);
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');

        return 'Practice';
        */

        $random = new Rych\Random\Random();
        return $random->getRandomString(10);

    });

});
