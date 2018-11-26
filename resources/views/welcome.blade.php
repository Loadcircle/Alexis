@extends('layouts.inicio')

@section('content')

<!-- Inicio del carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; ?>
                @foreach ($carousel as $car)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i == 0)class="active"@endif></li>
                <?php $i++;?>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $i=0; ?>
                @foreach ($carousel as $car)
                <div @if($i == 0)class="carousel-item active"@else class="carousel-item" @endif>
                    <img class="d-block w-100" src="{{ asset('').'/'.$car->file }}" alt="Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>{{$car->tittle}}</h1>
                    </div>
                </div>
                <?php $i++;?>
                @endforeach
            </div>
    </div>
<!-- fin del carousel -->

<div class="display-flex my-4">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
    <img class="servicios" src="http://via.placeholder.com/80x80" alt="" srcset="">
</div>

<div class="display-flex container">


@foreach ($servicio as $serv)
    <div class="tour">
        <img class="img-tour" width="500px" height="250px" src="{{ asset('').'/'.$serv->file }}" alt="">
        <div class="row tour-row">
            <div class="col-md-2 col-sm-2 col-2" style="display: flex; align-items: center; border-right: dashed 1.5px #cccccc;">
                <img style="border-radius: 50%; margin: 5px" src="{{ asset('admin').'/'.$serv->s_file }}" alt="">
            </div>
            <div class="col-md-10 col-sm-10 col-10">
                <h3 style="line-height: .8; margin-top: 10px;">{{ $serv->s_name }}:{{ $serv->titulo }} </h3>
                <hr style="margin: 0">
                <div class="row">
                    <div class="col-md-7">
                        <span style="font-size: 12px">{{ $serv->subtitulo }}</span>
                    </div>
                    <div class="col-md-5" style="text-align: right;">
                        <a style="font-size: 12px; background: #786178; color: white; font-weight: bold; padding: 0 25px;" href="{{ route('servicio', $serv->slug) }}">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

<div class="display-flex py-5 mt-5" style="background: #f8f5ef">

    <div class="visas">
        <div style="z-index: 10;height: 250px; width: 250px;background: url('http://via.placeholder.com/250x250'); border-radius: 50%; position: relative; margin: auto; border: solid 4px white"></div>
        <div style="background: white; width: 100%; height: 320px; margin-top: -60px; position: relative;">
            <div style="z-index: 100;position: absolute;background: white; width: 100%; height: 300px; top: 20px; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; text-align: center">
                <div>
                    <h3 style="font-weight: lighter">VISA</h3>
                    <h3 style="font-weight: lighter">ESTADOS UNIDOS</h3>
                </div>
                <h3 style="font-weight: lighter">¿Quieres visitar los Estados Unidos?</h3>
                <a href="#" style="color: white; font-weight: bold;background: #00adee; padding: 8px 15px; border-radius: 10px">Solicitar Visa</a>
            </div>
        </div>
    </div>
    <div class="visas">
        <div style="z-index: 10;height: 250px; width: 250px;background: url('http://via.placeholder.com/250x250'); border-radius: 50%; position: relative; margin: auto; border: solid 4px white"></div>
        <div style="background: white; width: 100%; height: 320px; margin-top: -60px; position: relative;">
            <div style="z-index: 100;position: absolute;background: white; width: 100%; height: 300px; top: 20px; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; text-align: center">
                <div>
                    <h3 style="font-weight: lighter">VISA</h3>
                    <h3 style="font-weight: lighter">ESTADOS UNIDOS</h3>
                </div>
                <h3 style="font-weight: lighter">¿Quieres visitar los Estados Unidos?</h3>
                <a href="#" style="color: white; font-weight: bold;background: #00adee; padding: 8px 15px; border-radius: 10px">Solicitar Visa</a>
            </div>
        </div>
    </div>
    <div class="visas">
        <div style="z-index: 10;height: 250px; width: 250px;background: url('http://via.placeholder.com/250x250'); border-radius: 50%; position: relative; margin: auto; border: solid 4px white"></div>
        <div style="background: white; width: 100%; height: 320px; margin-top: -60px; position: relative;">
            <div style="z-index: 100;position: absolute;background: white; width: 100%; height: 300px; top: 20px; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; text-align: center">
                <div>
                    <h3 style="font-weight: lighter">VISA</h3>
                    <h3 style="font-weight: lighter">ESTADOS UNIDOS</h3>
                </div>
                <h3 style="font-weight: lighter">¿Quieres visitar los Estados Unidos?</h3>
                <a href="#" style="color: white; font-weight: bold;background: #00adee; padding: 8px 15px; border-radius: 10px">Solicitar Visa</a>
            </div>
        </div>
    </div>

</div>

@endsection
