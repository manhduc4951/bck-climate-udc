<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;

use App\Http\Requests;

class AdminPhotosController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move(Photos::$photosModulePath, $name);

        //Photos::create(['name' => $name]);


        $data['name'] = $name;
        //$data['path'] = Photos::$photosModulePath;
        $data['category'] = $request->get('photo_category');
        $result = Photos::create($data);


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
        $photo = Photos::findOrFail($id);
        $photo_category = $photo->category;
        if($photo) {
            //unlink
            $file_path = public_path().'/'.Photos::$photosModulePath.'/'.$photo->name;
            if(file_exists($file_path)) {
                unlink($file_path);
            }

            //delete in database
            $photo->delete();
        }
        return redirect('admin-photos-categories/'.$photo_category);
    }
}
