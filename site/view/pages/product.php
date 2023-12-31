<!-- MAIN CONTENT -->
<div class="main-content ">
    <div class="header-banner">

        <!-- banner -->
        <div class="header-banner" style="max-height:500px; overflow-y: hidden;">
            <a href="index.php?url=proDetails&id=<?= $banner['product_id'] ?>&view=<?= getProById($banner['product_id'])['view'] + 1 ?>"><img src="<?= $IMAGE . '/' . $banner['banner_url'] ?>" alt="" class="  w-100  object-fit-cover" /></a>
        </div>

    </div>
    <main class="container">
        <!-- đường dẫn -->
        <!-- <div class="header-link m-0">
            <span><a href="">Trang chủ</a> > </span>
            <span><a href="index.php?url=product" class="text-danger">Sản phẩm</a></span>
        </div> -->

        <div class="content-title my-5 ">
            <h2 class="tw-font-semibold tw-text-xl">Sản phẩm của chúng tôi</h2>
            <div class="content-fillter d-flex flex-row-reverse
                     my-5">
                <!-- sắp xếp -->


                <div class="dropdown mx-2">
                    <button class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        sắp xếp mặc định
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=az">A
                                -> Z</a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=za">Z
                                -> A</a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=priceup">Giá
                                tăng dần</a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=pricedown">Giá
                                giảm dần</a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=new">Hàng
                                mới nhất</a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&category=<?php echo isset($category) ? $category : 0 ?>&sort=old">Hàng
                                cũ nhất</a></li>
                    </ul>
                </div>

                <div class="price-filter">
                    <button class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lọc theo giá <i class="fa-solid fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="index.php?url=product&sort=<?php echo isset($sort) ? $sort : 0 ?>&category=<?php echo isset($category) ? $category : 0 ?>&filter=down">50k
                                <i class="fa-solid fa-arrow-down"></i></a></li>
                        <li><a class="dropdown-item" href="index.php?url=product&sort=<?php echo isset($sort) ? $sort : 0 ?>&category=<?php echo isset($category) ? $category : 0 ?>&filter=betweent1">20k-60k</a>
                        </li>
                        <li><a class="dropdown-item" href="index.php?url=product&sort=<?php echo isset($sort) ? $sort : 0 ?>&category=<?php echo isset($category) ? $category : 0 ?>&filter=betweent2">60k-150k</a>
                        </li>
                        <li><a class="dropdown-item" href="index.php?url=product&sort=<?php echo isset($sort) ? $sort : 0 ?>&category=<?php echo isset($category) ? $category : 0 ?>&filter=up">50k
                                <i class="fa-solid fa-arrow-up"></i></a></li>
                    </ul>
                </div>



            </div>
            <!-- product -->
            <div class="main-product container mt-4">
                <div class="row">


                    <!-- list product -->
                    <div class="container text-center col">
                        <!-- item -->
                        <div class="row row-cols-4">
                            <?php
                            $index = 0;
                            foreach ($products as $item) {

                                $priceNew = $item['price'] - ($item['price'] * ($item['sale'] / 100));
                                $custumPriceOld = number_format($item['price'], 0, ",", ".");
                                $custumPriceNew = number_format($priceNew, 0, ",", ".");
                                $index++;
                            ?>
                                <!-- item child -->
                                <div class="col mb-4 position-relative">
                                    <div class="card h-100 tw-border-0 hover:tw-border">
                                        <!-- ảnh -->
                                        <div class="h-100">
                                            <a href="index.php?url=proDetails&id=<?= $item['product_id'] ?>&view=<?= $item['view'] + 1 ?>"><img style="height: 100%; object-fit: cover;" src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="card-img-top" alt="..."></a>
                                            <!-- giảm giá -->
                                            <?php if ($item['sale'] > 0 && $item['sale'] <= 100) {
                                            ?>
                                                <div class="main-product-sale "><span class="bg-danger p-1 d-inline text-light"><?= $item['sale'] ?>%</span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <!-- tên -->
                                            <div class="name-product">
                                                <h6 style="font-size: 14px;" class="card-title fw-bold">
                                                    <?= $item['name'] ?>
                                                </h6>
                                            </div>

                                            <!-- giá -->
                                            <p class="card-text text-danger fw-bold">
                                                <?php echo $custumPriceNew ?> <span class="text-decoration-underline">đ</span>
                                                <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                    <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld ?></span>
                                                <?php } ?>
                                            </p>
                                            <?php

                                            $idPro = $item['product_id'];
                                            $item = getProFeedback($idPro);
                                            $countFB =  getFeedbackCountById($idPro);
                                            if ($item == []) {
                                                $item = getProNoFeedback($idPro);
                                            }
                                            if (isset($_GET['view']) && $_GET['view'] > 0) {
                                                $view = $_GET['view'];
                                                updateView($idPro, $view);
                                            }

                                            $target = $item;
                                            ?>
                                            <!-- điểm đánh giá trung bình -->
                                            <div class="content-right-whitlist d-flex align-items-center gap-1 mb-2 justify-content-center">
                                                <span class="star-rating fs-3" data-rating="<?= isset($target['avg_star']) ? $target['avg_star'] : 0 ?>">
                                                </span><span class=" fs-6">(<?= isset($countFB['count_fb']) ? $countFB['count_fb'] : 0 ?>)</span>

                                            </div>
                                            <button type="button" class="btn border-danger text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $index ?>">Đặt
                                                ngay</button>
                                            <!-- form thêm vào giỏ hàng -->
                                            <form class="" action="index.php?url=now" method="post">
                                                <div class="modal fade" id="exampleModal-<?php echo $index ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- tên sản phẩm -->
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    <?= $item['name'] ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- item order -->
                                                                <div hidden>
                                                                    <input type="text" name="id" value="<?= $item['product_id'] ?>">
                                                                    <input type="text" name="name" value="<?= $item['name'] ?>">
                                                                    <input type="text" name="img" value="<?= $item['image_url'] ?>">

                                                                </div>
                                                                <div class="card mb-3" style="max-width: 540px;">
                                                                    <div class="row g-0">
                                                                        <div class="col-md-4">
                                                                            <img src="<?= $IMAGE . '/' . $item['image_url'] ?>" class="img-fluid rounded-start" alt="...">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body">

                                                                                <p class="card-text text-danger fw-bold">
                                                                                    <span class=""><?php echo $custumPriceNew ?></span>
                                                                                    <span class="text-decoration-underline">đ</span>
                                                                                    <?php if ($item['sale'] > 0 && $item['sale'] <= 100) { ?>
                                                                                        <span class="main-product-price-old text-decoration-line-through text-secondary" style="font-size: 10px;"><?= $custumPriceOld ?></span>
                                                                                    <?php } ?>
                                                                                </p>

                                                                                <!-- size -->
                                                                                <div class="d-flex gap-4 my-3 ms-1 align-items-center">
                                                                                    <div>
                                                                                        <span>Kích cỡ: </span>
                                                                                    </div>
                                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                        <?php
                                                                                        $flag = 0;
                                                                                        foreach ($listSize as $key => $size) {
                                                                                            $flag += 1;
                                                                                            if (getPrice($item['product_id'], $size['size_id']) == []) {
                                                                                                continue;
                                                                                            }
                                                                                        ?>
                                                                                            <input type="radio" value="<?= $size['size_id'] ?>" class="btn-check" name="size" id="btnradio<?= $flag . '-' . $index ?>" autocomplete="off" <?php if ($flag == 1) echo 'checked' ?>>
                                                                                            <label class="btn btn-outline-primary price__check" for="btnradio<?= $flag . '-' . $index ?>"><?= $size['name'] ?></label>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>


                                                                                <!-- số lượng -->
                                                                                <div class="d-flex gap-3 my-3 align-items-center">
                                                                                    <div>
                                                                                        <span>Số lượng: </span>
                                                                                    </div>
                                                                                    <div class="d-flex">

                                                                                        <button type="button" class="border-info rounded-2">
                                                                                            <i class="fa-solid fa-minus"></i>
                                                                                        </button>
                                                                                        <input class="quantity border-secondary mx-2 rounded-2 p-1 ps-2" style="width: 30px;" type="text" id="quantity-<?= $index ?>" value="1" name="quantity">
                                                                                        <button type="button" class="border-danger rounded-2">
                                                                                            <i class="fa-solid fa-plus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- btn -->
                                                                <input type="submit" name="btn-add" value="Đặt hàng" class="border-0 rounded-2 bg-danger text-light p-2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>

                        </div>




                        <!-- more product -->
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link border-danger" href="index.php?url=product&category=<?= isset($category) ? $category : 0 ?>&sort=<?php echo isset($sort) ? $sort : 0 ?>&filter=<?php echo isset($filterType) ? $filterType : 0 ?>">1</a>
                                    </li>
                                    <?php

                                    $count = 1;
                                    $page = 1;
                                    for ($i = 0; $i < sizeof($allPro); $i++) {
                                        $count++;

                                        if ($count == 12) {
                                            $page += 1;
                                            $count = 0;

                                    ?>
                                            <li class="page-item "><a class="page-link border-danger" href="index.php?url=product&sort=<?php echo isset($sort) ? $sort : 0 ?>&category=<?php echo isset($category) ? $category : 0 ?>&filter=<?php echo isset($filterType) ? $filterType : 0 ?>&pagenum=<?= $page ?>">
                                                    <?= $page ?>
                                                </a>
                                            </li>
                                    <?php }
                                    } ?>



                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

            </div>






    </main>
</div>
<script>
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
        updateQuantity(input, quantity);
    }

    // Hàm giảm số lượng, đảm bảo số lượng không âm
    function decreaseQuantity(input) {
        let quantity = parseInt(input.value);
        if (quantity > 1) {
            quantity -= 1;
            updateQuantity(input, quantity);
        }
    }

    // Hàm cập nhật số lượng vào thẻ input
    function updateQuantity(input, quantity) {
        input.value = quantity;
    }

    //rating
    // star
    document.addEventListener("DOMContentLoaded", function() {
        const starRatingElements = document.querySelectorAll(".star-rating");

        starRatingElements.forEach(function(starRatingElement) {
            const rating = parseFloat(starRatingElement.dataset.rating);
            const fullStars = Math.floor(rating);
            const decimalPart = rating % 1;
            const halfStars = decimalPart >= 0.25 && decimalPart < 0.75 ? 1 : 0;
            const remainingStars = 5 - fullStars - halfStars;

            starRatingElement.innerHTML = getStarIcons(fullStars, halfStars, remainingStars);
        });
    });

    function getStarIcons(fullStars, halfStars, remainingStars) {
        let starIcons = "";

        for (let i = 0; i < fullStars; i++) {
            starIcons += `<span class="full-star">&#9733;</span>`;
        }

        if (halfStars === 1) {
            starIcons += `<span class="half-star">&#9733;</span>`;
        }

        for (let i = 0; i < remainingStars; i++) {
            starIcons += `<span class="empty-star">&#9733;</span>`;
        }

        return starIcons;
    }



    const banner = new Splide('.splide', {
        type: 'loop',
        perPage: 1,
    });
    banner.mount()
</script>