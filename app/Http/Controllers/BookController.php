<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BookController extends Controller {
    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {

        $books = \App\Book::orderBy('id', 'desc')->get();

        return view('books.index')->with('books', $books);
    }
    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title = null) {
        return view('books.show',[
            'title' => $title,
        ]);
    }
    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return view('books.create');
    }
    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate(Request $request) {
        $this->validate($request,[
            'title' => 'required|min:3',
            'author' => 'required',
            'published' => 'required|min:4',
            'cover' => 'required|url',
            'purchase_link' => 'required|url'
        ]);

        # Add the book to the database
        // $book = new \App\Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->published = $request->published;
        // $book->cover = $request->cover;
        // $book->purchase_link = $request->purchase_link;
        // $book->save();

        # Mass Assignment
        $data = $request->only('title', 'author', 'published', 'cover', 'purchase_link');
        #$book =  new \App\Book($data);
        #$book->save();

        # Mass Assignment 2
        \App\Book::create($data);

        \Session::flash('message', $request->title.' was added');

        return redirect('/books');
    }

    /**
    *
    */
    public function getEdit($id) {

        $book = \App\Book::find($id);
        return view('books.edit')->with('book', $book);
    }

    /**
    *
    */
    public function postEdit(Request $request) {

        $book = \App\Book::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->published = $request->published;
        $book->cover = $request->cover;
        $book->purchase_link = $request->purchase_link;

        $book->save();

        \Session::flash('message', $request->title.' was updated');

        return redirect('/book/edit/'.$request->id);
    }

    public function getDelete($id) {

        $book = \App\Book::find($id);
        $book->delete();

        \Session::flash('message', 'Book '.$id.' was deleted');

        return redirect('/books');
    }

} # eoc
