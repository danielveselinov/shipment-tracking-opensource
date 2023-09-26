<x-front-layout>
    <x-navigation/>
    <livewire:shipment-search/>

    <div class="container mx-auto py-5">
        <p class="text-xl text-center font-bold uppercase mb-4">
            {{ __('welcome.fullhauzTracking') }}
        </p>

        <div
            class="flex flex-col space-y-3 mb-3 justify-center items-center md:flex-row md:flex-wrap md:space-x-3 md:space-y-0 md:mb-0">
            <img
                class="w-2/3 h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer sm:blur-none hover:blur-none md:blur-[1px] md:w-1/4"
                src="{{ asset('assets/images/ware1.jpg') }}" alt="Fullhauz Tracking Ware">
            <img
                class="w-2/3 h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer sm:blur-none hover:blur-none md:blur-[1px] md:w-1/4"
                src="{{ asset('assets/images/ware3.jpg') }}" alt="Fullhauz Tracking Ware">
            <img
                class="w-2/3 h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer sm:blur-none hover:blur-none md:blur-[1px] md:w-1/4"
                src="{{ asset('assets/images/ware2.jpg') }}" alt="Fullhauz Tracking Ware">
        </div>
    </div>

    <x-footer/>
</x-front-layout>
