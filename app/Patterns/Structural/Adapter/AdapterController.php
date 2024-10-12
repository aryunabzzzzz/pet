<?php

namespace App\Patterns\Structural\Adapter;

class AdapterController
{
    public function adapter(): array
    {
        $result = [];
        $jpg = new JpgImage('example1.jpg');
        $result['jpg'] = $jpg->loadImage();

        $svg = new SvgImage('example2.svg');
        $svgAdapter = new SvgImageAdapter($svg);
        $result['svg'] = $svgAdapter->loadImage();

        return $result;
    }
}
