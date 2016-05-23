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
                'dir',
                InputArgument::REQUIRED,
                'Directory'
            )
            ->addOption(
                'target',
                't',
                InputOption::VALUE_REQUIRED,
                'Specify a name for the target directory',
                null
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dir = $input->getArgument('dir');

        // Make sure we're dealing with a directory.
        if (!is_dir($dir)) {
            throw new \Exception('Not a directory');
        }

        // Search the directory for files with '.mp3' at the end.
        $files = scandir($dir);
        $files = array_filter($files, function ($v) {
            return preg_match('/\.mp3$/', $v);
        });
        if (!$files) {
            throw new \Exception('No MP3s found');
        }

        // Get the name of the target directory, or grab a timestamp string
        // to use as the directory name.
        $target = $input->getOption('target') ?: time();

        // Get the base staging directory set up.
        $stageDir = $this->getParameter('stage_dir');
        if (!is_dir($stageDir)) {
            mkdir($stageDir);
        }

        // Create the target directory inside the staging directory.
        $target = $stageDir.'/'.$target;
        if (is_dir($target)) {
            exec("rm -rf $target");
        } else {
            mkdir($target);
        }

        // Copy the MP3 files into the staging area.
        $cwd = getcwd();
        foreach ($files as $file) {
            copy($cwd.'/'.$dir.'/'.$file, $target.'/'.$file);
        }

        // Let the user know what happened.
        $output->writeln('MP3s added to: '.$target);
        $output->writeln($files);
    }
}
