<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use App\Models\borrow;
use App\Http\Requests\StoreborrowRequest;
use App\Http\Requests\UpdateborrowRequest;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/borrow/index',[
            'books'=>book::all(),
            'borrows'=>borrow::where('user_id',auth()->user()->id)->filter(request(['search']))->Paginate(5)->withQueryString(),
            'title' => 'Book Borrow List '
        ]);
    }
    public function indexAdmin()
    {
        if (auth()->user()->role == 0) {
        return view('/borrow/indexAdmin',[
            'books'=>book::all(),
            'users'=>User::all(),
            'borrows'=>borrow::latest()->filter(request(['search']))->Paginate(5)->withQueryString(),
            'title' => 'Book Borrow List '
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreborrowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreborrowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(borrow $borrow)
    {

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateborrowRequest  $request
     * @param  \App\Models\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateborrowRequest $request, $id)
    {
        $borrow = borrow::find($id);
        $borrow->book->status_id = 1;
        $borrow->book->save();
        $borrow->delete();
        if(auth()->user()->role == 0){
            return redirect()->route('borrowAdmin');
        }else{
            return redirect()->route('borrow');
        }
    }
    public function acc(borrow $request, $id)
    {
        $borrow = borrow::find($id);
        $borrow->book->status_id = 2;
        $borrow->book->save();
        return redirect()->route('borrowAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(borrow $borrow,  $id)
    {
        borrow::find($id)->delete();
        return redirect()->route('borrowAdmin');
    }
}
