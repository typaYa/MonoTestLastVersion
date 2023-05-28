@extends('main')
@section('content')

    <div class="container">
        <form method="get">
            @csrf
            <select class="form-select" aria-label="Пример выбора по умолчанию" name="qwe">

                @foreach($owners as $owner)
                <option value="{{$owner->id}}" name="qwe">{{$owner->fullName}}</option>

                @endforeach
            </select>
            <button type="submit" class="btn btn-primary" name="submit">Поиск</button>
        </form>


        @if(!isset($_POST['qwe']))


                <select class="form-select" aria-label="Пример выбора по умолчанию" name="qwe">
                    @foreach($cars as $car)
                        <option  name="qwe"><a href="{{route('show',$car->id_owner)}}">{{$car->mark}}</a></option>
                    @endforeach
                </select>

        @endif
    </div>
@endsection
