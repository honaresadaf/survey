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
                    <form class="nk-stepper stepper-init is-alter" action="{{ route('check') }}" method="post" id="stepper-survey-v1" data-step-current="3" novalidate="novalidate" style="display: block;">
                        @csrf
                        @method('post')
                        <div class="nk-stepper-content">
                            <div class="nk-stepper-progress stepper-progress mb-4">
                                <div class="stepper-progress-count mb-2">3 از 5</div>
                                <div class="progress progress-md">
                                    <div class="progress-bar stepper-progress-bar" style="width: 60%;"></div>
                                </div>
                            </div>
                            <div class="nk-stepper-steps stepper-steps">

{{--                                <div class="nk-stepper-step done">--}}
{{--                                    <span  style="color: #d2d2d2;size: 10px; padding-bottom: 10px !important; display: flex;">سوال شماره 1</span>--}}
{{--                                    <h5 class="title mb-3">صورت سوال شماره 1</h5>--}}
{{--                                    <ul class="custom-control-group flex-column align-start">--}}
{{--                                            <li>--}}
{{--                                                <div class="custom-control custom-radio">--}}
{{--                                                    <input type="radio" class="custom-control-input valid" name="sv2-time-avilability" id="sv2-time-avilability-full" required="">--}}
{{--                                                    <label class="custom-control-label" for="sv2-time-avilability-full">گزینه 1</label>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="custom-control custom-radio">--}}
{{--                                                    <input type="radio" class="custom-control-input valid" name="sv2-time-avilability" id="sv2-time-avilability-part" required="">--}}
{{--                                                    <label class="custom-control-label" for="sv2-time-avilability-part">گزینه 2</label>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="custom-control custom-radio checked">--}}
{{--                                                    <input type="radio" class="custom-control-input valid" name="sv2-time-avilability" id="sv2-time-avilability-freelance" required="">--}}
{{--                                                    <label class="custom-control-label" for="sv2-time-avilability-freelance">گزینه 3</label>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                </div>--}}

{{--                                <div class="nk-stepper-step done">--}}
{{--                                    <h5 class="title mb-3">صورت سوال شماره 2</h5>--}}
{{--                                    <ul class="custom-control-group flex-column align-start">--}}
{{--                                        <li>--}}
{{--                                            <div class="custom-control custom-radio">--}}
{{--                                                <input type="radio" class="custom-control-input valid" name="sv2-time-avilability2" id="sv2-time-avilability-full2" required="">--}}
{{--                                                <label class="custom-control-label" for="sv2-time-avilability-full2">گزینه 1</label>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="custom-control custom-radio">--}}
{{--                                                <input type="radio" class="custom-control-input valid" name="sv2-time-avilability2" id="sv2-time-avilability-part2" required="">--}}
{{--                                                <label class="custom-control-label" for="sv2-time-avilability-part2">گزینه 2</label>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="custom-control custom-radio checked">--}}
{{--                                                <input type="radio" class="custom-control-input valid" name="sv2-time-avilability2" id="sv2-time-avilability-freelance2" required="">--}}
{{--                                                <label class="custom-control-label" for="sv2-time-avilability-freelance2">گزینه 3</label>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

                                @foreach($questions as $q)
                                    <div class="nk-stepper-step done">
                                        <span  style="color: #d2d2d2;size: 10px; padding-bottom: 10px !important; display: flex;">سوال شماره {{ $q->number }}</span>
                                        <h5 class="title mb-3">{{ $q->text }}</h5>
                                        <ul class="custom-control-group flex-column align-start">
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input valid" value="1" name="{{ $q->id }}" id="{{ $q->id }}1" required="">
                                                    <label class="custom-control-label" for="{{ $q->id }}1">{{ $q->g1 }}</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input valid" value="2" name="{{ $q->id }}" id="{{ $q->id }}2" required="">
                                                    <label class="custom-control-label" for="{{ $q->id }}2">{{ $q->g2 }}</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio checked">
                                                    <input type="radio" class="custom-control-input valid" value="3" name="{{ $q->id }}" id="{{ $q->id }}3" required="">
                                                    <label class="custom-control-label" for="{{ $q->id }}3">{{ $q->g3 }}</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio checked">
                                                    <input type="radio" class="custom-control-input valid" value="4" name="{{ $q->id }}" id="{{ $q->id }}4" required="">
                                                    <label class="custom-control-label" for="{{ $q->id }}4">{{ $q->g4 }}</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                                <!-- end -->
                                <div class="nk-stepper-step">
                                    <div class="pt-4 pb-2">
                                        <em class="icon icon-circle icon-circle-xxl mb-4 ni ni-check bg-primary-dim"></em>
                                        <h5 class="title mb-2">سوالات تکمیل شدند.</h5>
                                        <p>با تشکر از وقت گذاری شما برای پاسخ گویی به سوالات.</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                <li class="step-prev" style="display: block;"><button class="btn btn-dim btn-primary">بازگشت</button></li>
                                <li class="step-next" style="display: block;"><button class="btn btn-primary">ادامه</button></li>
                                <li class="step-submit" style="display: none;"><button type="submit" class="btn btn-primary">ارسال پاسخ ها</button></li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary">ارسال پاسخ ها</button>
                    </form>
                </div>
            </div>
            <!-- .nk-split-content -->
        </div>
        <!-- .nk-split -->
    </div>
@endsection
