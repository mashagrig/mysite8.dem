<?php

namespace App\Http\Controllers\trainers;

use App\Personalinfo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      см расшаренный запрос в AppServiceProvider.php

//        $trainers_info = Personalinfo::select(
//            'roles.title',
//            'users.email',
//            'users.id as id',
//            'personalinfos.name as person',
//            'users.name as user',
//            'binaryfiles.file_src as file_src',
//            'personalinfos.info'
//        )
//            ->join('users', 'users.personalinfo_id', '=', 'personalinfos.id', 'inner')
//            ->join('roles', 'roles.id', '=', 'users.role_id', 'inner')
//            ->join('contents', 'contents.user_id', '=', 'users.id', 'inner')
//            ->join('binaryfiles', 'binaryfiles.id', '=', 'contents.binaryfile_id', 'inner')
//            ->where('roles.title','like', '%trainer%')
//            //->orderBy("personalinfos.id")
//            ->get();

        return

            view('trainers.page_trainers');
//            view('trainers.page_trainers', [
//            'trainers_info'=> $trainers_info,
//        ]);
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
