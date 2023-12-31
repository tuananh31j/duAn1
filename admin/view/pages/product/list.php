<!-- content -->
<div class=" col ">
    <div class="container">
        <h3 class="text-center my-5 tw-font-semibold tw-text-lg">DANH SÁCH SẢN PHẨM</h3>
        <div class="d-flex ">
            <!-- thêm sản phẩm -->

            <a href="index.php?url=product&act=add" class="bg-success hover:tw-opacity-75 h-25 p-1 px-2 rounded-2 text-light m-3 text-decoration-none">Thêm sản
                phẩm <i class="fa-solid fa-plus"></i></a>
            <!-- fillter -->
            <div class="dropdown m-3">
                <button class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-filter"></i> Sắp xếp
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?url=product&act=list&filter=az">A->Z</a></li>
                    <li><a class="dropdown-item" href="index.php?url=product&act=list&filter=za">Z->A</a></li>
                    <li><a class="dropdown-item" href="index.php?url=product&act=list&filter=new">Mới nhất</a></li>
                    <li><a class="dropdown-item" href="index.php?url=product&act=list&filter=old">Cũ nhất</a></li>
                    <li><a class="dropdown-item" href="index.php?url=product&act=list&filter=view">nhiều lượt xem nhất
                            <i class="fa-solid fa-arrow-up"></i></a>
                    </li>
                </ul>
            </div>
            <!-- tìm kiếm -->
            <div class="m-3">
                <form action="index.php?url=product&act=list&filter=<?= isset($filter) ? $filter : '' ?>" method="post">
                    <input class="p-1 rounded-2 tw-border-2" type="search" name="keyWord" placeholder="nội dung tìm kiếm...">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="p-1 border-1 text-light rounded-2 bg-black">
                    <p class="text-danger"><?= isset($errKw) ? $errKw : '' ?></p>
                </form>
            </div>
        </div>

        <!-- content -->
        <div>
            <table class="table table-hover table-bordered text-center">
                <thead style="border: 2px solid black">
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Loại</th>
                        <th><i class="fa-sharp fa-solid fa-eye"></i></th>

                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>$</th>
                        <th>Sale<i class="fa-solid fa-percent"></i></th>
                        <th style="width: 100px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($products as $key => $pro) { ?>
                        <tr>

                            <td><?php
                                echo $key + 1
                                ?></td>
                            <td style="width: 60px;"><img class="w-100" src="<?= $IMAGE . '/' . $pro['image_url'] ?>" alt=""></td>
                            <td>
                                <div class="tw-overflow-auto tw-w-20"><?= $pro['name'] ?></div>
                            </td>
                            <td class="tw-relative des__custom">
                                <div class="tw-w-24"><?php $flag = 0;
                                                        $index = 0;
                                                        for ($i = 0; $i < strlen($pro['des']); $i++) {
                                                            echo $pro['des'][$i];
                                                            $flag++;
                                                            if ($flag >= 10 && $flag <= 20  && $pro['des'][$i] == ' ') {
                                                                echo "</br>";
                                                                $flag = 0;
                                                                $index++;
                                                            }
                                                            if ($index == 2) {
                                                                echo '.....';
                                                                break;
                                                            }
                                                        } ?></div>
                                <span class="des__more tw-hidden tw-absolute tw-bg-white tw-text-gray-600 tw-z-10 tw-w-96 tw-p-4 tw-border-2 tw-border-red-900 tw-rounded tw-bottom-3"><?= $pro['des'] ?></span>
                            </td>
                            <td>
                                <div class="tw-w-14 tw-overflow-auto"><?= $pro['category_name'] ?></div>
                            </td>
                            <td><?= $pro['view'] ?></td>
                            <td><?= $pro['create_at'] ?></td>
                            <td><?= $pro['update_at'] ?></td>
                            <td class="text-danger"><?= number_format($pro['price'], 0, ',', '.') ?><span class="text-decoration-underline">đ</span></td>
                            <td><?= $pro['sale'] ?></td>

                            <td><button onclick="confirmDelete('product&act=delete&id=<?= $pro['product_id'] ?>')" class="bg-danger border-0 text-light p-1 rounded-2 hover:tw-opacity-75">Xóa</button> |
                                <a href="index.php?url=product&act=update&id=<?= $pro['product_id'] ?>" class="bg-info text-light p-1 rounded-2 hover:tw-opacity-75">Sửa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link border-danger" href="index.php?url=product&act=list&filter=<?php echo isset($filter) ? $filter : 0 ?>">1</a>
                    </li>
                    <?php

                    $count = 1;
                    $page = 1;
                    for ($i = 0; $i < sizeof($all); $i++) {
                        $count++;

                        if ($count == 8) {
                            $page += 1;
                            $count = 0;

                    ?>
                            <li class="page-item "><a class="page-link border-danger" href="index.php?url=product&act=list&filter=<?php echo isset($filter) ? $filter : 0 ?>&pagenum=<?= $page ?>">
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
<script>
    const desCustom = document.querySelectorAll('.des__custom');
    const desMore = document.querySelectorAll('.des__more');
    desCustom.forEach((item, index) => {
        item.addEventListener("mouseenter", function() {
            desMore[index].classList.remove("tw-hidden");
        });
        item.addEventListener("mouseleave", function() {
            desMore[index].classList.add("tw-hidden");
        })
    })
</script>