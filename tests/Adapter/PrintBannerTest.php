<?php

namespace DesignPatternsTest\Adapter;

use DesignPatterns\Adapter\Banner;
use DesignPatterns\Adapter\PrintBanner;
use DesignPatternsTest\TestCase;
use Mockery;

class PrintBannerTest extends TestCase
{
    public function testPrintWeak()
    {
        $banner = Mockery::mock(Banner::class, ['']);
        $banner->shouldReceive('showWithParen')->once();

        $print_banner = new PrintBanner($banner);
        $print_banner->printWeak();
    }

    public function testPrintStrong()
    {
        $banner = Mockery::mock(Banner::class, ['']);
        $banner->shouldReceive('showWithAster')->once();

        $print_banner = new PrintBanner($banner);
        $print_banner->printStrong();
    }
}
