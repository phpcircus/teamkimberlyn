<?php

namespace App\Http\Actions\Admin\Post;

use App\Http\Responders\Admin\Post\DeleteResponder;
use App\Models\Post;
use App\Services\Admin\Post\DeleteService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PerfectOblivion\ActionServiceResponder\Actions\Action;

class Delete extends Action
{
    /** @var \App\Http\Responders\Admin\Post\DeleteResponder * */
    private $responder;

    /**
     * Construct a new Delete.
     *
     * @param  \App\Http\Responders\Admin\Post\DeleteResponder  $responder
     */
    public function __construct(DeleteResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function __invoke(Request $request, Post $post): RedirectResponse
    {
        DeleteService::call();

        return $this->responder->respond();
    }
}
