<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function saveToken(Request $request)
    {
        // dd($request->token);
        // $user = User::find(Auth::user()->id);
        // $user->update(['device_key' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $SERVER_API_KEY = 'AAAAWILSbQQ:APA91bECw_HY_bIaHkmrOHbasUCQavuW_VIwzf2ZbSrArQojuQcfC5R0utwaTZ18_QDcrmjyknlMBWMnJjQJbPYCDT_AOaFfqSl34vFNYuBVI9DxjchzTCUWub96sIs5Ro7Fy92VQorA';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        // dd($response);
        return response()->json(['token saved successfully.',$response]);
    }
}
