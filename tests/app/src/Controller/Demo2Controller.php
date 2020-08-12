<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace Spiral\Tests\App\Controller;

use Spiral\Domain\Annotation\Guarded;
use Spiral\Domain\Annotation\GuardNamespace;

/**
 * @GuardNamespace("demo")
 */
class Demo2Controller
{
    /**
     * @Guarded("do")
     */
    public function do1()
    {
        return 'ok';
    }

    /**
     * @Guarded("do", else="notFound")
     */
    public function do2()
    {
        return 'ok';
    }

    /**
     * @Guarded("do", else="error")
     */
    public function do3()
    {
        return 'ok';
    }

    /**
     * @Guarded("do", else="badAction")
     */
    public function do4()
    {
        return 'ok';
    }
}
