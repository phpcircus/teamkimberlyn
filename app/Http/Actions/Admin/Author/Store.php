<?php

namespace App\Http\Actions\Admin\Author;

use App\Http\Responders\Admin\Author\StoreResponder;
use App\Services\Admin\Author\StoreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PerfectOblivion\ActionServiceResponder\Actions\Action;

class Store extends Action
{
    /** @var \App\Http\Responders\Admin\Author\StoreResponder **/
    private $responder;

    /**
     * Construct a new Store.
     *
     * @param  \App\Http\Responders\Admin\Author\StoreResponder  $responder
     */
    public function __construct(StoreResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     *
     *  @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request): RedirectResponse
    {
        StoreService::call(Arr::only($request->input('form'), [
            'id',
            'name',
            'slug',
            'email',
            'password',
            'bio',
            'avatar',
            'meta',
        ]));

        return $this->responder->respond();
    }
}
