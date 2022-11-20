<?php

require_once "pdo.php";

function insert_sanpham( $tensp, $giasp,$hinh, $mota ,$iddm){
    $sql="INSERT INTO sanpham(ten,gia,img,mota,iddm) VALUES ('$tensp','$giasp','$hinh','$mota','$iddm');";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=" .$id;
    pdo_execute($sql);
}
function loadall_sanpham(){
    $sql="select * from sanpham order by ten";
                $listsanpham=pdo_query($sql);
                return $listsanpham;
}
function loadone_sanpham($id){
    $sql ="select *from sanpham where id=".$id;

    $dm=pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id,$tenloai){
    $sql="update sanpham set ten='".$tenloai."' where id=".$id;
                        pdo_execute($sql);
}
?>