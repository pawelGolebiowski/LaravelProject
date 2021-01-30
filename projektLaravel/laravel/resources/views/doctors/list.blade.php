@extends('template')

@section('title')

@if (null !== 'title')
  - {{$title}} 
@endif

@endsection('title')

@section('content')
<div class="container">
  <h2>Lekarze</h2>

<a href="{{URL::to('doctors/create')}}">Dodaj lekarza</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefon</th>
      <th scope="col">Spcjalizacja</th>
      <th scope="col">Status</th>
      <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($doctorsList as $doctor)

    <tr>
      <th scope="row">{{$doctor->id}}</th>
      <td><a href="{{URL::to('doctors/' . $doctor->id)}}">{{$doctor->name}}</a></td>
      <td>{{$doctor->email}}</td>
      <td>{{$doctor->phone}}</td>
      <td>
        <ul>
        @foreach ($doctor->specializations as $specialization)

          <li>{{$specialization->name}}</li>

        @endforeach
        </ul>
      </td>
      <td>{{$doctor->status}}</td>
      <td><a href="{{URL::to('doctors/delete' . $doctor->id)}}" onclick="return confirm('Czy usunąć?')">Usuń lekarza</a></td>
    </tr>

  @endforeach
    
  </tbody>
</table>

  @foreach($statistics as $stat)
    @if ($stat->status == 'Active')
      Liczba lekarzy dostępnych: {{$stat->user_count}}</br>
    @endif
    @if ($stat->status == 'Inactive')
      Liczba lekarzy niedostępnych: {{$stat->user_count}}
    @endif
  @endforeach

</div>
@endsection('content')

