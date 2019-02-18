@extends('layouts.master')
@section('content')
    <form enctype="multipart/form-data" method=POST action= {{route('admin.imgresult')}} >
        {{csrf_field()}}
        <input type="file" name="diagrams[]" multiple accept="image/*, image/jpeg"><br/>
        <input type="submit" value="Upload!">
    </form>
@endsection