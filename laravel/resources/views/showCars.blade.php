@extends('main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Марка</th>
            <th scope="col">Модель</th>
            <th scope="col">Цвет</th>
            <th scope="col">Номер машины</th>
            <th scope="col">Присутствие на стоянке</th>
            <th scope="col">Удаление машин</th>
            <th scope="col">Редактирование</th>


        </tr>
        </thead>
        <tbody>
        <?php $i=1?>
        @foreach($cars as $car)

            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$car->mark}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->color}}</td>
                <td>{{$car->auto_number}}</td>
                <td>@if($car->is_presence==1)
                        На стоянке
                        <form action="{{route('flagUpdate',$car->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="submit" value="P" style="color: blue">
                        </form>
                    @else
                        <form action="{{route('flagUpdate',$car->id)}}" method="post">
                            @csrf
                            @method('patch')
                            Не на стоянке
                            <input type="submit" value="P" style="color: red">
                        </form>
                @endif</td>
                <td>
                    <form action="{{route('delete',$car->auto_number)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>

                </td>

                <td><a href="{{route('edit',$car)}}">Редактировать</a></td>
                    <?php $i++?>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
