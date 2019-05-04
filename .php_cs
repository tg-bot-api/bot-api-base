<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'declare_strict_types' => true,
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
        'array_syntax' => ['syntax' => 'short'],
        'date_time_immutable' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'psr4' => true,
        'heredoc_to_nowdoc' => true,
        'logical_operators' => true,
        'random_api_migration' => true,
        'simplified_null_return' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'ternary_to_null_coalescing' => true,
        'visibility_required' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['author']],
        'native_function_invocation' => true,
        'no_useless_return' => true,
        'concat_space' => false,
    ])
    ->setFinder($finder)
;
