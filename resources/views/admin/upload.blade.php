@extends('layouts.app')
@section('content')
    <form enctype="multipart/form-data" method=POST action= {{route('admin.upload-store')}} >
        {{csrf_field()}}
        <input type="file" name="diagrams[]" multiple accept="image/*, image/jpeg"><br/>
        <input type="submit" value="Upload!">
    </form>
@endsection