@extends('layouts.layoutLogin')


@section('contents')

<form method="post" action="{{ route('login') }}" class="polman-form-login">
    @csrf
    <h4>Masuk</h4>
    <hr />
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-group">
        <label for="username">
            Nama Akun
            <span style="color: red;">*</span>
        </label>
        <input type="text" id="username" name="username" maxlength="10" class="form-control" required=""
               oninvalid="this.setCustomValidity('Nama Akun Wajib Diisi')"
               oninput="this.setCustomValidity('')">
    </div>

    <div class="form-group">
        <label for="password">
            Kata Sandi
            <span style="color: red;">*</span>
        </label>
        <input id="password" type="password" name="password" class="form-control" required
               oninvalid="this.setCustomValidity('Kata Sandi Wajib Diisi')"
               oninput="this.setCustomValidity('')">
    </div>

    <button class="btn btn-primary w-100" type="submit">Masuk</button>
    <br>
    <br>
    <span style="margin-top: 10px;">Halaman About Me? <a href="{{ route('AboutMe.Index') }}">Klik disini</a>.</span><br />

    <style>
        .polman-form-login {
            font-family: 'NAMA_FONT', Verdana;
            border-radius: 0px;
            overflow: hidden;
        }

        h4, label, input, button, span {
            font-family: 'NAMA_FONT', Verdana;
        }
    </style>
</form>

