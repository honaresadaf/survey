@extends('layouts.member.q')

@section('title')
    پاسخ گویی به سوالات
@endsection

@section('content')
    <div class="nk-content">
        <div class="nk-split nk-split-page nk-split-lg">
            <!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-white p-5 d-flex justify-center align-center flex-column">
                <div class="wide-xs-fix">

                    <div class="card bg-orange-dim text-orange">
                        <div class="card-header">اتمام سوالات</div>
                        <div class="card-inner">
                            <h5 class="card-title">   <em class="icon ni ni-check" style="margin-left: 10px; font-size: 25px"></em>شما به تمام سوالات پاسخ داده اید!
                            </h5>
                            <br>
                            <h6 class=""><em class="icon ni ni ni-info-fill" style="margin-left: 10px; font-size: 17px"></em>نتایج شما:</h6>
                            <br>
                            <div style="text-align: center; width: 60%; margin-left: auto; margin-right: auto">
                                <h5 class="bg-success text-white" style="padding: 8px; border-radius: 7px; width: auto; margin-bottom: 17px">تعداد پاسخ های درست: {{ $user->n_true }}</h5>
                                <h5 class="bg-danger text-white " style="padding: 8px; border-radius: 7px; width: auto;  margin-bottom: 17px">تعداد پاسخ های نادرست: {{ $user->n_false }}</h5>
                                <h5 class="text-white bg-info" style="padding: 8px; border-radius: 7px; width: auto;">امتیاز شما: {{ $user->score }}</h5>
                            </div>
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
