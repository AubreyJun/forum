<?php
declare(strict_types=1);

/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-present Phalcon Team and contributors               |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file LICENSE.txt.                             |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/

namespace Phosphorum\Core;

use Phalcon\DiInterface;
use Phalcon\Escaper;
use Phalcon\Events\ManagerInterface;
use Phalcon\Filter;
use Phalcon\Http\Response;
use Phalcon\Tag;
use Phosphorum\Core\Modules\AbstractModule;
use Phosphorum\Core\Providers\ConfigProvider;
use Phosphorum\Core\Providers\DispatcherProvider;
use Phosphorum\Core\Providers\LoggerProvider;
use Phosphorum\Core\Providers\SessionProvider;
use Phosphorum\Core\Providers\UrlResolverProvider;
use Phosphorum\Core\Providers\ViewProvider;
use Phosphorum\Core\Providers\VoltProvider;

/**
 * Phosphorum\Core\Module
 *
 * @package Phosphorum\Core
 */
class Module extends AbstractModule
{
    /**
     * {@inheritdoc}
     *
     * @param DiInterface      $container
     * @param ManagerInterface $eventManager
     */
    public function __construct(DiInterface $container, ManagerInterface $eventManager)
    {
        parent::__construct($container, $eventManager);

        $this->registerBaseBindings($container);
        $this->registerBaseServices();
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Core';
    }

    /**
     * Register base services.
     *
     * @return void
     */
    protected function registerBaseServices(): void
    {
        $this->serviceRegistrator->registerService(new ConfigProvider());
        $this->serviceRegistrator->registerService(new LoggerProvider());

        $this->serviceRegistrator->registerService(new VoltProvider());
        $this->serviceRegistrator->registerService(new ViewProvider());

        $this->serviceRegistrator->registerService(new UrlResolverProvider());
        $this->serviceRegistrator->registerService(new DispatcherProvider());
        $this->serviceRegistrator->registerService(new SessionProvider());
    }

    /**
     * Registers the base bindings.
     *
     * @param  DiInterface $container
     * @return void
     */
    protected function registerBaseBindings(DiInterface $container): void
    {
        $container->setShared('response', Response::class);
        $container->setShared('filter', Filter::class);
        $container->setShared('tag', Tag::class);
        $container->setShared('escaper', Escaper::class);
    }
}
