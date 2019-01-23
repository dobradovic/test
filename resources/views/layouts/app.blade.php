<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/formdisable.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>

                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Databank <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/order/create">
                                        Create new invoice
                                    </a>
                                    <a class="dropdown-item" href="/order/pending">
                                        Pending invoices
                                    </a>
                                    <a class="dropdown-item" href="/order/resolved">
                                        Resolved invoices
                                    </a>
                                    <a class="dropdown-item" href="/order/customersInvoices">
                                        All customers and their invoices
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    P&L Calculations <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/revenue">
                                       Revenue (total)
                                    </a>
                                    <a class="dropdown-item" href="/expenses">
                                       Expenses (total)
                                    </a>
                                    <a class="dropdown-item" href="/profit">
                                      Profit (total)
                                    </a>
                                      <a class="dropdown-item" href="/balancesheet">
                                      Balance Sheet
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Products <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/product/create">
                                        Create new product
                                    </a>
                                    <a class="dropdown-item" href="/product/index">
                                        Show all products
                                    </a>
                                    <a class="dropdown-item" href="/category">
                                        Add new category for product
                                    </a>
                                      <a class="dropdown-item" href="/category/show_all_categories">
                                       Edit / Delete product category
                                    </a>
                                </div>                                                         
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Inventory <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/products/available">
                                        Available products
                                    </a>
                                    <a class="dropdown-item" href="/products/sold">
                                        Sold products
                                    </a>
                                    <a class="dropdown-item" href="/products/pending">
                                        Pending products
                                    </a>

                                      <a class="dropdown-item" href="/fund/index">
                                       Funds Available / Bank / Cash / Others
                                    </a>


                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Assets <span class="caret"></span>
                                    </a>
                                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/asset/create">
                                         Add new Asset
                                    </a>
                                    <a class="dropdown-item" href="/asset/index">
                                          Show all / edit / delete
                                    </a>
                              
                                </div>

                             


                                                                  
                                </div>

                            </li>

<!-- 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Product category <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/category">
                                        Add new category
                                    </a>
                                      <a class="dropdown-item" href="/category/show_all_categories">
                                       Edit / Delete category
                                    </a>

                                </div>
                            </li>
 -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Employees <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/employee/create">
                                        Add new Employee
                                    </a>
                                      <a class="dropdown-item" href="/employee/index">
                                       Edit / Delete Employees
                                    </a>

                                </div>



                            </li>

                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Customers <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/customer/create">
                                        Add new Customer
                                    </a>
                                </div>



                            </li>

                                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Expenses <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/expense/create">
                                        Add new Expense
                                    </a>
                                     <a class="dropdown-item" href="/expense/salaries">
                                       Salaries
                                    </a>
                                      <a class="dropdown-item" href="/expense/index">
                                      Show all Expenses 
                                    </a>

                                      <a class="dropdown-item" href="/expense/time">
                                      Expenses for selected period 
                                    </a>

                                </div>



                            </li>

                                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Assets <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/asset/create">
                                        Add new Asset
                                    </a>
                                     <a class="dropdown-item" href="/asset/index">
                                      Show all / edit / delete
                                    </a>
                                   
                                </div>



                            </li>


                                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Investments <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/investment/create">
                                        Add new Investment
                                    </a>
                                     <a class="dropdown-item" href="/investment/index">
                                      Show all / edit / delete
                                    </a>
                                   
                                </div>



                            </li>

                                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Funds Available <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/fund/create">
                                        Add new Fund
                                    </a>
                                     <a class="dropdown-item" href="/fund/index">
                                      Show all / edit / delete
                                    </a>
                                   
                                </div>



                            </li>

                            




                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <!--     <div class="row">
            <div class="col-md-12">

                 <ul style="display:inline; display:flex; justify-content: center; align-items: center; flex-direction: row" class="navbar-nav mr-auto">
                    &nbsp<li style="display:inline; font-size:24px"><a href="/product/index">All</a></li>| 
                            @foreach($categories as $category)
                                 &nbsp<li style="display:inline; font-size:24px"><a href="/products/category/{{ $category->slug }}">{{ $category->name }}</a></li> | 
                            @endforeach
                    </ul>
            </div>
        </div>

        <hr> -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
