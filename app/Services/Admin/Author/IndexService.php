<?php

namespace App\Services\Admin\Author;

use PerfectOblivion\ActionServiceResponder\Services\Service;
use PerfectOblivion\ActionServiceResponder\Services\Traits\SelfCallingService;
use Wink\WinkAuthor;

class IndexService extends Service
{
    use SelfCallingService;

    /** @var \Wink\WinkAuthor */
    private $authors;

    /**
     * Construct a new IndexService.
     *
     * @param  \Wink\WinkAuthor  $authors
     */
    public function __construct(WinkAuthor $authors)
    {
        $this->authors = $authors;
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
        return $this->authors->all();
    }
}
