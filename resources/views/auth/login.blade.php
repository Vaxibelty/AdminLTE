@extends('adminlte.layouts.auth')

@section('content')
<style>
  /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

<style>
    /* POPPINS FONT */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body, html {
        height: 100%;
        background-color: #D8DBBD; /* Warna latar belakang yang sama dengan halaman registrasi */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main {
        display: flex;
        width: 900px;
        height: 550px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
    }

    .left-video {
        width: 50%;
        border-radius: 10px 0 0 10px;
        overflow: hidden;
        position: relative;
    }

    .left-video video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .left-video .text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 20px;
        text-align: center;
    }

    .right {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .input-box {
        width: 330px;
    }

    .input-box header {
        font-weight: 700;
        text-align: center;
        margin-bottom: 40px;
        font-size: 24px;
        color: #333;
    }

    .input-field {
        display: flex;
        flex-direction: column;
        position: relative;
        margin-bottom: 20px;
    }

    .input {
        height: 45px;
        width: 100%;
        padding: 0 10px;
        background: transparent;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        color: #333;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .input:focus {
        border-color: #743ae1;
    }

    .input-field label {
        position: absolute;
        top: 12px;
        left: 10px;
        color: #aaa;
        font-size: 14px;
        pointer-events: none;
        transition: 0.3s;
    }

    .input:focus ~ label, .input:valid ~ label {
        top: -10px;
        font-size: 12px;
        color: #743ae1;
    }

    .submit {
        height: 45px;
        background: #743ae1;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
    }

    .submit:hover {
        background: #5e2a92;
    }

    .signin {
        text-align: center;
        font-size: small;
        margin-top: 20px;
    }

    .signin a {
        color: #743ae1;
        text-decoration: none;
        font-weight: 700;
    }

    .signin a:hover {
        text-decoration: underline;
    }
</style>
<audio id="background-audio" autoplay loop>
    <source src="{{ asset('audios/separuh.mp3') }}" type="audio/mp3">
    Browser Anda tidak mendukung audio tag.
</audio>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const audio = document.getElementById('background-audio');
        
        // Mulai audio setelah pengguna berinteraksi pertama kali
        const playAudio = () => {
            audio.play().catch(error => {
                console.log('Autoplay gagal: ' + error);
            });
            // Hapus event listener setelah audio mulai diputar
            document.removeEventListener('click', playAudio);
        };

        // Dengarkan klik pertama pengguna
        document.addEventListener('click', playAudio);
    });
</script>

<div class="main">
    <!-- Video di sebelah kiri -->
    <div class="left-video">
        <video autoplay loop muted>
            <source src="{{ asset('videos/ambativasi.mp4') }}" type="video/mp4">
            Browser Anda tidak mendukung video tag.
        </video>
        <div class="text">
            <p>Wajah seindah senja membuat luka<br> selebar anggrek mekar pontianak<i> - Ambativasi</i></p>
        </div>
    </div>

    <!-- Form login di sebelah kanan -->
    <div class="right">
        <div class="input-box">
            <header><h3>Login</h3></header>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <!-- Input email dan password tanpa perubahan -->
                <div class="input-field">
                    <input
                        id="email"
                        type="email"
                        class="input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus>
                    <label for="email">Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="input-field">
                    <input
                        id="password"
                        type="password"
                        class="input @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="current-password">
                    <label for="password">Password</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="input-field">
                    <button type="submit" class="submit">Masuk</button>
                </div>                
            </form>

            <div class="signin">
                <span>Belum mempunyai akun? <a href="{{ route('register') }}">Daftar disini</a></span>
                <br>
                <span><a href="{{ route('password.request') }}">Lupa password?</a></span>
            </div>
        </div>
    </div>
</div>

@endsection
    