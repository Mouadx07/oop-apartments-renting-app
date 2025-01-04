<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    final public function register(Request $request)
    {
        
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'phone' => ['required', 'string'],
            
        ]);
        // return response()->json(['Current User !'],200);
        
        if (!$validation) {
            return response()->json(["success"=>false, 'Error' => 'Authentification Error'], 401);
        }
        
       try{
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'password'=> bcrypt($request->password),
            
    ]);
    Auth::attempt(['email' => $request->email,'password'=> $request->password]); 
        $user = Auth::user();
        $token = $user->createToken('app_key')->plainTextToken;  
        return response()->json(["success"=>true,'Current User !'=> $user, 'token'=>$token, 'user_id'=>$user->id],200);
       }
        catch (Exception $e) {
                return response()->json(["success"=>false,'Error' => 'email already exists'], 401);
        }
        }
        
        final public function login(Request $request) {
            $input = $request->all();
            
            $validation = $request->validate([
                'email' => 'required|email',
                'password'=> 'required|string',
            ]);
    
            if (!$validation) {
                return response()->json(["success"=>false, 'Error' => 'Authentification Error'], 401);
            }
            if (!Auth::attempt(['email' => $input['email'],'password'=> $input['password']])) {
                    return response()->json(["success"=>false, "Error" => "Email or Password no valid!"],401);
                
            }
            $user = Auth::user();
            $token = $user->createToken('app_key')->plainTextToken;
            return response()->json(["success"=>true,"token" => $token, 'user_id'=>$user->id],200);
        }
        final public function logout(Request $request) {
            
    
            $user = $request->user();
            //Auth::logout();
            
         
            return response()->json(["Msg" =>$user],200);
        }
        final public function profile(Request $request) {
            
    
            $id = $request->route('id');
            $user = User::find($id);//->load('apartments')->load('bookings');//->bookings()->with('apartment')->get();
            $data = [
                'user'=> $user,//->makeHiddren('apartments', 'bookings'),
                 'apartments'=>$user->apartments()->with(['bookings'=>function ($query){
                    $query->orderBy('ends', 'desc');
                 }])->get(),
                 'bookings'=>$user->bookings()->with('apartment')->get(),
                
            ];
            return response()->json(["result" => $data],200);
        }
        // final public function bookings(Request $request) {
            
    
        //     $id = $request->route('id');
        //     //Auth::logout();
        //     $user = User::findOrFail($id);
        //     $data = [
                
                
        //     ];
        //     return response()->json(["result" =>$data],200);
        // }
        // final public function profile(Request $request) {
            
    
        //     $id = $request->route('id');
        //     //Auth::logout();
        //     $user = User::findOrFail($id);
        //     return response()->json(["user" =>$user],200);
        // }
    
}

    

    
