<?php
require 'dbwork.php';
$books           = $obj->books_store();
$book_categories = $obj->book_category_list();
?>

<!DOCTYPE html>
<html lang="en">

<?php include('components/head.php'); ?>

<body>

    <?php include('components/navbar.php') ?>
    <div class="book-site">

        <section class="search">
            <div class="search-container">
                <div class="search-bar">
                    <input type="text" name="search" class="bookSearchEvent search-input">
                    <label for="search" class="search-label"> Search </label>
                </div>
                <div class="search-result">
                    <ul>

                    </ul>

                </div>
            </div>
        </section>

        <section class="library">
            <?php foreach ($book_categories as $key => $category) : ?>
                <div class="container-fluid my-5">
                    <h1 class="tex-center fw-bold display-1 md-3"><span class="text-muted"><?php echo $category['name']; ?></span></h1>
                    <div class="row mt-5 books-container ">
                        <div class="owl-carousel allBooks owl-theme">
                            <?php foreach ($books as $key => $book) :
                                if ($category['id'] == $book['book_category']) :
                                    if (isset($book['name'])) : ?>
                                        <div class="item  md-4">
                                            <div class="card border-0 shadow">
                                                <img src="uploads/<?php echo $book['book_cover'] ?>" alt="" class="card-img-top">
                                                <div class="card-body">
                                                    <h2><a href="./booksDetail.php?<?php echo $book['id'] ?>"><?php echo $book['title'] ?></a></h2>
                                                    <div class="card-footer">
                                                        <small class="text-muted"><?php echo $book['author'] ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </section>

    </div>

    <footer class="footer-final">
        <div class="container">
            <div class="footer-icon">
                <a href="#">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
            </div>
            <div class="footer-icon">
                <a href="#">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            </div>
            <div class="footer-icon">
                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
            <div class="footer-icon">
                <a href="#">
                    <i class="fa-solid fa-globe"></i>
                </a>
            </div>
        </div>
    </footer>
    <?php include('components/script.php') ?>
</body>

</html>