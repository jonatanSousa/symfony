<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 6/5/2018
 * Time: 12:17 PM
 */

namespace App\Command;


use App\Service\Greeting;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command
{
    /**
     * @var Greeting
     */
    private $greeting;

    public function __construct(Greeting  $greeting)
    {
        $this->greeting = $greeting;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:say-hello')
            ->setDescription('says hello')
            ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln([
            'helloooo from app',
            '*********',
            ''
        ]);

        $output->writeln($this->greeting->greet($name));
    }

}