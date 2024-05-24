@section('content')

    <main id="main" class="main" style="height: 80vh">

        <div class="pagetitle">
            <h1>Hương vị</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item">Hương vị</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thêm mới</h5>
                            <form action="{{ route('SmellStore') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên<small
                                            class="text-danger ms-1">*</small></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name')  }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Thêm mới</button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách</h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                @php $index = 1 @endphp
                                @foreach($list as $item)
                                    <tr>
                                        <th scope="row">{{ $index++ }}</th>
                                        <td>{{ $item->name }}</td>

                                        <td class="d-flex">
                                            <a href="{{ route('SmellEdit', $item->id) }}"
                                               class="btn btn-warning text-white me-3"><i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('SmellDelete', $item->id) }}" method="POST">
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa thông tin này?');" class="btn btn-danger" type="submit">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                            {{ $list->links() }}
                        </div>
                    </div>


                </div>


            </div>
        </section>

    </main>

@endsection
@extends('master')