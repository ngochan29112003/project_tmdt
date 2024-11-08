@extends('super-admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-2"><a href="{{route('danh-sach-phan-quyen-admin')}}" class="text-dark fw-bold">TRANG QUẢN LÝ LỚP HỌC PHẦN</a></li>
                    <li class="breadcrumb-item active fs-2" aria-current="page">{{$adminPhanQuyen->HoTen}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Phân các quyền cho <span class="text-red">{{$adminPhanQuyen->HoTen}}</span></h3>
                        </div>
                        <div class="table-responsive">
                            <table id="table" class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">
                                        <input id="select-all" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices">
                                    </th>
                                    <th class="w-8 text-center">STT</th>
                                    <th class="w-auto text-center">Tên quyền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp
                                @foreach($listQuyen as $item)
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle permission-checkbox"
                                                   type="checkbox"
                                                   aria-label="Select invoice"
                                                   data-id="{{ $item->id }}"
                                                {{ in_array($item->id, $assignedPermissions) ? 'checked' : '' }}>
                                        </td>
                                        <td class="text-center"><span class="text-secondary">{{$loop->iteration}}</span></td>
                                        <td class="text-center">{{$item->TenQuyen}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var table = $('#table').DataTable({
            dom: 't', // Ẩn các thành phần không cần thiết
            paging: false, // Ẩn phân trang
            ordering: false
        });

        $(document).ready(function() {
            // Chọn tất cả checkbox
            $('#select-all').on('change', function() {
                let isChecked = $(this).is(':checked');
                $('.permission-checkbox').prop('checked', isChecked);
                updatePermissions(isChecked ? 'add' : 'remove');
            });

            // Sự kiện khi chọn từng checkbox
            $('.permission-checkbox').on('change', function() {
                let action = $(this).is(':checked') ? 'add' : 'remove';
                updatePermission($(this).data('id'), action);
            });

            function updatePermissions(action) {
                let selectedIds = [];
                $('.permission-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });

                $.ajax({
                    url: "{{ route('phan-quyen-admin.update') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        MaTK: "{{ $adminPhanQuyen->MaTK }}",
                        permissions: selectedIds,
                        action: action
                    },
                    success: function(response) {
                        toastr.success("Cập nhật phân quyền thành công!");
                    },
                    error: function(xhr) {
                        toastr.error("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                });
            }

            function updatePermission(permissionId, action) {
                $.ajax({
                    url: "{{ route('phan-quyen-admin.update-single') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        MaTK: "{{ $adminPhanQuyen->MaTK }}",
                        permissionId: permissionId,
                        action: action
                    },
                    success: function(response) {
                        toastr.success("Cập nhật phân quyền thành công!");
                    },
                    error: function(xhr) {
                        toastr.error("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                });
            }
        });
    </script>
@endsection
