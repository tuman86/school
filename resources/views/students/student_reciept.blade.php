@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">Student Fees</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
  <h1>{{ ucfirst($studentFeeDetail->student->first_name) . ' ' . ucfirst($studentFeeDetail->student->last_name)}}</h1>
  {!! Form::open(['url' => ['post_reciept_fee'], 'method' => 'post']) !!}
  <div class="field">
    <div class="form-group">
        <div class="col-md-6"></div>
      <div class="col-md-6">
        <input name="student_id" value="{{$studentFeeDetail->student_id}}" type="hidden">
        <input name="id" value="{{$studentFeeDetail->id}}" type="hidden">
        <input name="class" value="{{$studentFeeDetail->student->class}}" type="hidden">
        <input name="section" value="{{$studentFeeDetail->student->section}}" type="hidden">
      </div>
  </div>

  <div class="field">
    <div class="form-group">
       <?php echo Form::label('amount', 'Enter Amount', ['class' => 'col-md-4 control-label']);?>
       <div class="col-md-6">
         <?php echo Form::text('amount', '', ['class' => 'form-control']); ?>
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
