<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Cpyree\Id3\Metadata\Id3Metadata;

/**
 * Command object for tagt view.
 */
class ViewCommand extends TagtCommand
{
    protected function configure()
    {
        $this
            ->setDescription('View ID3 tags for MP3s in the staging area')
            ->addArgument('file', InputArgument::REQUIRED, 'Directory')
            ->addOption('target', 't', InputOption::VALUE_REQUIRED, 'Specify a name for the target directory', null);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');
        $file = getcwd().'/'.$file;
        $output->writeln($file);
        $id3Metadata = new Id3Metadata($file);
        $output->writeln($id3Metadata->getTitle());
    }
}
