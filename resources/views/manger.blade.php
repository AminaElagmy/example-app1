@extends('main')
@section ('title')
job page 
@endsection 

@section ('content')
<table class ="table" >
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">active</th>
        </tr>
    </thead>
    <tbody>
        @if(!@empty($data))

        @php 
        $i=1;
        @endphp

        @foreach($data as $info)
        <tr>
            <td>{{$i}}</td>
            <td>{{$info->name}}</td>
            <td>@if($info->active==1) yes  @else No  @endif </td>
        </tr>
        @php
        $i++; 
        @endphp

        @endforeach

        @else
        @endif
    </tbody>
</table>

@endsection

