<?php

namespace App\Http\Livewire;

use App\Models\Shipment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};

final class ShipmentTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Shipment>
     */
    public function datasource(): Builder
    {
        if (auth()->user()->role_id == '2') {
            return Shipment::query()
                ->where('user_id', auth()->id())
                ->latest('id')
                ->join('users', 'shipments.user_id', '=', 'users.id')
                ->select('shipments.*', 'users.name as name');
        }

        return Shipment::query()
            ->latest('id')
            ->join('users', 'shipments.user_id', '=', 'users.id')
            ->select('shipments.*', 'users.name as name');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('tracking_code')
            ->addColumn('origin')
            ->addColumn('destination')
            ->addColumn('expected_delivery_date_formatted', fn(Shipment $model) => Carbon::parse($model->expected_delivery_date)->format('d/m/Y'))
//            ->addColumn('customer_name')
            ->addColumn('customer_email')
//            ->addColumn('customer_phone')
            ->addColumn('created_at_formatted', fn(Shipment $model) => Carbon::parse($model->created_at)->format('d/m/Y'))
            ->addColumn('updated_at_formatted', fn(Shipment $model) => Carbon::parse($model->updated_at)->format('d/m/Y'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),

            Column::make('Carrier', 'name'),

            Column::make('TRACKING CODE', 'tracking_code')
                ->searchable(),

            Column::make('ORIGIN', 'origin')
                ->searchable(),

            Column::make('DST.', 'destination')
                ->searchable(),

            Column::make('E.D.D.', 'expected_delivery_date_formatted', 'expected_delivery_date')
                ->searchable(),

//            Column::make('CUSTOMER NAME', 'customer_name')
//                ->searchable(),

            Column::make('CUSTOMER EMAIL', 'customer_email')
                ->searchable(),

//            Column::make('CUSTOMER PHONE', 'customer_phone')
//                ->searchable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Shipment Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                ->target('')
                ->class('bg-indigo-500 cursor-pointer text-white p-2 mr-1 rounded text-sm hover:bg-indigo-600')
                ->route('shipments.edit', ['shipment' => 'id']),

            Button::make('destroy', 'Delete')
                ->target('')
                ->class('bg-red-500 cursor-pointer text-white p-2 rounded text-sm hover:bg-red-600')
                ->route('shipments.destroy', ['shipment' => 'id'])
                ->method('delete')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Shipment Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($shipment) => $shipment->id === 1)
                ->hide(),
        ];
    }
    */
}
