<?php

namespace App\Http\Controllers;

use App\Education;
use App\Cv;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cv_id' => 'required|exists:cvs,id',
            'name' => 'required|min:2',
            'major' => 'required|min:2',
            'from' => 'required|date|before:to',
            'to' => 'required|date|after:from'
        ]);

        $education = Education::create($request->all());

        session()->flash('status', 'Education created!');

        return redirect()->route('cvs.edit', [
            'cv' => $education->cv
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
        $education->delete();
        session()->flash('status', 'Education deleted!');

        return redirect()->route('cvs.edit', [ 'cv' => $education->cv ]);
    }
}
