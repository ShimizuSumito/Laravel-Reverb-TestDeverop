<?php
// app/Http/Controllers/ChatMessageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage; // モデルをインポート
use App\Events\TestEvent;

class ChatMessageController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::all();
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        // データの保存
        $chatMessage = new ChatMessage();
        $chatMessage->text = $request->input('text');
        $chatMessage->save();

        broadcast(new TestEvent());

        // 成功レスポンス
        return response()->json(['message' => 'Message added successfully'], 201);
    }
}
