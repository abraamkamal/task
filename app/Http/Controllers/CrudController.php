<?php

namespace App\Http\Controllers;

use App\Crud;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selected = Crud::all();



        return view('index');
    }

    public function datatabel(){

        $selected = Crud::all();
        return Datatables::of($selected)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->toDayDateTimeString();
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->toDayDateTimeString();
            })
            ->addColumn('action',function($selected){
                return
                    '<input type="button"  value = "Edit" onclick="edit()" class="btn btn-info btn-sm btnEdit" data-edit="/crud/'.$selected->id.'/edit"></<input>
                <input type="button" value="Delete" onclick="destroy()" class="btn btn-warning btn-sm btnDelete" data-remove="/crud/'.$selected->id.'"></input>';
            })
            ->make(true);

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
//dd('dadad');
        $rules = [
            'name' => 'required|min:2|max:32',
            'image' => 'required',
            'screen_name' => 'required',
            'content' => 'required',
            'description' => 'required',
            'user_name' => 'required',
            'date' => 'required',
            'status' => 'required'
        ];

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else {

            $crud = new Crud();
            $crud->name = $request['name'];
            $crud->image = $request->image;
            $crud->screen_name = $request->screen_name;
            $crud->content = $request['content'];
            $crud->description = $request->description;
            $crud->user_name = $request->user_name;
            $crud->date = $request->date;
            $crud->status = $request->status;
            $crud->save();

            return response()->json(array("success" => true));
//        }

//        }
        }
    }
//    public  function datatablestore(){
//
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Crud::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'edit_id' => 'required',
            'edit_name' => 'required|min:2|max:32',
            'edit_image' => 'required',
            'edit_screen_name' => 'required',
            'edit_content' => 'required',
            'edit_description' => 'required',
            'edit_user_name' => 'required',
            'edit_date' => 'required',
            'edit_status' => 'required'
        ];

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else {

            $crud = new Crud();
            $crud->name = $request['name'];
            $crud->image = $request->image;
            $crud->screen_name = $request->screen_name;
            $crud->content = $request['content'];
            $crud->description = $request->description;
            $crud->user_name = $request->user_name;
            $crud->date = $request->date;
            $crud->status = $request->status;
            $crud->save();

            return response()->json(array("success" => true));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        if (Crud::destroy($id)) {
           $data = 'Success';
        }else{
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
