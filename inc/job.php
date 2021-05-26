<?php


    // Database Connection

    $conn = new mysqli('localhost','root','','vuecrud');


    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    // Data Insert into Database

    if($action == 'store'){
         $title = $_POST['title'];
         $description = $_POST['description'];
         $budget = $_POST['budget'];
         $location = $_POST['location'];
         $state = $_POST['state'];
         $check = $_POST['check'];
         $category = $_POST['category'];
         $file_name = $_FILES['file']['name'];
         $file_tmp_name = $_FILES['file']['tmp_name'];
         $unique = md5(time().rand()) . $file_name;

         $cat = json_encode($category);
        //  move file ti folder
        move_uploaded_file($file_tmp_name, '../photo/'.$unique);

         $conn -> query("INSERT INTO job (title,description,budget,location,state,agree,file,category) VALUES ('$title','$description','$budget','$location','$state','$check','$unique','$category')");

     
    }

    // Show all data from database

    if($action == 'index'){

        $data = $conn -> query("SELECT * FROM job ORDER BY id DESC");

        $all_data = [];
        while($single_data = $data->fetch_assoc()){
            array_push($all_data ,  $single_data);
        }

        echo json_encode($all_data);

    }

     // Delete single data from database

     if($action == 'delete'){
       $id = '';
       if(isset($_GET['id'])){
          $id = $_GET['id'];
       }

       $conn -> query("DELETE FROM job WHERE id='$id'");

    }

    // Single data show

    if($action == 'show'){

        $id = '';
        if(isset($_GET['id'])){
           $id = $_GET['id'];
        }
        $data = $conn -> query("SELECT * FROM job WHERE id = '$id'");

        $dataf = $data -> fetch_assoc();

        echo $datas = json_encode($dataf);

    }

     // Single edit data show

     if ($action == 'edit') {
         $id = '';
         if (isset($_GET['id'])) {
             $id = $_GET['id'];
         }


         $data = $conn -> query("SELECT * FROM job WHERE id = '$id'");

         $dataf = $data -> fetch_assoc();

         echo $datas = json_encode($dataf);
     }


    // Show all data from database by txt search

    if($action == 'searchtxt'){

        $txt = $_GET['txt'];

        $data = $conn -> query("SELECT * FROM job WHERE title LIKE '%$txt%' ");

        $all_data = [];
        while($single_data = $data->fetch_assoc()){
            array_push($all_data ,  $single_data);
        }

        echo $datat = json_encode($all_data);

    }

    // Show all data from database by txt search

    if($action == 'searchtxtBtn'){

        $txt = $_GET['txt'];

        $data = $conn -> query("SELECT * FROM job WHERE title LIKE '%$txt%' ");

        $all_data = [];
        while($single_data = $data->fetch_assoc()){
            array_push($all_data ,  $single_data);
        }

        echo $datat = json_encode($all_data);

    }

    // Show all data from database by range bar

    if($action == 'searchtxtrange'){

        $txt = $_GET['txt'];

        $data = $conn -> query("SELECT * FROM job WHERE budget BETWEEN  0 AND '$txt' ");

        $all_data = [];
        while($single_data = $data->fetch_assoc()){
            array_push($all_data ,  $single_data);
        }

        echo $datat = json_encode($all_data);

    }

    // Show all data from database by range bar

    if($action == 'searchRemote'){

        $txt = $_GET['txt'];

        $data = $conn -> query("SELECT * FROM job WHERE location LIKE '%$txt%'");

        $all_data = [];
        while($single_data = $data->fetch_assoc()){
            array_push($all_data ,  $single_data);
        }

        echo $datat = json_encode($all_data);

    }
 

 

// Show all data from database by range bar

if($action == 'searchWorld'){

    $txt = $_GET['txt'];

    $data = $conn -> query("SELECT * FROM job WHERE location LIKE '%$txt%'");

    $all_data = [];
    while($single_data = $data->fetch_assoc()){
        array_push($all_data ,  $single_data);
    }

    echo $datat = json_encode($all_data);

}






