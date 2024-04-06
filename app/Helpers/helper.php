<?php
use App\Models\User;
use App\Models\Application;
use App\Models\Endpoint;
use App\Models\UserApplication;
use App\Models\Log;
use Illuminate\Support\Facades\Http;

function callEndpoints($app_id)
{
    $app = Application::find($app_id);
    $endpoints = $app->endpoints;
    $results = [];
    foreach($endpoints as $endpoint){
        $status_code = 500;
        if(strtolower($endpoint->method) == 'post' ){
            $response =  Http::post($endpoint->url);
            $status_code = $response->status();
        } elseif(strtolower($endpoint->method) == 'put' ){
            $response =  Http::put($endpoint->url);
            $status_code = $response->status();
        } elseif(strtolower($endpoint->method) == 'delete' ){
            $response =  Http::delete($endpoint->url);
            $status_code = $response->status();
        } elseif(strtolower($endpoint->method) == 'get') {
            $response =  Http::get($endpoint->url);
            $status_code = $response->status();
        } else {
            $response = exec($endpoint->url, $output, $status);
            $status_code = $status;
        }

        $results[] = [
            'endpoint' => $endpoint->url,
            'status' => $status_code,
        ];

        $log = new Log();
        $log->application_id = $app_id;
        $log->endpoint_id = $endpoint->id;
        $log->status = $status_code;
        $log->method = $endpoint->method;
        $log->ip = request()->ip();
        $log->user_agent = request()->header('User-Agent');
        $log->save();
    }
    return $results;
}

function statusCodeColor($status_code){
    //return color based on status code as hex
    if($status_code >= 200 && $status_code <= 302){
        return '#10b981';
    } elseif($status_code > 302 && $status_code < 400){
        return '#f59e0b';
    } elseif($status_code >= 400 && $status_code < 500){
        return '#f87171';
    } elseif($status_code >= 500){
        return '#f87171';
    }

    return '#f87171';
}
