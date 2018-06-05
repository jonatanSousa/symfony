<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 6/4/2018
 * Time: 5:52 PM
 */

namespace App\service;


use Psr\Log\LoggerInterface;

class Greeting
{

    /**
     * @var LoggerInterface
     */
    private $logger;


    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function greet(string $name):string
    {
        $this->logger->info("greeted $name");
        return 'hello '.$name;
    }
}