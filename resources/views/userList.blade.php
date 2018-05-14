@extends('layouts.master')

@section('title')
    Country Visited
@endsection

@section('content')
    <div class="container">
        <h1>Country Visited</h1>
        <p><a href='/'>Back</a></p>
        @foreach($userinfos as $userInfo)
        <label>{{$userInfo->first_name}} {{$userInfo->family_name}}
            <a href='/{{$userInfo->id}}/userEdit'>Edit</a>
            <form method='post' action='/{{$userInfo->id}}'>
            {{method_field('delete')}}
            {{csrf_field()}}
            <input type='submit' value='Delete'>
            </form>
        </label>
        <br/>
        @endforeach
    </div>
@endsection