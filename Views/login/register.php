<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register T-Cow</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/2395/2395796.png">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Kit -->
	<script src="https://kit.fontawesome.com/9769c63bf6.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('https://static.vecteezy.com/system/resources/previews/002/175/097/original/rural-dairy-farm-landscape-with-cows-over-seamless-panoramic-countryside-horizon-hills-meadows-trees-and-fields-skyline-summer-nature-background-pasture-grass-for-cows-vector.jpg');
        background-size: cover;">
    <!-- Login Page -->
    <div class="d-flex justify-content-center align-items-center" style="height: 622px;">
        <div class="container p-3" style="height: 18rem; width:25rem;">
            <div class="card shadow" style="width: 25rem; height:auto;">
                <img src="https://img.pikbest.com/backgrounds/20190626/cow-farm-vector-background-ok-version_2757652.jpg!c1024wm0" class="card-img-top" alt="...">
                <div class="card-body p-5">
                    <h3 class="card-title mb-5">Sign Up</h3>
                    <form action="../../Controllers/DataUser.php?act=signup" method="post">
                        <div class="form-group my-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <!-- confirmation password -->
                        <div class="form-group mb-4">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-block">Sign Me Up!</button>
                        </div>
                        <div class="text-center my-3">
                        <a href="login.php" class="card-link">Get Back</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- confirmation check -->
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
