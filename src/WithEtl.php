<?php

declare(strict_types=1);

namespace NereaEnrique\Etl;

use function Flow\ETL\DSL\col;
use function Flow\ETL\DSL\data_frame;

use Flow\ETL\Extractor;
use Flow\ETL\Loader;

final class WithEtl
{
    public function __invoke(Extractor $extractor, Loader $loader): void
    {
        data_frame()
            ->read($extractor)
            ->withEntry('fullname', col('name')
                ->concat(' ')
                ->concat(col('lastname'))
            )
            ->drop('name')
            ->drop('lastname')
            ->write($loader)
            ->run()
        ;
    }
}
