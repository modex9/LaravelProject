<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $options = Options::all()->first();
        return view('option', ['options' => $options, 'route_create' => route('options.create')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = $request->all();
        if($options['global_discount_is_fixed'] == 'fixed')
            $options['global_discount_is_fixed'] = true;
        else
            $options['global_discount_is_fixed'] = false;

        Options::create($options);
        return redirect('options');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $options = Options::find($id);
        return view('options.edit', ['options' => $options]);
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

        $current_options = Options::find($id);
        $new_options = $request->all();
        if($new_options['global_discount_is_fixed'] == 'fixed')
            $new_options['global_discount_is_fixed'] = true;
        else
            $new_options['global_discount_is_fixed'] = false;

        if(array_key_exists('tax_inc_flag', $new_options))
            $new_options['tax_inc_flag'] = true;
        else $new_options['tax_inc_flag'] = false;

        $current_options->update($new_options);
        return redirect('options');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
