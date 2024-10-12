<?php

namespace App\Patterns\Structural\Adapter;

class SvgImage
{
    private string $svgImagePath;
    public function __construct(string $svgImagePath)
    {
        $this->svgImagePath = $svgImagePath;
    }

    public function loadSvgImage(): string
    {
        return "Загрузка изображения в формате svg: $this->svgImagePath";
    }

}
