<?php
use \Michelf\Markdown;

Route::group(['middleware' => ['web']], function () {

    // Routes that (may) need a session

    Route::get('/', function () {
        # return view('welcome');
        return 'Hello welcome to my Laravel application!';
    });

    Route::get('/books', 'BookController@getIndex');
    Route::get('/book/create', 'BookController@getCreate');
    Route::get('/book/show/{title?}', 'BookController@getShow');
    Route::post('/book/create', 'BookController@postCreate');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
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

        $random = new Rych\Random\Random();
        return $random->getRandomString(10);
        */

        $text = file_get_contents('../readme.md');
        $html = Markdown::defaultTransform($text);

        return $html;
        //return getcwd() . "\n";
    });

});
