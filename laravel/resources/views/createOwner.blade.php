@extends('main')
@section('content')
    <div class="container">
    <form action="{{route('storeOwner')}}" method="post">
        @csrf
        <div class="mb-3" style="display: none">
            <input style="display: none" type="text" class="form-control" name="id" value="" >
        </div>



        <div class="mb-3">
            <label  class="form-label">ФИО</label>
            <input type="text" class="form-control" name="fullName" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Пол</label>
            <input type="text" class="form-control" name="gender" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Номер телефона</label>
            <input type="text" class="form-control" name="phone" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Адрес</label>
            <input type="text" class="form-control" name="address">
        </div>






        <button type="submit" class="btn btn-primary" name="submit">Отправить</button>
    </form>
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
