<?php

namespace App\Http\Actions\Admin\Author;

use App\Http\Responders\Admin\Author\IndexResponder;
use App\Services\Admin\Author\IndexService;
use Illuminate\Http\Request;
use Inertia\Response;
use PerfectOblivion\ActionServiceResponder\Actions\Action;

class Index extends Action
{
    /** @var \App\Http\Responders\Admin\Author\IndexResponder */
    private $responder;

    /**
     * Construct a new Author Index action.
     *
     * @param  \App\Http\Responders\Admin\Author\IndexResponder  $responder
     */
    public function __construct(IndexResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     *
     *  @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request): Response
    {
        $authors = IndexService::call();

        return $this->responder->withPayload($authors)->respond();
    }
}
