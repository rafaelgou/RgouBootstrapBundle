<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rgou\BootstrapBundle\Command;

use Rgou\BootstrapBundle\Generator\DoctrineCrudGenerator;
use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand as BaseGenerateDoctrineCrudCommand;

/**
 * Generates a CRUD for a Doctrine entity.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class GenerateDoctrineCrudCommand extends BaseGenerateDoctrineCrudCommand
{
    private $generator;

    /**
     * @see Command
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('rgou:generate:bootstrap-crud')
            ->setDescription('Generates a CRUD based on a Doctrine entity with Twitter Boostrap Theme')
            ->setAliases(array())
            ->setHelp(<<<EOT
The <info>rgou:generate:bootstrap-crud</info> command generates a CRUD based on a Doctrine entity.

The default command only generates the list and show actions.

<info>php app/console rgou:generate:bootstrap-crud --entity=AcmeBlogBundle:Post --route-prefix=post_admin</info>

Using the --with-write option allows to generate the new, edit and delete actions.

<info>php app/console doctrine:generate:crud --entity=AcmeBlogBundle:Post --route-prefix=post_admin --with-write</info>
EOT
            );
    }

    protected function getGenerator()
    {
        if (null === $this->generator) {
            $this->generator = new DoctrineCrudGenerator(
                $this->getContainer()->get('filesystem'),
                __DIR__.'/../Resources/skeleton/crud',
                $this->getContainer()
            );
        }

        return $this->generator;
    }
}
