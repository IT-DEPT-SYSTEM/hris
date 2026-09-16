<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    @if (session('status') === 'profile-updated')

                        <div class="mb-4 text-green-600">
                            Profile updated successfully.
                        </div>

                    @endif


                    <form method="POST" action="{{ route('profile.update') }}">

                        @csrf
                        @method('PATCH')

                        <!-- Name -->

                        <div>

                            <x-input-label
                                for="name"
                                :value="__('Name')"
                            />

                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('name', $user->name)"
                                required
                                autofocus
                            />

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />

                        </div>


                        <!-- Email -->

                        <div class="mt-4">

                            <x-input-label
                                for="email"
                                :value="__('Company Email')"
                            />

                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="block mt-1 w-full"
                                :value="old('email', $user->email)"
                                required
                            />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>


                        <div class="flex items-center gap-4 mt-6">

                            <x-primary-button>
                                Save
                            </x-primary-button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>