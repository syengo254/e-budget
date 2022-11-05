<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <div id="holder">
        <div class="d_box" style="top:40px; width:530px;">
            <div class="btitle">
                <span style="position:relative; top:7px;">Upload Logo</span>
            </div>
            <div class="d_body">
                <form id="lp" method="post" action="uploadlogo.php" enctype="multipart/form-data" target="upd_tgt" onsubmit="return startUpload();">
                <label for="logo">Select Photo: [max. size 230kb]</label>
                <input type="file" name="logo" id="logo" />
                <input type="submit" value="upload" name="upload" style="display:block;" />
                </form>
                <iframe name="upd_tgt" src="#" style="visibility:hidden; width:0px; height:0px;"></iframe>
                <div id="response" style="position:relative; top:20px; left:20px; font-size:12px;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>