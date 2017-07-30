@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">Student Details</div>
    <a href="{{ URL::to('student_fee', $student->id) }}" style="float:left;margin-left:10px;"> Submit Fees</a>
    <a href="{{ URL::to('student_fee_detail', $student->id) }}" style="float:left;margin-left:10px;"> Check Student Fees</a>
    <a href="{{ URL::to('guardians?std_id='. $student->id) }}" style="float:left;margin-left:10px;"> Guardians</a>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
  <h1>{{ ucfirst($student->first_name) . ' ' . ucfirst($student->last_name)}}</h1>
    <div class="field">
      <div class="form-group">
        <div class="col-md-6">
         <?php echo Form::label('student_admission_id', 'Student Admission Id', ['class' => 'col-md-4 control-label']);?>
       </div>
         <div class="col-md-6">
           <?php echo  $student->student_admission_id; ?>
         </div>
     </div>
   </div>

      <div class="field">
        <div class="form-group">
          <div class="col-md-6">
           <?php echo Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']);?>
         </div>
           <div class="col-md-6">
             <?php echo  ucfirst($student->first_name); ?>
           </div>
       </div>
     </div>

     <div class="field">
       <div class="form-group">
         <div class="col-md-6">
          <?php echo Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']);?>
        </div>
          <div class="col-md-6">
            <?php echo ucfirst($student->last_name); ?>
          </div>
      </div>
    </div>

    <div class="field">
      <div class="form-group">
        <div class="col-md-6">
         <?php echo Form::label('email', 'Email', ['class' => 'col-md-4 control-label']);?>
       </div>
         <div class="col-md-6">
           <?php echo $student->email; ?>
         </div>
     </div>
   </div>

   <div class="field">
     <div class="form-group">
       <div class="col-md-6">
        <?php echo Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']);?>
      </div>
        <div class="col-md-6">
          <?php echo ucfirst($student->first_name); ?>
        </div>
    </div>
  </div>

  <div class="field">
    <div class="form-group">
      <div class="col-md-6">
       <?php echo Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']);?>
     </div>
       <div class="col-md-6">
         <?php echo ucfirst($student->mother_name); ?>
       </div>
   </div>
 </div>

 <div class="field">
   <div class="form-group">
     <div class="col-md-6">
      <?php echo Form::label('mobile', 'Mobile', ['class' => 'col-md-4 control-label']);?>
    </div>
      <div class="col-md-6">
        <?php echo $student->mobile; ?>
      </div>
  </div>
</div>

   <div class="field">
     <div class="form-group">
       <div class="col-md-6">
        <?php echo Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']);?>
      </div>
        <div class="col-md-6">
          <?php echo  ucfirst($student->gender); ?>
        </div>
    </div>
  </div>

  <div class="field">
    <div class="form-group">
      <div class="col-md-6">
       <?php echo Form::label('admission_number', 'Admission Number', ['class' => 'col-md-4 control-label']);?>
     </div>
       <div class="col-md-6">
         <?php echo $student->admission_number; ?>
       </div>
   </div>
 </div>

 <div class="field">
   <div class="form-group">
     <div class="col-md-6">
      <?php echo Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-md-4 control-label']);?>
    </div>
      <div class="col-md-6">
        <?php echo  $student->date_of_birth; ?>
      </div>
  </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('admission_date', 'Admission Date', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->admission_date; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('address', 'Address', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->address); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('city', 'City', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->city); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('state', 'State', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->state); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('country', 'Country', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->country); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('zip_code', 'Zipcode', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->zip_code; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('aadhar_number', 'Aadhar Number', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo  $student->aadhar_number; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('bank_account_number', 'Bank Account Number', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->bank_account_number; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('ifsc_code', 'IFSC Code', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->ifsc_code; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
  <div class="col-md-6">
     <?php echo Form::label('comments', 'Comments', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->comments); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('category', 'Category', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->category); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('religion', 'Religion', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->religion); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('mothier_tongue', 'Mother Tongue', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->mothier_tongue); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('rte_act', 'RTE Act', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->rte_act; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('medium_instruction', 'Medium of Instruction', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->medium_instruction); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('house', 'House', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->house); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('session', 'Session', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->session); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('class', 'Class', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo $student->class; ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('section', 'Section', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->section); ?>
     </div>
 </div>
</div>

<div class="field">
  <div class="form-group">
    <div class="col-md-6">
     <?php echo Form::label('nationality', 'Nationality', ['class' => 'col-md-4 control-label']);?>
   </div>
     <div class="col-md-6">
       <?php echo ucfirst($student->nationality); ?>
     </div>
 </div>
</div>

    </div>
  </div>
<div>
@endsection
