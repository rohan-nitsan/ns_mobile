<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Command;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Connection;
/*
 * This file is part of the TYPO3 CMS project. [...]
 */

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearRecords extends Command
{
    protected function configure():void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tx_nsmobile_domain_model_mobiles')
            ->delete(
                'tx_nsmobile_domain_model_mobiles',
                ['deleted' => (int)1],
                [Connection::PARAM_INT]
            );
            if($result){
                return Command::SUCCESS;
            }else{
                return Command::FAILURE;
            }
        
    }
}
