<?php

namespace DesignPatterns\Adapter;

interface PrintInterface
{
    public function printWeak(): void;
    public function printStrong(): void;
}
