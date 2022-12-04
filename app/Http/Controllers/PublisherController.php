<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use App\Http\Requests\StorepublisherRequest;
use App\Http\Requests\UpdatepublisherRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('publisher.index', [
            'publishers' => publisher::latest()->filter(request(['search']))->Paginate(5)->withQueryString(),
        ]);
    }
    public function indexAdmin()
    {
        if(auth()->user()->role == "0"){
            return view('publisher.indexAdmin', [
                'publishers' => publisher::latest()->filter(request(['search']))->Paginate(5)->withQueryString(),
            ]);
            }else{
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
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepublisherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepublisherRequest $request)
    {
        publisher::create($request->validated());
        return redirect()->route('publishersAdmin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(publisher $publisher)
    {
        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepublisherRequest  $request
     * @param  \App\Models\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepublisherRequest $request, $id)
    {
        $publisher = publisher::find($id);
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('publishersAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        publisher::find($id)->delete();
        return redirect()->route('publishersAdmin');
    }
}
