@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="form-check">
            <form class=form-check action="{{route('create-transaction')}}">
                {{csrf_field()}}
                <h1> My orders:</h1> <br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> Latitude</th>
                        <th scope="col"> Longitude</th>
                        <th scope="col"> Start date</th>
                        <th scope="col"> End date</th>
                        <th scope="col"> Cost</th>
                    </tr>
                    </thead>
                    @foreach($orders as $order)
                        <tr>
                            <td scope="row">{{$order->latitude}}</td>
                            <td scope="row">{{$order->longitude}}</td>
                            <td scope="row">{{$order->start_date}}</td>
                            <td scope="row">{{$order->end_date}}</td>
                            <td scope="row">{{$order->cost}}</td>
                            <td scope="row">
                                <button id="delete" name="{{$order->id}}">
                                    <img src="/img/icons/sign-delete-icon.png"
                                         width=25 height=25></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p class="text-danger">
                    Total: {{$total}} $
                </p> <br/>
                <input type="submit" id="submit" class="btn-success" value="Confirm">
            </form>
        </div>
    </div>
    <hr/>



@endsection

@section('scripts')
    <script src="{{asset('js/order/delete_order.js')}}"></script>

@endsection




