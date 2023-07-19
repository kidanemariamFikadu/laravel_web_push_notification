<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Support\Facades\Notification;
class FirebaseController extends Controller
{
    public function sendNotification()
    {
        return Larafirebase::withTitle('Test Title')
            ->withBody('Test body')
            ->withImage('https://firebase.google.com/images/social.png')
            ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
            ->withSound('default')
            ->withClickAction('https://www.google.com')
            ->withPriority('high')
            ->withAdditionalData([
                'color' => '#rrggbb',
                'badge' => 0,
            ])
            ->sendNotification(['cbfGjQf2dgY2p9tgEKIv_J:APA91bFsrTBfVlajMDcem0RDoOrq5JDFBfpqnn9vxlwaYhwrk9dgWPBr4Q1IbXXG7AuaN_84uOOoQLI9_x1HXiWp2lGGsvcwlTqMk6m1lQXFxI-rcTiQja5u4tYFXFHIT1rY5t-b-6Sx']);

        // Or
        // return Larafirebase::fromArray(['title' => 'Test Title', 'body' => 'Test body'])->sendNotification('cbfGjQf2dgY2p9tgEKIv_J:APA91bFsrTBfVlajMDcem0RDoOrq5JDFBfpqnn9vxlwaYhwrk9dgWPBr4Q1IbXXG7AuaN_84uOOoQLI9_x1HXiWp2lGGsvcwlTqMk6m1lQXFxI-rcTiQja5u4tYFXFHIT1rY5t-b-6Sx');
    }

    public function sendMessage()
    {
        return Larafirebase::withTitle('Test Title')
            ->withBody('Test body')
            ->sendMessage('cbfGjQf2dgY2p9tgEKIv_J:APA91bFsrTBfVlajMDcem0RDoOrq5JDFBfpqnn9vxlwaYhwrk9dgWPBr4Q1IbXXG7AuaN_84uOOoQLI9_x1HXiWp2lGGsvcwlTqMk6m1lQXFxI-rcTiQja5u4tYFXFHIT1rY5t-b-6Sx');

        // Or
        // return Larafirebase::fromArray(['title' => 'Test Title', 'body' => 'Test body'])->sendMessage('cbfGjQf2dgY2p9tgEKIv_J:APA91bFsrTBfVlajMDcem0RDoOrq5JDFBfpqnn9vxlwaYhwrk9dgWPBr4Q1IbXXG7AuaN_84uOOoQLI9_x1HXiWp2lGGsvcwlTqMk6m1lQXFxI-rcTiQja5u4tYFXFHIT1rY5t-b-6Sx');
    }
}
