<!DOCTYPE html>
<html>
<head>
  <title>Laravel 10 Generate PDF Using DomPDF</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2>EpiTrack Event Log</h2>
          <h4>{{$event->created_at->toDayDateTimeString()}}</h4>
        </div>
        <div class="pull-right">
          <a class="btn btn-warning" href="{{route('events.showPdf', $event->id,['download'=>'pdf'])}}">Download PDF</a>
        </div>
      </div>
    </div><br>

    <div class="container pull-left">
        <h4>
            <strong>Type of event: </strong>
        </h4>
        <p>{{$event->category}}</p>
        <h4>
            <strong>Duration: </strong>
        </h4>
        <p>{{$event->duration}} minutes</p>
        <h4>
            <strong>Severity: </strong>
        </h4>
        <p>{{$event->severity}}</p>
        <h4>
            <strong>Dog awake or asleep: </strong>
        </h4>
        <p>{{$event->awake_asleep == 1 ? 'Awake' : 'Asleep'}}</p>
        <h4>
            <strong>Emergency medication given: </strong>
        </h4>
        <p>{{$event->emergency_med == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Body limp/weak: </strong>
        </h4>
        <p>{{$event->body == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Body shaking/tremoring: </strong>
        </h4>
        <p>{{$event->movement == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Excessive drooling/foaming at mouth: </strong>
        </h4>
        <p>{{$event->mouth == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Incontinence: </strong>
        </h4>
        <p>{{$event->bladder == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Vomiting and/or wretching: </strong>
        </h4>
        <p>{{$event->vomit == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Unresponsive: </strong>
        </h4>
        <p>{{$event->responsive == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Chewing / jaw snapping: </strong>
        </h4>
        <p>{{$event->chewing == 1 ? 'Yes' : 'No'}}</p>
        <h4>
            <strong>Other notes: </strong>
        </h4>
        <p>{{$event->description}}</p>
        <h4>
            <strong>Media: </strong>
            <img src="{{url('storage/uploads/'.$event->image_filename)}}" alt="image url: {{$event->image_filename}}">
        </h4>
    </div>
    {{-- <table class="table table-bordered">
      <tr>
        <th>One</th>
        <th>Two</th>
      </tr>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach
    </table> --}}
  </div>
</body>
</html>
