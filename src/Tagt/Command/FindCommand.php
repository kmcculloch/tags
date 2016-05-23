<?php
// vim: set ft=php.symfony :

namespace Tagt\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command object for tagt find.
 */
class FindCommand extends Command
{
    private $parameters;

    /**
     * Class constructor.
     *
     * @param string     $name
     * @param Parameters $parameters
     */
    public function __construct($name, $parameters)
    {
        parent::__construct($name);
        $this->parameters = $parameters;
    }

    protected function configure()
    {
        $this
            ->setName('find')
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

        $output->writeln('Parameter: '.$this->parameters->get('stage_dir'));
        $output->writeln('Search string: '.$searchString);
    }
}
