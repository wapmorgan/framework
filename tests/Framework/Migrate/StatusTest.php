<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace Spiral\Tests\Framework\Migrate;

use Spiral\Database\Database;
use Spiral\Tests\Framework\ConsoleTest;

class StatusTest extends ConsoleTest
{
    public function testMigrate(): void
    {
        /** @var Database $db */
        $db = $this->app->get(Database::class);
        $this->assertSame([], $db->getTables());

        $out = $this->runCommandDebug('migrate:status');
        $this->assertStringContainsString('not', $out);

        $this->runCommandDebug('migrate:init');

        $out = $this->runCommandDebug('migrate:status');
        $this->assertStringContainsString('No', $out);

        $this->runCommandDebug('cycle:migrate');
        $this->assertSame(1, count($db->getTables()));

        $out = $this->runCommandDebug('migrate:status');
        $this->assertStringContainsString('not executed yet', $out);

        $this->runCommandDebug('migrate');
        $this->assertSame(3, count($db->getTables()));

        $out2 = $this->runCommandDebug('migrate:status');
        $this->assertNotSame($out, $out2);
    }
}
