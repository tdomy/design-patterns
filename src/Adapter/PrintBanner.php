<?php

namespace DesignPatterns\Adapter;

class PrintBanner implements PrintInterface
{
    private Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function printWeak(): void
    {
        $this->banner->showWithParen();
    }

    public function printStrong(): void
    {
        $this->banner->showWithAster();
    }
}
