<?php

namespace App\Orchid\Layouts\Customers;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CustomerCreateModal extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('name')->required()->title('имя'),
            Input::make('email')->title('эл.почта'),
            Input::make('phone')->required()->title('телефон'),
            DateTimer::make('birthday')->format('Y-m-d')->title('дата рождения'),
            Input::make('password')->required()->title('Пароль')
        ];
    }
}
