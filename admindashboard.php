<?php
session_start();

# If the admin is logged in
if ( isset($_SESSION['adminname'])){
include "db_conn.php";
include "php/func-book.php"; 
$books = get_all_books($conn);
include "php/func-author.php"; 

$authors = get_all_author($conn);
include "php/func-categories.php"; 
$categories = get_all_categories($conn);


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
  <link rel="stylesheet" href="admindashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>

<body>
<header>
      <h1>Admin Dashboard</h1>
      <form action="search.php"
               method="get" 
               style="width: 100%; max-width: 30rem">
  
           <div class="input-group my-5">
        <input type="text" 
               class="form-control"
               name="key" 
               placeholder="Search Book..." 
               aria-label="Search Book..." 
               aria-describedby="basic-addon2">
  
        <button class="input-group-text
                       btn btn-primary" 
                id="basic-addon2">
                <img src="img/search.png"
                     width="20">
  
        </button>
      </div>
         </form>
    </header>
    <aside class="sidebar">
      <div class="logo">
        <img src="book-image.png" alt="logo">
        <h2>Online Book Store</h2>
      </div>
      <ul class="links">
        
        
        
        <h4>Advanced</h4>
        <li>
          <span class="material-symbols-outlined">person</span>
          <a href="add-author.php">Add Author</a>
        </li>
        <li>
          <span class="material-symbols-outlined">group</span>
          <a href="add-category.php">Add Category </a>
        </li>
        <li>
          <span class="material-symbols-outlined">ambient_screen</span>
          <a href="add-book.php">Add Book</a>
        </li>
        
        <hr>
        <h4>Account</h4>
        
        <li>
          <span class="material-symbols-outlined">settings</span>
          <a href="#">Settings</a>
        </li>
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="#">Logout</a>
        </li>
      </ul>
    </aside>
   
  
  <div class="content">
 <?php 
 if(!empty($books)) { ?>
 
 <h4>All Books</h4>
 <div class="table-responsive"> <!-- Use Bootstrap's table-responsive class for responsiveness -->
      <table class="table table-bordered table-striped"> <!-- Use Bootstrap's table classes -->
        <thead class="table-light"> <!-- Use Bootstrap's table-dark class for dark header -->
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($books as $book) {?>
          <tr>
            <td>#</td>
            <td><img  width="80" src="uploads/cover/<?= $book['cover'] ?>" alt="<?= $book['title'] ?>">
            <a class="link-dark d-block text-center" href="uploads/files/<?= $book['file'] ?>"> <?=$book['title'] ?></a>
            
          </td>
            

          

            <td>

         <?php if ($authors == 0)  {
            echo "undefined";
          }
          else{ foreach($authors as $author) {
            if($author['id'] == $book['author_id']){
              echo $author['name'];
            }
          }

          } ?>
        </td>
            <td><?=$book['description']?></td>
           <td><?php if ($categories == 0)  {
            echo "undefined";
          }
          else{ foreach($categories as $category) {
            if($category['id'] == $book['category_id']){
              echo $category['name'];
            }
          }

          } ?></td> 
            <td>
            <a href="edit-book.php?id=<?= $book['id'] ?>" class="btn" style="margin-bottom: 10px; background-color: grey;" >Edit</a>
              <a  href="php/delete-book.php?id=<?= $book['id'] ?>" class="btn btn-danger" style=" background-color:red;">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } else { ?>
    <p>No books found.</p>
    <?php } ?>
    <h4>All categories</h4>
    <table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Category Name</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category) { ?>
      <tr>
        <td><?= $category['id'] ?></td>
        <td><?= $category['name'] ?></td>
        <td>
              <a href="edit-category.php?id=<?= $category['id'] ?>" class="btn btn-warning">Edit</a>
              <a   href="php/delete-category.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
      </tr>
    <?php } ?>
  </tbody>

</table>
<h4>All Authors</h4>
    <table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Author Names</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author) { ?>
      <tr>
        <td><?= $author['id'] ?></td>
        <td><?= $author['name'] ?></td>
        <td>
              <a href="edit-author.php?id=<?= $author['id'] ?>" class="btn btn-warning">Edit</a>
              <a href="php/delete-author.php?id=<?= $author['id'] ?>"   class="btn btn-danger">Delete</a>
            </td>
      </tr>
    <?php } ?>
  </tbody>
  
</table>
  
</body>
</html>