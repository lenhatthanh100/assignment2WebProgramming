<?php
$userObject = unserialize($_COOKIE["user"]);    
$kindAction = null; //1->showProductList, 2->showAddProductForm, 3->addProduct, 4->deleteProduct

// Phân loại tác vụ
if ($_POST['kindAction'] == 'showProductList') {
    $kindAction = 1;     
}
else if ($_POST['kindAction'] == 'showAddProductForm') {
    $kindAction = 2;            
}
else if ($_POST['kindAction'] == 'addProduct') {
    $kindAction = 3;            
}
else {
    $kindAction = 4;                    
}

// Phân luồng xử lý
// Hiển thị danh sách sản phẩm
if ($kindAction == 1) {
    $resultJson = null;
    include '../../model/staff/manageServiceModel.php';    
    $productObjectArr = json_decode($resultJson);
    $stt = 1;
        echo "<p class='text-success'>Số sản phẩm hiện tại: ",count($productObjectArr),"</p>";
        echo
        "<table class='table table-hover'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID sản phẩm</th>
                    <th>Thương hiệu</th>
                    <th>Tên sản phẩm</th>
                    <th>Người phụ trách</th>
                    <th>Thời gian</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($productObjectArr as $product) {
            echo 
                "<tr>
                    <td>",$stt,"</td>
                    <td>",$product->id_product,"</td>
                    <td>",$product->brand_product,"</td>
                    <td>",$product->name_product,"</td>  
                    <td>",$product->name,"</td>
                    <td>",$product->time_create,"</td>
                    <td><button type='button' class='btn btn-danger btn-sm' value='deleteProduct&idProduct=",$product->id_product,"' onclick=manageProduct(this.value)>Xóa</button></td> 
                </tr>";
            $stt++;
        }
        echo 
            "</tbody>
        </table>";
}
// Hiển thị form thêm sản phẩm mới
else if ($kindAction == 2) {
    echo '
    <div class="container">
        <h2><span class="badge badge-warning text-white mb-3">Thêm sản phẩm mới</span></h2>
        <form class="form-horizontal" method="POST">
            <p><span class="font-weight-bold">Thương hiệu</span></p>
            <div class="form-group ml-3">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" id="Vsmart" name="ThuongHieuForm" value="Vsmart">Vsmart
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" id="Vinfast" name="ThuongHieuForm" value="Vinfast">Vinfast
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" id="Vinhomes" name="ThuongHieuForm" value="Vinhomes">Vinhomes
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label font-weight-bold" for="nameProductForm">Tên sản phẩm</label>
                <div class="ml-3">
                    <input type="text" class="form-control" name="nameProductForm" id="nameProductForm" placeholder="Nhập tên sản phẩm">
                </div>			    
            </div>
            <div class="form-group">
                <label class="control-label font-weight-bold" for="linkImageForm">Link hình ảnh minh họa</label>
                <div class="ml-3">
                    <input type="text" class="form-control" name="linkImageForm" id="linkImageForm" placeholder="Nhập link hình ảnh minh họa">
                </div>			    
            </div>
            <div class="form-group">
                <label class="control-label font-weight-bold" for="shortContentForm">Nội dung rút gọn</label>
                <div class="ml-3">
                    <input type="text" class="form-control" name="shortContentForm" id="shortContentForm" placeholder="Nhập nội dung rút gọn">
                </div>			    
            </div>
            <div class="form-group">
                <label class="control-label font-weight-bold" for="longContentForm">Nội dung đầy đủ</label>
                <div class="ml-3">
                    <textarea type="text" class="form-control" rows="20" name="longContentForm" id="longContentForm" placeholder="Nhập nội dung đầy đủ"></textarea>
                </div>			    
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning text-white mt-3" value="addProduct" onclick="manageProduct(this.value)">Thêm sản phẩm mới</button>
            </div>
        </form>
    </div>
    ';
}
// Thêm sản phẩm mới
else if ($kindAction == 3) {
    $idCreater = $_POST['idCreater'];
    $linkImage = $_POST['linkImage'];
    $brandProduct = $_POST['brandProduct'];   
    $nameProduct = $_POST['nameProduct'];    
    $shortContent = $_POST['shortContent'];
    $longContent = $_POST['longContent'];
    $timeCreate = $_POST['timeCreate'];
    include '../../model/staff/manageServiceModel.php';
}
// Xóa bài viết
else {
    $idProduct = $_POST['idProduct'];
    include '../../model/staff/manageServiceModel.php';
}
?>