<?php
require_once 'controller.php';


class Admin extends Controller
{ 
    private $data; 
    public function __construct()
    {

        // echo "<h1>inside in the admin </h1>";
    }
    public function index()
    {
     $this->login();
    //     $model=$this->model("admins");
    //     //print_r($model);
    //    // echo "in controoler index";
    //   $data=$model->select();
    //   print_r($data);
    //   echo "in controoler index";

   
    //     echo "<h1>index of home</h1>";
    //     $this->view("admins",$data);

    }

   function addViewPost() 
   {
       $this->view("addPost");
   }

   function addViewTag() 
   {
       $this->view("addTag");
   }
    // function show($id)
    // {


    //     $user = $this->model('user');
    //     $userName = $user->select($id);
    //     $this->view('user_view');
    // }
    function add_tag()
    {
        if(isset($_POST['submit']))
        { 
            $name=$_POST['name'];
            echo "Tags";

            if($name!="")
           {
               $user_data =array(
                   'name'=>$name
                   
               );
               echo $_POST['name'];

               $u=$this->model('admins');
               $message="";
               $res=$u->addTag($name);
               var_dump($res);
               if($res){
                   $type='success';
                    $message="Tag created successful";
                    $post=$this->selectPost();
                    $tag=$this->selectTag();
                    $this->showindex($post,$tag);

                }
               else {
                  

                   $type='danger';
                   $message="can not create Tag please check your data ";
                   $post=$this->selectPost();
                   $tag=$this->selectTag();
               
                   $this->view('admins',array('type'=>$type,'message'=>$message,'post'=>$post , 'tag'=>$tag));

                }

            }

        }
    }
    

    function add_post()
    {
        if(isset($_POST['submit']))
        { 
            $title=$_POST['title'];
            $author=$_POST['author'];
            $body=$_POST['body'];
           $date= date('l jS \of F Y h:i:s A');
           $tag=$_POST['tag'];

           //processing img post upload
           $name = $_FILES['img']['name'];
            $target_dir =getcwd().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
            $target_file = $target_dir . basename($_FILES["img"]["name"]); 
            if(move_uploaded_file($_FILES['img']['tmp_name'],$target_dir.$name))
             echo "OK $name" ;

          
           if($title!=""&&$author!=""&&$body!="")
           {
               $user_data =array(
                   'author'=>$author,
                   'title'=>$title,
                   'date'=>$date,
                   'img'=>$name ,
                   'body'=>$body,
                   'tag'=>$tag
                   
        
                   
               );

               $u=$this->model('admins');
               $message="";
               if($u->insert($user_data,"post")){
                   $type='success';
                    $message="user created successful";
                    $post=$this->selectPost();
                    $tag=$this->selectTag();
                    $this->showindex($post,$tag);

                }
               else {
                   $type='danger';
                   $message="can not create user please check your data ";
               
                   

                }


            }
        }
       
    }

function deletePost($id)
{
    
    $model=$this->model("admins");
        //print_r($model);
      $data=$model->delete('post',$id);
      $post=$this->selectPost();
      $tag=$this->selectTag();
      $this->showindex($post,$tag);

    //  header("location:../");
        
      


}

function deleteTag($id)
{
    
    $model=$this->model("admins");
        //print_r($model);
      $data=$model->delete('tag',$id);
      $post=$this->selectPost();
      $tag=$this->selectTag();
      $this->showindex($post,$tag);

    //  header("location:../");
        
      


}
function  showindex($post ,$tag)
    {
      
         $this->view("admins",["post"=>$post,"tag"=>$tag]);
       
     }
          
function login ( ){
   $this->view("login");
     

}
function checkadmin(){
    $model=$this->model("admins");
    //print_r($model);
    if(isset($_POST['check']))
    { 
        $name=$_POST['name'];
        $password=$_POST['password'];
        $type="a";
    }
    if($name!=""&&$password!="")
           {
               $user_data =array(
                   'name'=>$name,
                   'password'=>$password,
                   'type'=>$type
                  
                   
        
                   
               );
               
               $count=$model->selectAdmin($user_data);
             
               if($count)
               {

                



      $model=$this->model("admins");
      
    
       $post=$this->selectPost();
       $tag=$this->selectTag();
         
      $this->showindex($post,$tag);
       

   
    //     echo "<h1>index of home</h1>";
   
        //  $this->view("admins",$data);
                   
               }
               else{
                echo "Pass word woring <br>";
                //    $this->view("login");
               }

            }
 

}
function selectPost()
{
    $model=$this->model("admins");
    $data=$model->select("post");
    return $data;
}
function selectOneTag($id)
{
    $model=$this->model("admins");
    $ta=$model->selectOneTag("tag",$id);
    print_r($ta);
    return $ta;
    

}
function  postTag($id)
{
    $model=$this->model("admins");
    $ta=$model->postTag("post",$id);
    print_r($ta);
    $model=$this->view("postTag",$ta);

}
function selectTag()
{
    $model=$this->model("admins");
    $data=$model->select("tag");
    return $data;
}

}
