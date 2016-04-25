<?php
namespace Home\Controller;

use Think\Controller;
class ActivityNewsController extends Controller
{
    public function publishActivityNews($aname,$ahost,$adetail,$ptime,$startime,$endtime,$aimg,$category){
        $arr=array('aname'=>$aname,'ahost'=>$ahost,'adetail'=>$adetail,
            'ptime'=>$ptime,'startime'=>$startime,'endtime'=>$endtime,'aimg'=>C('pFolder').$aimg ,'category'=>$category);       
        $activityNews=M('ActivityNews');
        $activityNews->create($arr);
        $activityNews->add();
       
    }
    
    
    public function getActivityNews(){     
        $activityNews=M('ActivityNews');       
        $condition['endtime']=array('LT',time());       
        $list= $activityNews->where($condition)->select();
        if($list!=null){
            $result=array('code'=>'0','lists'=>$list);
            echo json_encode($result);
        }
       
        
    }
}

?>