<?php

namespace DesignPatternsTest\Adapter;

use DesignPatterns\Adapter\Banner;
use DesignPatternsTest\TestCase;

class BannerTest extends TestCase
{
    /**
     * @dataProvider stringWithParenProvider
     */
    public function testShowWithParen(string $str, string $expected)
    {
        $banner = new Banner($str);
        ob_start();
        $banner->showWithParen();
        $actual = ob_get_clean();
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider stringWithAsterProvider
     */
    public function testShowWithAster(string $str, string $expected)
    {
        $banner = new Banner($str);
        ob_start();
        $banner->showWithAster();
        $actual = ob_get_clean();
        $this->assertSame($expected, $actual);
    }

    public function stringWithParenProvider()
    {
        return [
            ['Opps!', "(Opps!)\n"],
            ['ウェーイｗｗｗ', "(ウェーイｗｗｗ)\n"],
        ];
    }

    public function stringWithAsterProvider()
    {
        return [
            ['Opps!', "*Opps!*\n"],
            ['ウェイウェイｗ', "*ウェイウェイｗ*\n"],
        ];
    }
}
