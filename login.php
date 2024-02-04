<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/botstrap/4.3.1/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Login</h2>
            <form id="loginform">
                <div class="form-group">
                    <label for="username">username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="button" class="btn-btn-primary" onclick="login()">login</button>
            </form>
        </div>
    </div>
</div> 

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    console.log("CEK LUAR ataS");
    function login(){
        console.log("LOGIN CEK");
        const username =document.getElementById('username').value;
        const password =document.getElementById('password').value;

        //membuat objek FormData
        const formData = new FormData();
        formData.append('user', username);
        formData.append('pwd', password);

        //konfigurasi axios
        axios.post('https://qoritriani.000webhostapp.com/login.php', formData).then(response => {
            console.log(response)
            //handle response dari server
            if (response.data.status == 'success'){
                //jika login berhasil, buka dashboard
                const sessionToken =response.data.session_token;
                console.log(username);
                console.log(password);
                console.log(sessionToken);
                localStorage.setItem('session_token', sessionToken);
                window.location.href = 'index.php'
            }else {
                //jika login gagal, tampilkan pesan kesalahan
            alert('login failed. please check your credentials.');
            }
        })
        .catch(error => {
            //handle kesalahan koneksi atau server
            console.error('error during login:', error);
        });
    }
            
</script>
</body>
</html>