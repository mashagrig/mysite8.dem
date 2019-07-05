<?php

namespace App\Http\Controllers\shedule;

use App\Http\ViewComposers\SheduleComposer;
use App\Section;
use App\Shedule;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shedule.page_shedule');
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
    //фильтрует расписание = передает из регуеста параметры в композер с запосом
    public function store(Request $request)
    {
        $shedule_composer = new SheduleComposer($request);

        return view('shedule.page_shedule')->with('shedule_composer',$shedule_composer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if(isset($request->item)&&$request->item === 'trainers_item'){
         //   $request->trainers = $id;
            $request->programs = '';
        }
        //код в программных компоузерах требует рефакторинга, но на текущий момент задвоение обеспечивает гибкость и мастабируемость
        elseif(isset($request->item)&&$request->item === 'programs_item'){
            $request->trainers = '';
          //  $request->programs = $id;
        }

        $shedule_composer_s = new SheduleComposer($request);
        return view('shedule.page_shedule')->with('shedule_composer_s',$shedule_composer_s);
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
