<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    //fungsi untuk memeriksa session
    function checkSession() {
        //ambil session_token dari localstorage
        //membuat objek formdata
        const formData =new formData();
        formData.append('session_token', localStorage.getItem('session_token'));

        //kirim session_token ke server untuk memeriksanya
        axios.post('https://qoritriani.000webhostapp.com/login.php', FormData).then(response => {
            //handle respons dari server
            console.log(response)
            if (response.data.status == 'success') {
                //jika session masih aktif, arahkan ke halaman dashboard.php
                const nama =response.data.hasil.name || 'Default Name';
                localStorage.setItem('nama', nama);
                } else {
                    window.location.href = 'login.php';
            }
    })
    .catch(error => {
        //handle kesalaahan koneksi atau server
        console.error('Error checking session:', error);
    });
    }
    //panggil fungsi checksession saat halaman dimuat
    checkSession();
</script>
