<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex>"

                <p class="opacity-70 sm:px-6">
                    <strong>Created: </strong> {{$event->created_at->toDayDateTimeString()}}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated: </strong> {{$event->updated_at->diffForHumans()}}
                </p>
                {{-- <a href="{{ route('events.edit', $event)}}" class="btn-link ml-auto">Edit</a>
                    <form action="{{ route('events.destroy', $event)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                    </form> --}}
            </div>

            @can('is_owner')
            <div class="flex items-center">
                <a href="{{ route('events.edit', $event)}}" class="btn-link ml-auto">Edit</a>
                <form action="{{ route('events.destroy', $event)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                </form>
            </div>

            <div class="my-6 mx-10 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('share', $event)}}" method="post">
                    @csrf
                    Share this event as an email to: <select name="user" id="user">
                        @if ($users instanceof Illuminate\Database\Eloquent\Collection)
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{Auth::id() == $user->id ? 'selected=""': '' }}>{{$user->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    <button type="submit" class="btn-share ml-auto">Share Event</button>
                </form>
            </div>
            @endcan

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl text-center">
                    EVENT: {{$event->category}}
                    {{-- @forelse ($event->types as $type)
                        {{ $type->type }}@if (!$loop->last),@endif
                    @empty
                    <span>ERROR</span>
                    @endforelse --}}
                </h2>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Duration of event:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->duration}} minutes</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Severity:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->severity}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Event occurred while dog awake or asleep:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->awake_asleep == 1 ? 'Awake' : 'Asleep'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Emergency medication given:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->emergency_med == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Body limp/weak:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->body == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Body shaking/tremoring:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->movement == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Excessive drooling/foaming at the mouth:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->mouth == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Incontinence:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->bladder == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Vomiting or wretching:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->vomit == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Unresponsive:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->responsive == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Chewing/jaw snapping:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->chewing == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Other notes:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$event->description}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Media:</p>

                <div class="mt-2">
                    <img src="{{url('storage/uploads/'.$event->image_filename)}}" alt="image url: {{$event->image_filename}}">
                </div>
                <div class="mt-2">
                    <img src="{{$event->image_path}}" alt="image url: {{$event->image_path}}">
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
