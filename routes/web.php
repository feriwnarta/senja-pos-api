<?php
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\URL;
	
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
		return URL::temporarySignedRoute('unsubscribe', now()->addMinute(30), ['user' => 1]);
	});
	
	Route::get('users/{user}/unsubscribe', function (Request $request) {
		if (!$request->hasValidSignature()) {
			abort(403);
		}
		
		return 'Process Unsubscribe';
		
	})
		->name('unsubscribe')
		->middleware('signed');
