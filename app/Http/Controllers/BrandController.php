<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreBrandRequest;


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
}
