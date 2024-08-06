<div>
    <x-slot:title>
        Login
        </x-slot>
        <x-slot:image_title>
            Home / Login
            </x-slot>

<style>
    
    main {
        height: 100vh;
    }
    body {
        /* background: url('images/bg.png');
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        position: relative; */
        color: #fff;
        
    }
        @media (max-width: 720px) {
        /* body {
            background: url('images/bg2.png');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            position: relative;
        } */
    }
    h4{
        color: #fff;
    }
    /* --------INPUT FORM-------- */
    .form-login h4 {
        text-decoration: underline;
        text-underline-offset: 10px;
        text-decoration-color: var(--light);
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

    .input-text:focus + .input-label,
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
 
  <main>   
        <div class="container">
            <div class="row batas"></div>
            <div class="row">
                <div class="col-lg"></div>
                <div class="col-lg-4 form-login">
                    <div class="pt-5 pb-4">
                        <h4>LOGIN TO VOTE</h4>
                        @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                    </div>
                    <form wire:submit.prevent='login'>
                        <div class="row">
                            <div class="col" ></div>
                            <div class="col-10">
                                <div class="input-field pb-3">
                                    <input type="text" wire:model='vote_id' id="voteid" class="input-text" autocomplete="off" placeholder="Enter Vote Id" required name="voteid" />
                                    <label class="input-label" for="voteid">Vote ID</label>
                                </div>
                                <div class="input-field pb-3">
                                    <input type="password" wire:model='password' id="pwd" class="input-text" autocomplete="off" placeholder="Enter Password" required name="pswd" />
                                    <label class="input-label" for="password">Password</label>
                                </div>
                                <div class="pb-5">
                                    <button type="submit" class="button">Vote Now!</button>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg"></div>
            </div>
        </div>
        
  <!-- Form Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</main>

