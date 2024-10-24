@extends('khach-hang.master')

@section('contents')
    <head>
        <meta charset="utf-8">
        <style>
            /* Reset và chuẩn hóa */
            body {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                color: #333;
            }

            .wrapperMain_content {
                padding: 20px;
            }

            /* Breadcrumb */
            .breadcrumb-list {
                margin: 20px 0;
                display: flex;
                align-items: center;
            }

            .breadcrumb-list a {
                text-decoration: none;
                color: #1982F9;
                font-weight: bold;
            }

            .breadcrumb-list a svg {
                margin-right: 5px;
            }

            .breadcrumb-cart a {
                color: #555;
                text-decoration: none;
                font-size: 14px;
                display: inline-flex;
                align-items: center;
            }

            .breadcrumb-cart a:hover {
                color: #1982F9;
            }

            /* Bước tiến trình */
            .section-steps {
                margin: 30px 0;
                display: flex;
                justify-content: space-between;
            }

            .checkout-step {
                text-align: center;
                flex: 1;
                padding: 10px;
                position: relative;
            }

            .checkout-step.is-active .icon svg {
                fill: #E30019;
            }

            .checkout-step .text {
                margin-top: 8px;
                font-weight: 500;
                color: #535353;
            }

            .checkout-step.is-active .text {
                color: #E30019;
            }

            .checkout-step:not(:last-child)::after {
                content: "";
                position: absolute;
                top: 50%;
                right: -20px;
                width: 40px;
                height: 2px;
                background-color: #ccc;
                transform: translateY(-50%);
            }

            /* Bảng sản phẩm */
            .table {
                width: 100%;
                background-color: #fff;
                border-collapse: collapse;
                margin: 20px 0;
                box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            }

            .table th, .table td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .table th {
                background-color: #f7f7f7;
                font-weight: bold;
            }

            .table tbody tr:hover {
                background-color: #f1f1f1;
            }

            /* Nút */
            .btn {
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                font-size: 14px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin: 5px;
            }

            .btn-primary {
                background-color: #1982F9;
                color: #fff;
            }

            .btn-primary:hover {
                background-color: #156fdd;
            }

            .btn-success {
                background-color: #28a745;
                color: #fff;
            }

            .btn-success:hover {
                background-color: #218838;
            }

            /* Điều chỉnh trên màn hình nhỏ */
            @media (max-width: 768px) {
                .section-steps {
                    flex-direction: column;
                }

                .checkout-step:not(:last-child)::after {
                    display: none;
                }

                .cart-order {
                    padding: 10px;
                }

                .table th, .table td {
                    padding: 8px;
                }
            }
        </style>
    </head>

    <main class="wrapperMain_content">
        <div class="cart-layout" id="cart-page">
            <div class="container-fluid">
                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-cart">
                        <a href="/collections/all" class="is-current">
                            <svg width="16" height="16" fill="#1982F9">
                                <path d="M10.5 12L5.5 8L10.5 4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> Mua thêm sản phẩm khác
                        </a>
                    </div>
                </div>

                <div class="cart-main">
                    <section class="section-steps">
                        <div class="checkout-steplist status">
                            <div class="checkout-step is-active" data-box="cart-buy-order-box">
                                <div class="icon">
                                    <svg viewBox="0 0 29 28" fill="#E30019">
                                        <circle cx="14.5" cy="14" r="14"/>
                                    </svg>
                                </div>
                                <div class="text"><span>Giỏ hàng</span></div>
                            </div>

                            <div class="checkout-step" data-box="cart-info-order-box">
                                <div class="icon">
                                    <svg viewBox="0 0 29 28">
                                        <circle cx="14.5" cy="14" r="13.5" stroke="#535353"/>
                                    </svg>
                                </div>
                                <div class="text"><span>Thông tin đặt hàng</span></div>
                            </div>

                            <div class="checkout-step" data-box="cart-payment-order-box">
                                <div class="icon">
                                    <svg viewBox="0 0 29 28">
                                        <circle cx="14.5" cy="14" r="13.5" stroke="#535353"/>
                                    </svg>
                                </div>
                                <div class="text"><span>Thanh toán</span></div>
                            </div>

                            <div class="checkout-step">
                                <div class="icon">
                                    <svg viewBox="0 0 29 28">
                                        <circle cx="14.5" cy="14" r="13.5" stroke="#535353"/>
                                        <path d="M13.1 17.2L10.4 14.6L11.4 13.7L13.1 15.4L17.5 11.2L18.4 12.1"/>
                                    </svg>
                                </div>
                                <div class="text"><span>Hoàn tất</span></div>
                            </div>
                        </div>
                    </section>

                    <div class="cart-infos" id="cart-buy-order-box">
                        <section class="section-order">
                            <div class="cart-order">
                                <form action="/cart" method="post" id="cartformpage">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
                                        <a href="" class="btn btn-success">Thanh toán</a>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
