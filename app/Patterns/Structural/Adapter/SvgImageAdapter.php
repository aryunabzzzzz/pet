<?php

namespace App\Patterns\Structural\Adapter;

class SvgImageAdapter implements ImageInterface
{
    private SvgImage $svgImage;

    public function __construct(SvgImage $svgImage)
    {
        $this->svgImage = $svgImage;
    }

    public function loadImage(): string
    {
        $imageToFormat = $this->svgImage->loadSvgImage();
        return $this->format($imageToFormat);
    }

    protected function format(string $image): string
    {
        $oldImage = $image;
        $pattern = '/(\w+.svg$)/';
        $matches = [];
        if (preg_match($pattern, $oldImage, $matches))
        {
            $newImage = $matches[0];
            $newImage = str_replace('.svg', '.jpg', $newImage);
        } else {
            throw new \Exception('Invalid image format');
        }
        return "Загрузка изображения в формате jpg: $newImage";
    }
}
