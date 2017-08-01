<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PhotosCategories;
use App\Photos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPhotosCategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photosCategories = PhotosCategories::all();
        return view('admin.photos-categories.index',compact('photosCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255'
        ]);

        $data = $request->all();
        //var_dump($data);die;

        $result = PhotosCategories::create($data);

        $request->session()->flash('admin-photo-category-create',1);
        return redirect('admin-photos-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find all images that belong to a specific photo category
        $photosCategory = PhotosCategories::findOrFail($id);
        $photos = Photos::where('category',$photosCategory->id)
                        ->orderBy('updated_at','desc')
                        ->get();



        return view('admin.photos-categories.show',compact('photosCategory','photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photosCategory = PhotosCategories::findOrFail($id);
        return view('admin.photos-categories.edit',compact('photosCategory'));

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

        $this->validate($request,[
            'name' => 'required|max:255',
        ]);

        $photosCategory = PhotosCategories::findOrFail($id);
        if($photosCategory) {
            $data = $request->all();
            $photosCategory->update($data);
            $request->session()->flash('admin-photo-category-update',1);
        }
        return redirect('admin-photos-categories');

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
