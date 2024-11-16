@extends('adminlte.layouts.auth')

@section('content')
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

  /* Video di sebelah kanan */
  .right-video {
      width: 50%;
      border-radius: 10px 0 0 10px;
      overflow: hidden;
      position: relative;
  }

  .right-video video {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .right-video .text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 20px;
      text-align: center;
  }

  /* Form registrasi di sebelah kiri */
  .left {
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

<!-- Audio otomatis yang akan diputar setelah interaksi pertama pengguna -->
<audio id="background-audio" autoplay loop>
  <source src="{{ asset('audios/imut.mp3') }}" type="audio/mp3">
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
  <!-- Form registrasi di sebelah kiri -->
  <div class="left">
      <div class="input-box">
          <header><h3>Registrasi</h3></header>
          <form action="{{ route('register') }}" method="post">
              @csrf
              <!-- Input nama -->
              <div class="input-field">
                  <input
                      id="name"
                      type="text"
                      class="input @error('name') is-invalid @enderror"
                      name="name"
                      value="{{ old('name') }}"
                      required
                      autocomplete="name"
                      autofocus>
                  <label for="name">Nama</label>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>

              <!-- Input email -->
              <div class="input-field">
                  <input
                      id="email"
                      type="email"
                      class="input @error('email') is-invalid @enderror"
                      name="email"
                      value="{{ old('email') }}"
                      required
                      autocomplete="email">
                  <label for="email">Email</label>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>

              <!-- Input password -->
              <div class="input-field">
                  <input
                      id="password"
                      type="password"
                      class="input @error('password') is-invalid @enderror"
                      name="password"
                      required
                      autocomplete="new-password">
                  <label for="password">Password</label>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>

              <!-- Input konfirmasi password -->
              <div class="input-field">
                  <input
                      id="password_confirmation"
                      type="password"
                      class="input"
                      name="password_confirmation"
                      required
                      autocomplete="new-password">
                  <label for="password_confirmation">Konfirmasi Password</label>
              </div>

              <div class="input-field">
                  <button type="submit" class="submit">Daftar</button>
              </div>
          </form>

          <div class="signin">
              <span>Sudah mempunyai akun? <a href="{{ route('login') }}">Masuk disini</a></span>
          </div>
      </div>
  </div>

  <!-- Video di sebelah kanan -->
  <div class="right-video">
      <video autoplay loop muted>
          <source src="{{ asset('videos/imut.mp4') }}" type="video/mp4">
          Browser Anda tidak mendukung video tag.
      </video>
      <div class="text">
          <p>Pria tulus tidak gila wanita tetapi bisa gila hanya karena 1 pria   <i> - Siimut</i></p>
      </div>
  </div>
</div>

@endsection
