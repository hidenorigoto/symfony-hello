<?php
/**
 * PHP version 5.5
 *
 * Copyright (c) 2014 GOTO Hidenori <hidenorigoto@gmail.com>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    Example_HelloBundle
 * @copyright  2014 GOTO Hidenori <hidenorigoto@gmail.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @since      File available since Release 1.0.0
 */
namespace Example\HelloBundle\Command;

use Doctrine\ORM\EntityManager;
use Nelmio\Alice\Fixtures;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package    Example_HelloBundle
 * @copyright  2014 GOTO Hidenori <hidenorigoto@gmail.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @since      Class available since Release 1.0.0
 */
class InitDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('hello:init-data')
            ->setDescription('データクリア後フィクスチャで初期化する');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $objectManager EntityManager */
        $objectManager = $this->getContainer()->get('doctrine')->getManager();

        $connection = $objectManager->getConnection();
        $connection->exec('delete from RentalDetail');
        $connection->exec('delete from Rental');
        $connection->exec('delete from Stock');
        $connection->exec('delete from Title');
        $connection->exec('delete from Member');

        $this->getApplication()->find('hello:load-from-fixture')->run($input, $output);

        $output->writeln('Done');
    }
}