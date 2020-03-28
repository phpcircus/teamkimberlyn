<?php

namespace App\Http\Responders\Admin\Author;

use Illuminate\Http\RedirectResponse;
use PerfectOblivion\ActionServiceResponder\Responders\Responder;

class StoreResponder extends Responder
{
    /**
     * Send a response.
     */
    public function respond(): RedirectResponse
    {
        flash('success', 'Author submitted successfully!');

        return redirect()->back();
    }
}
