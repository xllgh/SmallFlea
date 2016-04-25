<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    protected $connection='DB_CONFIG';
   
    public function register($name,$password,$tel,$email,$grade){
        $User=M('User','think_','DB_CONFIG');
        //$User=D('User');
        $number=0;
        $conditon1["tel"]=$tel;       
        if(( $number=$User->where($conditon1)->getField("uid"))>0){
            $arr=array('code'=>'1',msg=>'该手机号已被注册');
            echo $number;
            echo json_encode($arr);
            return ;
        }
        
        $conditon2["name"]=$name;
        if(( $number=$User->where($conditon2)->getField("uid"))>0){
         $arr=array('code'=>'1',msg=>'该用户名已被注册');
         echo json_encode($arr);
         return ;
        }
        
        $data=array('name'=>$name,'password'=>$password,'tel'=>$tel,'email'=>$email,'grade'=>$grade);
        $data=$User->create($data,2);   
        $data= $User->add();
        $arr=array('code'=>'0','uid'=>"$data",'msg'=>'注册成功');
        echo json_encode($arr);    
    }
    
    public function login($name,$password){
        $result=null;
        $user=M('User','think_','DB_CONFIG');
        $conditon=array('name'=>$name,'password'=>$password);
        $row=$user->where($conditon)->find(); 
        if($row!=null){
            $result=array('code'=>'0','msg'=>'登陆成功','uid'=>"$row[uid]","name"=>"$row[name]");           
        }else{
            $result=array('code'=>'1','msg'=>'该用户不存在或用户名错误');
        }
        
        echo json_encode($result);
       
    }
    
    public function exist($tel){
        $user=M('User','think_','DB_CONFIG');
        $conditon['tel']=$tel;
        if(( $row=$user->where($conditon)->getField("uid"))>0){
            $result=array('code'=>'0','msg'=>'退出成功');
            echo json_encode($result);
        }
       ;
    }
    
    public function forget_psd($tel){
        
    }
   
    public function uploadImg(){
        
        
        $fileName= $_FILES['myFile']['name'];       
        $tmp_name=$_FILES['myFile']['tmp_name'];

        if(copy($tmp_name, "source/".$fileName.'.png')){
            $result=array('code'=>'0','msg'=>'上传成功');
          
        }else{
            $result=array('code'=>'1','msg'=>'上传失败');
        }
        echo json_encode($result);
        
        
    }
    

}
