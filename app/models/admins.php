<?php 
require_once "app/system/DB.php";
class Admins{


    private $db;
    
 public function __construct(){
     $this->db=DB::getInstance();
 }
    function insert(array $data ,$tableName){
       try{
        // $dsn='mysql:hostname=localhost;dbname=mvc_demo';
        // $username='root';
        // $password='';

        // $keys=implode(',',array_keys($data));
        // $key=array_keys($data);
        // $values=array_values($data);

        // $values=implode("','",array_values($data));
        // $query="insert into users ($keys) values('$values')";
        
      $data = $this->db->insert($tableName,$data );
      $error=$this->db->error();
      print_r($error);

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
    function addTag($name)
    {   
      $dbname='newsdatabase';
      $username='root';
      $password='';
      $servername='localhost';
      $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $sql = 'INSERT INTO tag(name) VALUES(:name)';

      $statement = $pdo->prepare($sql);
      
      $statement->execute([
        ':name' => $name
      ]);
      
      // $publisher_id = $pdo>lastInsertId();
      return 1;
    }

    function select($table){
        // $all_users=array('ahmed','afnan','ali','baabood');
        // if($id>sizeof($all_users)-1)
        // return "incorrect user id ";
        // return $all_users[$id];
        //$this->db=null;
        // $this->db=DB::getInstance();
        $this->db->return_as('array');
       
       
$data = $this->db->get_all($table)->results();



return $data;
       
    }
  function selectAdmin($data)
  {
   
    $data_result= $this->db->select("*")->from('users')->where('type','=','a')
    ->and('password','=',$data['password'])
    ->and("name","=",$data['name'])
    ->fetch()
    ->count();
    $this->db=null;
    // print_r($data_result);
     return $data_result;
    

  } 
  
function postTag($table , $tag)
{
 return  $this->db->select("*")->from($table)->where('tag','=',$tag)->fetch();
}  
function selectOneTag($table ,$id)
{
   $result=$this->db->select('name')->from($table)->where('tag','=',$id)->results();
   print_r($result);
   return $result;

}
  function delete($table,$id)
  {
    // $sql = "DELETE FROM `post`
    //     WHERE `id`= '$id'";
    $d=$this->db->delete()
           ->from($table)
           ->where('id', '=', $id)->execute();

    //  print_r($d);      
           

// prepare the statement for execution
//print_r($this->db);
// $statement = $this->db->prepare($sql);

// $statement->bindParam(':id', $id);
// try{
// $this->db->exec($sql);
// echo "Record deleted successfully";
// }
//  catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

// if ($statement->execute()) {
// 	echo 'publisher id ' . $id . ' was deleted successfully.';
// }  
  }  
}
?>