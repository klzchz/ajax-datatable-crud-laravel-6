<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{   
    private $user,$datatable;

    public function __construct(User $user, DataTables $datatable)
    {
        $this->user = $user;
        $this->datatable = $datatable;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $title = 'Users';
        // getting all data
        $data = $this->user->latest()->get();

        // if true about request ajax
        if($request->ajax())
        {
            return DataTables::of($data)
                        ->addColumn('action',function($data){
                            $button = "<button type='button' 
                            name='edit' id='{$data->id}' 
                            class='edit  btn btn-primary btn-sm'>Edit</button>";

                            $button .="<button type='button' 
                            name='delete' id='{$data->id}' 
                            class='delete  btn btn-danger btn-sm'>Delete</button>";

                            return $button;
                        })->rawColumns(['action'])
                        ->make(true);

                       
        }
        return view('users.index',compact('title'));
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
    public function store(UserRequest $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
        ];

         $this->user->create($data);

         return response()->json(['success'=>'Data successfully added']);


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
    public function update(UserRequest $request, $id)
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
