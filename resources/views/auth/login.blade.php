<x-layout>
    <x-slot:heading> Login</x-slot:heading>

    <form method="post" action="{{url('/login')}}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email Address</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email"  autocomplete="email" required></x-form-input>
                            <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password"  autocomplete="password" required></x-form-input>
                            <x-form-error name="password"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{url('/')}}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>


</x-layout>
