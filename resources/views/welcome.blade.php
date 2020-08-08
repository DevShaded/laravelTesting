@extends('layout.app')

@section('title', 'Welcome')

@section('content')


    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="display-4 py-2 text-dark">Enter a city!</h1>
                        <div class="px-2">
                            <form action="/weather" method="GET" class="justify-content-center">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="E.g Oslo" required><br>
                                    <input type="submit" class="form-submit" style="background: #0066A2; color: white; border-style: outset; border-color: #0066A2; height: 50px; width: 100px; font: bold 15px arial, sans-serif; text-shadow:none;" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
