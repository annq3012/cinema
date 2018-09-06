@extends('backend.layouts.main')

@section('title', __('Update Cinema'))

@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <h1 class="title-page text-success">
        {{ __('Update Cinema') }}
      </h1>
      <div class="row margin-center">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title lead">{{ __('Enter information') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if($cinema != null)
            <form role="form" method="POST" action="{{ route('cinemas.update', $cinema->id) }}">
              {!! csrf_field() !!}
              @method('PUT')

              <div class="box-body">
                <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control" name= "name" id="name" placeholder="{{ __('Enter Name') }}" value="{{ old('name', $cinema->name) }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group has-feedback {{ $errors->has('city_id') ? ' has-error' : '' }}">
                  <label for="city_id">{{ __('Cities') }}:</label>
                  <select name="city_id" class="select">
                      @foreach ($cities as $city)
                        <option value="{{$city->id}}" {{ $city->id == $cinema->city_id ? 'selected' : '' }}>{{$city->name}}</option>
                      @endforeach
                  </select>
                  <small class="text-danger">{{ $errors->first('city_id') }}</small>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ route('cinemas.index') }}" class="btn btn-default">
                  {{ __('Back') }}
                </a>
                <button type="reset" class="btn btn-warning mr-10 btn-reset">{{ __('Reset') }}</button>
                <button type="submit" class="btn btn-primary mr-10 pull-right">{{ __('Submit') }}</button>
              </div>
            </form>
            @else 
            <h3>Cinema is not Exist</h3>
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
