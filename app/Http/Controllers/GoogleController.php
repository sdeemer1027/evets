<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_HangoutsChat;

class GoogleController extends Controller
{
    // Redirect the user to Google's OAuth 2.0 server

/*
https://developers.google.com/workspace/chat/api/reference/rest?apix=true
https://console.cloud.google.com/apis/credentials/oauthclient/490704328287-kg32r5dtoag6uivbtbqnl5k8kifie6bb.apps.googleusercontent.com?project=officechat-427712

*/


    public function redirectToGoogle()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(route('google.callback'));
        $client->addScope('https://chat.googleapis.com');


dd($client);



        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }

    // Handle Google's OAuth 2.0 server response
    public function handleGoogleCallback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(route('google.callback'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);
        $client->setAccessToken($token);

        // Save the token to session or database as per your application needs
        session(['google_access_token' => $token]);

        return redirect()->route('home');
    }

    // Example function to send a message to Google Chat
    public function sendMessageToChat()
    {
        $client = new Google_Client();
        $client->setAccessToken(session('google_access_token'));

        $chatService = new Google_Service_HangoutsChat($client);

        $message = new \Google_Service_HangoutsChat_Message();
        $message->setText('Hello from Laravel!');

        $chatService->spaces_messages->create('spaces/your_space_id', $message);

        return 'Message sent!';
    }
}
