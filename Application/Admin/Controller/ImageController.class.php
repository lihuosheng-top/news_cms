<?php

namespace Admin\Controller;

use Common\Model\ContentModel;

class ImageController extends ContentModel {

    public function ajaxuploadimage()
    {
        $upload = D('UploadImage');
        //res是上传成功后图片的绝对路径
        $res = $upload->imageUpload();
        if ($res === false)
        {
            return show(0,'上传失败');
        }
        else
        {
            return show(1,'上传成功',$res);
        }
    }
}