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

