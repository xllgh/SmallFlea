<?php
namespace Home\Controller;

use Think\Controller;
class BroadcastController extends Controller
{
    public function publishBroadcast($uid,$connect,$name,$img,$detail,$ptime,$briefIntro){
        
        $arr=array('uid'=>$uid,'connect'=>$connect,'name'=>$name,
            'img'=>C('pFolder').$img,'detail'=>$detail,'ptime'=>$ptime,   'briefIntro'=>$briefIntro          
        );
        $broadcastDB=M('Broadcast');
        $broadcastDB->create($arr);
       $id= $broadcastDB->add();
       if($id>0){
           $back=array('code'=>'0','msg'=>'发布信息成功');
       }else{
           $back=array('code'=>'1','msg'=>'发布信息失败');
       }
       echo json_encode($back);
        
  
    }
    
    public function getAllBroadcast(){
        $broadcastDB=D('Broadcast');       
        $list=$broadcastDB->select();
        $result=array('code'=>'0','lists'=>$list);
        echo json_encode($result);
        
        
    }
}

?>