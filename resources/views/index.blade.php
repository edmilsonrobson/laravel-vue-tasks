@extends('layouts.app')
@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Laravel+Vue Task List
                </h1>
                <h2 class="subtitle">
                    Powered by <a href="vuejs.org/v2/guide/"></a><span class="has-text-success">Vue.js 2</span></a>,
                    crafted by <a href="https://github.com/edmilsonrobson"><span class="has-text-warning">Edmilson Rocha</span></a>
                    with <span class="has-text-danger">♥</span>
                </h2>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="section">
            <todo-list isDevelopment="{{ env('APP_ENV') == 'production' }}"></todo-list>
        </div>
    </div>
@endsection