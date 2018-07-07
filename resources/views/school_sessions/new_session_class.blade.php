@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Fee</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
   <h1>Edit </h1>
      {!! Form::open(['url' => ['update_session_class'], 'method' => 'post']) !!}
      <input name="student_id" value="{{$student_id}}" type="hidden">
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('class', 'Class', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <?php echo Form::select('class', ['pnc' => 'PNC','nc' => 'NC','lkg' => 'LKG', 'ukg' => 'UKG', '1st' => '1ST', '2nd' => '2nd', '3rd' => '3rd', '4th' => '4th', '5th' => '5th', '6th' => '6th', '7th' => '7th', '8th' => '8th', '9th' => '9th', '10th' => '10th', '11th' => '11th', '12th' => '12th'], null, ['placeholder' => 'Select class'],  ['class' => 'form-control']); ?>
           </div>
       </div>
      </div>

      <div class="field" style="margin-bottom: 20px; float: left; clear: both; width: 100%;">
        <div class="form-group">
           <?php echo Form::label('school_session', 'Session', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <select class="form-control selected-fee" name="school_session_id">

               <option value=""> Session</option>
                @foreach($school_session as $session_val)
                  <option value="{{$session_val->id }}">{{$session_val->school_session}}</option>
                @endforeach
              </select>
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
