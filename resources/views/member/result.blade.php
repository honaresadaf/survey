@extends('layouts.member.q')

@section('title')
    پاسخ گویی به سوالات
@endsection

<?php
// function t() {
//    echo 'fghfhf';
//}

    if ($true) {
        function true($g , $an , $t){
            if ($g == $an) {
                echo 'background: #44c093;  color: #ffffff; border-radius: 5px;';
            } else {
                echo '';
            }
        }
    } else {
         function true($g , $an , $t){
            if ($g == $an) {
                echo 'background: #dd6868;  color: #ffffff; border-radius: 5px;';
            } elseif ($g == $t) {
                echo 'background: #44c093;  color: #ffffff; border-radius: 5px;';
            } else {
                echo '';
            }
        }
    }
?>




@section('content')
    <div class="nk-content">
        <div class="nk-split nk-split-page nk-split-lg">
            <!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-white p-5 d-flex justify-center align-center flex-column">
                <div class="wide-xs-fix">

                    <div class="card bg-lighter">
                        <div class="card-header">نتیجه: <?php if($true) { echo 'پاسخ شما درست بود';}else {echo 'پاسخ شما نادرست بود'; } ?></div>
                        <div class="card-inner">
                            <h5 class="card-title">{{ $question->text }}</h5>
                            <br>
                            <form action="{{ route('check') }}" method="post">
                                @csrf
                                <div class="form-group">
                                        <span style=" padding: 3px; {{ true(1,$an , $question->true) }}" class="">{{ $question->g1 }}</span>
                                </div>
                                <div class="form-group">
                                        <span style=" padding: 3px; {{ true(2,$an , $question->true) }}" class="">{{ $question->g2 }}</span>
                                </div>
                                <div class="form-group">
                                        <span style=" padding: 3px; {{ true(3,$an , $question->true) }}" class="">{{ $question->g3 }}</span>
                                </div>
                                <div class="form-group">
                                        <span style=" padding: 3px; {{ true(4,$an , $question->true) }}" class="">{{ $question->g4 }}</span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <a href="{{ route('show.questions') }}" class="btn btn-lg btn-primary">ادامه</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card bg-info-dim">
                        <div class="card-inner">
                            <a class="link-info" style="margin: 5px" href="{{ route('welcome3') }}">
                                <em class="icon ni ni-signout"></em><span>بازگشت به صفحه اصلی</span></a>
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
                </div>
            </div>
            <!-- .nk-split-content -->
        </div>
        <!-- .nk-split -->
    </div>
@endsection
