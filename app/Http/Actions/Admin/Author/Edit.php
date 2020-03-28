<?php

namespace App\Http\Actions\Admin\Author;

use App\Http\Responders\Admin\Author\EditResponder;
use Inertia\Response;
use PerfectOblivion\ActionServiceResponder\Actions\Action;

class Edit extends Action
{
    /** @var \App\Http\Responders\Admin\Author\EditResponder **/
    private $responder;

    /**
     * Construct a new Edit.
     *
     * @param  \App\Http\Responders\Admin\Author\EditResponder  $responder
     */
    public function __construct(EditResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     */
    public function __invoke($id = null): Response
    {
        return $this->responder->withPayload(['id' => $id])->respond();
    }
}
