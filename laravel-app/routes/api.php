<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatMessageController;
use App\Events\TestEvent;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/messages', [ChatMessageController::class, 'index']);

Route::post('/chat-messages', [ChatMessageController::class, 'store']);

Route::get('/broadcast', function()
{
    broadcast(new TestEvent());
    return "broadcast";
});
