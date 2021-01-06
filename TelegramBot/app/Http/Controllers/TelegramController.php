<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function updateActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
    public function sendMessage()
    {
        return view('telegramView');
    }
    public function storeMessge(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required'
        ]);
        $text =  "<b>Name: </b>\n"
        . "$request->name\n"
        . "<b>Message: </b>\n"
        . $request->message;

        Telegram::sendMessage([
            'chat_id' => '-1001386163937',
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        return redirect()->back();
    }
    public function storePhoto(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:jpeg,jpg,png,gif'
        ]);
        $photo = $request->file('file');
        Telegram::sendPhoto([
            'chat_id' => '-1001386163937',
            'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), str_random(10) . '.' . $photo->getClientOriginalExtension()),
            'caption' => 'Photo'
        ]);
        return redirect()->back();
    }
}
