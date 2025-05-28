<?php

declare(strict_types=1);

namespace NereaEnrique\Etl;

use Flow\ETL\Extractor;
use Flow\ETL\Loader;
use function Flow\ETL\DSL\{col, data_frame, from_array, to_array, to_stream};

final class EtlUsage
{
    public function __invoke(Extractor $extractor, Loader $loader)
    {
        $result = [];
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

        return $result;
    }

}
