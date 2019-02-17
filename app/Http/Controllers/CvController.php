<?php

namespace App\Http\Controllers;

use App\Cv;
use Carbon\Carbon;
use Spipu\Html2Pdf\Html2Pdf;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.create');
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
            'first_name' => 'required|min:2|string',
            'last_name' => 'required|min:2|string',
            'email' => 'required|email',
            'birth_date' => 'required|date|before:today'
        ]);

        $cv = Cv::create(array_merge(
            $request->all(),
            [
                'user_id' => auth()->user()->id
            ]
        ));

        return redirect()->route('cvs.edit', [
            'cv' => $cv,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit(Cv $cv)
    {
        //
        return view('cvs.edit', compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cv $cv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {
        //
        $cv->delete();
        session()->flash('status', 'CV deleted!');

        return redirect()->route('home');
    }

    public function uploadImage(Request $request, Cv $cv) {
        $request->validate([
            'image' => 'required|image'
        ]);

        $image = Image::make($request->image);

        $filename = $request->image->hashName();

        $image->fit(250, 250, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put('public/'.$filename, (string) $image->encode());

        // Store image in cv table
        $cv->update([
            'image' => $filename
        ]);

        session()->flash('status', 'Image uploaded!');

        // Redirect back to edit page
        return redirect()->route('cvs.edit', [ 'cv' => $cv ]);
    }

    public function downloadPDF(Cv $cv) {
        $pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8');
        $pdf->setDefaultFont('freeserif');
        $pdf->writeHTML(view('cvs.pdf', compact('cv')));
        $pdf->output('cv.pdf');
    }
} 
