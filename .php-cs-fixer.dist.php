<?php

return (new PhpCsFixer\Config())
    ->setRules(
        [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_syntax' => ['syntax' => 'short'],
            'declare_strict_types' => true,
            'strict_param' => true,
            'native_function_invocation' => [
                'include' => ['@all'],
                'exclude' => ['service', 'tagged_iterator'],
            ],
            'no_extra_blank_lines' => [
                'tokens' => [
                    'break',
                    'continue',
                    'extra',
                    'return',
                    'throw',
                    'use',
                    'parenthesis_brace_block',
                    'square_brace_block',
                    'curly_brace_block',
                ],
            ],
            'array_indentation' => true,
            'echo_tag_syntax' => true,
            'no_unneeded_final_method' => false,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_imports' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_order' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'phpdoc_annotation_without_dot' => false,
            'phpdoc_to_comment' => ['ignored_tags' => ['todo', 'psalm-suppress']],
            'ordered_traits' => false,
            'php_unit_method_casing' => ['case' => 'snake_case'],
            'no_leading_namespace_whitespace' => true,
            'single_blank_line_at_eof' => true,
            'trim_array_spaces' => true,
            'single_line_empty_body' => true,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
            'single_line_throw' => false,
        ]
    )
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(
                [
                    'src',
                    'tests',
                ]
            )
    );
