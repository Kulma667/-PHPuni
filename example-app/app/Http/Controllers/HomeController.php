<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function Users()
    {
        $url = 'http://uniapi.somee.com/Home/GetUsers';
        $response = Http::post($url);

    
    if ($response->successful()) {
        $responseData = $response->json();
        return response()->json($responseData);
    } else {
        $errorResponse = [
            'status' => $response->status(),
            'message' => $response->body(),
        ];
        return response()->json($errorResponse, $response->status());
    }
    }
    public function User(Request $request)
    {
        $id = $request->input('id');
        $act = $request->input('act');
        $formData = [
            'id' => $id,
            'ReqAction' => $act,
        ];
        $url = 'http://uniapi.somee.com/Home/Index';
        $client = new Client();
        $response = Http::asMultipart()->post($url, $formData);
        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        } else {
            return response();
        }
    }
    public function CreateUser(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $sex = $request->input('sex');
        $act = $request->input('act');
        $formData = [
            'id' => $id,
            'name'=> $name,
            'email'=> $email,
            'password'=> $password,
            'sex'=> $sex,
            'ReqAction' => $act,

        ];
        $url = 'http://uniapi.somee.com/Home/Index';
        $client = new Client();
        $response = Http::asMultipart()->post($url, $formData);
        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        } else {
            return response();
        }
    }
    public function ChangePass(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');
        $act = $request->input('act');
        $formData = [
            'id' => $id,
            'password'=> $password,
            'ReqAction' => $act,

        ];
        $url = 'http://uniapi.somee.com/Home/Index';
        $client = new Client();
        $response = Http::asMultipart()->post($url, $formData);
        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        } else {
            return response();
        }
    }
    // public function Base()
    // {
    //     // $users = DB::select("CALL AllStudetns()");
    //     $users = DB::table('studentsuib')->get();
    //     return response()->json($users);;
    // }
    public function Token(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $formData = [
            'login' => $login,
            'password'=> $password,
        ];
        $url = 'https://localhost:7196/Home/Index';
        $client = new Client();
        $response = Http::asMultipart()->post($url, $formData);
        if ($response->getStatusCode() === 200) {
            return $response->getBody();
        } else {
            return response();
        }
    }
    // public function CreateUser()
    // {
        
    // }


}
