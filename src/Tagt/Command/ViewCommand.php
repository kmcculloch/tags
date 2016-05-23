<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * tagt find <search>
 */
class ViewCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('view')
            ->setDescription('View ID3 tags')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'Search string'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        // $getID3 = new \getID3();

        // $info = $getID3->analyze($file);
        // var_dump(array_keys($info['tags']['id3v2']));
        // var_dump($info['tags']);
    }
}
