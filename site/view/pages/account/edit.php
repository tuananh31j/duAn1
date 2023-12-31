<!-- MAIN-CONTENT -->
<div class="main-content my-5 container">
    <h2 class="text-center tw-text-xl">Cập nhật thông tin cá nhân</h2>
    <p class="text-success"><?= isset($noti) ? $noti : '' ?></p>

    <div class="d-flex justify-content-center my-4" style="height: 210px;">
        <?php if (isset($_SESSION['user']['image_url']) && $_SESSION['user']['image_url'] != '') { ?>
            <img class="h-100 rounded-2 border border-2 border-danger" src="<?= $IMAGE . '/' . $_SESSION['user']['image_url'] ?>" alt="">
        <?php } ?>
    </div>
    <div class="d-flex justify-content-center ">
        <img style="width: 15%;" class="m-4 rounded-2" src="../img/mm.png" alt="">

    </div>
    <form action="index.php?url=account&act=update" method="post" enctype="multipart/form-data">
        <!-- id -->
        <input hidden type="text" name="id" value="<?= $_SESSION['user']['customer_id'] ?>">

        <!-- họ tên -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Họ tên<span class="text-danger">*</span></label>
            <input name="name" value="<?= $_SESSION['user']['name'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p class="text-danger"><?= isset($err['name']) ? $err['name'] : '' ?></p>
        </div>
        <!-- email -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email<span class="text-danger">*</span></label>
            <input name="email" value="<?= $_SESSION['user']['email'] ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p class="text-danger"><?= isset($err['email']) ? $err['email'] : '' ?></p>
        </div>
        <!-- số điên thoại -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
            <input name="phone" value="<?= $_SESSION['user']['phone'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p class="text-danger"><?= isset($err['phone']) ? $err['phone'] : '' ?></p>
        </div>
        <!-- địa chỉ -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
            <input name="address" value="<?= isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] : '' ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ của bạn!">
        </div>
        <!-- ảnh đại diện -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
            <input name="img" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p class="text-danger"><?= isset($err['img']) ? $err['img'] : '' ?></p>
        </div>
        <input type="reset" value="Nhập lại" class="bg-info border-0 rounded-2 p-2 text-light mt-3 hover:tw-opacity-70">
        <input type="submit" name="btn-update" value="Cập nhật" class="bg-danger border-0 rounded-2 p-2 text-light mt-3 hover:tw-opacity-70">
    </form>
</div>