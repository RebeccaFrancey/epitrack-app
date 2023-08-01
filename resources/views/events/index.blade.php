<x-app-layout>
    <x-slot name="header">
        @can('is_owner')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
        @endcan

        @can('is_vet')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
        @endcan
    </x-slot>

    @can('is_owner')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(request()->routeIs('events.index'))
                <a href="{{route('events.create')}}" class="btn-link btn-lg mb-2">+ New Event</a>
            @endif
            @forelse ($events as $event)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg text-center">
                <h2 class="font-bold text-2xl">
                    Event: {{$event->category}}

                    {{-- @forelse ($event->types as $type)
                        {{ $type->type }}@if (!$loop->last),@endif
                    @empty
                    <span>ERROR</span>
                    @endforelse --}}
                </h2>
                <span class="block mt-4 text-sm opacity-70">{{$event->created_at->toDayDateTimeString()}}</span>
            </div>
        @empty
            <p>You have no logged events.</p>
        @endempty
        </div>
    </div>
    @endcan

    @can('is_vet')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{url('/events')}}" method="GET" class="space-y-2 mb-6">
                        <input
                            id="query"
                            name="query"
                            type="search"
                            placeholder="Search profiles..."
                            class="block w-full"
                            />

                        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan
</x-app-layout>
