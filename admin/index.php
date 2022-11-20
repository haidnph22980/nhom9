<?php
    include "..//model/pdo.php";
    include "../model/danhmuc.php";
    include"../model/sanpham.php";
    include "header.php";
    //controller

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
          
                include "danhmuc/add.php";
                break;
            case 'lisdm':
                $listdm=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
            }
            $listdm=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                case 'suadm': 
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        
                        $dm=loadone_danhmuc($_GET['id']);



                    }
                
                include "danhmuc/update.php";
                break;
                case 'updatedm':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_danhmuc($id,$tenloai);
                        
                        $thongbao="Cập nhật thành công";
                    }
                    
                    $listdm=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

                /* controller sản phẩm */
                case 'addsp':
                    
                    
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        // $tenloai=$_POST['tenloai'];
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $hinh = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                           // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["ten"])). " has been uploaded.";
                          } else {
                            //echo "Sorry, there was an error uploading your file.";
                          }
                        $mota = $_POST['mota'];
                        insert_sanpham(  $tensp, $giasp,$hinh, $mota,$iddm);
                        $thongbao="Thêm thành công";
                    }
                    $listdm=loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                case 'listsp':
                    $listsanpham=loadall_sanpham();
                    include "sanpham/list.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_sanpham($_GET['id']);
                }
                $listsanpham=loadall_sanpham();
                    include "sanpham/list.php";
                    break;
                    case 'suasp': 
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            
                            $dm=loadone_sanpham($_GET['id']);
    
    
    
                        }
                    
                    include "sanpham/update.php";
                    break;
                    case 'updatesp':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $tenloai=$_POST['tenloai'];
                            $id=$_POST['id'];
                            update_sanpham($id,$tenloai);
                            
                            $thongbao="Cập nhật thành công";
                        }
                        
                        $listdm=loadall_sanpham();
                    include "sanpham/list.php";
                    break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
   
    include "footer.php";
