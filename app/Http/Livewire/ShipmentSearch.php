<?php

namespace App\Http\Livewire;

use App\Models\Shipment;
use App\Models\Status;
use Livewire\Component;

class ShipmentSearch extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.shipment-search', [
            'shipment' => Shipment::where('tracking_code', '=', $this->search)
                ->first()
        ]);
    }
}
