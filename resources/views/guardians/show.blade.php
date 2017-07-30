@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Fee Types</div>
      <div class="panel-body">
            <h2>{{ $fee->title }}</h2>
            <p>
                <strong>Fee Title:</strong> {{ $fee->title }}<br>
                <strong>Fee Amount:</strong> {{ $fee->fee_amount }}
            </p>
    </div>
  </div>
<div>
@endsection
