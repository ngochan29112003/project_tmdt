@extends('super-admin.master')
@section('contents')
    <div class="container-xl p-5">
        <!-- Header Section -->
        <div class="row justify-content-between align-items-center mb-5">
            <div class="col flex-shrink-0 mb-5 mb-md-0">
                <h1 class="display-7 mb-0">TRANG QUẢN LÝ THỐNG KÊ</h1>
            </div>
            <div class="col-12 col-md-auto">
                <div class="col-12 col-md-auto">
                    <div class="d-flex gap-4">
                        <select class="mw-10 form-select custom-select" id="LoaiThongKe" aria-label="Sales from" style="width: auto; display: none" >
                            <option value="ALL" selected>Tất cả</option>
                            <option value="Thang">Tháng (1 tháng gần nhất)</option>
                            <option value="Quy">Quý (3 tháng gần nhất)</option>
                            <option value="Nam">Năm (12 tháng gần nhất)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------- -->
        <div class="row gx-2 align-items-stretch">
            <!-- Khách hàng -->
            <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
                <div class="card card-raised bg-primary text-white h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="card-text">Tài khoản</div>
                                <div class="display-5 text-white">{{$tong_tk}}</div>

                            </div>
                            <div class="icon-circle bg-white text-primary d-flex justify-content-center align-items-center"
                                 style="width: 50px; height: 50px; border-radius: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3zM8 9a4 4 0 0 0-4 4v2h8V13a4 4 0 0 0-4-4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sản phẩm -->
            <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
                <div class="card card-raised bg-warning text-white h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="card-text">Sản phẩm</div>
                                <div class="display-5 text-white">{{$tong_sp}}</div>

                            </div>
                            <div class="icon-circle bg-white text-warning d-flex justify-content-center align-items-center"
                                 style="width: 50px; height: 50px; border-radius: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-bag" viewBox="0 0 16 16">
                                    <path
                                        d="M10 0a1 1 0 0 0-1 1v1h-2V1a1 1 0 0 0-2 0v1H2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10V1a1 1 0 0 0-1-1zM4 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1h-8V1zM2 3h12v11H2V3z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đơn hàng -->
            <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
                <div class="card card-raised bg-secondary text-white h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="card-text">Đơn hàng thành công</div>
                                <div class="display-5 text-white">{{$tong_dh}}</div>

                            </div>
                            <div class="icon-circle bg-white text-secondary d-flex justify-content-center align-items-center"
                                 style="width: 50px; height: 50px; border-radius: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 0a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V0zM2 1v12h12V1H2z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Doanh thu -->
            <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
                <div class="card card-raised bg-info text-white h-100">
                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="card-text">Doanh thu</div>
                                <div class="display-6 text-white text-wrap text-break">
                                    <span>{{$tong_tien}}</span>
                                    VNĐ
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------- -->

        <!-- Bảng khách hàng -->
        <div class="card card-raised mb-5">
            <div class="card-header bg-primary text-white px-4">
                <h2 class="card-title text-white mb-0">Thống kê khách hàng</h2>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{route('excel-export-khach-hang')}}"
                   class="btn btn-success align-items-center text-white btn-export">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <path d="M8 11h8v7h-8z" />
                        <path d="M8 15h8" />
                        <path d="M11 11v7" />
                    </svg>
                    Xuất file Excel
                </a>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="col-1 text-center font-weight-bold" style="font-size: 1rem;">STT</th>
                            <th class="col-3 text-center font-weight-bold" style="font-size: 1rem;">Họ và tên</th>
                            <th class="col-2 text-center font-weight-bold" style="font-size: 1rem;">SĐT</th>
                            <th class="col-2 text-center font-weight-bold" style="font-size: 1rem;">Số đơn đã đạt</th>
                            <th class="col-3 text-center font-weight-bold" style="font-size: 1rem;">Số tiền đã mua (VNĐ)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($stt = 1)
                        @foreach($list_kh as $item)
                            <tr>
                                <td class="text-center">{{$stt++}}</td>
                                <td class="text-start">{{$item->HoTen}}</td>
                                <td class="text-end">{{$item->SDT}}</td>
                                <td class="text-end">{{$item->SoDonDaMua}}</td>
                                <td class="text-end">{{number_format($item->TongTienDaMua, 0, ',', '.')}} VNĐ</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Bảng sản phẩm -->
        <div class="card card-raised mb-5">
            <div class="card-header bg-primary text-white px-4">
                <h2 class="card-title text-white mb-0">Thống kê sản phẩm</h2>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{route('excel-export-san-pham')}}"
                   class="btn btn-success align-items-center text-white btn-export">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <path d="M8 11h8v7h-8z" />
                        <path d="M8 15h8" />
                        <path d="M11 11v7" />
                    </svg>
                    Xuất file Excel
                </a>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="col-1 text-center font-weight-bold" style="font-size: 1rem;">STT</th>
                            <th class="col-4 text-center font-weight-bold" style="font-size: 1rem;">Tên sản phẩm</th>
                            <th class="col-2 text-center font-weight-bold" style="font-size: 1rem;">Số lượng tồn kho</th>
                            <th class="col-2 text-center font-weight-bold" style="font-size: 1rem;">Số lượng đã bán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($stt = 1)
                        @foreach($list_sp as $item)
                            <tr>
                                <td class="text-center">{{$stt++}}</td>
                                <td class="text-start">{{$item->TenSP}}</td>
                                <td class="text-end">
                                    @if($item->SoLuongTonKho < 0)
                                        0
                                    @else
                                        {{$item->SoLuongTonKho}}
                                    @endif
                                </td>
                                <td class="text-end">{{$item->SoLuongDaBan}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

        @endsection
        @section('scripts')
            <script>
                $(document).ready(function () {
                    $('#LoaiThongKe').change(function () {
                        var loaiThongKe = $(this).val();
                        var url = '{{ route("get-thong-ke") }}';  // Kiểm tra URL
                        console.log(url);  // In URL ra console để kiểm tra

                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',  // Đảm bảo csrf_token có trong yêu cầu
                                LoaiThongKe: loaiThongKe
                            },
                            success: function (response) {
                                if (response.success) {
                                    // Cập nhật dữ liệu thống kê trên trang
                                    $('.card-body .display-5:eq(0)').text(response.tong_tk);
                                    $('.card-body .display-5:eq(1)').text(response.tong_sp);
                                    $('.card-body .display-5:eq(2)').text(response.tong_dh);
                                    $('.card-body .display-6 span').text(response.tong_tien);
                                }
                            },
                            error: function (xhr, status, error) {
                                alert('Có lỗi xảy ra khi tải dữ liệu.');
                            }
                        });
                    });
                });


            </script>
@endsection

