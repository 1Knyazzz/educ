<?php
    $title = 'input';
    require 'static/header.php';
    require 'FeedbackRepository.php';
    ?>

<h1>input</h1>
<form action="" method="post" class="form-style">
    <div class="form-style">
        <label for="name">Enter your name: </label>
        <input type="text" name="username" placeholders="enter nickname" class="form-control" required><br>
        <label for="name">Enter your email: </label>
        <input type="email" name="email" placeholders="enter email" class="form-control" required><br>
        <label for="name">Enter your password: </label>
        <input type="password" name="password" placeholders="enter password" class="form-control" required><br>
        <label for="name">Enter your number: </label>
        <input type="text" name="number" placeholders="enter phone number" class="form-control"><br>
        <label for="name">Enter description: </label>
        <input  name="description" placeholders="enter description" class="form-control"><br>
        <input type="submit" value="enter data">
    </div>
</form>
<?php
if ($_POST)
{
    $product = new FeedbackRepository();
    $product->name=($_POST['username']);
    $product->email=($_POST['email']);
    $product->password=($_POST['password']);
    $product->number=($_POST['number']);
    $product->description=($_POST['description']);


    if ($product->create()) {
        echo '<script>alert("successful");</script>';
    }
    else {
        echo '<script>alert("not completed");</script>';
    }
}

    require 'static/footer.php';
?>