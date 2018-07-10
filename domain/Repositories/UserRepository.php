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

namespace Phosphorum\Domain\Repositories;

use Phalcon\Platform\Domain\AbstractRepository;
use Phosphorum\Domain\Entities\UserEntity;

/**
 * Phosphorum\Domain\Repositories\UserRepository
 *
 * @method UserEntity getEntity()
 *
 * @package Phosphorum\Domain\Repositories
 */
class UserRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     *
     * @param UserEntity $entity
     */
    public function __construct(UserEntity $entity)
    {
        parent::__construct($entity);
    }
}
