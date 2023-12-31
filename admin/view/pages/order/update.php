<div class="col">
    <div>
        <!-- MAIN CONTENT -->

        <div class="main-content container my-5 ">
            <h3 class="text-center my-5 tw-font-semibold tw-text-lg">CHI TIẾT ĐƠN HÀNG</h3>
            <p class="text-success"><?= isset($noti) ? $noti : '' ?></p>
            <div class="cart-products  row gap-3 align-items-center">

                <!-- item -->
                <form action="index.php?url=order&act=update&id=<?= $id ?>" method="post">
                    <?php
                    $totalPrice = 0;
                    $countQuantity = 0;
                    if (isset($target)) {
                        foreach ($target as $index => $product) {
                            $targetPro = getProById($product['product_id']);
                            $cost = getPrice($product['product_id'], $product['size_id'])['price'];
                            $priceSale = $cost * $targetPro['sale'] / 100;
                            $currentPrice = $cost - $priceSale;
                            $curPriceFormat = number_format($currentPrice, 0, ',', '.');
                            $totalPrice += $currentPrice * $product['quantity'];
                            $countQuantity += $product['quantity'];

                    ?>

                            <div class="cart-product-items col">
                                <div class="cart-item">

                                    <!-- id chi tiết sản phẩm -->
                                    <input type="text" value="<?= $product['product_id'] ?>" name="id[<?= $index ?>]" hidden>
                                    <div class="cart-product-item row align-items-center">
                                        <!-- ảnh sản phẩm -->
                                        <div class="col-2"><img class="w-100" src="<?= $IMAGE . '/' . $product['img'] ?>" alt="">
                                        </div>
                                        <!-- tiêu đề sản phẩm -->
                                        <div class="col-3 fw-bold">
                                            <p><?= $product['namePro'] ?></p>
                                        </div>
                                        <div class="d-flex gap-3 col-6 m-3 mb-4 align-items-center">
                                            <!-- giá sản phẩm -->
                                            <div class="text-danger" style="width: 100px;">
                                                <span class="fw-bold price" data-price="<?= $currentPrice ?>"><?= $curPriceFormat ?> <span class=" text-decoration-underline">đ</span></span><br>
                                                <span style="font-size: 12px; font-style: italic;" class="text-secondary text-decoration-line-through"><?= $cost ?> <span class=" text-decoration-underline">đ</span></span>
                                            </div>
                                            <!-- số lượng -->
                                            <div>
                                                <button type="button" class="border-info rounded-2">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input class="quantity border-secondary mx-2 rounded-2 p-1 ps-2" style="width: 30px;" type="text" id="quantity-<?= $index ?>" value="<?= $product['quantity'] ?>" name="quantity[<?= $index ?>]">
                                                <button type="button" class="border-danger rounded-2">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- size -->
                                            <div style="width: 120px;">
                                                <label class="mx-4  mb-2" for="size">Size: <span class=" text-danger fs-4 fw-bold"><?= getSizeName($product['size_id'])['name'] ?></span></label>
                                                <input hidden type="text" value="<?= $product['size_id'] ?>" name="size">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    <?php }
                    } ?>
                    <!-- nút thanh toán và tổng tiền -->
                    <div class="cart-total  ms-1  border-top-0 border-end-0 border-bottom-0 border">
                        <div class="">
                            <p>Tạm tính: <span class="text-danger fw-bold fs-3"><span id="total"></span><i class="text-decoration-underline"> đ</i></span></p>
                        </div>
                        <div class="tw-w-1/4">
                            <?php if ($target[0]['status'] <= 1) { ?>
                                <button type="submit" name="btn-update" class="w-50 border border-2 bg-light border-danger text-danger p-2 rounded-2 item__hover-cate">Cập nhật</button>
                            <?php } else { ?>
                                <p onclick="notiErr()" class="w-50 border border-2 bg-light border-danger text-danger ps-4 p-2 rounded-2 item__hover-cate">Cập nhật</p>
                            <?php } ?>
                        </div>

                    </div>
                </form>

            </div>


        </div>
        <script>
            const price = document.querySelectorAll(".price")
            const totalPrice = document.querySelector("#total")
            // Lấy tất cả các phần tử có class "quantity"
            const quantityInputs = document.querySelectorAll('.quantity');

            // Thêm sự kiện tăng giảm số lượng cho từng phần tử
            quantityInputs.forEach(input => {
                input.nextElementSibling.addEventListener('click', function() {
                    increaseQuantity(input);
                });

                input.previousElementSibling.addEventListener('click', function() {
                    decreaseQuantity(input);
                });
            });

            // Hàm tăng số lượng
            function increaseQuantity(input) {
                let quantity = parseInt(input.value);
                quantity += 1;
                if (quantity <= 9) {
                    updateQuantity(input, quantity);
                    updateTotal();
                }

            }

            // Hàm giảm số lượng, đảm bảo số lượng không âm
            function decreaseQuantity(input) {
                let quantity = parseInt(input.value);
                if (quantity > 1) {
                    quantity -= 1;
                    updateQuantity(input, quantity);
                    updateTotal();
                }
            }

            // Hàm cập nhật số lượng vào thẻ input
            function updateQuantity(input, quantity) {
                input.value = quantity;
            }
            //cập nhật tông tiền
            const updateTotal = () => {
                let result = 0;
                price.forEach((e, key) => {
                    result += e.getAttribute("data-price") * quantityInputs[key].value;
                })
                totalPrice.innerText = result.toLocaleString().replace(/,/, '.');
            }
            updateTotal();

            function notiErr() {
                swal("Không thể cập nhật!", "Đơn hàng đã được gửi, bạn không thể cập nhật lại đơn hàng này!", "error");
            }
        </script>
    </div>
</div>