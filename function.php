<?php
require_once "base.php";

function showAlert($str,$status='danger') {
    return '
    
     <div aria-live="polite" aria-atomic="true">
                <!-- Position it -->
                <div style="position: absolute; bottom: 10px; right: 10px; z-index: 5">

                    <!-- Then put toasts within -->
                    <div class="toast card-bg" style="width: 400px;" role="alert" data-delay="2000" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <h4 class="bg-warning text-white rounded"><i class="px-2 feather-upload-cloud"></i></h4>
                            <strong class="mr-auto">Bootstrap</strong>
                            <small class="text-muted text-dark">just now</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body text-warning">'.
                                $str
                        .'</div>
                    </div>

                </div>
            </div>
    ';
}

function textFilter($str) {
    $text = trim($str);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);

    return $text;
}

function countRow($table) {
    $sql = "SELECT COUNT(id) FROM $table WHERE 1";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row->{'COUNT(id)'};
}

function short($str,$length=100){
    return substr($str,0,$length);
}

function showDate($str) {
    return date("d-M-Y",strtotime($str));
}

function redirect($l){
    return header("Location:$l");
}

function createCategory(){
    $title = $_POST['title'];
    $user_id = user($_SESSION['userName'])->id;
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";
    if (mysqli_query(conn(),$sql)){
        return true;
    }
    return false;
}

function category($id){
    $sql = "SELECT * FROM categories WHERE id = $id";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row;

}

function categories(){
    if (isset(user(isset($_SESSION['userName']))->role) == 2){
        $current_user_id = user($_SESSION['userName'])->id;
        $sql = "SELECT * FROM categories WHERE user_id = $current_user_id ";
    }else{
        $sql = "SELECT * FROM categories";
    }

    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function deleteCategory($id){
    $sql = "DELETE FROM categories WHERE id = $id";
    if (mysqli_query(conn(),$sql)){
        return true;
    }
    return false;
}

function updateCategory($id){
    $title = $_POST['title'];

    $sql = "UPDATE categories SET title = '$title' WHERE id = $id";
    if (mysqli_query(conn(),$sql)){
        return true;
    }
    return false;

}

function createPost(){
    $file = $_FILES['photo'];
    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];

    $dir = "save/";
    $newName = $dir.uniqid()."_".$fileName;
    move_uploaded_file($tmpName,$newName);

    $title = textFilter($_POST['title']);
    $photo = $newName;
    $description = textFilter($_POST['description']);
    $userId = user($_SESSION['userName'])->id;
    $category_id = $_POST['category_id'];
    $sql = "INSERT INTO posts (title,photo,description,user_id,category_id) VALUES ('$title','$photo','$description','$userId','$category_id')";
    if (mysqli_query(conn(),$sql)){
        return "aung p";
    }
}

function post($id){
    $sql = "SELECT * FROM posts WHERE id = $id";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row;

}

function posts($limit = 9999999){
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit ";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function deletePost($id){
    $sql = "DELETE FROM posts WHERE id = $id";
    if (mysqli_query(conn(),$sql)){
        echo true;
    }else {
        return false;
    }

}

function updatePost($id){
    $conn = conn();
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $file = $_FILES['photo'];
    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];

    $dir = "save/";
    $newName = $dir.uniqid()."_".$fileName;
    move_uploaded_file($tmpName,$newName);

    $photo = $newName;
    $sql = "UPDATE posts SET title = '$title',photo = '$photo', description = '$description', category_id = '$category_id' WHERE id = $id";

    if (mysqli_query($conn,$sql)){
        return true;
    }else {
        die(mysqli_error($conn));
    }

}

function register() {
    $name = $_POST['fname'];
    $name .= " ".$_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $password_hashed = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password_hashed')";
    if (mysqli_query(conn(),$sql)){
        return true;
    }
    return false;

}

function changePassword() {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $conPass = $_POST['conPass'];

    $oldPassHashed = user($_SESSION['userName'])->password;

    if (!password_verify($oldPass,$oldPassHashed)) {
        return "Your OldPass wrong";
    }else {
        if (!$newPass == $conPass) {
            return "Your newPass and conPass don't match";
        } else {
            $currentUserId = user($_SESSION['userName'])->id;
            $newPassHashed = password_hash($newPass,PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '$newPassHashed' WHERE id = $currentUserId";
            if (mysqli_query(conn(),$sql)){
                return true;
            }
            return false;

        }
    }


}

function user($userName) {
    $sql = "SELECT * FROM users WHERE name = '$userName'";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row;
}

function userId($id) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row;
}

function userDelete($id) {
    $sql = "DELETE FROM users WHERE id = $id";
    if (mysqli_query(conn(),$sql)){
        echo true;
    }else {
        return false;
    }
}


function users() {
    $sql = "SELECT * FROM users";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function login() {
    $conn = conn();
    $email = $_POST['email'];
    $current_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_object($query);

    $password = $row->password;
    if (password_verify($current_password,$password)){
        $last_id = mysqli_insert_id($conn);
        $_SESSION['userId'] = $last_id;
        $_SESSION['userName'] = $row->name;
        return true;
    }else{
        return false;
    }

}

function fSearch($searchKey) {
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey%' ORDER BY id DESC";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function fcategories(){
    $sql = "SELECT * FROM categories";

    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function viewerCountByPost($user_id,$post_id,$device) {

    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    if (mysqli_query(conn(),$sql)){
        return true;
    }
    return false;

}

function viewer($postId){
    $sql = "SELECT * FROM viewers WHERE post_id = $postId";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function fPostByCategory($categoryId,$limit=99999,$post_id=0) {
    $conn = conn();
$sql = "SELECT * FROM posts WHERE category_id = $categoryId AND id != $post_id ORDER BY id DESC LIMIT $limit";
    $query = mysqli_query($conn,$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    if ($rows) {
        return $rows;
    }else {
        die(mysqli_error($conn));
    }
}

function fPostByDate() {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function countPostByCat($category_id) {
    $sql = "SELECT COUNT(id) FROM posts WHERE category_id = $category_id";
    $query = mysqli_query(conn(),$sql);
    $row = mysqli_fetch_object($query);
    return $row->{'COUNT(id)'};
}

function apiOut($arr) {
    return json_encode($arr);
}

function apiPosts() {
    $sql = "SELECT * FROM posts";
    $query = mysqli_query(conn(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}