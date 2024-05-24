<?php

namespace App\Http\Controllers;

use App\Models\PackagingSpecification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePackagingSpecificationRequest;

class PackagingSpecificationController extends Controller
{
    public function index()
    {
        $list = PackagingSpecification::paginate(5);

        return view('modules.packaging-specifications.list', [
            'list' => $list,
        ]);
    }

    public function store(StorePackagingSpecificationRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $insert = PackagingSpecification::insert($data);

        if ($insert) {
            Toastr::success('Thêm dữ liệu thành công');
        }

        return redirect()->route('PackagingSpecification');
    }

    public function edit($id)
    {
        $list = PackagingSpecification::paginate(5);
        $data = PackagingSpecification::find($id);

        return view('modules.packaging-specifications.list', [
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
                Rule::unique('packaging_specifications')->ignore($id),
            ],
        ], [
            'required' => 'Vui lòng không bỏ trống!',
            'unique' => 'Tên đã tồn tại',
        ]);

        $validator->validate();

        $update = PackagingSpecification::find($id)->update($data);

        if ($update) {
            Toastr::success('Cập nhật thành công');
        }

        return redirect()->route('PackagingSpecification');
    }

    public function delete($id)
    {
        $destroy = PackagingSpecification::find($id)->delete();
        if ($destroy) {
            Toastr::success('Xóa dữ liệu thành công');
        } else {
            Toastr::error('Xóa dữ liệu thất bại');
        }

        return redirect()->route('PackagingSpecification');
    }
}
