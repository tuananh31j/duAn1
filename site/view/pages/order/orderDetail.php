<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link rel="stylesheet" href="/du-an-1-nhom7/public/css/style.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>

<body>
    <div class="container">
        <!-- logo -->
        <div class="checkout-done-logo d-flex justify-content-center m-5 align-content-center"><img src="img/logo 1.svg"
                alt=""></div>
        <div class="checkout-done">

            <div class="checkout-done-infor">
                <!-- lời cảm ơn -->
                <div class="checkout-done-infor-thankyou mb-5">
                    <div><i class="fa-solid fa-circle-check"></i></div>
                    <div class="thankyou-text">
                        <h1>Cảm ơn bạn đã đặt hàng!
                    </div>
                </div>
                <div class="checkout-infor-text">
                    <div class="d-flex gap-5">
                        <div class="checkout-infor-text-left">
                            <!-- thông tin khách hàng -->
                            <div>
                                <h4>Thông tin mua hàng</h4>
                                <p>Tuấn Anh</p>
                                <p>tuananh@gmail.com</p>
                                <p>0123456789</p>
                            </div>
                            <!-- phương thức thanh toán -->
                            <div>
                                <h4>Phương thức thanh toán</h4>
                                <p>Thanh toán khi nhận hàng:</p>
                            </div>
                        </div>

                        <!-- thông tin vận chuyển -->
                        <div class="checkout-infor-text-right">
                            <h4>Địa chỉ nhận hàng</h4>
                            <p>Tuấn Anh</p>
                            <p>Hà nội, Quốc Oai, Tân Hòa</p>
                            <p>0123456789</p>
                            <div>
                                <h4>Phương thức vận chuyển</h4>
                                <p>giao hàng tận nơi</p>
                            </div>
                        </div>
                    </div>
                    <!-- quay về trang chủ -->
                    <a href="/du-an-1-nhom7/index.php" class="btn text-decoration-none bg-danger text-light my-4">Tiếp
                        tục mua hàng</a>

                </div>

            </div>
            <!-- sản phẩm đặt hàng -->
            <div class="order bg-light p-3">
                <div>
                    <p class="fw-bold">Đơn hàng #1123 (2)</p>
                </div>
                <hr>
                <!-- item 1 -->
                <iframe src="/du-an-1-nhom7/site/view/pages/order/orders.php" style="width:100%; height: 200px"
                    frameborder="1"></iframe>

                <hr>

                <!-- chi tiết số tiền thanh toán -->
                <div class="order-pricing">
                    <!-- tổng các mặt hàng -->
                    <div class="order-pricing-total">
                        <div><span>Tạm tính</span></div>
                        <div><span>590000VND</span></div>
                    </div>

                    <!-- phí vận chuyển -->
                    <div class="order-pricing-shiping">
                        <div><span>Phí vận chuyển</span></div>
                        <div><span>25000VNĐ</span></div>
                    </div>
                    <hr>

                    <!-- tổng thể -->
                    <div class="order-pricing-final">
                        <div><span>Tổng cộng</span></div>
                        <div><span>615000VND</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 5,
        focus: 'center',
    });

    splide.mount();
    </script>
</body>

</html>