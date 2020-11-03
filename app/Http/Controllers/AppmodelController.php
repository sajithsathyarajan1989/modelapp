<?php

namespace App\Http\Controllers;

use App\Appmodel;
use Illuminate\Http\Request;

class AppmodelController extends Controller
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

    public function loadmodel ($id = null) {
        $appmodel = Appmodel::find($id);

        return view('appmodels.load',compact('appmodel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        ini_set('memory_limit', '1024M');
        $msg = '';
        $this->validate($request, [
            'name' => 'required',
            'number'=>['required','numeric'],
            'size' => 'required',
            'photo' => 'required',
            'publish_date' => ['required','date'],
            'description' =>['required','string'],
        ]);

        $input = $request->all();
        $photo  = $request->file('photo');
        $photo_title = time() . $photo->getClientOriginalName();
        $input['photo'] = $photo_title;

        //moving document to file system
        try {

            $photo->move( public_path() . '/model_images/', $photo_title);

            $modell = Appmodel::create($input);

            if ($modell) {

                $url = url('/loadmodel/'.$modell->id);
                $msg = "Model entry created successfully. Use code: <iframe src='".$url."'></iframe>";
            }

        } catch (\Exception $e) {
            return back()->withError(substr($e->getMessage(),0,2000))->withInput();
        }

        return redirect()->route('home')
                        ->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appmodel  $appmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Appmodel $appmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appmodel  $appmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Appmodel $appmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appmodel  $appmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appmodel $appmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appmodel  $appmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appmodel $appmodel)
    {
        //
    }
}
