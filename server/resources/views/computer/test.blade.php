@extends('layouts.app')

@section('head')
	<title>オンライン予約フォーム</title>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#btn_ext').on('click', function() {
				if (!$("#myfrm").submit()) { // button
					return true;
				}
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".codecontent").hide();
			var flg = "close";
			$("#disp").click(function(){
				$(".codecontent").slideToggle();
				if(flg == "close"){
					$(this).text("閉じる");
					flg = "open";
				}else{
					$(this).text("2契約（2枚）以上ご希望の方はこちらをクリックしてください。");
					flg = "close";
				}
			});
		});
	</script>
@endsection

@section('content')
	<div id="wrap" class="mt-5 pt-5">
		<div id="main">
			<div class="mobile-overlay"></div>
			<div id="contents">
				<div class="p-contact">
					<div class="p-contact__mv">
						<div class="p-detail">
							<h1>SIMカード申し込み</h1>
						</div>
					</div>
					<div class="p-contact__container">
						<div class="p-inner">
							<h2><span>ベリーモバイル SIMカード 【 日本国内配送限定 】 オンライン申し込みフォーム</span></h2>
							<p class="p-remark">
								【ご注意事項】<br>
								・※印の必須入力項目は必ずご入力ください。<br>
								・半角カタカナの入力はしないでください。<br>
								・送信ボタン押した後、ご入力いただいたメールアドレスへ受付メールが返送されます。
							</p>
							<div class="p-formbox">
								<form name="myfrm" id="myfrm" action="" method="POST">
									@csrf
									<table>
										<tr>
											<th rowspan="3">ご希望のSIMカード：<em>※</em><div class="codecontent">1契約（1枚）目</div></th>
											<td>[プラン名]
												<select name="plan1_name" id="plan1_name">
													<option value="">-----</option>
													{{-- @foreach ($simarr4 as $key => $value)
														<option value="{{ $value }}" @if ($plan1_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div id="err_sel_plan1" class="p-errortxt">{{ $errors->first('plan1_name') }}</div> --}}
											</td>
										</tr>
										<tr>
											<td>[SIM種別]
												<select name="sim1_name" id="sim1_name">
													<option value="">-----</option>
													{{-- @foreach ($sim_arr as $key => $value)
														<option value="{{ $value }}" @if ($sim1_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div id="err_sel_sim1" class="p-errortxt">{{ $errors->first('sim1_name') }}</div> --}}
											</td>
										</tr>
										<tr>
											<td>[国際ローミング] 利用不可</td>
										</tr>
										<tr>
											<th></th>
											<td id="disp" style="background: #f6f6f6;">2契約（2枚）以上ご希望の方はこちらをクリックしてください。</th>
										</tr>
										<tr class="codecontent">
											<th rowspan="3">ご希望のSIMカード：<div>2契約（2枚）目</div></th>
											<td>[プラン名]
												<select name="plan2_name" id="plan2_name">
													<option value="">-----</option>
													{{-- @foreach ($arr3 as $key => $value)
														<option value="{{ $value }}" @if ($plan2_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div class="p-errortxt">{{ $errors->first('plan2_name') }}</div> --}}
											</td>
										</tr>
										<tr class="codecontent">
											<td>[SIM種別]
												<select name="sim2_name" id="sim2_name">
													<option value="">-----</option>
													{{-- @foreach ($sim_arr as $key => $value)
														<option value="{{ $value }}" @if ($sim2_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div id="err_sel_sim2" class="p-errortxt">{{ $errors->first('sim2_name') }}</div> --}}
											</td>
										</tr>
										<tr class="codecontent">
											<td>[国際ローミング] 利用不可</td>
										</tr>
										<tr class="codecontent">
											<th rowspan="3">ご希望のSIMカード：<div>3契約（3枚）目</div></th>
											<td>[プラン名]
												<select name="plan3_name" id="plan3_name">
													<option value="">-----</option>
													{{-- @foreach ($arr3 as $key => $value)
														<option value="{{ $value }}" @if ($plan3_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div class="p-errortxt">{{ $errors->first('plan3_name') }}</div> --}}
											</td>
										</tr>
										<tr class="codecontent">
											<td>[SIM種別]
												<select name="sim3_name" id="sim3_name">
													<option value="">-----</option>
													{{-- @foreach ($sim_arr as $key => $value)
														<option value="{{ $value }}" @if ($sim3_name === $value) selected="selected" @endif>{{ $value }}</option>
													@endforeach --}}
												</select>
												{{-- <div id="err_sel_sim3" class="p-errortxt">{{ $errors->first('sim3_name') }}</div> --}}
											</td>
										</tr>
										<tr class="codecontent">
											<td>[国際ローミング] 利用不可</td>
										</tr>
										<tr>
											<th>受取希望日<em>※</em></th>
											<td>
												<select name="receive_yy" id="receive_yy">
													<option value=""></option>
													{{-- @for ($i = 0; $i <= 5; $i++)
														<option value="{{ strval(date('Y') + $i) }}" @if ($receive_yy === strval(date('Y') + $i)) selected="selected" @endif>{{ strval(date('Y') + $i) }}</option>
													@endfor --}}
												</select>&nbsp; 年&nbsp;
												<select name="receive_mm" id="receive_mm">
													<option value=""></option>
													{{-- @for ($i = 1; $i <= 12; $i++)
														<option value="{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}" @if ($receive_mm === str_pad($i, 2, "0", STR_PAD_LEFT)) selected="selected" @endif>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
													@endfor --}}
												</select>&nbsp; 月&nbsp;
												<select name="receive_dd" id="receive_dd">
													<option value=""></option>
													{{-- @for ($i = 1; $i <= 31; $i++)
														<option value="{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}" @if ($receive_dd === str_pad($i, 2, "0", STR_PAD_LEFT)) selected="selected" @endif>{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</option>
													@endfor --}}
												</select>&nbsp; 日受取希望
												<div style="padding-top: 12px;">*本日より6日以内の配送(ご契約)をご希望の場合には、<a href="https://www.berrymobile.jp/thailand/contact/" target="_blank">コチラ</a>までご連絡ください。</div>
												{{-- <div id="err_sel_receive_yy" class="p-errortxt">{{ $errors->first('receive_yy') }}</div>
												<div id="err_sel_receive_mm" class="p-errortxt">{{ $errors->first('receive_mm') }}</div>
												<div id="err_sel_receive_dd" class="p-errortxt">{{ $errors->first('receive_dd') }}</div> --}}
											</td>
										</tr>
										<tr>
											<td colspan="2" style="background: #f6f6f6;">
												<div style="padding-top: 6px;">*ご契約希望日（お受取日）は、お申込み日より6日以降をご指定ください。</div>
												<div style="padding-top: 6px;">*お受取り日から月額料の日割りが発生いたします。</div>
												<div style="padding-top: 6px;">*宅配便でお届けいたします。交通事情によりご希望日にお届けできない場合もございますので、お早めにお申し込みください。</div>
												<div style="padding-top: 6px;">*複数回線のご契約を希望される方は、原則、まとめて発送されます。分割して受け取りたい場合は、お手数ですが、<a href="https://www.berrymobile.jp/thailand/contact/" target="_blank">こちら</a>までお問い合わせください。</div>
											</td>
										</tr>
									</table>

									<div class="p-btn"><input type="button" name="btn_ext" id="btn_ext" value="入力内容を確認"></div>
									<input type="hidden" name="comp1" value="1">
								</form>
							</div>
						</div><!-- //p-inner -->
					</div><!-- //p-contact__lists -->
				</div><!-- //p-contact -->
				<div id="pagetop" class="bgGrey">
					<div class="c-pagetop"><a href="#wrap"><img src="/assets/images/common/ico-pagetop.png" alt=""></a></div>
				</div>
			</div><!-- // #contents -->
		</div><!-- // #main -->
	</div><!-- // #wrap -->
@endsection
