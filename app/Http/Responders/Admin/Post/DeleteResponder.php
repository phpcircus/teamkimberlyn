<?php

namespace App\Http\Responders\Admin\Post;

use Illuminate\Http\RedirectResponse;
use PerfectOblivion\ActionServiceResponder\Responders\Responder;

class DeleteResponder extends Responder
{
    /**
     * Send a response.
     */
    public function respond(): RedirectResponse
    {
        flash('success', 'Post deleted successfully!');

        return redirect()->route('admin.posts.index');
    }
}
