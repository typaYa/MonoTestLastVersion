<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Owner;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class OwnerController extends Controller
{
    public function index(){
       // $cars = Auto::query()->paginate(1);
        $owners = Owner::query()->paginate(1);
        $cars = Auto::query()->get();

        return view('showOwners',compact('owners','cars'));
}
    public function createOwner(){
        return view('createOwner');
    }

    public function storeOwner(){
        $owner =request()->validate(
            [
                'id' =>'',
                'fullName'=>['required','string','min:3','max:100'],
                'gender'=>['required','string','max:20'],
                'phone'=>['required','integer'],
                'address'=>['required','string','max:60'],

            ]
        );

        Owner::query()->insert($owner);
        return redirect()->route('home');
    }

    public function show($id){
        $cars = Auto::query()->where('id_owner','=',$id)->get();

        return view('showCars',compact('cars'));

    }
    public function createCar($id){
        return view('createCar',compact('id'));
    }
    public function storeCar(){
        $car =request()->validate(
            [
                'id'=>'',
                'mark' =>['required','string','max:20'],
                'model'=>['required','string','max:20'],
                'color'=>['required','string','max:20'],
                'auto_number'=>['required','string','max:20'],
                'is_presence'=>['required','integer','max:1'],
                'id_owner'=>['required','integer']
            ]
        );
        Auto::query()->insert($car);
        return redirect()->route('home');
    }

    public function edit($id){
        $cars = Auto::query()->where('id','=',$id)->get();
        return view('editCar',compact('cars'));
    }
    public function flagUpdate($id){
        $cars = Auto::query()->where('id','=',$id)->get();
        foreach ($cars as $car){
            if ($car->is_presence==1){
                Auto::query()->where('id','=',$id)->update(['is_presence'=>0]);
            }else{
                Auto::query()->where('id','=',$id)->update(['is_presence'=>1]);
            }
            return redirect()->route('show',$car->id_owner);
        }

    }
    public function update($id){

        $car =request()->validate(
            [
                'id'=>'',
                'mark' =>['required','string','max:20'],
                'model'=>['required','string','max:20'],
                'color'=>['required','string','max:20'],
                'auto_number'=>['required','string','max:20'],
                'is_presence'=>['required','integer','max:1'],
                'id_owner'=>['required','integer']
            ]
        );

        Auto::query()->where('id','=',$id)->update($car);
        return redirect()->route('home');
    }

    public function delete($id){

        Auto::query()->where('auto_number','=',$id)->delete();
        return redirect()->route('home');
    }



    public function allCars(){
       $cars = Auto::query()->paginate(1);
       return view('allCars',compact('cars'));
    }



    public function searchCar(Request $request){
        $owners = Owner::query()->get();

        /*$ownerCars=request()->validate([
            'id'=>''
        ]);*/
        $cars='';

        if ($request->input('qwe')){
            $id= $request->input('qwe');
            $cars = Auto::query()->where('id_owner','=',$id)->get();

            return view('searchCars',compact('owners','cars'));
        }
        else{
            return view('searchCars',compact('owners','cars'));
        }
    }


    public function editOwner($id){
        $owners = Owner::query()->where('id','=',$id)->get();
        return view('editOwner',compact('owners'));
    }

    public function updateOwner($id){

        $owners =request()->validate(
            [
                'id' =>'',
                'fullName'=>['required','string','min:3','max:100'],
                'gender'=>['required','string','max:20'],
                'phone'=>['required','integer'],
                'address'=>['required','string','max:60'],

            ]
        );

        Owner::query()->where('id','=',$id)->update($owners);
        return redirect()->route('home');
    }

    public function deleteOwner($id){

        Owner::query()->where('id','=',$id)->delete();
        return redirect()->route('home');
    }

}
