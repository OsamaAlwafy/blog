<?php 
require_once "app/system/DB.php";
class Post{


      private $db;
 public function __construct(){
     $this->db=DB::getInstance();
 }
    function insert(array $data){
       try{
        // $dsn='mysql:hostname=localhost;dbname=mvc_demo';
        // $username='root';
        // $password='';

        // $keys=implode(',',array_keys($data));
        // $key=array_keys($data);
        // $values=array_values($data);

        // $values=implode("','",array_values($data));
        // $query="insert into users ($keys) values('$values')";
        
      $data = $db->insert('post',data );
      return $data;
        // echo $query;
        // $pdo=new PDO($dsn,$username,$password);
        // return $pdo->prepare($query)->execute();
       

       } catch(PDOException $ex){
           return false;

       }catch(PDOStatement $ex){
        return false;
       }
        

        



    }

    function select(){
        // $all_users=array('ahmed','afnan','ali','baabood');
        // if($id>sizeof($all_users)-1)
        // return "incorrect user id ";
        // return $all_users[$id];
        $this->db->return_as('array');
$data = $this->db->get_all("post")->results();
return $data;
       
    }
}
?>