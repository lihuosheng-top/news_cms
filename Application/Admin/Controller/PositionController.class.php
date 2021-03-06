<?php

namespace Admin\Controller;

use Think\Controller;

class PositionController extends Controller
{
    public function index()
    {
        $res = D('Position')->getPositions();
        $this->assign('positions', $res);
        $this->display();
    }

    public function add()
    {
        if ($_POST)
        {
            if (!isset($_POST['name']) || !$_POST['name'])
            {
                return show(0,'推荐名称不能为空');
            }
            if (!isset($_POST['description']) || !$_POST['description'])
            {
                return show(0,'推荐描述不能为空');
            }

            if (!isset($_POST['status']))
            {
                return show(0,'状态值不能为空');
            }

            $res = D('Position')->insert($_POST);
            if ($res)
            {
                return show(1,'添加成功');
            }

            return show(0,'添加失败');
        }
        $this->display();
    }

    public function delete()
    {
        if ($_POST)
        {
            $position_id = $_POST['id'];
            $status = $_POST['status'];
            $res = D('Position')->setStatusById(intval($position_id),intval($status));
            if ($res)
            {
                return show(1,'删除成功');
            }

            return show(0,'删除失败');
        }
    }

    public function edit()
    {
        if ($_GET)
        {
            $id = $_GET['id'];
            $res = D('Position')->getPositionById($id);

            $this->assign('vo',$res);
        }

        $this->display();
    }

    public function update()
    {
        if ($_POST)
        {
            $id = $_POST['id'];
            unset($_POST['id']);

            $res = D('Position')->updatePositionById($id,$_POST);

            if ($res)
            {
                return show(1,'更新成功');
            }

            return show(0,'更新失败');
        }
    }


}






















