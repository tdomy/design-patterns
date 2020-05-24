<?php

require __DIR__ . '/../vendor/autoload.php';

use DesignPatterns\Adapter\Banner;
use DesignPatterns\Adapter\PrintBanner;
use DesignPatterns\Adapter\PrintInterface;

// interfaceを引数にとる
function callPrint(PrintInterface $pi): void
{
    $pi->printWeak();
    $pi->printStrong();
}

// 実績のあるクラス
$banner = new Banner('デコレーションされる文字列');

// アダプター
$print_banner = new PrintBanner($banner);

callPrint($print_banner);
