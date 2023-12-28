<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form method="post" action="index.php?page=register" class="form register-form" enctype="multipart/form-data">
    <h3>Sign Up Here</h3>

    <label>User Picture</label>
    <!-- Input for uploading/selecting an image -->
    <input class="login-input" name="picture" type="file" accept="image" id="imageInput" style="display: none">

    <!-- Circular image container -->
    <label for="imageInput" class="cursor-pointer flex justify-center">
        <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-300">
            <img id="previewImage" class="w-full h-full object-cover" src="<?= PATH ?>assets/img/Sample_User_Icon.png" alt="User Picture">
        </div>
    </label>

    <label for="username">Username</label>
    <input class="login-input" name="username" type="text" placeholder="Username" id="username">

    <label for="email">Email</label>
    <input class="login-input" name="email" type="text" placeholder="Email" id="email">

    <label for="password">Password</label>
    <input class="login-input" name="password" type="password" placeholder="Password" id="password">

    <div class="social flex justify-center">
        <button name="signup" id="btn">Sign Up</button>
    </div>
    <div class="social items-center flex-col">
        <p class="text-sm mb-4">Or</p>
        <a href="index.php?page=login">
            <div class="cursor-pointer">Login</div>
        </a>
    </div>
</form>

<script>
    // JavaScript to handle image preview
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>