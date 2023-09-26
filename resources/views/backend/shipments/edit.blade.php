<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ URL::previous() }}" class="mr-3 border p-2 rounded hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                     class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd"
                          d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </a>
            {{ __('Edit shipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex-row">
                <form method="POST" action="{{ route('shipments.update', $shipment->id) }}"
                      class="p-6 text-gray-900 w-full md:w-1/2">
                    @csrf
                    @method('PUT')
                    <p class="font-bold text-lg font-sans">Shipment details:</p>
                    <div class="mb-6">
                        <select id="carrier" name="carrier"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                            <option selected disabled>Choose a carrier</option>
                            @foreach($carriers as $carrier)
                                <option
                                    @selected(old('carrier') == $carrier->id || $carrier->id == $shipment->user_id)
                                    value="{{ $carrier->id }}">{{ ucfirst($carrier->name) }}</option>
                            @endforeach
                        </select>
                        @error('carrier')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                            <option selected disabled>Choose a status</option>
                            @foreach($statuses as $status)
                                <option
                                    @selected(old('status') == $status->id)
                                    value="{{ $status->id }}">{{ ucfirst($status->status) }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Origin" name="origin"
                               value="{{ old('origin', $shipment->origin) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                        @error('origin')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Destination" name="destination"
                               value="{{ old('destination', $shipment->destination) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                        @error('destination')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div class="relative w-full md:w-2/3">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker type="text" placeholder="Expected delivery date"
                                   name="expected_delivery_date" autocomplete="off"
                                   value="{{ old('expected_delivery_date', $shipment->expected_delivery_date->format('m/d/Y')) }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
                        </div>
                        @error('expected_delivery_date')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <p class="font-bold text-lg font-sans">Customer details:</p>
                    <div class="mb-6">
                        <input type="text" placeholder="Customer name" name="name"
                               value="{{ old('name', $shipment->customer_name) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                        @error('name')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="email" placeholder="Customer email" name="email"
                               value="{{ old('email', $shipment->customer_email) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                        @error('email')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Customer phone" name="phone"
                               value="{{ old('phone', $shipment->customer_phone) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/3">
                        @error('phone')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-primary-button>Update</x-primary-button>
                </form>

                <div class="p-6 w-full md:w-1/2">
                    <p class="font-bold text-lg font-sans mb-3">Previous shipment status details:</p>
                    <ul class="max-w-md space-y-1 text-gray-500 list-inside">
                        @foreach($shipment->statuses as $status)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-green-500 flex-shrink-0"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                {{ $status->status }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
