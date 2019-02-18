@extends('layouts.master')
<style type="text/css">
    td textarea{
        border: none;
        width: 100%;
        height: 100%;
        -webkit-box-sizing:border-box;
        -moz-box-sizing: border-box;
        box-sizing:border-box
        }

</style>
@section('content')
    <?php $col = 0; $row = 0; ?>

    <form action="" method="post">
        {{csrf_field()}}
        <table class="table table-responsive-sm" border="2px" width="100%">
            <tr class="table-info">
                @foreach ($columns as $column)
                    <th>{{$column}}</th>
                @endforeach
            </tr>
            @for($row; $row < $quantity; $row++ )
                <tr>
                    <?php $col = 0; ?>
                    @foreach($table[$row] as $cell)
                        <td class="table-dark">
                            <textarea class="form-control" name="{{"area_" . $row . "_" . $col}}" >{{$cell}}</textarea>
                        </td>
                            <?php $col++; ?>
                    @endforeach
                        <td>
                            <button class="btn-dark" name="update" value="{{"submit_" . $row}}"
                                    formaction="{{url()->current() . '/update'}}">Update</button>
                        </td>
                        <td>
                            <button class="btn-danger" name="delete" value="{{"delete_" . $row}}"
                                    formaction="{{url()->current() . '/delete'}}">Delete</button>
                        </td>
                </tr>
            @endfor
        </table>
        <hr/>
        <input type="submit" class="btn-success" value="Save all changes">
    </form>
@endsection