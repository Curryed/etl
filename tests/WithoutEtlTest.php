<?php

declare(strict_types=1);

namespace Tests\NereaEnrique\Etl;

use NereaEnrique\Etl\WithoutEtl;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class WithoutEtlTest extends TestCase
{
    #[Test]
    public function that_from_array_to_array(): void
    {
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
            (new WithoutEtl())->fromArrayToArray(
                [
                    ['name' => 'John', 'lastname' => 'Doe', 'age' => 30],
                    ['name' => 'Jane', 'lastname' => 'Doe', 'age' => 25],
                ],
            )
        );
    }

    #[Test]
    public function that_from_array_to_array_without_age(): void
    {
        $this->markTestSkipped('This case is not implemented in WithoutEtl yet.');
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
            (new WithoutEtl())->fromArrayToArray(
                [
                    ['name' => 'John', 'lastname' => 'Doe', 'age' => 30],
                    ['name' => 'Jane', 'lastname' => 'Doe'],
                ],
            )
        );
    }

    #[Test]
    public function that_from_json_to_array(): void
    {
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
            (new WithoutEtl())->fromJsonToArray(
                __DIR__.'/fixtures/actual/from-json.json',
            )
        );
    }
}
