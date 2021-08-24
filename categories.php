<?php include "includes/db.php";?>

<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/nav.php";?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">


      <?php
if (isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
}

$query = "SELECT * FROM posts WHERE post_category_id = {$c_id}";
$select_all_posts_querys = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_querys)) {
    $post_title = $row['post_title'];
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'], 0, 100);

    ?>
      <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
      </h1>



      <!-- First Blog Post -->



      <h2>
        <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
      </h2>
      <p class="lead">
        <?php
//selecting post author from db
    $user_id = $post_author;

    $query = "SELECT * FROM users WHERE user_id = $post_author";
    $select_user_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_user_query)) {

        $post_author = $row['user_firstname'] . " " . $row['user_lastname'];

    }
    ?>
        by <a href="author_posts.php?p_author=<?php echo $user_id; ?>"><?php echo $post_author; ?></a>
      </p>
      <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
      <hr>
      <a href="post.php?p_id=<?php echo $post_id;
    ?>">
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>">
      </a>
      <hr>
      <p><?php echo $post_content; ?></p>
      <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span
          class="glyphicon glyphicon-chevron-right"></span></a>
      <?php }?>




    </div>

    <!-- Blog Sidebar Widgets Column -->

    <?php include "includes/sidebar.php";?>
  </div>
  <!-- /.row -->

  <hr>

  <?php include "includes/footer.php";?>