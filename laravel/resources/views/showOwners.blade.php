@extends('main')
@section('content')


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Удалить</th>
        <th scope="col">Редактировать</th>
        <th scope="col">ФИО</th>
        <th scope="col">Пол</th>
        <th scope="col">Телефон</th>
        <th scope="col">Адрес</th>
        <th scope="col">Машины</th>
        <th scope="col">Добавление машин</th>

    </tr>
    </thead>
    <tbody>
        <?php $i=1?>
    @foreach($owners as $owner)

        <tr>
            <th scope="row">{{$i}}</th>
            <th scope="row"><form action="{{route('deleteOwner',$owner->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить">
                </form></th>
            <td><a href="{{route('editOwner',$owner)}}">Редактировать</a></td>
            <td>{{$owner->fullName}}</td>
            <td>{{$owner->gender}}</td>
            <td>{{$owner->phone}}</td>
            <td>{{$owner->address}}</td>

            <td><a href="{{route('show',$owner->id)}}">
                    @foreach($cars as $car)
                        @if($car->id_owner == $owner->id)
                    {{$car->auto_number}}
                            @endif
                    @endforeach
                </a></td>

            <td><a href="{{route('createCar',$owner->id)}}">Добавить машину</a></td>
                <?php $i++?>
        </tr>
    @endforeach
    </tbody>
</table>
<div>
    {{$owners->links()}}
</div>
@endsection
