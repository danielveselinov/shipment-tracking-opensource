<div class="flex flex-col items-center justify-center shadow-sm pb-10">
    <p class="text-2xl text-center font-bold uppercase px-5 my-10 md:text-4xl">{{ __('welcome.titleText') }} <span
            class="text-pink-500 underline underline-offset-2 md:px-0">{{ __('welcome.shipmentText') }}</span></p>

    <form class="w-full px-2 md:w-4/5 md:px-0 lg:w-1/2">
        <label for="search"
               class="mb-2 text-sm font-medium text-gray-900 sr-only">{{ __('welcome.searchButtonText') }}</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input wire:model="search" type="search" id="search" name="search" value="{{ request()->search }}"
                   class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="{{ __('welcome.searchPlaceholder') }}" required>
            <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                {{ __('welcome.searchButtonText') }}
            </button>
        </div>
    </form>
</div>

<div class="container mx-auto p-6 md:p-10">
    @if(isset(request()->search) and empty($shipment))
        <div
            class="flex p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <div>
                {{ __('welcome.notFound') }}
            </div>
        </div>
    @elseif($shipment)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow border sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <p class="font-bold text-xl">{{ __('welcome.customerDetails') }}</p>
                            <p>{{ __('welcome.name') }} <span
                                    class="text-gray-600">{{ $shipment->customer_name }}</span></p>
                            <p>{{ __('welcome.email') }} <a href="mailto:{{ $shipment->customer_email }}"
                                                            class="text-gray-600 hover:underline">{{ $shipment->customer_email }}</a>
                            </p>
                            <p>{{ __('welcome.phone') }} <a href="tel:{{ $shipment->customer_phone }}"
                                                            class="text-gray-600 hover:underline">{{ $shipment->customer_phone }}</a>
                            </p>

                            <p class="font-bold text-xl mt-6">{{ __('welcome.shipmentDetails') }}</p>
                            <p>{{ __('welcome.trackingCode') }} <a
                                    href="{{ url('/?search=' . $shipment->tracking_code) }}"
                                    class="text-gray-600 hover:underline">{{ $shipment->tracking_code }}</a>
                            </p>
                            <p>{{ __('welcome.origin') }} <span class="text-gray-600">{{ $shipment->origin }}</span></p>
                            <p>{{ __('welcome.destination') }} <span
                                    class="text-gray-600">{{ $shipment->destination }}</span></p>
                            <p>{{ __('welcome.edd') }} <span
                                    class="text-gray-600">{{ $shipment->expected_delivery_date->format('d F, Y') }}</span>
                            </p>
                            <p>{{ __('welcome.lastUpdated') }} <span
                                    class="text-gray-600">{{ $shipment->updated_at->diffForHumans() }}</span></p>
                        </div>
                        <div class="w-full md:w-1/2">
                            <p class="font-bold text-xl">{{ __('welcome.carrierDetails') }}</p>
                            <p>{{ __('welcome.name') }} <span class="text-gray-600">{{ $shipment->user->name }}</span>
                            </p>
                            <p>{{ __('welcome.email') }} <a href="mailto:{{ $shipment->user->email }}"
                                                            class="text-gray-600 hover:underline">{{ $shipment->user->email }}</a>
                            </p>
                            <p>{{ __('welcome.phone') }} <a href="tel:{{ $shipment->user->phone }}"
                                                            class="text-gray-600 hover:underline">{{ $shipment->user->phone }}</a>
                            </p>

                            <p class="font-bold text-xl mt-6">{{ __('welcome.shipmentStatusesDetails') }}</p>
                            <ul class="max-w-md space-y-1 text-gray-500 list-inside">
                                @foreach($shipment->statuses as $status)
                                    <li class="flex items-center">
                                        <svg
                                            class="w-4 h-4 mr-1.5 text-green-500 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
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
        </div>
    @endif
</div>


