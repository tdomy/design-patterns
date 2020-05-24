<?php

namespace DesignPatterns\Adapter;

class Banner
{
    private string $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }

    public function showWithParen(): void
    {
        printf("(%s)\n", $this->str);
    }

    public function showWithAster(): void
    {
        printf("*%s*\n", $this->str);
    }
}
