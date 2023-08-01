<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dog Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('dogProfiles.update', $dogProfile)}}" method="post">
                    @csrf
                    @method('put')

                    <p class="pt-6">Name</p>
                    <input
                        type="text"
                        name="name"
                        field="name"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$dogProfile->name}}">

                    <p class="pt-6">Age in years</p>
                    <input
                        type="text"
                        name="age"
                        field="age"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$dogProfile->age}}">

                    <p class="pt-6">Sex</p>
                    <select name="sex" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/5 p-2.5">
                        <option value="1" @selected($dogProfile->sex=='1')>Male</option>
                        <option value="0" @selected($dogProfile->sex=='0')>Female</option>
                    </select>

                    <p class="pt-6">Weight in kg</p>
                    <input
                        type="text"
                        name="weight"
                        field="weight"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$dogProfile->weight}}">

                    <p class="pt-6">Breed</p>
                    <input
                        type="text"
                        name="breed"
                        field="breed"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$dogProfile->breed}}">

                    <p class="pt-6">Type of epilepsy</p>
                    <select name="epilepsy_type" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/5 p-2.5">
                        <option value="generalised" @selected($dogProfile->epilepsy_type=='generalised')>Generalised</option>
                        <option value="focal" @selected($dogProfile->epilepsy_type=='focal')>Focal</option>
                        <option value="idiopathic" @selected($dogProfile->epilepsy_type=='idiopathic')>Idiopathic</option>
                    </select>

                    <p class="pt-6">Medication</p>
                    <input
                        type="text"
                        name="medication"
                        field="medication"
                        class="w-2/5"
                        autocomplete="off"
                        value="{{$dogProfile->medication}}">

                    <p class="pt-6">Medication reminder</p>
                    <input
                        type="checkbox"
                        class=""
                        name="reminder"
                        {{$dogProfile->reminder===1?'checked':''}}>

                    <p class="pt-6">Other information</p>
                    <textarea
                        name="other"
                        rows="10"
                        field="text"
                        {{-- placeholder="Type any further information here..." --}}
                        class="w-full mt-6">{{$dogProfile->other}}</textarea>

                    <button type="submit" class="mt-6 inline-flex items-center px-4 py-2 bg-gray-400 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 border rounded-md">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
