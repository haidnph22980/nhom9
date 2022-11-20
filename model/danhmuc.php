<?php
function insert_danhmuc($tenloai){
    $sql="insert into danhmuc(ten) values( '$tenloai' )";
                    pdo_execute($sql);
}
function delete_danhmuc($id){
    $sql="delete from danhmuc where id=" .$id;
    pdo_execute($sql);
}
function loadall_danhmuc(){
    $sql="select * from danhmuc order by ten";
                $listdm=pdo_query($sql);
                return $listdm;
}
function loadone_danhmuc($id){
    $sql ="select *from danhmuc where id=".$id;

    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    $sql="update danhmuc set ten='".$tenloai."' where id=".$id;
                        pdo_execute($sql);
}
?>