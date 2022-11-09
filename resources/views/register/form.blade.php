@extends('layout.primary')

@section('page_body')


<div class="container mt-5">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif --}}

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image img">
              {{-- <img class="bg-login-image" src="{{asset ('template/img/signup.svg')}}"> --}}
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <div>
                    {{-- <img class="top-login-image" src="{{asset ('template/img/tw_1.png')}}"> --}}
                  </div>
                  <h1 class="h4 text-web mb-4">Welcome <strong> With Pos </strong> </h1>
                </div>
                {!! Form::open([ 'route' => 'register.custom', 'method' => 'post' ]) !!}

                <div class="form-group">
                  <label for="">Name <span class="text-danger"> * </span> </label>
                  {{ Form::text('name', NULL, 
                  [ 'class'=>'form-control form-control-user', 'id' => 'name', 'placeholder' => 'Name'  ]) }}

                  <p style="color:red">
                    {{ ($errors->has('name'))?($errors->first('name')) : '' }}
                  </p>
                </div>

                <div class="form-group">
                  <label for="">Email Address <span class="text-danger"> * </span> </label>
                  {{ Form::text('email', NULL, [ 'class'=>'form-control form-control-user', 'id' => 'email', 'placeholder' => ' Email ' ]) }}
                
                <p style="color:red">

                  {{ ($errors->has('email'))?($errors->first('email')) : '' }}

                </p>

                </div>

                <!-- <div class="form-group">
                  <label for=""> Phone <span class="text-danger"> * </span> </label>
                  {{ Form::text('phone', NULL, [ 'class'=>'form-control form-control-user', 'id' => 'phone', 'placeholder' => ' Phone ' ]) }}
                </div> -->

                <div class="form-group">
                  <label for="">Password <span class="text-danger"> * </span> </label>
                  {{ Form::password('password', 
                  [ 'class'=>'form-control form-control-user', 'id' => 'password', 'placeholder' => ' Password' ]) }}

                    <p style="color:red">
                      {{ ($errors->has('password'))?($errors->first('password')) : '' }}
                    </p>

                </div>

                <div class="form-group">
                  <label for="">Confirm password <span class="text-danger"> * </span> </label>
                  {{ Form::password('password_confirmation', [ 'class'=>'form-control form-control-user', 'id' => 'confirmPassword', 'placeholder' => ' Confirm Password' ]) }}
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Sign Up</button>

                <div class="row mt-4">
                  <div class="col-md-7">
                    <p>Already have an account ? </p>
                  </div>
                  <div class="col-md-5 signup">
                    <a href="{{ route('login') }}">Login </a>
                  </div>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    @stop