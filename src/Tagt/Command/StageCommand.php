<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command object for tagt stage.
 */
class StageCommand extends TagtCommand
{
    protected function configure()
    {
        $this
            ->setDescription('Stage a directory of MP3s for tagging')
            ->addArgument(
                'directory',
                InputArgument::REQUIRED,
                'Directory'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dir = $input->getArgument('directory');

        $output->writeln('Stage directory: '.$this->getParameter('stage_dir'));
        $output->writeln('Input directory: '.$dir);
    }
}
