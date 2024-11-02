<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done & Dusted</title>
    <link rel="stylesheet" href="forum.css">
</head>
<body>
    <!-- Forum Header -->
    <header class="forum-header">
        <h1>Community Forum</h1>
        <p>Discuss and share ideas!</p>
    </header>

     <!-- New Post Form -->
    <section class="new-post-section">
        <h2>Create a New Post</h2>
        <form class="new-post-form" action="submit_post.php" method="post">
            <label for="post-title">Post Title:</label>
            <input type="text" id="post-title" name="post_title" required>

            <label for="post-content">Content:</label>
            <textarea id="post-content" name="post_content" rows="5" required></textarea>

            <button type="submit">Submit Post</button>
        </form>
    </section>

    <!-- Recent Posts Section -->
    <section class="recent-posts">
        <h2>Recent Posts</h2>
        
        <div class="post">
            <h3>Post Title Example 1</h3>
            <p>Posted by User123 on Oct 28, 2024</p>
            <p>Example text Example text Example text Example text Example text Example text...</p>
        </div>

        <div class="post">
            <h3>Post Title Example 2</h3>
            <p>Posted by User456 on Oct 27, 2024</p>
            <p>Example text Example text Example text Example text Example text Example text Example text...</p>
        </div>

    </section>
</body>
</html>