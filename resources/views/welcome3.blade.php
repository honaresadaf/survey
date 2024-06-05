@extends('layouts.member.q')
@section('title')
    مسابقه غدیر
@endsection

@section('content')


    <div class="nk-split-content nk-split-stretch bg-white p-5 d-flex justify-center align-center flex-column">
        <div class="wide-xs-fix">

            <div style="max-width: 540px;" class="nk-block nk-block-middle nk-auth-body ml-0">

                @if($start)
                    <div class="card text-white bg-teal">
                        <div class="card-header text-white">به مسابقه خوش آمدید.</div>
                        <div class="card-inner">
                            <h5 class="card-title text-white"></h5>
                            <p class="card-text ">متن قبل شروع مسابه</p>
                        </div>
                    </div>
                    <div class="card text-teal bg-teal-dim" style="text-align: center">
                        <div class="card-inner">
                            <a href="{{ route('start') }}" class="text-teal">
                                شروع مسابقه
                                <em class="icon ni ni-back-ios icon-m-left"></em>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="card text-white bg-danger">
                        <div class="card-header">به مسابقه خوش آمدید.</div>
                        <div class="card-inner">
                            <h5 class="card-title text-white"></h5>
                            <p class="card-text ">
                                <em class="icon ni ni-cross-circle"></em>
                                لطفاً منتظر بمانید، مسابقه هنوز شروع نشده است.
                            </p>
                        </div>
                    </div>
                    <div class="card bg-danger-dim">
                        <div class="card-inner">
                            <a class="link-danger" style="margin: 5px" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><em
                                    class="icon ni ni-signout"></em><span>خروج از مسابقه</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
