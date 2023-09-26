<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carriers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if((session('status') === 'carrier-created'))
                        <x-alert.info>
                            Carrier has been created.
                        </x-alert.info>
                    @elseif((session('status') === 'carrier-updated'))
                        <x-alert.info>
                            Carrier has been updated.
                        </x-alert.info>
                    @elseif((session('status') === 'carrier-deleted'))
                        <x-alert.info>
                            Carrier has been deleted.
                        </x-alert.info>
                    @endif

                    <a href="{{ route('carriers.create') }}"
                       class="inline-flex items-center mb-3 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add
                        Carrier or Admin</a>

                    <livewire:user-table/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
