<!--admin.php-->
<?php include('products.php'); ?>
<?php include('header.php'); ?>

<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Danh Sách <b>Hoa</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <a href="#addFlowerModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> <span>Thêm Hoa Mới</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tên Hoa</th>
                        <th>Mô Tả</th>
                        <th>Ảnh</th>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <th>Hành Động</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
                        <tr>
                            <td><?= htmlspecialchars($flower['name']) ?></td>
                            <td><?= htmlspecialchars($flower['description']) ?></td>
                            <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" width="50"></td>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <td>
                                    <a href="#editFlowerModal" class="edit" data-toggle="modal" data-id="<?= $index ?>" data-name="<?= htmlspecialchars($flower['name']) ?>" data-description="<?= htmlspecialchars($flower['description']) ?>" data-image="<?= htmlspecialchars($flower['image']) ?>">
                                        <i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i>
                                    </a>
                                    <a href="#deleteFlowerModal" class="delete" data-toggle="modal" data-id="<?= $index ?>">
                                        <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>

<!-- Add Employee Modal -->
<div id="addFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Hoa Mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" class="form-control-file" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="addFlower" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Employee Modal -->
<div id="editFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa Thông Tin Hoa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên Hoa</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" name="description" id="edit-description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh (tuỳ chọn)</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="editFlower" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Employee Modal -->
<div id="deleteFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <input type="hidden" name="id" id="delete-id">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa Hoa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa hoa này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="deleteFlower" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>