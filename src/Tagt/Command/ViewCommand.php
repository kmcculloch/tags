<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command object for tagt view.
 */
class ViewCommand extends TagtCommand
{
    protected function configure()
    {
        $this->setDescription('View ID3 tags for MP3s in the staging area');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Stage directory: '.$this->getParameter('stage_dir'));
    }
}
