@extends('template')
@section('content')

<div class="container">

@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>


@endif


<h2>Dodawanie lekarza</h2>
  <form action="{{action('App\Http\Controllers\DoctorController@store')}}" method="POST" role="form">
  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="form-group">
      <label for="name">Nazwisko i imię </label>
      <input type="text" class="form-control" name="name"/>
    </div>
    <div class="form-group">
      <label for="email">Email </label>
      <input type="text" class="form-control" name="email"/>
    </div>
    <div class="form-group">
      <label for="password">Hasło </label>
      <input type="password" class="form-control" name="password"/>
    </div>
    <div class="form-group">
      <label for="phone">Telefon </label>
      <input type="phone" class="form-control" name="phone"/>
    </div>
    <div class="form-group">
      <label for="address">Adres </label>
      <input type="address" class="form-control" name="address"/>
    </div>
    <div class="form-group">
      <label for="pesel">PESEL </label>
      <input type="pesel" class="form-control" name="pesel"/>
    </div>
    <div class="form-group">
      <label for="pesel">Specjalizacja </label>
      @foreach($specializations as $specialization)
		<input type="checkbox" class="form-control" name="specializations[]" value="{{$specialization->id}}"/>{{$specialization->name}}
      @endforeach
      
    </div>

    <input type="hidden" name="status" value="Active"/>


    <input type="submit" vale="Dodaj" class="btn btn-primary"/>
  </form>

</div>

@endsection('content')