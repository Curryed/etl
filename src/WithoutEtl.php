<?php

declare(strict_types=1);

namespace NereaEnrique\Etl;

final class WithoutEtl
{
    public function fromArrayToArray(array $input): array
    {
        $output = [];

        foreach ($input as $key => $item) {
            if (false === $this->isRowValid($item)) {
                continue;
            }

            $output[] = [
                'age' => $item['age'],
                'fullname' => $item['name'].' '.$item['lastname'],
            ];
        }

        return $output;
    }

    public function fromJsonToArray(string $path): array
    {
        if (false === \file_exists($path)) {
            return [];
        }

        $json = \file_get_contents($path);
        if (false === \is_string($json)) {
            return [];
        }

        $data = \json_decode($json, true);
        if (false === \is_array($data)) {
            return [];
        }

        return $this->fromArrayToArray($data);
    }

    private function isRowValid(mixed $item): bool
    {
        return \array_key_exists('name', $item)
            && \array_key_exists('lastname', $item)
            && \array_key_exists('age', $item);
    }
}
