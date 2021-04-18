@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_ext').on('click', function() {
                if (!$("#myfrm").submit()) {    // button
                    return true;
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".codecontent").hide();
            var flg = "close";
            $("#disp").click(function() {
                $(".codecontent").slideToggle();
                if (flg == "close") {
                    $(this).text("閉じる");
                    flg = "open";
                } else {
                    $(this).text("2契約 (2枚) 以上希望の方はこちらをクリックしてください。");
                    flg = "close";
                }
            });
        });
    </script>
@endsection

@section('content')
    <main role="main" class="mt-5 pt-5">
        <div class="jumbotron">
            <h1 class="text-center">Set Spec Computer</h1>
        </div>
        <div class="jumbotron">
            <form name="myfrm" id="myfrm" action="{{ route('form.confirm1') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th rowspan="3">ご希望のCPU<div class="codecontent">1契約 (1枚) 目</div></th>
                        <td>[CPU1]
                            <select name="cpu_1" id="cpu_1">
                                <option value="">- Select -</option>
                                @foreach ($cpu as $key => $value)
                                    <option value="{{ $value }}" @if ($cpu_1 === $value) selected="selected" @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="alert-danger">{{ $errors->first('cpu_1') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>[CPU1種別]
                            <select name="cpu_spec_1" id="cpu_spec_1">
                                <option value="">- Select -</option>
                                @foreach ($cpu_r as $key => $value)
                                    <option value="{{ $value }}" @if ($cpu_spec_1 === $value) selected="selected" @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="alert-danger">{{ $errors->first('cpu_spec_1') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>[国際郵便局]　利用不可</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td id="disp" style="background: #f6f6f6;">2契約 (2枚) 以上ご希望の方はこちらをクリックしてください。</td>
                    </tr>
                    <tr class="codecontent">
                        <th rowspan="3">ご希望のCPU<div>2契約 (2枚) 目</div></th>
                        <td>[CPU2]
                            <select name="cpu_2" id="cpu_2">
                                <option value="">- Select -</option>
                                @foreach ($cpu_r as $key => $value)
                                    <option value="{{ $value }}" @if ($cpu_2 === $value) selected="selected" @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="alert-danger">{{ $errors->first('cpu_2') }}</div>
                        </td>
                    </tr>
                    <tr class="codecontent">
                        <td>[CPU種別2]
                            <select name="cpu_spec_2" id="cpu_spec_2">
                                <option value="">- Select -</option>
                                @foreach ($cpu_r as $key => $value)
                                    <option value="{{ $value }}" @if ($cpu_spec_2 === $value) selected="selected" @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="alert-danger">{{ $errors->first('cpu_spec_2') }}</div>
                        </td>
                    </tr>
                    <tr class="codecontent">
                        <td>[国際郵便局]　利用不可</td>
                    </tr>
                    {{-- <tr>
                        <th>受取希望日</th>
                        <td>
                            <select name="receive_yy" id="receive_yy">
                                <option value="">- Year -</option>
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ strval(date('Y') + $i) }}" @if ($receive_yy === strval(date('Y') + $i)) selected="selected" @endif>{{ strval(date('Y') + $i) }}</option>
                                @endfor
                            </select>&nbsp; 年&nbsp;
                        </td>
                    </tr> --}}
                </table>
                <div class="p-btn">
                    <input type="button" name="btn_ext" id="btn_ext" value="入力内容を確認">
                </div>
                <input type="hidden" name="firstname" value="{{ $firstname }}">
                <input type="hidden" name="lastname" value="{{ $lastname }}">
                <input type="hidden" name="mail" value="{{ $mail }}">
                <input type="hidden" name="mail_c" value="{{ $mail_c }}">
                <input type="hidden" name="loginid" value="{{ $loginid }}">
                <input type="hidden" name="password" value="{{ $password }}">
            </form>
        </div>
    </main>
@endsection
