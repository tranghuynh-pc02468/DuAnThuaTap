<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreBrandRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::paginate(5);

        return view('modules.brands.list', [
            'list' => $list,
        ]);
    }

    public function store(StoreBrandRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $insert = Brand::insert($data);

        if ($insert) {
            Toastr::success('Thêm dữ liệu thành công');
        }

        return redirect()->route('Brand');
    }

    public function edit($id)
    {
        $list = Brand::paginate(5);
        $data = Brand::find($id);

        return view('modules.brands.list',[
            'list' => $list,
           'data' => $data,
        ]);
    }

    public function update (Request $request, $id){
        $data = [ 'name' => $request->name ];

        $validator = Validator::make(
            $data,
            [
                'name' => [ 'required', Rule::unique('brands')->ignore($id), ]
            ],
            [
                'name.required' => 'Vui lòng nhập thông tin!',
                'name.unique' => 'Tên đã tồn tại',
            ],
        );

        $validator->validate();

        $update = Brand::find($id)->update($data);

        if($update){
            Toastr::success('Cập nhật thành công');
        }

        return redirect()->route('Brand');
    }
}
