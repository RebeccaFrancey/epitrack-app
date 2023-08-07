<x-app-layout>
    <x-slot name="header">
        @can('is_owner')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Error - vet users only') }}
        </h2>
        @endcan

        @can('is_vet')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Patients') }}
        </h2>
        @endcan
    </x-slot>

    @can('is_vet')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($dogProfiles as $dogProfile)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg text-center">
                <h2 class="font-bold text-2xl">
                    <a href="{{route('dogProfiles.show', $dogProfile)}}">Patient Name: {{$dogProfile->name}}</a>
                </h2>
                <span class="block mt-4 text-sm opacity-70">Patient Profile Number: {{$dogProfile->number}}</span>
            </div>
        @empty
            <p>You have no saved patients.</p>
        @endempty
        </div>
    </div>
    @endcan
</x-app-layout>
