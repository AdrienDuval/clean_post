<?php

require_once "../includes/navbar.php";
require_once "../config/config.php";

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    // echo $id;
    $select = "SELECT * FROM posts WHERE postID = '$id'";
    $result = $conn->query($select);
    $rows = array();
    $row =  $result->fetch_object();
    // print_r($row);
    // echo $row->image;
    // $rows[] = $row;

    // echo  $row->title;


    // while ($row = $result->fetch_object()) {
    //     $rows[] = $row;
    //     print_r($rows);
    //     echo $rows->title;
    // }

    // get post category name of that post 

    $catquyery = "SELECT * FROM categories";
    $catresult = $conn->query($catquyery);
    $catRows = array();
    while ($catRow = $catresult->fetch_object()) {
        $catRows[] = $catRow;
    }

    foreach ($catRows as $catRow) {
        if ($catRow->catID === $row->post_cat) {
            $the_post_cat = $catRow->category_name;
            $the_post_cat_id = $catRow->catID;
        }
    }
} else {
    echo "404";
    exit();
}

?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/clean_post/posts/images/<?php echo $row->image; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo  $row->title; ?></h1>
                    <span class="subheading"><?php echo  $row->subtitle; ?></span>
                    <p>Posted by <?php echo $row->username ?> at <?php echo date('M', strtotime($row->create_at)) . ',' . date('d', strtotime($row->create_at)) . ' ' . date('Y', strtotime($row->create_at)); ?></p>
                    <h5 class="h5">Category </h5>
                    <a href="http://localhost/clean_post/categories/category.php?cat_id=<?php echo $the_post_cat_id; ?>" class="btn btn-info"><?php echo  $the_post_cat; ?></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo  $row->body; ?></p>
                Placeholder text by
                <a href="http://spaceipsum.com/">Space Ipsum</a>
                &middot; Images by
                <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                </p>
                <?php
                if (isset($_SESSION['user_id'])) {
                    $userID = $_SESSION['user_id'];
                    $postUserID = $row->user_id;
                    if ($userID === $postUserID) { ?>
                        <a href="http://localhost/clean_post/posts/delete.php?delete_post_id=<?php echo $row->postID; ?>" class="btn btn-danger text-center float-end">Delete</a>
                        <a href="http://localhost/clean_post/posts/update.php?update_post_id=<?php echo $row->postID; ?>" class="btn btn-warning text-center ">Update</a>
                <?php
                    } else {
                        echo '<h3><a href="http://localhost/clean_post/auth/login.php">Loing with your user to edit the post </h3>';
                    }
                } else {
                    echo '<h3><a href="http://localhost/clean_post/auth/login.php">Loing with your user to edit the post </h3>';
                }
                ?>

                <br>
            </div>
        </div>
    </div>
</article>
<?php
require_once "../includes/footer.php";
?>