<?php

namespace Helpers;

class VerifyCompletedProfileHelper
{
    public static function verifyCompletedProfile()
    {
        if(!auth()->user()->completed_profil){
            return redirect()->route('artisan.completProfile');
        }
    }
}
