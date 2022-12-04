<?php

namespace App\Http\Controllers;

use App\Models\auther;
use App\Http\Requests\StoreautherRequest;
use App\Http\Requests\UpdateautherRequest;

class AutherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            return view('auther.index', [
                'authors' => auther::latest()->filter(request(['search']))->Paginate(5)->withQueryString(),
            ]);
       
    }
    public function indexAdmin()
    {
        if(auth()->user()->role == "0"){
            return view('auther.indexAdmin', [ 'authors' => auther::latest()->filter(request(['search']))->Paginate(5)->withQueryString(),
            ]);}

            else{
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
        return view('auther.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreautherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreautherRequest $request)
    {
        auther::create($request->validated());

        return redirect()->route('authorsAdmin');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\auther  $auther
     * @return \Illuminate\Http\Response
     */
    public function edit(auther $auther)
    {
        return view('auther.edit', [
            'auther' => $auther
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateautherRequest  $request
     * @param  \App\Models\auther  $auther
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateautherRequest $request, $id)
    {
        $auther = auther::find($id);
        $auther->name = $request->name;
        $auther->save();

        return redirect()->route('authorsAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auther::findorfail($id)->delete();
        return redirect()->route('authorsAdmin');
    }
}
