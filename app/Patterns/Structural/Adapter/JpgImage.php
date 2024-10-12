<?php

namespace App\Patterns\Structural\Adapter;

class JpgImage implements ImageInterface
{
    private string $image;

    public function __construct(string $image)
    {
        $this->image = $image;
    }
    public function loadImage(): string
    {
        return "Загрузка изображения в формате jpg: $this->image";
    }
}
