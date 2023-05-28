@extends('main')
@section('content')
    <div class="container">

        @foreach($cars as $car)
        <form action="{{route('update',$car->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="id" value="{{$car->id}}" >
            </div>


            <div class="mb-3">
                <label  class="form-label">Марка</label>
                <input type="text" class="form-control" name="mark" value="{{$car->mark}}" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Модель</label>
                <input type="text" class="form-control" name="model" value={{$car->model}} >
            </div>
            <div class="mb-3">
                <label  class="form-label">Цвет</label>
                <input type="text" class="form-control" name="color" value={{$car->color}} >
            </div>
            <div class="mb-3">
                <label  class="form-label">Номер машины</label>
                <input type="text" class="form-control" name="auto_number" value={{$car->auto_number}} >
            </div>



            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="is_presence" value="{{$car->is_presence}}" >
            </div>
            <div class="mb-3" style="display: none">
                <input style="display: none" type="text" class="form-control" name="id_owner" value="{{{$car->id_owner}}}" >
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Изменить</button>
        </form>
        @endforeach
            @if($errors->any())
                <ul>
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                </ul>
            @endif
    </div>
@endsection
