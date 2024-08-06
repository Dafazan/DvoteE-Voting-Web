<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVoteE | Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://kit.fontawesome.com/19154f9dea.css" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css"> --}}
    {{-- <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
 <header>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <h1>DV</h1>
                </span>

                <div class="text logo-text ps-2">
                    <span class="name">DVote</span>
                    <span class="profession">Web for Vote</span>
                </div>
            </div>

            <i class='bx bx-menu toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bxs-search-alt-2 icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                    <li class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class='bx bxs-home icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Request::is('admin/votes') ? 'active' : '' }}">
                        <a href="{{ route('admin.votes') }}">
                            <i class='bx bxs-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Votes</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Request::is('admin/condidates') ? 'active' : '' }}">
                        <a href="{{ route('admin.condidates') }}">
                            <i class='bx bxs-user-detail icon'></i>
                            <span class="text nav-text">Candidates</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Request::is('admin/voters') ? 'active' : '' }}">
                        <a href="{{ route('admin.voters') }}">
                            <i class='bx bxs-user-voice icon' ></i>
                            <span class="text nav-text">Voters</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Request::is('admin/positions') ? 'active' : '' }}">
                        <a href="{{ route('admin.positions') }}">
                            <i class='bx bxs-copy-alt icon' ></i>
                            <span class="text nav-text">Position</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}">
                            <i class='bx bxs-cog icon' ></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
            </div>

            <div class="bottom-content">
                <li class="">
                    @livewire('admin.logout')

                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bxs-moon icon moon'></i>
                        <i class='bx bxs-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">

      <div class="row" style="padding-top: 12px"></div>
<div style="padding-right: 35px;">
        <div class="top-bg">
          @yield('topn')
        </div>

            {{ $slot }}
    </section>
    @livewireScripts
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sofia Sans',
                sans-serif;
        }

        :root {
            /* ===== Colors ===== */
            --body-color: #E4E9F7;
            --sidebar-color: #FFF;
            --primary-color: #003ce0;
            --primary-color-light: #e6e6ff;
            --primary-color-light-r:#2e2f30 ;
            --toggle-color: #3a3a3a;
            --text-color: #272727;
            --text-color-r:#ccc ;

            /* ====== Transition ====== */
            --tran-03: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.3s ease;
            --tran-05: all 0.3s ease;
        }

        body {
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

    </style>

    <script>
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
</body>

</html>
