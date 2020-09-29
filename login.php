<?php
namespace Abpackage\login;
class Login
{
 public $host;
 public $user;
 public $pass;
 public $database;
 public $conn;
 public function __construct($host,$user,$pass,$database)
 {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->database = $database;
    $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->database);
    
}

public function login_auth($table,$fields,$redirector)
{

    extract($fields);
    $username = $fields[0];
    $password = $fields[1];

    $success = $redirector[0];
    $error = $redirector[1];
    ?>
    <section>
        <div class="container admin-login">
            <form action="index.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="<?php echo $username; ?>"id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="<?php echo $password; ?>" id="exampleInputPassword1">
            </div>
            <button type="submit" name="admin_login" class="btn btn-primary">Login</button>
        </form>
    </div>

</section>


<?php
if(isset($_POST['admin_login']))
{
    print_r($_POST);
    echo $formuservalue = $_POST['username'];
    echo $formpassvalue = $_POST['password'];

    $qry = "select * from $table where $username = '$formuservalue' and $password = '$formpassvalue'";
    echo $qry;
    $res = $this->conn->query($qry);
    if($res)
    {
        print_r($res);
        $count = $res->num_rows;
        $count;
        if($count>0)
        {
            ?>
            <script>
                alert('login success');
                window.location = "<?php echo $success.'.php';?>"
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('login error');
                window.location = "<?php echo $error.'.php';?>"
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert('somthing went wrong');
            <?php $this->conn->error; ?>

        </script>
        <?php
    }
}

}
}


?>