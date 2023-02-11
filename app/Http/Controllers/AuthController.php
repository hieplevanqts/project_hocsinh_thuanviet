<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $result = new User($request->all());
        $result->password = Hash::make($request->password);
        $result->save();
        $tokenResult = $result->createToken('your_password');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            "status"=>200,
            "message"=>"Success",
            "data"=>[
                'access_token' => $tokenResult->accessToken,
                'user'=>$result,
            ]
        ]);
    }

    public function login(Request $request){
        $arr = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        if (Auth::attempt($arr)) {
            $user = Auth::user();
            $tokenResult = $user->createToken('your_password');
            return response()->json([
                "status"=>200,
                "message"=>"Success",
                "data"=>[
                    'access_token' => $tokenResult->accessToken,
                    'user'=>$user,
                ]
            ]);

        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->authAcessToken()->delete();
            return response()->json([
                "status"=>200,
                "message"=>"Success",
                "data"=>""
            ]);
        }
    }

    public function logoutUser()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/admin/login');
        }
        return redirect('/admin/login');
    }

    public function user_all()
    {
        $user = User::all();
        return response()->json([
            "status"=>200,
            "message"=>"Success",
            "data"=>$user
        ]);
    }

    public function deleteUser(Request $request)
    {
        
        try {
            $user = User::findOrFail($request->id);
            if(file_exists($user->avatar))
            {
                unlink($user->avatar);
            }
            $user->delete();
            return response()->json(["status"=>200, "message"=>"Thành công", "result"=>$user]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>201, "message"=>"Thất bại", "result"=>$th]);
        }
    }

    public function createUser()
    {
        $roles = Role::all();
        return view("dashboard::users.create", compact('roles'));
    }

    public function editUser($id)
    {
        $edit = User::findOrFail($id);
        $roles = Role::all();
        $rolesOfUser = $edit->roles;
        return view('dashboard::users.edit', compact('edit', 'roles', 'rolesOfUser'));
    }

    public function loginUser(Request $request)
    {

        $arr = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        if (Auth::attempt($arr)) {
            $user = Auth::user();
            return redirect('/admin');
        }
        return view('canans.login.index');
    }

    public function postLoginUser(Request $request)
    {
        $arr = [
            'email' =>$request->email,
            'password'=>$request->password
        ];
        if (Auth::attempt($arr)) {
            $user = Auth::user();
            return response()->json([
                "status"=>200,
                "message"=>"Success",
                "data"=>$user
            ]);

        }else{
            return response()->json([
                "status"=>201,
                "message"=>"Thất bại",
                "data"=>''
            ]);
        }
        
    }

    public function postCreateUser(Request $request)
    {
        // dd($request->all());
        $user = new User($request->all());
        $user->slug = Str::of($request->name)->slug('-');
        $user->password = Hash::make($request->password);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->getClientOriginalName();
            $file->move('upload/user/avatar', $user->id.$file->getClientOriginalName());
            $user->avatar = 'upload/user/avatar/'.$user->id.$file->getClientOriginalName();
        }
        $user->save();

        $user->roles()->attach($request->roleId);
        return redirect('/admin/users');
    }

    public function postEditUser(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $user = User::findOrFail($request->edit);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password)
            {
                $user->password = Hash::make($request->password);
            }
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $file->getClientOriginalName();
                $file->move('upload/user/avatar', $user->id.$file->getClientOriginalName());
                $user->avatar = 'upload/user/avatar/'.$user->id.$file->getClientOriginalName();
            }
            $user->save();
            $user->roles()->sync($request->roleId);
            DB::commit();
            return redirect('/admin/users');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

}
