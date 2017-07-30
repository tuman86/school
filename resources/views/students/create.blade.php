@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Add Student</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
      {!! Form::open(['url' => 'students']) !!}
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('student_admission_id', 'Student Admission Id', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
             <?php echo Form::text('student_admission_id', '', ['class' => 'form-control']); ?>
           </div>
       </div>
     </div>

      <div class="field">
        <div class="form-group">
           <?php echo Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']);?>
           <div class="col-md-6">
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
         <?php echo Form::label('email', 'Email', ['class' => 'col-md-4 control-label']);?>
         <div class="col-md-6">
           <?php echo Form::email('email', '', ['class' => 'form-control']); ?>
         </div>
     </div>
   </div>

   <div class="field">
     <div class="form-group">
        <?php echo Form::label('father_name', 'Father Name', ['class' => 'col-md-4 control-label']);?>
        <div class="col-md-6">
          <?php echo Form::text('father_name', '', ['class' => 'form-control']); ?>
        </div>
    </div>
  </div>

  <div class="field">
    <div class="form-group">
       <?php echo Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']);?>
       <div class="col-md-6">
         <?php echo Form::text('mother_name', '', ['class' => 'form-control']); ?>
       </div>
   </div>
 </div>

 <div class="field">
   <div class="form-group">
      <?php echo Form::label('mobile', 'Mobile Number', ['class' => 'col-md-4 control-label']);?>
      <div class="col-md-6">
        <?php echo Form::text('mobile', '', ['class' => 'form-control']); ?>
      </div>
  </div>
</div>

   <div class="field">
     <div class="form-group">
        <?php echo Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']);?>
        <div class="col-md-6">
          <?php echo Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], null, ['class' => 'form-control']); ?>
        </div>
    </div>
  </div>

  <div class="field">
    <div class="form-group">
       <?php echo Form::label('admission_number', 'Admission Number', ['class' => 'col-md-4 control-label']);?>
       <div class="col-md-6">
         <?php echo Form::text('admission_number', '', ['class' => 'form-control']); ?>
       </div>
   </div>
 </div>

 <div class="field">
   <div class="form-group">
      <?php echo Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-md-4 control-label']);?>
      <div class="col-md-6">
        <?php echo Form::date('date_of_birth', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>
      </div>
  </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('admission_date', 'Admission Date', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::date('admission_date', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('address', 'Address', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('address', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('city', 'City', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('city', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('state', 'State', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('state', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('country', 'Country', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('country', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('zip_code', 'Zipcode', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('zip_code', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('aadhar_number', 'Aadhar Number', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('aadhar_number', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('bank_account_number', 'Bank Account Number', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('bank_account_number', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('ifsc_code', 'IFSC Code', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('ifsc_code', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('comments', 'Comments', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::textarea('comments', '', ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('category', 'Category', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('category', ['general' => 'General', 'SC' => 'SC', 'ST' => 'ST', 'OBC' =>'OBC'], null, ['placeholder' => 'Select a Category'], ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('religion', 'Religion', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('religion', ['hindu' => 'Hindu', 'mushlim' => 'Mushlim', 'christan' => 'Christan', 'sikh' =>'Sikh', 'buddhist' => 'Buddhist', 'parsi' => 'Parsi', 'jain' => 'Jain', 'other' => 'Others'], null, ['placeholder' => 'Select a Religion'], ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('mothier_tongue', 'Mother Tongue', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('mothier_tongue', ['hindi' => 'Hindi', 'english' => 'English'], null, ['placeholder' => 'Select Mother Tongue'], ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('rte_act', 'RTE Act', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('rte_act', ['yes' => 'Yes', 'no' => 'No'], null, ['placeholder' => 'Select RTE Act'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('medium_instruction', 'Medium of Instruction', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('medium_instruction', ['hindi' => 'Hindi', 'english' => 'English'], null, ['placeholder' => 'Select Medium of Instruction'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('house', 'House', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('house', ['red' => 'Red', 'green' => 'Green', 'yellow' => 'Yellow', 'blue' => 'Blue'], null, ['placeholder' => 'Select House'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('session', 'Session', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('session', null, ['placeholder' => 'Enter Session e.g. 2017-18'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('class', 'Class', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('class', ['lkg' => 'LKG', 'ukg' => 'UKG', '1st' => '1ST', '2nd' => '2nd', '3rd' => '3rd', '4th' => '4th', '5th' => '5th', '6th' => '6th', '7th' => '7th', '8th' => '8th', '9th' => '9th', '10th' => '10th', '11th' => '11th', '12th' => '12th'], null, ['placeholder' => 'Select class'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('section', 'Section', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::select('section', ['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'], null, ['placeholder' => 'Select Section'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
     <?php echo Form::label('nationality', 'Nationality', ['class' => 'col-md-4 control-label']);?>
     <div class="col-md-6">
       <?php echo Form::text('nationality', null, ['placeholder' => 'Nationality'],  ['class' => 'form-control']); ?>
     </div>
 </div>
</div>
<?php echo Form::hidden('student_photo', 'test'); ?>

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
