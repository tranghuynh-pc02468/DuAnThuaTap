<?php

namespace App\Http\Controllers;

use App\Models\Smell;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSmellRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SmellController extends Controller
{
    public function index(){
        $list = Smell::paginate(5);
        return view('modules.smells.list',[
            'list' => $list,
        ]);
    }


    public function store(StoreSmellRequest $request){
        $data =[
            'name' => $request->name,
        ];
        $insert = Smell::insert($data);

        if($insert){
            Toastr::success('Thêm dữ liệu thành công', 'Thành công');
        }

        return redirect()->route('Smell');
    }


}
