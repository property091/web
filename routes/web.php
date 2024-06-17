<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\ClaimModel;
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
    return view('index');
})->name('index');;


Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::get('/user', function () {
    return view('user', [
        'claims' => ClaimModel::where('user_id', Auth::id())->get()
    ]);
})->name('user');


Route::post('/register_user', function(Request $request) {
    $data = $request->all();
    
    if(User::where('login', $data['login'])->get()->first()) {
        
        if(Auth::attempt(['login' => $data['login'], 'password' => $data['password']])) {
            return redirect()->route('user')->with('вы зашли');
        }
        else {
            return redirect()->route('index')->with('неверный пароль');
        }
        
    }
    else {
        $user = new User();

        $user->login = $data['login'];
        $user->password = bcrypt($data['password']);

        $user->save();
        
        print_r($data['login']);
        return back();
    }
    

})->name('register_user');


Route::post('/logout', function () {
    
    Auth::logout();
    return redirect()->route('index');
    
})->name('logout');


Route::post('/add_claim', function(Request $request) {
    $data = $request->all();

    $claim = new ClaimModel();
    $claim->user_id = Auth::user()->id;
    $claim->description = $data['description'];

    $claim->save();

    return back();

})->name('add_claim');