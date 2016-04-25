<?php
namespace Home\Controller;

use Think\Controller;
class PlaymateController extends Controller
{
  
   
    
    public function  publishPlaymateNews($uid,$name,$connect,$detail,$ptime,$img,$briefIntro,$gendar,$place,$time){
        //向数据库中插入数据
      
        
        $News= array('uid'=>$uid,'name'=>$name,'connect'=>$connect,'detail'=>$detail,'ptime'=>$ptime,
            'img'=>C('pFolder').$img,'briefIntro'=>$briefIntro,'gendar'=>$gendar,'place'=>$place,'time'=>$time);
        
        $dbNews=M('Playmate','think_','DB_CONFIT');
        $dbNews->create($News,2);     
        $resultId= $dbNews->add();
        if($resultId>0){
            $back=array('code'=>'0','msg'=>'发布信息成功');
        }else{
            $back=array('code'=>'1','msg'=>'发布信息失败');
        }
        
       echo json_encode($back);         
    }
    
    
    public function  getPlaymateNews(){
      /* 从数据库中读取数据
        1、读取一行数据：find();
        2、读取多行记录 ：select();
        3、读取字段值：getField(); */
        $Playmate=M('Playmate');
     //   $Playmate=M('Playmate','think_','DB_CONFIT');    
        $map['enable']=array('EQ','0');
        $array=$Playmate->where($map)->select(); 
        $list=array('code'=>'0','lists'=>$array);
        echo json_encode($list);
        
        
    
    }
    
    
    public function putPlaymateNews(){
        echo 'getRequest';
               
         $name="";
         $uid="";
         $img="";
         $detail="";
         $gendar="";
         $time="";
         $category="";
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $name=$_POST['name'];
            $uid=$_POST['uid'];
            $img=$_POST['img'];
            $detail=$_POST['detail'];
            $gendar=$_POST['gendar'];
            $time=$_POST['time'];
            $category=$_POST['category'];
            
            echo $name." /".$uid;
            
            
            
            if(empty($name)||empty($uid)||empty($detail)||empty($gendar)||empty($time)||empty($category)){
                $arr=array('code'=>'1','msg'=>'invalid paramters');
                echo json_decode($arr);
            }else{
              $playtogather=D('PlayTogather');
               /*  2、$playtogether=M('PlayTogether');效率更高
                3、使用原生的SQL查询的话，
                    $Model = new Model();或者$Model = M();
                    //进行原生的SQL查询
                    $Model->query('SELECT * FROM think_user WHERE status = 1');                  
                
                 */
               // $playtogether=new \Home\Model\PlayTogatherModel('PlayTogether','think_','DB_CONFIT1');
               // $data=array('name'=>$name,'uid'=>$uid,'img'=>$img,'detail'=>detail,'gendar'=>$gendar,'time'=>$time,'category'=>$category);
                $data=$playtogather->create($_POST,1);//快速的创建数据对象，create也支持其他的数组对象,将数据对象存储到内存中，要使用add（），save（）方法
                $playtogather->add();
                dump($data);
            }
        }
    }
    
    

}

?>