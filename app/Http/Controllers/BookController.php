<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BookController extends Controller {

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return 'List all the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title = null) {
        #return 'Show an individual book: '.$title;
        return view('books.show')->with('title', $title);
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        $view = '<form method="post" action="/book/create">';
        $view .= csrf_field();
        $view .= 'Book Title: <input type="text" name="title">';
        $view .= '<input type="submit" >';
        $view .= '</form>';

        return $view;
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate() {
        return 'Add the book '.$_POST['title'];
    }
}
