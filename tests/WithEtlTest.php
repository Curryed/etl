<?php

declare(strict_types=1);

namespace Tests\NereaEnrique\Etl;

use function Flow\ETL\Adapter\JSON\from_json;
use function Flow\ETL\DSL\from_array;
use function Flow\ETL\DSL\to_array;

use NereaEnrique\Etl\WithEtl;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class WithEtlTest extends TestCase
{
    #[Test]
    public function that_from_array_to_array(): void
    {
        $actual = [];
        (new WithEtl())(
            from_array([
                ['name' => 'John', 'lastname' => 'Doe', 'age' => 30],
                ['name' => 'Jane', 'lastname' => 'Doe', 'age' => 25],
            ]),
            to_array($actual)
        );

        self::assertSame(
            [
                [
                    'age' => 30,
                    'fullname' => 'John Doe',
                ],
                [
                    'age' => 25,
                    'fullname' => 'Jane Doe',
                ],
            ],
            $actual
        );
    }

    #[Test]
    public function that_from_array_to_array_without_age(): void
    {
        $actual = [];
        (new WithEtl())(
            from_array([
                ['name' => 'John', 'lastname' => 'Doe', 'age' => 30],
                ['name' => 'Jane', 'lastname' => 'Doe'],
            ]),
            to_array($actual)
        );

        self::assertSame(
            [
                [
                    'age' => 30,
                    'fullname' => 'John Doe',
                ],
                [
                    'fullname' => 'Jane Doe',
                ],
            ],
            $actual
        );
    }

    #[Test]
    public function that_from_json_to_array(): void
    {
        $actual = [];
        (new WithEtl())(
            from_json(__DIR__.'/fixtures/actual/from-json.json'),
            to_array($actual)
        );

        self::assertSame(
            [
                [
                    'age' => 30,
                    'fullname' => 'John Doe',
                ],
                [
                    'age' => 25,
                    'fullname' => 'Jane Doe',
                ],
            ],
            $actual
        );
    }
}
