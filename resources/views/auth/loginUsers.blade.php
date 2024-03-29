<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Provaltec') }}</title>
    @livewireStyles
    @vite('resources/css/app.scss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="h-screen md:flex">
        <div class="bg-back sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/3">
            <div class="flex flex-col items-center justify-center h-screen">
                <div>
                    <i class="fa-solid fa-user fa-2xl"></i>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="m-1">
                        <input type="email" name="email"
                            class="my-5 p-1 w-full border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-aside rounded-md block"
                            required placeholder="Email">
                        @error('email')
                        <span class="text-red-700" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="m-1">
                        <input type="password" name="password"
                            class="my-5 p-1 w-full border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-aside rounded-md block"
                            required placeholder="•••••••••">
                        @error('password')
                        <span class="text-red-700" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="text-center bg-action px-24 py-2 rounded-md text-white font-bold hover:bg-hover"
                        type="submit">Ingresar</button>
                </form>
            </div>
        </div>
        <div class="sm:hidden md:block full-bg">
            <div class="mt-16 ml-20">
                <img src="img/provaltec-blanco-footer.png" alt="Provaltec" title="Provaltec">
            </div>
            <div class="ml-20 text-white">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sequi quibusdam debitis quos architecto
                    voluptates recusandae, maiores commodi consequuntur excepturi distinctio temporibus? Sit voluptatem
                    eveniet similique distinctio earum praesentium beatae.</p>
            </div>
        </div>
    </div>
</body>

</html>