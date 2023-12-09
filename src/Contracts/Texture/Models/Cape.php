<?php

declare(strict_types=1);

namespace Microwin7\PHPUtils\Contracts\Texture\Models;

use Microwin7\PHPUtils\Request\RequestParamsAbstract;
use Microwin7\PHPUtils\Contracts\Texture\Enum\TextureStorageTypeEnum;

abstract class Cape implements \JsonSerializable
{
    public function __construct(
        /** @psalm-suppress PossiblyUnusedProperty */
        public readonly TextureStorageTypeEnum          $textureStorageType,
        public readonly string                          $data,
        /** @psalm-suppress PossiblyUnusedProperty */
        public readonly string|RequestParamsAbstract    $url
    ) {
    }
}
