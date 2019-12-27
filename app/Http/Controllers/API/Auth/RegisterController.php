<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function store(Request $request, $guard)
    {
        if(!$guard || !\in_array($guard, ['user', 'admin', 'courier'])) {
            return response()->json(['error' => 'invalid request'], 422);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:' . $guard . 's',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $class = "App\Models\\" . ucfirst($guard);
        $model = new $class();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = Hash::make($request->password);
        $model->save();
       
        // auth()->login($user);
        return response()->json(['message' => $guard . ' succesfully registered', $guard => $model], 200);
    }
}
