<x-app-layout>
    <x-slot name="header">
        @can('is_owner')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Error - vet users only') }}
        </h2>
        @endcan

        @can('is_vet')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
        @endcan
    </x-slot>

    @can('is_vet')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{url('/search')}}" method="GET" class="space-y-2 mb-6">
                        <div class="flex items-baseline space-x-2">
                        <select name="user_id" id="user_id">
                            <option value="">Any User</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" {{request()->get('user_id') == $user->id ? 'selected=""':''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                        <input
                            id="query"
                            name="query"
                            type="search"
                            placeholder="Search events..."
                            class="block w-full"
                            />
                        </div>
                        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Search</button>
                    </form>
                    {{-- <div class="space-y-4"> --}}
                        @if (!empty($results))
                            <em>Found {{$results->total()}} Events</em>
                        @endif
                        {{-- @forelse ($results as $result)
                        <div class="text-lg font-semibold">
                            <a href="{{route('dogProfiles.show', $result)}}">{{$result->name}}</a>
                        </div>
                        <p>{!!html_entity_decode(Str::limit($result->number)) !!}</p>
                        @empty
                            No profiles found.
                        @endforelse --}}
                        @forelse ($results as $result)
                        <div class="text-lg font-semibold">
                            <a href="{{route('events.show', $result)}}">{{$result->category}}</a>
                        </div>
                        <p>{{$result->user->name}}</p>
                        <p>{!!html_entity_decode(Str::limit($result->created_at->toDayDateTimeString())) !!}</p>
                        @empty
                            No events found.
                        @endforelse
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    @endcan
</x-app-layout>
