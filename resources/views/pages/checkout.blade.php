@extends('layouts.global')

@section('content')
<div class="site__hiw">
	<div class="site__hiw-header">
		<h1 class="site__hiw-header-title">Satu Langkah Lagi Menuju Liburan Seru</h1>
		<div class="site__hiw-header-subtitle">Pastikan paket yang Anda pilih sudah benar, lalu klik tombol Pay Now untuk melakukan pemesanan</div>

		<div class="max-w-sm rounded overflow-hidden shadow-lg" style="margin:2em auto;">
			<img class="w-full" src="{{$image}}" alt="Sunset in the mountains">
			<div class="px-6 py-4">
			<div class="font-bold text-xl mb-2">{{$title}}</div>
			<p class="text-gray-700 text-base">
				{{$price}}
			</p>
			</div>
		</div>
		
		<div class="site__hiw-header-cta">
			<button id="pay-button" onclick="payNow()" style="padding: 10px 30px; font-size: 18px; background-color: #b68916; font-weight: bolder; color: white; border:none; font-family: 'Roboto', sans-serif; box-sizing: inherit; line-height: 1.5;">Pay Now</button>
		</div>

		
	</div>

</div>


@endsection

@section('headscript')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_SANDBOX_CLIENT_KEY') }}"></script>
	<script type="text/javascript">
		document.getElementById('pay-button').onclick = function(){
			// SnapToken acquired from previous step

		};
		function payNow() {
			snap.pay('{{ $token }}', {
				// Optional
				onSuccess: function(result){
					document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
				},
				// Optional
				onPending: function(result){
					document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
				},
				// Optional
				onError: function(result){
				  document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
				}
			});
		}
	</script>
@endsection