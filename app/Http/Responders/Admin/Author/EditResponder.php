<?php

namespace App\Http\Responders\Admin\Author;

use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use PerfectOblivion\ActionServiceResponder\Responders\Responder;
use Wink\WinkAuthor;

class EditResponder extends Responder
{
    /**
     * Send a response.
     */
    public function respond(): Response
    {
        $id = $this->payload['id'];

        if ($id === 'new') {
            $author = WinkAuthor::make(['id' => Str::uuid()]);
        } else {
            $author = WinkAuthor::where('id', $id)->firstOrFail();
        }

        return Inertia::render('Wink/screens/team/Edit', [
            'id' => $id,
            'author' => $author,
        ]);
    }
}
