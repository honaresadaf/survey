@extends('layouts.member.main')

@section('title')
    ورود به مسابقه
@endsection

@section('body')
    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
    </div>
    <div class="nk-block nk-block-middle nk-auth-body">
        <div class="brand-logo pb-5">
            <a href="#" class="logo-link">
                <img class="logo-light logo-img logo-img-lg" src="/assets/images/logo.png" srcset="/assets/images/logo.png 2x" alt="لوگو">
            </a>
        </div>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">ورود</h5>
                <div class="nk-block-des">
                    <p>ورود به مسابقه</p>
                </div>
            </div>
        </div>
        <!-- .nk-block-head -->
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">نام</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg @error('name') error @enderror" value="{{ old('name') }}" id="name" name="name" required autofocus autocomplete="username" placeholder="نام خود را وارد کنید">
                    @error('name')
                    <span id="fv-message-error" class="invalid">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="number">شماره تماس</label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg @error('number') error @enderror" name="number" {{ old('number') }} id="number" required autofocus autocomplete="username" placeholder="شماره تماس خود را با 09.. وارد کنید">
                    @error('number')
                    <span id="fv-message-error" class="invalid">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <input style="display: none" id="password" type="password" name="password" value="12345678" required autocomplete="current-password" />
            <input style="display: none" id="password_confirmation" type="password" name="password_confirmation" value="12345678" required autocomplete="current-password" />
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block">ورود</button>
            </div>
        </form>
        <!-- form -->
    </div>
    <!-- .nk-block -->

    <!-- nk-block -->
@endsection

{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}
{{--    <input id="name" type="text" name="name"  required autofocus autocomplete="username" />--}}
{{--<input id="number" type="text" name="number"  required autofocus autocomplete="username" />--}}
{{--<input style="display: none" id="password" type="password" name="password" value="12345678" required autocomplete="current-password" />--}}
{{--<input style="display: none" id="password_confirmation" type="password" name="password_confirmation" value="12345678" required autocomplete="current-password" />--}}
{{--    <button>send</button>--}}
{{--</form>--}}


