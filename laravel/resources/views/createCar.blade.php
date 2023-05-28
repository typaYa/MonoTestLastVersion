@extends('main')
@section('content')

    <div class="container">
        <form action="{{route('storeCar')}}" method="get">
            @csrf
            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="id" value="" >
            </div>



            <div class="mb-3">
                <label  class="form-label">Марка</label>
                <input type="text" class="form-control" name="mark" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Модель</label>
                <input type="text" class="form-control" name="model" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Цвет</label>
                <input type="text" class="form-control" name="color" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Номер машины</label>
                <input type="text" class="form-control" name="auto_number" >
            </div>



            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="is_presence" value="1" >
            </div>
            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="id_owner" value="{{$id}}" >
            </div>
            @if($errors->any())
                <ul>
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                </ul>
            @endif
            <button type="submit" class="btn btn-primary" name="submit">Отправить</button>
        </form>

    </div>

@endsection
