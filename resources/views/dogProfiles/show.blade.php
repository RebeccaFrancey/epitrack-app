<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dog Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @can('is_owner')
            <div class="flex items-center">
                <a href="{{ route('dogProfiles.edit', $dogProfile)}}" class="btn-link ml-auto">Edit</a>
                <form action="{{ route('dogProfiles.destroy', $dogProfile)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                </form>
            </div>
            @endcan

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl text-center">
                    {{$dogProfile->name}}
                </h2>
                <h2 class="font-bold text-2xl text-center">
                    Profile ID:
                    {{$dogProfile->number}}
                </h2>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Age:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->age}} years old</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Sex:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->sex == 1 ? 'Male' : 'Female'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Weight:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->weight}} kg</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Breed:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->breed}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Type of epilepsy:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->epilepsy_type}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Medication:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->medication}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Medication reminder:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->reminder == 1 ? 'Yes' : 'No'}}</p>
                <p class="mt-6 text-lg font-bold whitespace-pre-wrap">Other info:</p>
                <p class="mt-6 whitespace-pre-wrap">{{$dogProfile->other}}</p>
                {{-- <div class="mt-2">
                    <img src="{{$event->media_path}}" alt="image url: {{$event->media_path}}">
                </div> --}}

            </div>
        </div>
    </div>
</x-app-layout>
