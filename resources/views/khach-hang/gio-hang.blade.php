@extends('khach-hang.master')

@section('contents')
    <div class="page-body">
        <div class="container-xl d-flex justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chitiet as $item)
                            <tr>
                                <td>{{ $item->TenSP }}</td>
                                <td>{{ number_format($item->GiaBan) }}₫</td>
                                <td>
                                    <input type="number" value="{{ $item->SLSanPham }}" class="form-control" style="width: 80px;">
                                </td>
                                <td>{{ number_format($item->GiaBan * $item->SLSanPham) }}₫</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <h5>Tổng cộng: <strong>{{ number_format($chitiet->sum(function($item) { return $item->GiaBan * $item->SLSanPham; })) }}₫</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
