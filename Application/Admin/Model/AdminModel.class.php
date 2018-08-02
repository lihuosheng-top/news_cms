<?php

namespace Admin\Model;

use Think\Model;

class AdminModel extends Model
{

//    创建数据库对象
    private $_db = '';

    //不用主动调用,在创建AdminModel的第一个对象时,自动执行
    function __construct()
    {
        $this->_db = M('admin');
    }

    public function getAdminByUsername($username)
    {
        $res = $this->_db->where("username = '$username'")->find();
        return $res;
    }
//显示
    public function getAllAdmin(){

        dump($this->_db->getField('password'));
        return $this->_db->select();
    }

    //增加
    public function addAdmin($data){

        if(!$data || !is_array($data)){
            return 0;
        }

        return $this->_db->add($data);
    }

    //删除
    public function deleteAdmin($id, $data){

        if(!is_numeric($id) || !$id){
            return 0;
        }

        $data = array(
            'status' => -$data['status']
        );

        return  $this->_db->where('admin_id='.$id)->save($data);
    }

    public function getAdmins()
    {
        $res = $this->_db->select();

        return $res;
    }



}