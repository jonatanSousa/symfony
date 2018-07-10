<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 7/4/2018
 * Time: 3:53 PM
 */

namespace App\DataFixtures;


use App\Entity\MicroPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        for($i = 0 ; $i < 50; $i++) {

            $micropost = new micropost;
            $micropost->setText('random teaxt '.rand(0,1000));
            $micropost->setTime(new \DateTime('2018-03-05'));

            $manager->persist($micropost);
        }
        $manager->flush();
    }
}