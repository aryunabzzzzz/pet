<?php

namespace App\Orchid\Screens\Customer;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Orchid\Layouts\Customers\CustomerCreateModal;
use App\Orchid\Layouts\Customers\CustomerListTable;
use App\Services\CustomerService;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class CustomerListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'customers' => Customer::filters()->paginate(15)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Покупатели';
    }

    public function description(): ?string
    {
        return 'Список покупателей';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать покупателя')
                ->modal('createCustomer')
                ->icon('pencil')
                ->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CustomerListTable::class,
            Layout::modal('createCustomer', CustomerCreateModal::class)
                ->title('Создание покупателя')
                ->applyButton('Создать')
        ];
    }

    public function create(StoreCustomerRequest $request)
    {
        $customerService = new CustomerService();
        $customerService->store($request->storeCustomerDTO());
    }
}
