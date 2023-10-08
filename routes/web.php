<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function(){
    $credential = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];

    if(!Auth::attempt($credential)){
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->date_of_birth = 'admin';
        $user->gender = 'admin';
        $user->profile_img = 'admin';
        $user->password = Hash::make($credential['password']);

        $user->save();

        if(Auth::attempt($credential)){
            // $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];
        }
    }
});
