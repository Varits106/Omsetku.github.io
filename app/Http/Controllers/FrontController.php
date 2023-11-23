<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }

    public function handle(Request $request)
    {
        $botman = app('botman');

        $userInput = $request->input('user_input');

        $botman->hears('Halo', function (BotMan $bot) {
            $bot->reply('Halo! Ada yang bisa saya bantu?');
        });

        $botman->hears('Apa kabar', function (BotMan $bot) {
            $bot->reply('Saya hanya bot, jadi saya selalu baik-baik saja! Bagaimana dengan Anda?');
        });

        $botman->fallback(function (BotMan $bot) {
            $bot->reply('Maaf, saya tidak mengerti pertanyaan Anda. Silakan coba lagi.');
        });

        $botman->listen();
    }
}
