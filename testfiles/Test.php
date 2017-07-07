<?php

use PHPUnit\Framework\TestCase;

require_once('../model/Settings.php');

/**
 * @covers Parametres
 */
final class Test extends TestCase
{

    public function testParamSlogan()
    {

        $slogan = 'tamere';
        $param = new Settings();
        $param->hydrate($data);

        $this->assertEquals(
                $param->setSlogan($slogan), ''
        );
    }

    public function testParamEvenement()
    {
        $data2 = [];
        $event = '';
        $param2 = new Settings($data2);
        $param2->hydrate($data2);

        $this->assertEquals(
                $param2->setEvent($event), ''
        );
    }

    public function testParamMdp()
    {
        $data3 = [];
        $mdp = '';
        $param3 = new Settings($data3);
        $param3->hydrate($data3);

        $this->assertEquals(
                $param3->setPwd($mdp), ''
        );
    }

}
