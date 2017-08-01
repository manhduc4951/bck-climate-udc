<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Role;
use App\User;

class AdminUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $users = $users->sortable(['updated_at' => 'desc'])->paginate(10);
        //$posts = Posts::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::generateDropdownList();
        return view('admin.users.create',compact('roles'));
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
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|numeric',

        ]);

        $data = $request->all();
        //var_dump($data);die;
        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);


        $result = User::create($data);

        $request->session()->flash('admin-user-create',1);
        return redirect('admin-users');
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
        $user = User::findOrFail($id);
        if($user) {
            $roles = Role::generateDropdownList();
            return view('admin.users.edit',compact('user','roles'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role_id' => 'required|numeric',

        ]);
        //var_dump($request->all());die;
        $user = User::findOrFail($id);
        $data = $request->all();

        $user->update($data);
        $request->session()->flash('admin-user-update',1);
        return redirect('/admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user) {
            $user->delete();
            Session::flash('admin-user-delete',1);
        }
        return redirect('admin-users');
    }

    public function changePassword($id) {
        $user = User::findOrFail($id);

        return view('admin.users.change-password',compact('user'));
    }

    public function changePasswordProcess(Request $request, $id) {

        $this->validate($request,[
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::findOrFail($id);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user->update($data);

        Session::flash('admin-user-change-password',1);

        return redirect('/admin-user/'.$id.'/change-password');

    }
}
