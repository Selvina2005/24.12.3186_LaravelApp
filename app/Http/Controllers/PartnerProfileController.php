<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnerProfileController extends Controller
{
    public function show(Partner $partner)
    {
        $partner->load([
            'events.reviews.user'
        ]);

        return view(
            'partner-profile',
            compact('partner')
        );
    }
}