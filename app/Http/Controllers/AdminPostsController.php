<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminPostsController extends Controller
{

    protected $featureImageDirectory = '/images/posts/feature_image/';

    protected $featureImageThumbnailDirectory = '/images/posts/feature_image/thumbnail/';

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
        //$posts = Posts::paginate(10);
        $posts = $posts->sortable(['updated_at' => 'desc'])->paginate(10);
        //$posts = Posts::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories_array = Categories::generateDropdown();
        return view('admin.posts.create',compact('categories_array'));
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
            'title' => 'required|max:255',
            'category_id' => 'required|numeric',
            'content' => 'required',
        ]);

        $data = $request->all();
        if(Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }

        $result = Posts::create($data);

        $request->session()->flash('admin-post-created',1);
        return redirect('admin-posts');
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
        $post = Posts::findOrFail($id);
        $categories_array = Categories::generateDropdown();
        if($post) {
            return view('admin.posts.edit',compact('post','categories_array'));
        }
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
            'title' => 'required|max:255',
            'category_id' => 'required|numeric',
            'content' => 'required',
        ]);

        $post = Posts::findOrFail($id);
        if($post) {
            $data = $request->all();
            $post->update($data);
            $request->session()->flash('admin-post-update',1);
        }
        return redirect('admin-posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        if($post) {
            $post->delete();
            Session::flash('admin-post-delete',1);
        }
        return redirect('admin-posts');
    }

    public function featureImage($id) {
        $post = Posts::findOrFail($id);

        return view('admin.posts.feature-image',compact('post'));
    }

    public function featureImageProcess(Request $request, $id) {
        $this->validate($request, [
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        $post = Posts::findOrFail($id);

        // File processing
        if($request->hasFile('feature_image')) {
            // Image process without resize function
            //$data['feature_image'] = $request->file('feature_image')->getClientOriginalName();
            //$request->file('feature_image')->move($this->featureImageDirectory,$data['feature_image']);

            //Resize function
            $image = $request->file('feature_image');
            $data['feature_image'] = time().'.'.$image->getClientOriginalExtension();
            //$destinationPath = public_path('/images/posts/feature_image/thumbnail');
            $destinationPath = public_path() . $this->featureImageThumbnailDirectory;
            $img = Image::make($image->getRealPath());
//            $img->resize(350, 250, function ($constraint) {
//                $constraint->aspectRatio();
//            });
            $img->fit(350, 250);
            $img->save($destinationPath.'/'.$data['feature_image']);

            //$destinationPath = public_path('/images/posts/feature_image');
            $destinationPath = public_path() . $this->featureImageDirectory;
            $image->move($destinationPath, $data['feature_image']);

            // Delete the old image
            if($post->feature_image) {
                $oldFeatureImage = public_path(). $this->featureImageDirectory . $post->feature_image;
                $oldFeatureImageThumbnail = public_path() . $this->featureImageThumbnailDirectory . $post->feature_image;
                if(file_exists($oldFeatureImage)) {
                    unlink($oldFeatureImage);
                }
                if(file_exists($oldFeatureImageThumbnail)) {
                    unlink($oldFeatureImageThumbnail);
                }
            }



        }

        //var_dump($data);die;
        $post->update($data);
        $request->session()->flash('admin-post-feature-image-process',1);
        return redirect('/admin-post/'.$id.'/feature-image');


    }


}
