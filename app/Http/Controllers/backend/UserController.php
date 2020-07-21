<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        
        $user = User::paginate(10);
        $filter = $request->get('keyword');
        if($filter)
        {
            $user = User::where('name','LIKE',"%$filter%")->paginate(10);
            // dd($user->count());
            if($user->count() === 0)
            {
                return redirect()->route('user.index')->with('error',$filter);
            }
        }
        return view('backend.user.index', compact('user'));
    }

    
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nip'=>'required|max:9|unique:users',
            'name'=>'required|max:50',
            'email'=>'sometimes|email|nullable|max:255|unique:users',
            'password'=>'required|min:6',
            'seksi'=>'required',
            'role'=>'required'
        ]);
        if($validasi->fails()){
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }
        $data['password']=bcrypt($data['password']);
        User::create($data);
        return redirect()->route('user.index')->with('status','Data Pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return view('backend.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('backend.user.edit',compact('user'));
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
        $user = User::findOrfail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'nip'=>'required|max:9|unique:users,nip,'.$id,
            'name'=>'required|max:50',
            'email'=>'sometimes|email|nullable|max:255|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
            'seksi'=>'required'
        ]);

        if($validasi->fails()){
            return redirect()->route('user.edit',[$id])->withErrors($validasi);
        }
        if($request->input('password')){
            $data['password']=bcrypt($data['password']);
        }
        else
        {
            $data = Arr::except($data,['password']);   
        }
        $user->update($data);
        return redirect()->route('user.index')->with('status','Data Pegawai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrfail($id);
        $data->delete();
        return redirect()->route('user.index')->with('status','User Berhasil Dihapus');
    }
}
