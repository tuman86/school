@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Fee</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
   <h1>Edit </h1>
      {!! Form::open(['route' => ['school_sessions.update', $school_session->id], 'method' => 'put']) !!}
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('school_session', 'School Session', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <?php echo Form::text('school_session', $school_session->school_session, ['class' => 'form-control']); ?>
           </div>
       </div>
     </div>

    <div class="field">
      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
         <?php echo Form::submit('Save', ['class' => 'btn btn-primary']);?>
       </div>
     </div>
   </div>

      {!! Form::close() !!}

    </div>
  </div>
<div>
@endsection
