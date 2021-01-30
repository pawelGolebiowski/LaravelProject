@extends('template')

@section('title')

@if (null !== 'title')
  - {{$title}} 
@endif

@endsection('title')

@section('content')
<div class="container">
  <h2>Pacjenci</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefon</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($patientsList as $patient)

    <tr>
      <th scope="row">{{$patient->id}}</th>
      <td><a href="{{URL::to('patients/' . $patient->id)}}">{{$patient->name}}</a></td>
      <td>{{$patient->email}}</td>
      <td>{{$patient->phone}}</td>
    </tr>

  @endforeach
  </tbody>
</table>
</div>
@endsection('content')

