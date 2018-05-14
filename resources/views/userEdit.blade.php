@extends('layouts.master')

@section('title')
    Visited Countries
@endsection

@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <p><a href='/userList'>Back</a></p>
        <form method='POST' action='/{{$userinfo->id}}'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <ul class="form-style-1">
                <li><label for='firstName'>First Name? <span class="required">*</span></label></li>
                <li><input type='text'
                           name='firstName'
                           id='firstName' value= {{$userinfo->first_name}}></li>
                <li><label for='familyName'>Family Name<span class="required">*</span></label></li>
                <li><input type='text'
                           name='familyName'
                           id='familyName' value= {{$userinfo->family_name}}></li>
                <li><label>Countries you have visited:</label></li>
                     @foreach($countryForCheckboxes as $country_id => $country_name)
                        <label>
                        <li><input
                            {{(in_array($country_id,$countries)) ? 'checked' : ''}}
                            type='checkbox'
                            name='countries[]'
                            value={{$country_id}}>
                            {{$country_name}}
                        </li>
                        </label>
                     @endforeach
                <li><input type='submit' value='Save Changes' class=''></li>

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
