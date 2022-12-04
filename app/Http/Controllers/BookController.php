<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\auther;
use App\Models\borrow;
use App\Models\status;
use App\Models\publisher;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('auther')) {
            $auther = auther::firstWhere('name', request('auther'));
            $title = ' By ' . $auther->name;
        }

        if (request('publisher')) {
            $publisher = publisher::firstWhere('name', request('publisher'));
            $title = ' By ' . $publisher->name;
        }
       
            return view('book.index', [
                'title' => "All Post" . $title,
                'books' => book::latest()->filter(request(['search', 'auther', 'publisher']))->Paginate(5)->withQueryString()
            ]);
       
    }
    public function indexAdmin()
    {
        $title = '';
        if (request('auther')) {
            $auther = auther::firstWhere('name', request('auther'));
            $title = ' By ' . $auther->name;
        }

        if (request('publisher')) {
            $publisher = publisher::firstWhere('name', request('publisher'));
            $title = ' By ' . $publisher->name;
        }
        if (auth()->user()->role == "0") {
            return view('book.indexAdmin', [
                'title' => "All Post" . $title,
                'books' => book::latest()->filter(request(['search', 'auther', 'publisher']))->Paginate(5)->withQueryString(),
                'statuses'=>status::latest()->get()
            ]);
        } else {
            return view('disallow');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookRequest $request)
    {
        book::create($request->validated() + [
            'status' => 'Y'
        ]);
        return redirect()->route('booksAdmin');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
       
        return view('book.edit', [
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'book' => $book,
            'statuses'=>status::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookRequest $request, $id)
    { 
        
        $book = book::find($id);
        $book->name = $request->name;
        $book->auther_id = $request->author_id;
        $book->publisher_id = $request->publisher_id;
        $book->status_id = $request->status_id;
        $book->save();
        // book::where('id',$id)->update($book);
        return redirect()->route('booksAdmin');
    }
    public function order(Request $request, $id)
    { 
        $book = book::find($id);
        $user = auth()->user()->id;
        borrow::create(['user_id'=>$user,'book_id'=>$book->id]);
        $book->status_id = 3;
        $book->save();
        
        // book::where('id',$id)->update($book);
        if(auth()->user()->role==0){
            return redirect()->route('booksAdmin');
        }else{
            return redirect()->route('books');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        book::find($id)->delete();
        return redirect()->route('booksAdmin');
    }
}
