<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = User::find(Auth::user()->id);
    $partner = User::find($user->partner_id);
    return view('dashboard',compact('user','partner'));
})->middleware(['auth'])->name('dashboard');

Route::get('/profile',function() {
    $user = User::find(Auth::user()->id);
    return view('profile',compact('user'));
})->middleware(['auth'])->name('profile');

Route::put('/profile',function(Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'code_name'  => ['required','string'],
        'gender'    => ['required','integer'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
        'wishlist'  => ['required','string'],        
    ]);

    $user = User::find($request->id);
    $user->update([
        'name'      => $request->name,
        'code_name' => $request->code_name,
        'gender'    => $request->gender,
        'email'     => $request->email,
        'wishlist'  => $request->wishlist,
    ]);

    if($request->password) {
        $user->update([
            'password'  => Hash::make($request->password)
        ]);
    }

    return redirect(route('profile'))->with('alert', 'Examinee Updated!');
})->middleware(['auth'])->name('profile.update');

Route::get('/users', function () {
    if(Auth::user()->id != 1) {
        return redirect(route('dashboard'))->with('alert', 'GINAGAWA MO!');
    }
    $users = User::all();
    return view('users',compact('users'));
})->middleware(['auth'])->name('users');

Route::get('/delete/{user_id}', function ($user_id) {
    if(Auth::user()->id != 1) {
        return redirect(route('dashboard'))->with('alert', 'GINAGAWA MO!');
    }
    $user = User::find($user_id)->delete();
    $users = User::all();
    return view('users',compact('users'));
})->middleware(['auth'])->name('delete');

Route::get('/shuffle',function(){
    if(Auth::user()->id != 1){
        return redirect(route('dashboard'))->with('alert', 'GINAGAWA MO!');
    }

    $users = User::all();
    $set_1 = array();
    $temp = array();
    foreach ($users as $user) {
        array_push($set_1,$user->id);
    }
    shuffle($set_1);

    $index = 0;
    foreach ($users as $user) {
        $user->update([
            'partner_id'    => $set_1[$index]
        ]);
        $index++;
    }

    return redirect(route('users'));

})->middleware(['auth'])->name('shuffle');

Route::get('/removePartner', function () {
    if(Auth::user()->id != 1) {
        return redirect(route('dashboard'))->with('alert', 'GINAGAWA MO!');
    }
    $users = User::all();
    foreach ($users as $user) {
        $user->update([
            'partner_id' => 0
        ]);
    }
    return view('users',compact('users'));
})->middleware(['auth'])->name('removePartner');

function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

require __DIR__.'/auth.php';
