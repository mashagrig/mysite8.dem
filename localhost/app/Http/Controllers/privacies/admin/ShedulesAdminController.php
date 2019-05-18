<?php

namespace App\Http\Controllers\privacies\admin;

use App\Http\ViewComposers\privacies\admin\ShedulesAdminComposer;
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
            //за какой период расписание показать
            if($request->max_period !== null){
                $max_period = $request->max_period;//в формате "31"
               }

        if($request->admin_programs === '' || $request->admin_programs === null ){
            $section_id = null;
        }else if($request->admin_programs !== '' && $request->admin_programs !== null ){
            $section_id =  Section::where('title', 'like', "%{$request->admin_programs}%")
                ->first()->id;
        }
        //-----------------------------------------------
        //update
       if(
       Shedule::where('date_training', "{$request->date_training}")
           ->where('trainingtime_id', "{$request->time_id}")
           ->where('gym_id', "{$request->admin_gyms}")
           ->first() !== null
       ){


//           if($request->admin_trainers === ''){
//               $section_id = null;
//           }else{
//               $section_id =  Section::where('title', 'like', "%{$request->admin_programs}%")
//                   ->first()->id;
//           }


           Shedule::where('date_training', "{$request->date_training}")
               ->where('trainingtime_id', "{$request->time_id}")
               ->where('gym_id', "{$request->admin_gyms}")
               ->update([
                   'user_id' => $request->admin_trainers,
                   'section_id' => $section_id,
               ]);
           $shedule_composer = new ShedulesAdminComposer($request);
           return view('privacies.admin.shedule.page_shedule')->with('status', 'Данные обновлены');




//           // если  заполнены admin_trainers
//        if($request->admin_trainers !== null || $request->admin_trainers === ''){
//             Shedule::where('date_training', "{$request->date_training}")
//                ->where('trainingtime_id', "{$request->time_id}")
//                ->where('gym_id', "{$request->admin_gyms}")
//                ->update([
//                    'user_id' => $request->admin_trainers,
//                ]);
//            return redirect()->back()->with('status', 'Данные обновлены');
//        }
//           // если  заполнены admin_programs
//           if($request->admin_programs !== null || $request->admin_programs === ''){
//               $section_id =  Section::where('title', 'like', "%{$request->admin_programs}%")
//                   ->first()->id;
//               Shedule::where('date_training', "{$request->date_training}")
//                   ->where('trainingtime_id', "{$request->time_id}")
//                   ->where('gym_id', "{$request->admin_gyms}")
//                   ->update([
//                       'section_id' => $section_id,
//                   ]);
//               $shedule_composer = new ShedulesAdminComposer($request);
//               return redirect()->back()->with('status', 'Данные обновлены');
//           }
//
//           return redirect()->back()->with('status', 'Вы не изменили поле для обновления');

       }else //create
           if(
               Shedule::where('date_training', "{$request->date_training}")
                   ->where('trainingtime_id', "{$request->time_id}")
                   ->where('gym_id', "{$request->admin_gyms}")
                   ->first() === null
           ){
//               //только если все заполнены!
//               if(
////                   $request->date_training !== null &&
////                   $request->time_id !== null &&
//                   $request->admin_trainers !== null ||
//                   $request->admin_programs !== null //&&
////                   $request->admin_gyms !== null
//               )
                    //{


                   Shedule::create([
                           'date_training' => $request->date_training,
                           'trainingtime_id' => $request->time_id,
                           'user_id' => $request->admin_trainers,
                           'section_id' => $section_id,
                           'gym_id' => $request->admin_gyms
                       ]);

                   $shedule_composer = new ShedulesAdminComposer($request);
                   return redirect()->back()->with('status', 'Данные добавлены');
               }

//               $request->max_period = $max_period;
//               $shedule_composer = new ShedulesAdminComposer($request);
 //              return redirect()->back()->with('status', 'Заполнены не все поля');
  //         }

      //  return redirect()->route('privacy.admin.shedules')->with('status', 'Данные не обновлены и не добавлены');
        return redirect()->back()->with('status', 'Данные не обновлены и не добавлены');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->max_period === null) {
            $request->max_period = '7';
        }
            $shedule_composer_t = new ShedulesAdminComposer($request);
            return view('privacies.admin.shedule.page_shedule')->with('shedule_composer',$shedule_composer_t);


          //  return redirect()->back()->with('status', 'Вы не выбрали дату для фильта');
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
    public function destroy(Request $request)
    {
        if(
            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->where('gym_id', "{$request->admin_gyms}")
                ->first() !== null
        ){
            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->where('gym_id', "{$request->admin_gyms}")
                ->delete();

            $shedule_composer = new ShedulesAdminComposer($request);
            return redirect()->back()->with('status', 'Данные удалены');
        }

        $shedule_composer = new ShedulesAdminComposer($request);
        return redirect()->back()->with('status', 'Данных для удаления в базе нет');
    }
}
