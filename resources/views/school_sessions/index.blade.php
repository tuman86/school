@extends('layouts.app')

@section('content')
<style>
.btngrp{
  float:left;
}
.dlte-btn {
  width:71px;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">School Session Listing</div>
    <a href="{{ route('school_sessions.create') }}" style="float:right"> Add School Session</a>
      <div class="panel-body">

        <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <td>ID</td>
                  <td>School Sessions</td>

                  <td>Actions</td>
              </tr>
          </thead>
          <tbody>

              @foreach($school_sessions as $key => $value)
              <tr>
                  <td><?php echo $value->id ; ?></td>
                  <td><?php echo  $value->school_session;?></td>

                  <!-- we will also add show, edit, and delete buttons -->
                  <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
              <!-- we will add this later since its a little more complicated than the other two buttons -->
              <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->

              <!-- <a onclick="return comfirm('Are you sure to delete this record?');" class="btn btn-small btn-danger" href="{{ route('fees.destroy', $value) }}" data-method="delete" data-token="{{ csrf_token() }}">Delete</a> -->
              <a class="btn btn-small btn-info btngrp" href="{{ URL::to('school_sessions/' . $value->id . '/edit') }}">Edit</a>
              {!! Form::open(array('route' => array('school_sessions.destroy', $value->id), 'method' => 'delete', 'class' => 'btngrp dlte-btn')) !!}
                    <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                  {!! Form::close() !!}

                  </td>
              </tr>
            @endforeach

          </tbody>
      </table>
    </div>
  </div>
<div>
@endsection
