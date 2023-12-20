<?php
// connect to the database
$conn = mysqli_connect('localhost', 'mit_instantjob', '[PFC[mUGwBp4', 'mit_instantjobs'); 

// get the post ID and active/inactive status from the AJAX request
 $postId = $_POST['id'];
 $isActive = $_POST['is_active'];
 $postType = $_POST['type'];

// update the post's active/inactive status in the database
if($postType == 'service') {
  $sql = "UPDATE sell_your_service SET status = '$isActive' WHERE id = '$postId'";
} elseif($postType == 'job') {
  $sql = "UPDATE CreateJob SET status = '$isActive' WHERE id = '$postId'";
}else {}
$result = mysqli_query($conn, $sql);

// return a response to the AJAX request
if ($result) {
  echo 'Post updated successfully.';
} else {
  echo 'Error updating post.';
}
?>
