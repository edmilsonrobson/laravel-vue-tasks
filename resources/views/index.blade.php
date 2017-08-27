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

    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    Crafted by <a href="https://github.com/edmilsonrobson/" target="_blank"><b
                                class="has-text-primary">Edmilson Rocha</b></a> with <a href="https://vuejs.org/" target="_blank"
                                                                                        class="has-text-success">Vue.js 2</a>,
                    <a href="https://laravel.com/" target="_blank"><span class="has-text-warning">Laravel 5.4</span></a>
                    and <span class="has-text-danger">♥</span>
                    <br>
                    The source code is licensed <a href="http://opensource.org/licenses/mit-license.php">MIT</a>
                    <br>
                    <br>
                    
                </p>
                <p>
                    <a class="icon" href="hhttps://github.com/edmilsonrobson/">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
            </div>
        </div>
    </footer>
    
@endsection