@extends('layouts.app')

@section('content')
<h1>benvenuto in dishes index</h1>

@foreach ($dishes as $dish)
<tr>
  <th scope="row">{{ $dish->id }}</th>
  <td>{{ $dish->name }}</td>
  <td>{{ $dish->description }}</td>
  <td>{{ $dish->ingredients }}</td>
  <td>{{ $dish->visible }}</td>
  <td>{{ $dish->price }}</td>
  <td>{{ $dish->created_at }}</td>
  <td>{{ $dish->updated_at }}</td>
  <td class="text-wrap">
  </td>
</tr>
@endforeach

@endsection