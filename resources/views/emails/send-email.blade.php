<x-mail::message>
# EpiTrack

## Hi {{$receiver->name}},

## This event has been shared with you by {{$sender}} :

*Event: **{{$event->category}}**
*Severity: {{$event->severity}}<br>
![alt text]({{config('app.url')}}/storage/uploads/{{$event->image_filname}} "thumbnail view of {{$event->category}}")

[Log in to {{config('app.name')}} to see more]({{config('app.url')}} "Log it to {{config('app.name')}} to see more")

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
