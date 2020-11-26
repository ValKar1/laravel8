<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\OrderStatusUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BroadcastController extends Controller
{

    public function createUser()
    {
        $data = [
            'name' => 'test',
			'email' => 'test@test.de',
			'password' => Hash::make('password')
        ];
        $user = User::create($data);

        return $user;
    }

    public function loginUser()
    {
        $user = User::where('email', 'test@test.de')->first();
        Auth::login($user);
    }

    public function eventPusher()
    {
        event(new OrderStatusUpdated(['status' => 200]));
        return "Event sended";
    }

    public function showPusher()
    {            
        return view('pusher', ['orderId' => 200]);
    }
}
