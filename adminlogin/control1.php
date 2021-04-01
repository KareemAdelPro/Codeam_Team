<!Doctype hyml>
<html>
    <head>
    <Style>

    </style>
        <title>index</title>
        
        <script type="text/javascript">
          
        </script>
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<form action=in.php>


</form>
    <body class="index__body">
    <h1 class="head">All the custmers:

        
    </body>  
</html> 
<?php
session_start();
if(isset($_SESSION['user'])){
   
    $con = mysqli_connect('sql202.epizy.com','epiz_28204047','ZkUEWajFX5lR7','epiz_28204047_customr');
     $query="select * from cust";
    
    $result=$con->query($query);
    if($result->num_rows >0){
    while($row=$result->fetch_assoc()){
        echo'
         
            
            <table class="table table-dark">
             <thead>
            <tr>
            <th>id</th>
              <th>name</th>
              <th>email</th>
              <th>message</th>
            </tr>
         
              <tr>
           
                  <td class="c">'.$row['id'].'</td>
                <td class="c">'.$row['name'].'</td>
                <td class="a">'.$row['email'].'</td>
                <td class="a">'.$row['message'].'</td>
                <td> 
                <div class="case">
                <form action="update.php" method="post">
                    <input type="hidden" name="edit_id" value="'.$row['id'].'">
                    <input type="hidden" name="edit_username" value="'.$row['name'].'">
                    <input type="hidden" name="edit_password" value="'.$row['email'].'">
                   <input type="hidden" name="edit_email" value="'.$row['message'].'">
                
                    
                </form>
                
                <div class="after">
                <form action="control.php" method="post" class="after_form">
                    <input type="hidden" name="delete_id" value="'.$row['id'].'">
                    <input type="submit" name="delete" value="Delete" class="btn btn-primary">

                   
                    
                </form>
                </div>
                </div>
                </td>
            </tr>
             </thead>
            </table>
            
        ';

        
         if(isset($_POST['delete'])){
            $id=$_POST['delete_id'];
                        $sql="delete from cust where id='$id'";
                        if($con->query($sql)===TRUE)
                        header("location:control.php");
                        else
                        echo "Error".$con->error;
       
                        $con->close();
        }    
    }
}
    
    
}else {
    echo'<center><h1>ليس مسموح لك بالاطلاع على هذه الصفحه </h1></center>';
    header('REFRESH:1;URL=loginadmin1.php');
}
    //هنا احضار جدول الداتا بيز 
    
   






?>
  


