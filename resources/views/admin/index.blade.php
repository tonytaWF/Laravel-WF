@extends('master')

@section('content')


   <h1>Admin Dashboard</h1>

   @if ($users->count())
       <table class="table">
           <thead>
           <tr>
               <th>Email</th>
               <th>Name</th>
               <th></th>
               <th></th>
           </tr>
           </thead>
           <tbody>
           @foreach ($users as $index => $user)
               <tr>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->name }}</td>
                   <td></td>
                   <td></td>
               </tr>
           @endforeach
           </tbody>
       </table>
   @endif

@stop
