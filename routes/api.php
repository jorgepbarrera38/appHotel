<?php

use Illuminate\Http\Request;

Route::resource('rooms', 'RoomController')->middleware('auth:api');

Route::post('login', function(Request $request){
    if ($user = \App\User::where('username', $request->input('username'))->first()) {
        if (Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'message' => 'Bienvenido',
                'api_token' => $user->api_token,
                'name' => $user->name
            ], 200);
        }
    }

    return response()->json([
        'message' => 'Tus credenciales no coinciden con nuestros registros.'
    ], 401);
});
