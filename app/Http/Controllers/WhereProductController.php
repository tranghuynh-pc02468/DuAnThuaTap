<?php

namespace App\Http\Controllers;

use App\Models\WhereProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreWhereProductRequest;

class WhereProductController extends Controller
{
    public function index()
    {
        $list = WhereProduct::paginate(5);

        return view('modules.where-products.list', [
            'list' => $list,
        ]);
    }

    public function store(StoreWhereProductRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];
        $insert = WhereProduct::insert($data);

        if ($insert) {
            Toastr::success('Thêm dữ liệu thành công', 'Thành công');
        }

        return redirect()->route('WhereProduct');
    }

    public function edit($id)
    {
        $list = WhereProduct::paginate(5);
        $data = WhereProduct::find($id);

        return view('modules.where-products.list', [
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
                Rule::unique('where_products')->ignore($id),
            ],
        ], [
            'required' => 'Vui lòng không bỏ trống!',
            'unique' => 'Tên đã tồn tại',
        ]);

        $validator->validate();

        $update = WhereProduct::find($id)->update($data);

        if ($update) {
            Toastr::success('Cập nhật thành công');
        }

        return redirect()->route('WhereProduct');
    }

    public function delete($id)
    {
        $destroy = WhereProduct::find($id)->delete();
        if ($destroy) {
            Toastr::success('Xóa dữ liệu thành công', 'Thành công');
        } else {
            Toastr::error('Xóa dữ liệu thất bại', 'Thất bại');
        }
        return redirect()->route('WhereProduct');
    }
}
