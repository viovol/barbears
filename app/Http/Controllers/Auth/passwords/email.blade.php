@extends('layouts.app')
@section('content',| 'Forgot my password')
<div class="form-gap"></div>
<div class="container">
<div class="row">
 <div class="col-md-4 col-md-offset-4">
         <div class="panel panel-default">
           <div class="panel-body">
             <div class="text-center">
               <h3><i class="fa fa-lock fa-4x"></i></h3>
               <h2 class="text-center">Forgot Password?</h2>
               <p>You can reset your password here.</p>
               <div class="panel-body">

                 {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

       					{{ Form::label('email', 'Email Address:') }}
       					{{ Form::email('email', null, ['class' => 'form-control']) }}

       					{{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

       					{{ Form::close() }}

               </div>
             </div>
           </div>
         </div>
       </div>
</div>
</div>
@endsection
