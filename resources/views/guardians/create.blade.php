@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Add New fee type</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
      {!! Form::open(['url' => 'guardians']) !!}
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <?php echo Form::hidden('student_id', $std_id, ['class' => 'form-control']); ?>
             <?php echo Form::text('first_name', '', ['class' => 'form-control']); ?>
           </div>
       </div>
     </div>



     <div class="field">
       <div class="form-group">
          <?php echo Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']);?>
          <div class="col-md-6">
            <?php echo Form::text('last_name', '', ['class' => 'form-control']); ?>
          </div>
      </div>
    </div>

    <div class="field">
      <div class="form-group">
         <?php echo Form::label('relation', 'Relation', ['class' => 'col-md-4 control-label']);?>
         <div class="col-md-6">
           <?php echo Form::text('relation', '', ['class' => 'form-control']); ?>
         </div>
     </div>
   </div>

    <div class="field">
      <div class="form-group">
         <?php echo Form::label('email', 'Email', ['class' => 'col-md-4 control-label']);?>
         <div class="col-md-6">
           <?php echo Form::text('email', '', ['class' => 'form-control']); ?>
         </div>
     </div>
   </div>

   <div class="field">
     <div class="form-group">
        <?php echo Form::label('contact_number', 'Contact Number', ['class' => 'col-md-4 control-label']);?>
        <div class="col-md-6">
          <?php echo Form::text('contact_number', '', ['class' => 'form-control']); ?>
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
