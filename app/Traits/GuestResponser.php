<?php

namespace App\Traits;
// Email Helper
use App\Mail\EmailTestingMail;
use App\Mail\EventEmailResponser;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Test\Constraint\EmailAddressContains;

trait GuestResponser{

    // General Response for swal response only
    protected function generalSwalResponse($title = "", $text = "", $icon="success", $statusCode = 302, $redirectedRoute = ''){
        // For default the response will return success message
        if ($redirectedRoute) {
            return redirect()
            ->route($redirectedRoute)
            ->with('response', [
                'title' => $title,
                'text' => $text,
                'icon' => $icon
            ]);
        }
        return redirect()
            ->back($statusCode)
            ->with('response', [
                'title' => $title,
                'text' => $text,
                'icon' => $icon
            ]);
    }

    // Specialized Response(s) goes here

    // Event Registration Email Response
    protected function eventEmailResponse( $emailTo = '', $context = '', $respondent = '', $bodyText = '', $link = ''){
        $eventEmail = (object) 'eventEmail';
        $eventEmail->context = $context;
        $eventEmail->respondent = $respondent;
        $eventEmail->bodyText = $bodyText;
        $eventEmail->link = $link ?? 'Tautan Belum Tersedia!';
        Mail::to($emailTo)->send(new EventEmailResponser($eventEmail));
    }
}