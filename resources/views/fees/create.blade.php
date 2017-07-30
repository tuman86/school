@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Add New fee type</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
      {!! Form::open(['url' => 'fees']) !!}
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('title', 'Fee Title', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <?php echo Form::text('title', '', ['class' => 'form-control']); ?>
           </div>
       </div>
     </div>

     <div class="field">
       <div class="form-group">
          <?php echo Form::label('fee_amount', 'Fee Amount', ['class' => 'col-md-4 control-label']);?>
          <div class="col-md-6">
            <?php echo Form::text('fee_amount', '', ['class' => 'form-control']); ?>
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
