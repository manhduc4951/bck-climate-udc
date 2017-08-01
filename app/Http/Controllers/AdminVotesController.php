<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Votes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminVotesController extends Controller
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
    public function index(Votes $votes)
    {
        //$votes = Votes::all();
        $votes = $votes->sortable(['updated_at' => 'desc'])->paginate(100);
        return view('admin.votes.index',compact('votes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.votes.create');
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
            'description' => 'required|max:255'
        ]);

        $data = $request->all();
        //var_dump($data);die;

        $result = Votes::create($data);

        $request->session()->flash('admin-vote-create',1);
        return redirect('admin-votes');
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
        $vote = Votes::findOrFail($id);
        return view('admin.votes.edit',compact('vote'));

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
            'description' => 'required|max:255',
        ]);

        $vote = Votes::findOrFail($id);
        if($vote) {
            $data = $request->all();
            $vote->update($data);
            $request->session()->flash('admin-vote-update',1);
        }
        return redirect('admin-votes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = Votes::findOrFail($id);
        if($vote) {
            $vote->delete();
            Session::flash('admin-vote-delete',1);
        }
        return redirect('admin-votes');
    }
}
