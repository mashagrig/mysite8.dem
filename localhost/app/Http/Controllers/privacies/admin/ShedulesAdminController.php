<?php

namespace App\Http\Controllers\privacies\admin;

use App\Http\ViewComposers\SheduleComposer;
use App\Section;
use App\Shedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShedulesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privacies.admin.shedule.page_shedule');

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
        //update
       if(
       Shedule::where('date_training', "{$request->date_training}")
           ->where('trainingtime_id', "{$request->time_id}")->first() !== null
       ){
           // если  заполнены
        if(
        $request->date_training !== '' ||
        $request->time_id !== '' ||
        $request->admin_trainers !== '' ||
        $request->admin_programs !== '' ||
        $request->admin_gyms !== ''
       ){
          $section_id =  Section::where('title', 'like', "%{$request->admin_programs}%")
                ->first()->id;

            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->update([
                    'trainingtime_id' => $request->time_id,
                    'user_id' => $request->admin_trainers,
                    'section_id' => $section_id,
                    'gym_id' => $request->admin_gyms
                ]);
            return redirect()->back()->with('status', 'Данные обновлены');
        }
           return redirect()->back()->with('status', 'Вы не изменили поле для обновления');

       }else     //create
           if(
               Shedule::where('date_training', "{$request->date_training}")
                   ->where('trainingtime_id', "{$request->time_id}")->first() === null
           ){
               //только если все заполнены!
               if(
                   $request->date_training !== '' &&
                   $request->time_id !== '' &&
                   $request->admin_trainers !== '' &&
                   $request->admin_programs !== '' &&
                   $request->admin_gyms !== ''
               ){
                   $section_id =  Section::where('title', 'like', "%{$request->admin_programs}%")
                       ->first()->id;

                   Shedule::create([
                           'date_training' => $request->date_training,
                           'trainingtime_id' => $request->time_id,
                           'user_id' => $request->admin_trainers,
                           'section_id' => $section_id,
                           'gym_id' => $request->admin_gyms
                       ]);
                   return redirect()->back()->with('status', 'Данные добавлены');
               }
               return redirect()->back()->with('status', 'Заполнены не все поля');
           }

        return redirect()->route('privacy.admin.shedules')->with('status', 'Данные не обновлены и не добавлены');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $shedule_composer = new SheduleComposer($request);

        return view('privacies.admin.shedule.page_shedule');//->with('shedule_composer',$shedule_composer);
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
