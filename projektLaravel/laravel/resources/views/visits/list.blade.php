@extends('template')

@section('title')

@if (null !== 'title')
  - {{$title}} 
@endif

@endsection('title')

@section('content')
<div class="container">
  <h2>Wizyty</h2>

<a href="{{URL::to('visits/create')}}">Dodaj nową wizytę</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pacjent</th>
      <th scope="col">Lekarz</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($visits as $visit)

    <tr>
      <th scope="row">{{$visit->id}}</th>
      <td>{{$visit->patient->name}}</td>
      <td>{{$visit->doctor->name}}</td>
      <td>{{$visit->date}}</td>
    </tr>

  @endforeach
    
  </tbody>
</table>
</div>

@endsection('content')

