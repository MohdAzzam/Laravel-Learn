<?php

namespace App\Http\Controllers\API;



use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {

            return $this->sendError('Please validate error' ,$validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('DevMohammad')->accessToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User registered successfully');
    }


    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('DevMohammad')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User Login Successfully');

        } else {
            return $this->sendError('User Not Register', ['error' => 'unauthorized '], '404');

        }


    }
}
