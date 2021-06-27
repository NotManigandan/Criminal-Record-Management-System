<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>
<style>
    #showcase {
        background-image: url('https://img.freepik.com/free-vector/white-abstract-background_23-2148806276.jpg?size=626&ext=jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 20px;
    }

    #showcase h1 {
        font-size: 50px;
        line-height: 2;
    }

    #showcase p {
        font-size: 27px;
        line-height: 2;
    }

    .anchor-inline {
        display: inline;
        line-height: 2;
        text-decoration: none;
        font-size: 25px;
    }
</style>
<header id="showcase">
    <h1>Welcome To Criminal Record Management System</h1>
    <p>Navigations: </p>
    <div class="anchor-inline">
        <a href="Police.php">Police Information</a> &nbsp;
        <a href="Criminals.php">Criminal Information</a>
    </div>
    <div class="anchor-inline">
        <a href="Crime.php">Crimes Comitted</a> &nbsp; &nbsp;
        <a href="Categories.php">Crime Categories</a>
    </div>
    <div class="anchor-inline">
        <a href="Court.php">Court Information</a> &nbsp; &nbsp;
        <a href="Prison.php">Prison Information</a>
    </div>
</header>
</body>

</html>