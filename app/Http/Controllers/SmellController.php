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
    public function index()
    {
        $list = Smell::paginate(5);
        return view('modules.smells.list', [
            'list' => $list,
        ]);
    }


    public function store(StoreSmellRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $insert = Smell::insert($data);

        if ($insert) {
            Toastr::success('Thêm dữ liệu thành công', 'Thành công');
        }

        return redirect()->route('Smell');
    }


    public function edit($id)
    {
        $list = Smell::paginate(5);
        $data = Smell::find($id);

        return view('modules.smells.list', [
            'data' => $data,
            'list' => $list,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
        ];

        $validator = Validator::make($data, [
            'name' => [
                'required',
                Rule::unique('smells')->ignore($id),
            ],
        ], [
            'required' => 'Vui lòng không bỏ trống!',
            'unique' => 'Tên đã tồn tại',
        ]);

        $validator->validate();

        $update = Smell::find($id)->update($data);

        if ($update) {
            Toastr::success('Cập nhật thành công');
        }

        return redirect()->route('Smell');
    }


}
