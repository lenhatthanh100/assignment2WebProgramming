<?php
$kindAction = null; //1->showNewsList, 2->showDetailedNews
$resultJson = null;

// Phân loại tác vụ 
if ($_GET['kindAction'] == 'showNewsList') {
    $kindAction = 1;
}
else {
    $kindAction = 2;
}

// Phân luồng xử lý
if ($kindAction == 1) {
    include '../../model/generalAndMember/newsModel.php';
    $newsObjectArr = json_decode($resultJson);
    $totalNews = count($newsObjectArr);
    // Tin mới nhất
    echo '
    <div class="row zoom pt-3" onclick=news("showDetailedNews&idNews=',$newsObjectArr[0]->id_news,'")>
        <div class="col-md-7">
            <div>
                <span class="badge badge-success">Tin mới nhất</span>
                <div class="spinner-grow spinner-grow-sm text-success"></div>
            </div>
            <br>
            <h4 class="new font-weight-bold">',$newsObjectArr[0]->title,'</h4>
            <p class="text-secondary font-italic">',$newsObjectArr[0]->time_create,'</p>
            <p>',$newsObjectArr[0]->short_content,'</p>            
        </div>
        <div class="col-md-5 px-0">
            <img src="',$newsObjectArr[0]->link_image,'" class="img-thumbnail" alt="tinTucMoiNhat">
        </div>
    </div>
    ';
    // Tin tức khác
    $countNews = 1;
    echo '
    <div>
    ';
    for ($count1 = 0; $count1 < floor(($totalNews-1)/3)+1; $count1++) {
        echo '
        <div class="row mt-3">
        ';
        for ($count2 = 0; $count2 < 3; $count2++) {
            if ($countNews > ($totalNews) - 1) {
                break;
            }
            echo '
            <div class="col-md-4 px-4" onclick=news("showDetailedNews&idNews=',$newsObjectArr[$countNews]->id_news,'")>
                <div class="row zoom">				  
                    <img src="',$newsObjectArr[$countNews]->link_image,'" class="scaleNew rounded" alt="tinTuc">
                    <h5 class="new font-weight-bold mt-3">',$newsObjectArr[$countNews]->title,'</h5>
                    <p class="text-secondary font-italic">',$newsObjectArr[$countNews]->time_create,'</p>
                    <p>',$newsObjectArr[$countNews]->short_content,'</p>                    
                </div>
            </div>
            ';
            $countNews++;            
        }
        echo '
        </div>
        ';
    }
    echo '
    </div>
    ';
}
else {
    $idNews = $_GET['idNews'];
    include '../../model/generalAndMember/newsModel.php';
    $newsObject = json_decode($resultJson);
    echo '      
    <h2 class="new font-weight-bold pt-5">',$newsObject->title,'</h2>            
    <p class="text-secondary font-italic">',$newsObject->time_create,'</p>
    <div>
        <img src="',$newsObject->link_image,'" class="img-thumbnail mx-auto d-block" alt="tinTucMoiNhat">
    </div>
    <p class=mt-3>',nl2br($newsObject->long_content),'</p>
    ';
}
?>