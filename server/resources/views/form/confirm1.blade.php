@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_cf').on('click', function() {
                if (!$('#form').submit()) {     // button
                    return true;
                }
            });
        });
    </script>
@endsection

@section('content')
    <main role="main" class="mt-5 pt-5">
        <div class="jumbotron">
            <form name="form" id="form" action="" method="POST">
                @csrf
                <input type="hidden" name="firstname" value="{{ $firstname }}">
                <input type="hidden" name="lastname" value="{{ $lastname }}">
                <input type="hidden" name="mail" value="{{ $mail }}">
                <input type="hidden" name="mail_c" value="{{ $mail_c }}">
                <input type="hidden" name="loginid" value="{{ $loginid }}">
                <input type="hidden" name="password" value="{{ $password }}">
                <div>[ご希望内容の確認]</div>
                <table>
                    <tr>
                        {{ $err = false }}
                        @if (!empty($cpu_2))
                            <th rowspan="3">ご希望のCPU<div>1契約 (1枚) 目</div></th>
                        @else
                            <th rowspan="3">ご希望のCPU</th>
                        @endif
                            <td>[CPU1] {{ $cpu_1 }}</td>
                    </tr>
                    <tr>
                        <td>[CPU種別] {{ $cpu_spec_1 }}</td>
                    </tr>
                    <tr>
                        <td>[国際郵便局]　利用不可</td>
                    </tr>
                    @if (!empty($cpu_2))
                        <tr>
                            <th rowspan="3">ご希望のCPU<div>2契約 (2枚) 目</div></th>
                            @if (!empty($cpu_2))
                                <td>[CPU] {{ $cpu_2 }}</td>
                            @else {{ $err = true }}
                                <td>[CPU] <span style="color: red;">必須項目です。選択してください。</span></td>
                            @endif
                        </tr>
                        <tr>
                            <td>[SIM種別] {{ $cpu_spec_2 }}</td>
                        </tr>
                        <tr>
                            <td>[国際郵便局]　利用不可</td>
                        </tr>
                    @endif
                </table>
                <div class="p-btn">
                    <input type="button" class="back" name="" id="" value="{{ '変更する' }}" onclick="document.form.action='{{ route('form.index') }}'; document.form.submit();" />
                </div>
                {{-- <div class="p-btn">
                    <input type="button" class="back" name="" id="" value="{{ $err ? '戻る' : '変更する' }}" onclick="document.form.action='./'; document.form.submit();" />
                </div><br><hr><br> --}}
                @if (!$err)
                    <div>[お客様情報の入力]</div><br>
                    <table>
                        <tr>
                            <th>お名前(英字)<em>※</em></th>
                            <td>
                                <input type="text" class="" name="firstname" id="firstname" value="{{ $firstname }}">
                                <input type="text" class="" name="lastname" id="lastname" value="{{ $lastname }}"> <span style="color: blue;">[半角英字]</span>
                                <div class="alert-danger">{{ $errors->first('firstname') }}</div>
                                <div class="alert-danger">{{ $errors->first('lastname') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th>E-mail<em>※</em></th>
                            <td>
                                <input type="text" class="" name="mail" id="mail" value="{{ $mail }}" email="true"> <span style="color: blue">[半角英字]</span>
                                <div class="alert-danger">{{ $errors->first('mail') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th>E-mail確認用<em>※</em></th>
                            <td>
                                <input type="text" class="" name="mail_c" id="mail_c" value="{{ $mail_c }}" email="true"> <div style="color: blue; padding-top: 6px;">[確認のため同じメールアドレスを入力してください。]</div>
                                <div class="alert-danger">{{ $errors->first('mail_c') }}</div>
                            </td>
                        </tr>
                    </table><br><hr><br>
                    <div>【My CPUアカウントの入力】</div>
                    <table>
                        <tr>
                            <th rowspan="2">ログインID<em>※</em></th>
                            <td>
                                <input type="text" class="" name="loginid" id="loginid" value="{{ $loginid }}">
                                <div class="alert-danger">{{ $errors->first('loginid') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: blue;">* My berryへのログインIDを<span style="color: red">半角英字4～10桁</span>でご指定ください。</span></td>
                        </tr>
                        <tr>
                            <th rowspan="2">パスワード<em>※</em></th>
                            <td>
                                <input type="password" class="" name="password" id="password" value="{{ $password }}">
                                <div class="alert-danger">{{ $errors->first('password') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: blue">* My berryへのログインIDを<span style="color: red">半角英字4～10桁</span>でご指定ください。</span></td>
                        </tr>
                        <tr>
                            <th rowspan="2">パスワード確認<em>※</em></th>
                            <td>
                                <input type="password" class="" name="password_c" id="password_c" value="{{ $password_c }}">
                                <div class="alert-danger">{{ $errors->first('password_c') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td><span style="color: blue;">* 確認のため上記と同じパスワードを再度ご入力ください。</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background: #f6f6f6;">
                                <div style="padding-top: 6px;">My berryとは、お客様のご登録情報の確認、ご利用料金の確認や月々の明細の確認ができる無料のサービスです。</div>
                                <div style="padding-top: 6px;">上記で設定いただきましたログインIDとパスワードでログインし閲覧できますが、ログインIDが重複している場合には、別途、改めてお知らせいたします。</div>
                            </td>
                        </tr>
                    </table>
                    <div class="p-btn">
                        <input type="button" name="btn_cf" id="btn_cf" value="次へ" />
                    </div>
                @endif
                <input type="hidden" name="cpu_1" id="cpu_1" value="{{ $cpu_1 }}">
                <input type="hidden" name="cpu_2" id="cpu_2" value="{{ $cpu_2 }}">
                <input type="hidden" name="cpu_spec_1" id="cpu_spec_1" value="{{ $cpu_spec_1 }}">
                <input type="hidden" name="cpu_spec_2" id="cpu_spec_2" value="{{ $cpu_spec_2 }}">
            </form>
        </div>
    </main>
@endsection
