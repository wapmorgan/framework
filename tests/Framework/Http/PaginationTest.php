<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace Spiral\Tests\Framework\Http;

use Spiral\Core\Exception\ScopeException;
use Spiral\Http\PaginationFactory;
use Spiral\Tests\Framework\HttpTest;

class PaginationTest extends HttpTest
{
    public function testPaginate(): void
    {
        $this->assertSame('1', (string)$this->get('/paginate', [

        ])->getBody());
    }

    public function testPaginateError(): void
    {
        $this->expectException(ScopeException::class);

        $this->app->get(PaginationFactory::class)->createPaginator('page');
    }

    public function testPaginate2(): void
    {
        $this->assertSame('2', (string)$this->get('/paginate', [
            'page' => 2
        ])->getBody());
    }
}
