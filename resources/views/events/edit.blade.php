<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('events.update', $event)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    {{-- <p>Select tpye of event</p>
                    <select name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($event->types as $type)
                        <option value={{$type->type}} @selected($type->id == $event->type_id)>{{$type->type}}</option>
                        @endforeach --}}
                    <p class="pt-6">Type</p>
                    <select name="category" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/5 p-2.5">
                        <option value="Pre Seizure" @selected($event->category=='Pre Seizure')>Pre Seizure</option>
                        <option value="SEIZURE" @selected($event->category=='SEIZURE')>Seizure</option>
                        <option value="Post Seizure" @selected($event->category=='Post Seizure')>Post Seizure</option>
                    </select>

                    <p class="pt-6">Duration of event in minutes</p>
                    <input
                        type="text"
                        name="duration"
                        field="duration"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$event->duration}}">

                    <p class="pt-6">Severity</p>
                    <select name="severity" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/5 p-2.5">
                        <option value="mild" @selected($event->severity=='mild')>Mild</option>
                        <option value="moderate" @selected($event->severity=='moderate')>Moderate</option>
                        <option value="severe" @selected($event->severity=='severe')>Severe</option>
                    </select>

                    <p class="pt-6">Dog awake during event</p>
                    <input
                        type="checkbox"
                        class=""
                        name="awake_asleep"
                        {{$event->awake_asleep===1?'checked':''}}>
                    <p class="pt-6">Emergency medication given</p>
                    <input
                        type="checkbox"
                        class=""
                        name="emergency_med"
                        {{$event->emergency_med===1?'checked':''}}>
                    <p class="pt-6">Body limp/weak</p>
                    <input
                        type="checkbox"
                        class=""
                        name="body"
                        {{$event->body===1?'checked':''}}>
                    <p class="pt-6">Shaking/tremoring</p>
                    <input
                        type="checkbox"
                        class=""
                        name="movement"
                        {{$event->movement===1?'checked':''}}>
                    <p class="pt-6">Excessive drooling/foaming at mouth</p>
                    <input
                        type="checkbox"
                        class=""
                        name="mouth"
                        {{$event->mouth===1?'checked':''}}>
                    <p class="pt-6">Incontinence</p>
                    <input
                        type="checkbox"
                        class=""
                        name="bladder"
                        {{$event->bladder===1?'checked':''}}>
                    <p class="pt-6">Vomiting/wretching</p>
                    <input
                        type="checkbox"
                        class=""
                        name="vomit"
                        {{$event->vomit===1?'checked':''}}>
                    <p class="pt-6">Unresponsive</p>
                    <input
                        type="checkbox"
                        class=""
                        name="responsive"
                        {{$event->responsive===1?'checked':''}}>
                    <p class="pt-6">Repetitive chewing movements</p>
                    <input
                        type="checkbox"
                        class=""
                        name="chewing"
                        {{$event->chewing===1?'checked':''}}>

                    <p class="pt-6">Your notes</p>
                    <textarea
                        name="description"
                        rows="10"
                        field="text"
                        {{-- placeholder="Type any further information here..." --}}
                        class="w-full mt-6">{{$event->description}}</textarea>

                    <div class="mb-3">
                        <label for="name" class="form-label">Update Image</label>
                        <input type="file" class="form-control" id="image_filename" placeholder="Image" name="image_filename">
                    </div>

                    <button type="submit" class="mt-6 inline-flex items-center px-4 py-2 bg-gray-400 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 border rounded-md">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
