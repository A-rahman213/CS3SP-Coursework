<?php 
session_start();

$title = 'Blogsite - main';

require_once __DIR__ . '/db-conn.php';

if(empty($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $postContent = $_POST['postInput'] ?? '';
    $user = $_SESSION['username'];

    $stmnt = $pdo->prepare("INSERT INTO posts (post, fromUser) VALUES (?,?)");
    $stmnt->execute([$postContent, $user]);

}

require_once __DIR__ . '/navbar.php';
?>

<div class="row">
    <div class="col"></div>
    <!-- Main section that displays posts -->
    <div class="col">
    <?php 
        try{
            $stmnt = $pdo->prepare("SELECT * FROM posts");
            $stmnt->execute();
            $posts = $stmnt->fetchAll();

            if($posts){
                foreach($posts as $post){
                    echo '<div class="container text-center bg-light">';
                    echo '<div class="row">';
                    echo '<div class="col">' . htmlspecialchars($post['fromUser']) . ": " . htmlspecialchars($post['post']) . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            
            //foreach($posts as $post){
            //    echo "<p>" . htmlspecialchars($post["post"]) . "</p>";
            //}
        } catch(PDOException $e){
            echo $e;
        }
    ?>    
    </div>
    <!-- Section for the user to post a blog post-->
    <div class="col">
        <form method="post">
            <div class="bg-light">
                <div class="row mb-3">
                    <label for="postInput" class="form-label">What's on your mind today?</label>
                    <textarea class="form-control" id="postInput" name="postInput"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>
    </div>
</div>

