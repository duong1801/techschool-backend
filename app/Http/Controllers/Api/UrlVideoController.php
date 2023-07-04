<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Clientl;
use Illuminate\Support\Facades\Http;

class UrlVideoController extends Controller
{
    public function urlVideo(Request $request)
    {
        // header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");

        $id = $request->id;

        $response = Http::withHeaders([
            'SproutVideo-Api-Key' => '0536a73155705b50e632f3f75d8cc2c2'
        ])->get('https://api.sproutvideo.com/v1/videos/' . $id);

        $status_code = 200;
        $message = 'successfully';
        $result = json_decode($response, TRUE);
        $ifame = $result['embed_code'];

        $regex = "/(?<=src=').*?(?=[\?'])/";

        preg_match($regex, $ifame, $matches);

        return response()->json([
            'status_code' => $status_code,
            'massage' => $message,
            'url' => $matches[0]
        ]);
    }
}
