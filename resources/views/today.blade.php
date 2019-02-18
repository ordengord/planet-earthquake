@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-7 col-xs-12" style="width: 1em; height: 20em; background-position: center">
            {!! Mapper::render() !!}
        </div>
        <div class="col col-md-5">
            <fieldset>
                <legend>Select date for demonstration purpose. <br /> <br />
                    Free to use is available between {{$min}}
                    and {{$max}}</legend>
                <div>
                    <form method="POST" action="{{route('postDemonstrate')}}">
                        {{csrf_field()}}
                        <label for="start">Start</label>
                        <input type="date" name="dateSelect" select
                               value="{{$date}}"
                               min="{{$min}}" max="{{$max}}"/>
                        <input type="submit" name="submit" value="Change Date">
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
@endsection