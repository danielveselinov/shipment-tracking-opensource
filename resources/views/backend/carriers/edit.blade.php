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
            {{ __('Update admin/carrier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('carriers.update', $carrier->id) }}" class="p-6 text-gray-900">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <select id="role" name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/5">
                            @foreach($roles as $role)
                                <option
                                    @selected($carrier->role->id == $role->id)
                                    value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Carrier name" name="name"
                               value="{{ old('name', $carrier->name) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/5">
                        @error('name')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="email" placeholder="Carrier email" name="email"
                               value="{{ old('email', $carrier->email) }}" disabled
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/5 cursor-not-allowed">
                        @error('email')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Carrier phone" name="phone"
                               value="{{ old('phone', $carrier->phone) }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/5">
                        @error('phone')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" placeholder="Carrier password" name="password" value="{{ old('password') }}"
                               class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 md:w-2/5">
                        @error('password')
                        <p class="text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <x-primary-button>Update</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


