<?php

declare(strict_types = 1);

namespace drupol\PhpspecRequires;

use drupol\PhpspecRequires\Maintainer\PhpspecRequiresMaintainer;
use PhpSpec\Extension;
use PhpSpec\ServiceContainer;

class PhpspecRequires implements Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(ServiceContainer $container, array $params)
    {
        $container->define(
            'runner.maintainers.requires',
            static function (ServiceContainer\IndexedServiceContainer $c) {
                return new PhpspecRequiresMaintainer();
            },
            ['runner.maintainers']
        );
    }
}
