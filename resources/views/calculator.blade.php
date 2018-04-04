@extends('layouts.master')

@section('title')
    Bill Splitter
@endsection

@section('content')
    <div class="container">
        <h1>Bill Splitter</h1>
        <p>Bill Splitter helps you calculate the amount of bill for each one. </p>
        <form method='Post' action='/'>
            {{ csrf_field() }}
            <ul class="form-style-1">
                <li><label for='waysOfSplit'>Split how many ways? <span class="required">*</span></label></li>
                <li><input type='text'
                           name='waysOfSplit'
                           id='waysOfSplit' value=@if (isset($waysOfSplit)) {{$waysOfSplit}} @endif ></li>
                <li><label for='tabCost'>How much was the tab? <span class="required">*</span></label></li>
                <li><input type='text'
                           name='tabCost'
                           id='tabCost' value= @if (isset($tabCost)) {{$tabCost}} @endif></li>
                <li><label for='serviceRating'>How was the service?</label></li>
                <li><select name='serviceRating' id='serviceRating'>
                        <option value='-1'>Choose one...</option>
                        <option value='20' @if (isset($serviceRating) && $serviceRating == 20) {{'selected'}} @endif>Excellent (20% tip)</option>
                        <option value='18' @if (isset($serviceRating) && $serviceRating == 18) {{'selected'}} @endif>Very Good (18% tip)</option>
                        <option value='16' @if (isset($serviceRating) && $serviceRating == 16) {{'selected'}} @endif>Good(16% tip)</option>
                        <option value='0' @if (isset($serviceRating) && $serviceRating == 0) {{'selected'}} @endif>Poor(0 tip)</option>
                    </select></li>
                <li><label for='roundUp'>Round up?
                        <input type='checkbox'
                               name='roundUp'
                               @if (isset($roundUp) && $roundUp == true) checked @endif > Yes</label></li>
                <li><input type='submit' value='Calculate' class=''></li>

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