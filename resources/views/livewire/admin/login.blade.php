<div>
    <x-slot:title>
        login
        </x-slot>



        <style>
            nav {
                background-color: #0a132c;
            }

            main {
                height: 100vh;
                background-color: #080518;
            }

            body {
                color: #fff;
            }

            .form-login h4 {
                text-decoration: underline;
                text-underline-offset: 10px;
                text-decoration-color: #fff;
            }

            .form-login {
                background-color: #0a132c;
                border-radius: 5px;
                text-align: center;
            }

            .input-field {
                width: 100%;
                position: relative;
            }

            .input-label {

                position: absolute;
                left: 10px;
                top: -10px;
                transition: all 0.2s;
                padding: 0 2px;
                z-index: 1;
                color: #8d8d8d;
            }

            .input-text {
                padding: 0.8rem;
                width: 100%;
                height: 100%;
                border: 2px solid #132861;
                background-color: #121f44;
                border-radius: 5px;
                font-size: 18px;
                outline: none;
                transition: all 0.3s;
                color: #fff;
            }

            .input-label::before {
                content: "";
                height: 5px;
                background-color: #121f44;
                position: absolute;
                left: 0px;
                top: 10px;
                width: 100%;
                z-index: -1;
            }

            .input-text:focus {
                border: 2px solid var(--light);
            }

            .input-text:focus+.input-label,
            .input-field {
                top: -10px;
                color: var(--light);
                font-size: 14px;
            }

            .input-field {
                top: -10px;
                color: var(--light);
                font-size: 14px;
            }

            .input-text::placeholder {
                font-size: 16px;
                opacity: 0;
                transition: all 0.3s;
            }

            .input-text:focus::placeholder {
                opacity: 1;
            }
        </style>
        <nav class=" navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">DvoteE Admin Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="container">
                <div class="row batas"></div>
                <div class="row">
                    <div class="col-lg"></div>
                    <div class="col-lg-4 form-login">
                        <div class="pt-5 pb-4">
                            <h4>ADMIN LOGIN</h4>

                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        <form wire:submit.prevent='login'>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-10">
                                    <div class="input-field pb-3">
                                        <input class="input-text" wire:model='username' type="text" id="voteid"
                                            autocomplete="off" placeholder="Enter Username" required />
                                        <label class="input-label" for="voteid">Username</label>
                                    </div>
                                    <div class="input-field pb-3">
                                        <input class="input-text" wire:model='password' type="password" id="password"
                                            autocomplete="off" placeholder="Enter Password" required />
                                        <label class="input-label" for="password">Password</label>
                                    </div>
                                    <div class="pb-5">
                                        <button type="submit" class="button">Login</button>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg"></div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>

        <!-- Style -->
        <style>

        </style>
        <!-- Form Javascript -->
        <script>
            document.querySelectorAll(".input-text").forEach((element) => {
                element.addEventListener("blur", (event) => {
                    if (event.target.value !== "") {
                        event.target.nextElementSibling.classList.add("filled");
                    } else {
                        event.target.nextElementSibling.classList.remove("filled");
                    }
                });
            });
        </script>




















        {{-- 

    <div class="container" style="text-align: center">
        <div class="row" style="height: 20vh"></div>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                 <div class="col-lg login-page" >
                <div class="container pb-5 pt-5">           
                    <div class="form">
                        <h1 style=" color:#020B47;font-size: 50px">ADMIN LOGIN</h1>
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        <form wire:submit.prevent='login'>
                            <div class="mb-3 mt-3">
                               
                                <input type="text" wire:model='username' class="form-control" id="voteid"
                                    placeholder="Enter Username" name="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <input type="password" wire:model='password' class="form-control" id="pwd"
                                    placeholder="Enter password" name="pswd">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="button">Login</button>
                        </form>
                    </div>
                </div>
                             
        </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</div> --}}
