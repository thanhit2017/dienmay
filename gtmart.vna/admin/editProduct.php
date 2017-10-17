﻿<!DOCTYPE html>
<?php
include ("session.php");
?>
<?php
$id = $_GET['id'];
$detail_product = detail_table("product", $id);

// Ấn định  dung lượng file ảnh upload
define("MAX_SIZE", "1000");

// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

$errors = 0;
// lấy tên file upload
if (isset($_POST['btnThem'])) {

    $name = $_POST["name"];
    $tenkd = changeTitle($name);
    $loai_sp = $_POST['menu_cha'];
    $gia = $_POST['gia'];
    $hightline = $_POST['hightline'];
    $made = $_POST['made'];
    $brand = $_POST['brand'];
    // lấy tên file upload
    $image = $_FILES['image']['name'];
    // Nếu nó không rỗng
    if ($image) {
        // Lấy tên gốc của file
        $filename = stripslashes($_FILES['image']['name']);
        //Lấy phần mở rộng của file
        $extension = getExtension($filename);
        $extension = strtolower($extension);
        // Nếu nó không phải là file hình thì sẽ thông báo lỗi
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
            // xuất lỗi ra màn hình
            $loi = '<h1>Đây không phải là file hình!</h1>';
            $errors = 1;
        }

        //Lấy dung lượng của file upload
        $size = filesize($_FILES['image']['tmp_name']);
        if ($size > MAX_SIZE * 1024) {
            $loi = '<h1>Vượt quá dung lượng cho phép!</h1>';
            $errors = 1;
        }
        // đặt tên mới cho file hình up lên
        $image_name = time() . '.' . $extension;
        // gán thêm cho file này đường dẫn
        $newname = "../images/" . $image_name;
        // di chuyển hình
        $copied = copy($_FILES['image']['tmp_name'], $newname);
    } else {
        $image_name = $detail_product[4];
    }
}


if (isset($_POST['btnThem']) && $errors == 0) {


    echo $qr = "
		update product set
			name_product='$name',
			unsigned_name_product='$tenkd',
			price_product='$gia',
			images_product='$image_name',
			id_made='$made',
			id_menu='$loai_sp',
			Highlights='$hightline',
			id_brand='$brand'
			WHERE id_product='$id'
		";
    mysql_query($qr);

    header("location:indexProduct.php ");
}
?>


<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>

        <link href="../css/styleAdmin.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.dataTables.js" type="text/javascript"></script>

        <script src="../js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
        <script>

        </script>
        <style>
            #set {
                font-weight: bold;
                font-size: 16px;
                background: #575757;
                color: white;
                padding: 0 5px;
                border-radius: 100%;
            }
        </style>
    </head>
    <body>
        <div class="admin">
            <div class="head_admin">
                <span id="spantitle">TRANG QUẢN TRỊ WEBSITE</span>
                <span id="introuser">
                    <i class="fa fa-user"></i>
                    <?php
                    $get_user = detail_table('user', $id_user);
                    echo $get_user[1];
                    ?>
                    <a href="logout.php" class="fa fa-sign-out" style="text-decoration: none;font-size: 20px; padding: 0 5px;"></a>
                </span>
            </div>
            <div class="content_admin">
                <div class="col3">
                    <div class="sideAdmin-left">
                        <h2 id="h2">Danh mục Admin
                        </h2> 
                        <ul>
                            <?php include("menu.php"); ?>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Sữa sản phẩm
                        </h1>
                        <div class="content-item">
                            <form method="POST" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <td><input name="name" value="<?php echo $detail_product[1]; ?>" type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <td>
                                            <img src="../images/<?php echo $detail_product[4]; ?>">
                                            <input type="file" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Giá</th>
                                        <td><input name="gia" value="<?php echo number_format($detail_product[3], 0, ',', '.'); ?>"type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Loại</th>

                                        <td>
                                            <Select name="menu_cha">
                                                <?php
                                                $list_lsp = list_lsp();
                                                while ($row = mysql_fetch_array($list_lsp)) {
                                                    ?>
                                                    <option 
                                                    <?php
                                                    if ($row[0] == $detail_product[5]) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?php echo $row[id_menu]; ?>" ><?php echo $row['name'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                            </Select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nỗi Bật</th>
                                        <td>

                                            <input type="radio"
                                            <?php
                                            if ($detail_product[6] == 1) {
                                                echo "checked";
                                            }
                                            ?> 
                                                   name="hightline" value="1">Nỗi Bật
                                            <input type="radio"
                                            <?php
                                            if ($detail_product[6] == 0) {
                                                echo "checked";
                                            }
                                            ?> 
                                                   name="hightline" value="0">Không Nỗi Bật
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hãng</th>
                                        <td>
                                            <select name="brand">
                                                <?php
                                                $brand = list_table('brand');
                                                while ($row2 = mysql_fetch_array($brand)) {
                                                    ?>
                                                    <option 
                                                    <?php
                                                    if ($row2[0] == $detail_product[8]) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>XUất xứ</th>
                                        <td>
                                            <select name="made">
                                                <?php
                                                $made = list_table('made');
                                                while ($row1 = mysql_fetch_array($made)) {
                                                    ?>
                                                    <option 
                                                    <?php
                                                    if ($row1[0] == $detail_product[7]) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                            </select>									
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nội dung</th>
                                        <td style="width: 80%;">
                                            <textarea name="noidung" id="content"><?php echo $detail[5] ?></textarea>
                                            <script>
                                                config = {};
                                                config.toolbarGroups = [
                                                    {name: 'clipboard', groups: ['clipboard', 'undo']},
                                                    {name: 'document', groups: ['document', 'doctools', 'mode']},
                                                    {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                                                    {name: 'forms', groups: ['forms']},
                                                    '/',
                                                    {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                                                    {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                                                    {name: 'links', groups: ['links']},
                                                    {name: 'insert', groups: ['insert']},
                                                    '/',
                                                    {name: 'styles', groups: ['styles']},
                                                    {name: 'colors', groups: ['colors']},
                                                    {name: 'tools', groups: ['tools']},
                                                    {name: 'others', groups: ['others']},
                                                    {name: 'about', groups: ['about']}
                                                ];

                                                config.removeButtons = 'NewPage,Preview,Print,Source,Cut,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,About';
                                                CKEDITOR.replace('content', config);
                                            </script>
                                        </td>
                                    </tr>
                                </table>
                                <input type="submit" name="btnThem" value="Sửa">
                                <div style="clear: both;"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </body>
</html>
