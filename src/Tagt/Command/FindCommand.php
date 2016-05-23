<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command object for tagt find.
 */
class FindCommand extends TagtCommand
{
    protected function configure()
    {
        $this
            ->setDescription('Find MP3s')
            ->addArgument(
                'search_string',
                InputArgument::REQUIRED,
                'Search string'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $searchString = $input->getArgument('search_string');

        $output->writeln('Stage directory: '.$this->getParameter('stage_dir'));
        $output->writeln('Search string: '.$searchString);
    }
}
