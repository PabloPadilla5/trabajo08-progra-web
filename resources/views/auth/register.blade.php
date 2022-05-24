<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <title>Register</title>
</head>
<body>
    <div class="container mx-auto p-4 bg-white">
        <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
          <h1 class="text-lg font-bold">Register</h1>

          <form class="flex flex-col mt-4" method="POST">
            @error('message')
              <div class="mt-5 flex items-center p-5 leading-normal text-red-600 bg-red-100 rounded-lg" role="alert">
                <svg class="mr-2" style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                </svg>
                <p>{{ $message }}</p>
              </div>
            @enderror

            @csrf
            <input
                type="text"
                name="name"
                class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                placeholder="Full Name"
            />
            @error('name')
              <div class="flex items-center leading-normal text-red-600" role="alert">
                <p>* {{ $message }}</p>
              </div>
            @enderror

            <input
                type="email"
                name="email"
                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                placeholder="Email address"
            />
            @error('email')
              <div class="flex items-center leading-normal text-red-600" role="alert">
                <p>* {{ $message }}</p>
              </div>
            @enderror

            <input
                type="password"
                name="password"
                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                placeholder="Password"
            />
            @error('password')
              <div class="flex items-center leading-normal text-red-600" role="alert">
                <p>* {{ $message }}</p>
              </div>
            @enderror

            <input
                type="password"
                name="password_confirmation"
                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                placeholder="Repeat Password"
            />
            @error('repeat-password')
              <div class="flex items-center leading-normal text-red-600" role="alert">
                <p>* {{ $message }}</p>
              </div>
            @enderror

            <button
                type="submit"
                class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent text-white focus:outline-none bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex items-center w-full justify-center items-center font-medium focus:outline-none"
            >
              Register
            </button>
            <div class="flex flex-col items-center mt-5">
              <p class="mt-1 text-xs font-light text-gray-500">
                Register already?<a href="{{route('login')}}" class="ml-1 font-medium text-blue-400">Sign in now</a>
                </p>
            </div>
          </form>
        </div>
      </div>
</body>
</html>