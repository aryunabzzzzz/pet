<?php

namespace App\Orchid\Layouts\Customers;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CustomerListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'customers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'имя')->cantHide()->sort(),
            TD::make('phone','телефон'),
            TD::make('email', 'эл.почта'),
            TD::make('birthday', 'дата рождения')->render(function ($customer) {
                return $customer->getBirthday() == null ? 'не указана' : $customer->getBirthday();
            })->popover('не забудь начислить супер бонусы на др')
        ];
    }
}
