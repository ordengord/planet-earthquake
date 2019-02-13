@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-check">
                <form class=form-check method="post" action="{{route('transaction')}}">
                    {{csrf_field()}}
                    <h1> My orders:</h1> <br/>
                    <ul class="list-group">
                        @foreach($orders as $order)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name= "{{$order->id}}" id="defaultCheck1">
                                <li class="list-group-item">{{$order}}</li>
                            </div>

                        @endforeach
                    </ul>
                    <input type="submit" class="btn-success" value="Confirm">
                    <button class="btn-info" href="">Delete selected</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection