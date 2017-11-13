<?php
/*
 * This file is part of the zzAgenda package.
 *
 * (c) OV Corporation SAS <contact@ov-corporation.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZZFramework\Http\Event;


final class HttpEvents
{
    const REQUEST = 'core.request';

    const RESOLVER = 'core.resolver';

    const CONTROLLER = 'core.controller';

    const RESPONSE = 'core.response';

    const TERMINATE = 'core.terminate';

    const EXCEPTION = 'core.exception';
}