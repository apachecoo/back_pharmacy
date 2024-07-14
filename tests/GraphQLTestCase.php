<?php
namespace Tests;

use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class GraphQLTestCase extends BaseTestCase
{
    use MakesGraphQLRequests;
}