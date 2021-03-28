<?php

namespace App\Traits;

trait AdminResponser{

    // General Response for swal response only
    protected function generalSwalResponse($title = "", $text = "", $icon="success", $statusCode = 302){
        // For default the response will return success message
        return redirect()
            ->back($statusCode)
            ->with('response', [
                'title' => $title,
                'text' => $text,
                'icon' => $icon
            ]);
    }

    // Specialized Response(s) goes here
}