<?php

namespace App\Http\Controllers\programs;

use App\Http\ViewComposers\SheduleComposer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('programs.page_programs');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
//        $request->programs = $id;
//        // $request->max_date_select =  date('Y-m-d', time() + 86400*31);
//        $request->max_date_select = date('Y-m-d', time() + 86400*7);
//        $request->period = "week";
        //return redirect()->action('shedule\SheduleController@index')->with($shedule_composer_id);


        $shedule_composer = new SheduleComposer($request);
        return view('shedule.page_shedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
