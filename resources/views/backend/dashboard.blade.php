<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap flex-col md:flex-row">
                        <div class="w-full lg:w-1/3">
                            <div
                                class="flex justify-between items-center m-3 p-6 shadow-lg rounded border border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                     class="bi bi-chevron-double-right p-2 rounded bg-indigo-300" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd"
                                          d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <div class="text-center">
                                    <p class="text-sm font-bold uppercase text-gray-500">Carriers</p>
                                    <p class="font-bold text-3xl">{{ $carriers }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/3">
                            <div
                                class="flex justify-between items-center m-3 p-6 shadow-lg rounded border border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                     class="bi bi-chevron-double-right p-2 rounded bg-indigo-300" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd"
                                          d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <div class="text-center">
                                    <p class="text-sm font-bold uppercase text-gray-500">Shipments</p>
                                    <p class="font-bold text-3xl">{{ $shipments }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/3">
                            <div
                                class="flex justify-between items-center m-3 p-6 shadow-lg rounded border border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                                     class="bi bi-chevron-double-right p-2 rounded bg-indigo-300" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd"
                                          d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <div class="text-center">
                                    <p class="text-sm font-bold uppercase text-gray-500">Statuses</p>
                                    <p class="font-bold text-3xl">{{ $statuses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
