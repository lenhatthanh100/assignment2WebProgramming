<?php
$kindAction = null; //1->showProductList, 2->showDetailedProduct
$resultJson = null;

// Phân loại tác vụ 
if ($_GET['kindAction'] == 'showProductList') {
    $kindAction = 1;
}
else {
    $kindAction = 2;
}

// Phân luồng xử lý
if ($kindAction == 1) {
    include '../../model/generalAndMember/serviceModel.php';
    $productObjectArr = json_decode($resultJson);
    $totalProduct = count($productObjectArr);
    $vsmartArr = $vinfastArr = $vinhomesArr = array();
    // Phân loại sản phẩm theo thương hiệu
    for ($count = 0; $count < $totalProduct; $count++) {
        if ($productObjectArr[$count]->brand_product == 'Vsmart') {
            array_push($vsmartArr,$productObjectArr[$count]);
        }
        else if ($productObjectArr[$count]->brand_product == 'Vinfast') {
            array_push($vinfastArr,$productObjectArr[$count]);
        }
        else {
            array_push($vinhomesArr,$productObjectArr[$count]);
        }
    }
    $totalVsmart = count($vsmartArr);
    $totalVinfast = count($vinfastArr);
    $totalVinhomes = count($vinhomesArr);

    // Vsmart
    if ($_GET['brandProduct'] == 'Vsmart') {
        echo '
        <div>
        ';
        $vsmartCount = 0;
        for ($count1 = 0; $count1 < floor($totalVsmart/3)+1; $count1++) {
            echo '
            <div class="row mt-3">
            ';
            for ($count2 = 0; $count2 < 3; $count2++) {
                if ($vsmartCount > ($totalVsmart) - 1) {
                    break;
                }
                echo '
                <div class="col-md-4 px-3">
                    <div class="gallery pb-3 scaleDichVuSanPhamVinsmart" onclick=(product("showDetailedProduct&idProduct=',$vsmartArr[$vsmartCount]->id_product,'"))>
                        <img src="',$vsmartArr[$vsmartCount]->link_image,'" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVsmart">
                        <div class="desc"><p class="font-weight-bold mb-0">',$vsmartArr[$vsmartCount]->name_product,'</p></div>
                        <p class="font-italic mx-2">',$vsmartArr[$vsmartCount]->short_content,'</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href=',"'contactView.php'",'">LIÊN HỆ NGAY</button>
                        </div>
                    </div>			
                </div>
                ';
                $vsmartCount++;            
            }
            echo '
            </div>
            ';
        }
        echo '
        </div>
        ';
    }    

    // Vinfast
    if ($_GET['brandProduct'] == 'Vinfast') {        
        echo '
        <div>
        ';
        $vinfastCount = 0;
        for ($count1 = 0; $count1 < floor($totalVinfast/3)+1; $count1++) {
            echo '
            <div class="row mt-3">
            ';
            for ($count2 = 0; $count2 < 3; $count2++) {
                if ($vinfastCount > ($totalVinfast) - 1) {
                    break;
                }
                echo '
                <div class="col-md-4 px-3">
                    <div class="gallery pb-3 scaleDichVuSanPhamVinfast" onclick=(product("showDetailedProduct&idProduct=',$vinfastArr[$vinfastCount]->id_product,'"))>
                        <img src="',$vinfastArr[$vinfastCount]->link_image,'" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinfast">
                        <div class="desc"><p class="font-weight-bold mb-0">',$vinfastArr[$vinfastCount]->name_product,'</p></div>
                        <p class="font-italic mx-2">',$vinfastArr[$vinfastCount]->short_content,'</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href=',"'contactView.php'",'">LIÊN HỆ NGAY</button>
                        </div>
                    </div>			
                </div>
                ';
                $vinfastCount++;            
            }
            echo '
            </div>
            ';
        }
        echo '
        </div>
        ';
    }

    // Vinhomes
    if ($_GET['brandProduct'] == 'Vinhomes') {
        echo '
        <div>
        ';
        $vinhomesCount = 0;
        for ($count1 = 0; $count1 < floor($totalVinhomes/3)+1; $count1++) {
            echo '
            <div class="row mt-3">
            ';
            for ($count2 = 0; $count2 < 3; $count2++) {
                if ($vinhomesCount > ($totalVinhomes) - 1) {
                    break;
                }
                echo '
                <div class="col-md-4 px-3">
                    <div class="gallery pb-3 scaleDichVuSanPhamVinhome" onclick=(product("showDetailedProduct&idProduct=',$vinhomesArr[$vinhomesCount]->id_product,'"))>
                        <img src="',$vinhomesArr[$vinhomesCount]->link_image,'" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinhomes">
                        <div class="desc"><p class="font-weight-bold mb-0">',$vinhomesArr[$vinhomesCount]->name_product,'</p></div>
                        <p class="font-italic mx-2">',$vinhomesArr[$vinhomesCount]->short_content,'</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href=',"'contactView.php'",'">LIÊN HỆ NGAY</button>
                        </div>
                    </div>			
                </div>
                ';
                $vinhomesCount++;            
            }
            echo '
            </div>
            ';
        }
        echo '
        </div>
        ';
    }
}
else {
    $idProduct = $_GET['idProduct'];
    include '../../model/generalAndMember/serviceModel.php';
    $productObject = json_decode($resultJson);
    echo '            
    <h2 class="new font-weight-bold pt-5">',$productObject->name_product,'</h2>            
    <p class="text-secondary font-italic">',$productObject->time_create,'</p>
    <div>
        <img src="',$productObject->link_image,'" class="img-thumbnail mx-auto d-block" alt="tinTucMoiNhat">
    </div>
    <p class=mt-3>',nl2br($productObject->long_content),'</p>
    <div class="text-center">
        <button type="button" class="btn btn-success" onclick="window.location.href=',"'contactView.php'",'">LIÊN HỆ NGAY</button>
    </div>
    ';
}
?>