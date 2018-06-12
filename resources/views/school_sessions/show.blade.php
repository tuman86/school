@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">School Session</div>
      <div class="panel-body">

            <p>
                <strong>School Session</strong> {{ $school_session->school_session }}<br>
                
            </p>
    </div>
  </div>
<div>
@endsection
