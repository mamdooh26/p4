@extends('layouts.master')

@section('title')
    Visited Countries
@endsection

@section('content')
    <div class="container">
        <h1>Visited Countries</h1>
        <p><a href='/userList'>Show All Registered Users</a></p>
        <form method='Post' action='/'>
            {{ csrf_field() }}
            <ul class="form-style-1">
                <li><label for='firstName'>First Name? <span class="required">*</span></label></li>
                <li><input type='text'
                           name='firstName'
                           id='firstName' @if (isset($firstname)) value= {{ $firstname }} @endif></li>
                <li><label for='familyName'>Family Name<span class="required">*</span></label></li>
                <li><input type='text'
                           name='familyName'
                           id='familyName' @if (isset($familyName)) value= {{ $familyName }} @endif></li>
                <li><label>Countries you have visited:</label></li>
                     @foreach($countryForCheckboxes as $country_id => $country_name)
                        <label>
                        <li><input type='checkbox' name='countries[]' value={{$country_id}}>{{$country_name}}</li>
                        </label>
                     @endforeach
                <li><input type='submit' value='Register' class=''></li>

            </ul>
        </form>
        <br/>
    </div>

    @if(count($errors) > 0)
        <div class='alert alert-danger'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(isset($owe))
        <div class="alert alert-success">Everyone owes ${{ $owe }}</div>
    @endif

@endsection