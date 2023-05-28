@extends('main')
@section('content')
    <div class="container">

        @foreach($owners as $owner)
            <form action="{{route('updateOwner',$owner->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3" style="display: none">
                    <input style="display: none" type="text" class="form-control" name="id" value="{{$owner->id}}">
                </div>


                <div class="mb-3">
                    <label  class="form-label">ФИО</label>
                    <input type="text" class="form-control" name="fullName" value="{{$owner->fullName}}" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Пол</label>
                    <input type="text" class="form-control" name="gender" value={{$owner->gender}} >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Телефон</label>
                    <input type="text" class="form-control" name="phone" value={{$owner->phone}} >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Адрес</label>
                    <input type="text" class="form-control" name="address" value={{$owner->address}} >
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
