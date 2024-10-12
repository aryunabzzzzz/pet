<?php

namespace App\Patterns\Structural\Composite;

class CompositeController
{
    public function composite(): string|array
    {
        $film1 = new Film('Гарри Поттер и философский камень', 2001);
        $film2 = new Film('Гарри Поттер и Тайная комната', 2002);
        $film3 = new Film('Гарри Поттер и Орден Феникса', 2003);

        $mult1 = new Film('Душа', 2020);
        $mult2 = new Film('В поисках Немо', 2003);

        $film = new Film('Время', 2011);

        $category1 = new FilmCategory('Гарри Поттер');
        $category2 = new FilmCategory('Мультфильмы');
        $category3 = new FilmCategory('Все');

        $category1->addFilms($film1);
        $category1->addFilms($film2);
        $category1->addFilms($film3);

        $category2->addFilms($mult1);
        $category2->addFilms($mult2);

        $category3->addFilms($category1);
        $category3->addFilms($category2);
        $category3->addFilms($film);

        return $category3->getTitle();
    }
}
