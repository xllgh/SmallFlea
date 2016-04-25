<?php
namespace Home\Controller;

use Think\Controller;
class TradeController extends Controller
{
     public function publishTradeNews($uid,$name,$connect,$category,$img,$detail,$ptime,$briefIntro){
         
         
         $arr=array('uid'=>$uid,'name'=>$name,'connect'=>$connect,'category'=>$category
             , 'img'=>C('pFolder').$img,'detail'=>$detail,'ptime'=>$ptime,'briefIntro'=>$briefIntro);
         
         $tradeNews=M('Trade');
        $id=( $tradeNews->data($arr)->add());
        if($id>0){
            $back=array('code'=>'0','msg'=>'发布信息成功');
        }else{
            $back=array('code'=>'1','msg'=>'发布信息失败');
        }
        echo json_encode($back);
     }
     
     
     public function getTradeNews($category){
         $tradeNews=M('Trade');
         $condition['category']=array('eq',$category);
         $list=$tradeNews->where($condition)->select();
         $result=array('code'=>'0','lists'=>$list);
         echo json_encode($result);                 
     }
     
     public function getAllTradeNews(){
         $tradeNews=M('Trade');
         $list=$tradeNews->query("select * from think_trade");
         $result=array('code'=>'0','lists'=>$list);
         echo json_encode($result);
     }
     
     public function getAllOut(){
         $model=M('Trade');
         $sql='select ptime ,adetail,aimg from think_activity_news
                union select ptime,briefIntro,img from think_broadcast
                union select ptime,briefIntro,img from think_playmate
                union select ptime,detail,img from think_trade';
     
         $list=$model->query($sql);
         
         $result=array('code'=>'0','lists'=>$list);
         echo json_encode($result);
     
          
     }
}

?>