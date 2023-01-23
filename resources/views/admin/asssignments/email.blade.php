<h3>Hi, {{ $data->students['fname'].' '. $data->students['lname']  }}</h3>
<p>
    You got Grade <strong>{{ $data->grades['grade_title'] }}</strong> from 
   <strong>{{ $data->sessions['title'] }}</strong> sessions
</p>

<p>Best, </p>
<p> CodeWeekend chapter <strong>{{$data->chapters['title']  }}</strong></p>