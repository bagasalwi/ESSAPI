@extends('front.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-success text-white">
                    <div class="hero-inner">
                        <h2>Hello, Kawan!</h2>
                        <p class="lead">Web ini digunakan untuk melihat real time data dari semua fungsi pada aplikasi
                            ESS kami untuk keperluan Thesis.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero align-items-center bg-info text-white">
                    <div class="hero-inner text-center">
                        <h1>Discord LIVE</h1>
                        <h2 id="countdown"></h2>
                        <p class="lead">Bila tidak ada kendala, kami akan live sidang online di discord</p>
                        <p class="pesan"></p>
                        <div class="mt-4">
                            <button data-toggle="modal" data-target="#exampleModal"
                                class="btn btn-lg btn-icon icon-left"><i class="fab fa-discord"></i>
                                Link Discord</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ssst.. dont tell anyone!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Discord Link</label>
                    <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" id="copied" value="https://discord.gg/5ZDtf9">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <button class="btn btn-info" onclick="myFunction()"><i class="fas fa-copy"></i> copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("copied");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied!");
}

    CountDownTimer('{{ \Carbon\Carbon::now() }}', 'countdown');
function CountDownTimer(dt, id)
{
    var end = new Date('2020-03-31 09:20:00');
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;
    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById(id).innerHTML = '<b>LIVE NOW</b> ';
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById(id).innerHTML = days + 'days ';
        document.getElementById(id).innerHTML += hours + 'hrs ';
        document.getElementById(id).innerHTML += minutes + 'mins ';
        document.getElementById(id).innerHTML += seconds + 'secs';
        document.getElementById(id).innerHTML +='<h5>Discord link expired</h5>';
    }
    timer = setInterval(showRemaining, 1000);
}
</script>
@endsection