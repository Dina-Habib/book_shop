<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $books = Book::all();
            return response()->view('cms.books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:30|unique:books,name',
            'isbn'=>'unique:books,isbn'
        ]);
        $book = new Book();
        $book->name = $request->get('name');
        $book->isbn = $request->get('isbn');
        $book->author_id = $request->get('author_id');
        $book->publisher_id = $request->get('publisher_id');
        $book->classification_id = $request->get('classification_id');
        $isSaved=$book->save();
        if($isSaved){
            return redirect()->route('books.create');
        }else{

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return response()->view('cms.books.edit',['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:30'
        ]);
        $book = Book::findOrFail($id);
        $book->name = $request->get('name');
        $book->isbn = $request->get('isbn');
        $book->author_id = $request->get('author_id');
        $book->publisher_id = $request->get('publisher_id');
        $book->classification_id = $request->get('classification_id');
        $isUpdated=$book->save();
        if($isUpdated){
            return redirect()->route('books.index');
        }else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::findOrFail($id);
        $isDeleted = $book->delete();
        if($isDeleted){
            return redirect()->back();
        }
    }
    
    ```
    public function search(Request $request){
        $query=Book::query();
        if ($request->has('q')) {
            $searchParam = $request->get('q');

            $query->where('id', 'LIKE', "%{$searchParam}%");
        }
        return view('cms.books.index')->with("searchParam",$query);
    }
    ```
}
