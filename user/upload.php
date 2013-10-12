<?php require '../header.php';?>
<script>
    $(document).ready(function() {
        $("#file").change(function() {
            var image = /.+(.JPEG|.jpeg|.JPG|.jpg|.GIF|.gif|.BMP|.bmp|.PNG|.png)$/;
            if ($("#file").val() != '' && image.test($("#file").val()) == true) {
                $("#upimage").find("div").html("<span>正在上传图片</span>");
                $("#upimage").submit();
            }  else {
                $("#upimage").find("div").html("<span style=\"color:red\">未知图片类型</span>");
            }
        });
        $("#img_kj").load(function() {
            var data = $(window.frames['img_kj'].document.body).find("img");
            if ( data != null) {
                $(".box_img").prepend(data);
                $("#upimage").find("div").text(" ");
            }
        });
    });
</script>
<div class="content">
  <div class="box_img"></div>
  <div class="updata">
    <ul>
      <li>
        <form id="upimage"action="upload_image.php" method="post" target="img_kj" enctype="multipart/form-data">
          上传图片:
          <input type="file" name="image" id="file" style="width:155px"/> <div></div>
        </form>
      </li>
      <form action="upload_file.php" method="post">
        <li> 衣服品牌:
          <input type="text" name="brinds">
        </li>
        <li> 上市时间:
          <input type="month" name="user_date">
        </li>
        <li> 衣服货号:
          <input type="text" name="id">
        </li>
        <input type="submit" value="submit">
      </form>
    </ul>
  </div>
</div>
</div>
<iframe style="display:none" id="img_kj" name="img_kj"></iframe>
<?php require '../footer.php';?>