<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifications = Classification::all();
        return response()->view('cms.classifications.index',['classifications' => $classifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.classifications.create');
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
            'name'=> 'required|string|min:3|max:30'
        ]);
        $classification = new Classification();
        $classification->name = $request->get('name');
        $isSaved=$classification->save();
        if($isSaved){
            return redirect()->route('classifications.create');
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
        $classification = Classification::findOrFail($id);
        return response()->view('cms.classifications.edit',['classification' => $classification]);
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
        $classification = Classification::findOrFail($id);
        $classification->name = $request->get('name');
        $isUpdated=$classification->save();
        if($isUpdated){
            return redirect()->route('classifications.index');
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
        $classification=Classification::findOrFail($id);
        $isDeleted = $classification->delete();
        if($isDeleted){
            return redirect()->back();
        }
    }
}
