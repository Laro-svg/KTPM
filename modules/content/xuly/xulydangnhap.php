 <?php 
          include("../../../core/connect.php");
          session_start();
            //if(isset($_POST['dangnhap'])){

              $username   = $_POST['username'];
              $password   = $_POST['pass'];
              $password = md5($password);
              echo $username;
              $sql = "SELECT * FROM user where tendangnhap = '$username'";  
              $run = mysqli_query($conn,$sql);
              if(mysqli_num_rows($run) == 0){
                echo '<script> document.getElementById("loi").innerHTML ="Tên đăng nhập sai !!!" ;
                    document.getElementById("lois").innerHTML ="";
                </script>';
              }
              else{
                  $row = mysqli_fetch_array($run);
                  if($password != $row['matkhau']){
                      echo '<script> document.getElementById("lois").innerHTML ="Mật khẩu sai !!!" 
                          document.getElementById("loi").innerHTML =""
                      </script>';
                  }
                  else{
                    $username = $_SESSION['user'];
                    $username = array(
                      'iduser' => $row['idUser'],
                      'username' => $row['tendangnhap'],
                      'password' => $row['matkhau'],
                      'hoten' => $row['hoten'],
                      'gmail' => $row['Gmail'],
                      'phone' => $row['SDT'],
                      'diachi' => $row['Diachi']
                    );
                    $_SESSION['user'] = $username;
                     
                    echo "<script>
                        document.getElementById('loi').innerHTML ='';
                        document.getElementById('lois').innerHTML ='';
                        window.location='index.php';</script>";
                  }
              }
           // }
  ?>