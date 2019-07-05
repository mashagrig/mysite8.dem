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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //за какой период расписание показать
        if ($request->max_period !== null) {
            $max_period = $request->max_period;//в формате "31"
        }

        if ($request->admin_programs === '' || $request->admin_programs === null) {
            $section_id = null;
        } else if ($request->admin_programs !== '' && $request->admin_programs !== null) {
            $section_id = Section::where('title', 'like', "%{$request->admin_programs}%")
                ->first()->id;
        }


        //-----------------------------------------------
        //update
        if (
            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->where('gym_id', "{$request->admin_gyms}")
                ->first() !== null
        ) {
            if ($request->admin_trainers !== '' && $request->admin_trainers !== null) {
                if (
                    Shedule::where('date_training', "{$request->date_training}")
                        ->where('trainingtime_id', "{$request->time_id}")
                        ->where('user_id', "{$request->admin_trainers}")
                        ->first() !== null
                ) {
                    return view('privacies.admin.shedule.page_shedule')->with('status', "У данного тренера (id#".$request->admin_trainers.") уже есть запиь на этот день и на это время");
                }
            } else {
                Shedule::where('date_training', "{$request->date_training}")
                    ->where('trainingtime_id', "{$request->time_id}")
                    ->where('gym_id', "{$request->admin_gyms}")
                    ->update([
                        'user_id' => $request->admin_trainers,
                        'section_id' => $section_id,
                    ]);
                return view('privacies.admin.shedule.page_shedule')->with('status', 'Данные обновлены');
            }


        } else //create
            if (
                Shedule::where('date_training', "{$request->date_training}")
                    ->where('trainingtime_id', "{$request->time_id}")
                    ->where('gym_id', "{$request->admin_gyms}")
                    ->first() === null
            ) {
                if (
                    Shedule::where('date_training', "{$request->date_training}")
                        ->where('trainingtime_id', "{$request->time_id}")
                        ->where('user_id', "{$request->admin_trainers}")
                        ->first() !== null
                ) {
                    return view('privacies.admin.shedule.page_shedule')->with('status', "У данного тренера (id#".$request->admin_trainers.") уже есть запиь на этот день и на это время");
                }
                else {
                    Shedule::create([
                        'date_training' => $request->date_training,
                        'trainingtime_id' => $request->time_id,
                        'user_id' => $request->admin_trainers,
                        'section_id' => $section_id,
                        'gym_id' => $request->admin_gyms
                    ]);
                    return view('privacies.admin.shedule.page_shedule')->with('status', 'Данные добавлены');
                }
            }
        return view('privacies.admin.shedule.page_shedule')->with('status', 'Данные не обновлены и не добавлены');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->max_period === null) {
            $request->max_period = '7';
        }
        $shedule_composer_t = new ShedulesAdminComposer($request);
        return view('privacies.admin.shedule.page_shedule')->with('shedule_composer', $shedule_composer_t);


        //  return redirect()->back()->with('status', 'Вы не выбрали дату для фильта');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (
            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->where('gym_id', "{$request->admin_gyms}")
                ->first() !== null
        ) {
            Shedule::where('date_training', "{$request->date_training}")
                ->where('trainingtime_id', "{$request->time_id}")
                ->where('gym_id', "{$request->admin_gyms}")
                ->delete();

            $shedule_composer = new ShedulesAdminComposer($request);
            return view('privacies.admin.shedule.page_shedule')->with('status', 'Данные удалены');
        }

        $shedule_composer = new ShedulesAdminComposer($request);
        return view('privacies.admin.shedule.page_shedule')->with('status', 'Данных для удаления в базе нет');
    }
}
