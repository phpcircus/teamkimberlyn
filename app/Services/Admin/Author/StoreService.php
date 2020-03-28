<?php

namespace App\Services\Admin\Author;

use App\Services\Admin\Author\StoreValidationService;
use PerfectOblivion\ActionServiceResponder\Services\Service;
use PerfectOblivion\ActionServiceResponder\Services\Traits\SelfCallingService;
use Wink\WinkAuthor;

class StoreService extends Service
{
    use SelfCallingService;

    /** @var \App\Services\Admin\Author\StoreValidationService */
    protected $validator;

    /** @var \Wink\WinkAuthor */
    private $authors;

    /**
     * Construct a new StoreService.
     *
     * @param  \Wink\WinkAuthor  $authors
     * @param  \App\Services\Admin\Author\StoreValidationService  $validator
     */
    public function __construct(WinkAuthor $authors, StoreValidationService $validator)
    {
        $this->authors = $authors;
        $this->validator = $validator;
    }

    /**
     * Handle the call to the service.
     *
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function run(array $parameters = [])
    {
        $existing = $this->authors->where('id', $parameters['id'])->first();

        if (! $existing) {
            $existing = $this->authors->make(['id' => $parameters['id']]);
        }

        if ($password = $parameters['password']) {
            $parameters['password'] = bcrypt($password);
        } else {
            unset($parameters['password']);
        }

        $existing->fill($parameters);

        return $existing->save();
    }
}
