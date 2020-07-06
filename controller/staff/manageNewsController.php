<?php
$userObject = unserialize($_COOKIE["user"]);    
$kindAction = null; //1->showNewsList, 2->showAddNewsForm, 3->addNews, 4->deleteNews

// Phân loại tác vụ
if ($_POST['kindAction'] == 'showNewsList') {
    $kindAction = 1;     
}
else if ($_POST['kindAction'] == 'showAddNewsForm') {
    $kindAction = 2;            
}
else if ($_POST['kindAction'] == 'addNews') {
    $kindAction = 3;            
}
else {
    $kindAction = 4;                    
}

// Phân luồng xử lý
// Hiển thị danh sách bài viết
if ($kindAction == 1) {
    $resultJson = null;
    include '../../model/staff/manageNewsModel.php';    
    $newsObjectArr = json_decode($resultJson);
    $stt = 1;
        echo "<p class='text-success'>Số bài viết hiện tại: ",count($newsObjectArr),"</p>";
        echo
        "<table class='table table-hover'>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID bài viết</th>
                    <th>Tiêu đề bài viết</th>
                    <th>Người tạo</th>
                    <th>Thời gian</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($newsObjectArr as $news) {
            echo 
                "<tr>
                    <td>",$stt,"</td>
                    <td>",$news->id_news,"</td>
                    <td>",$news->title,"</td>  
                    <td>",$news->name,"</td>                      
                    <td>",$news->time_create,"</td>
                    <td><button type='button' class='btn btn-danger btn-sm' value='deleteNews&idNews=",$news->id_news,"' onclick=manageNews(this.value)>Xóa</button></td> 
                </tr>";
            $stt++;
        }
        echo 
            "</tbody>
        </table>";
}
// Hiển thị form tạo bài viết mới
else if ($kindAction == 2) {
    echo '
    <div class="container">
        <h2><span class="badge badge-success mb-3">Tạo bài viết mới</span></h2>
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label font-weight-bold" for="titleForm">Tiêu đề bài viết</label>
                <div class="ml-3">
                    <input type="text" class="form-control" name="titleForm" id="titleForm" placeholder="Nhập tiêu đề bài viết">
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
                    <textarea type="text" class="form-control" rows="10" name="longContentForm" id="longContentForm" placeholder="Nhập nội dung đầy đủ"></textarea>
                </div>			    
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success mt-3" value="addNews" onclick="manageNews(this.value)">Tạo bài viết mới</button>
            </div>
        </form>
    </div>
    ';
}
// Tạo bài viết mới
else if ($kindAction == 3) {
    $idCreater = $_POST['idCreater'];    
    $title = $_POST['title'];
    $linkImage = $_POST['linkImage'];
    $shortContent = $_POST['shortContent'];
    $longContent = $_POST['longContent'];
    $timeCreate = $_POST['timeCreate'];
    include '../../model/staff/manageNewsModel.php';
}
// Xóa bài viết
else {
    $idNews = $_POST['idNews'];
    include '../../model/staff/manageNewsModel.php';
}
?>