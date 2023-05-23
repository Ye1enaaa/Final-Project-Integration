<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>USTP-CDO EVENT</title>

</head>

<body class="bg-blue-100">
    <div class="bg-yellow-400 flex items-center">
        <div class="pl-4">
            <img src="{{ asset('assets/pictures/ustp-logo.png') }}" class="h-14 w-14 object-contain">
        </div>
        <h1 class="pl-6 text-4xl font-bold text-blue-900">USTP-CDO EVENT</h1>
    </div>
        <br><br>

    <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-2xl w-full ">

        <h1 class="flex items-center justify-center mt-8 text-2xl font-bold text-black text-center">EVENT MANAGEMENT SYSTEM</h1> 



        <div class="flex justify-center items-center">
            <img src="{{ asset('assets/pictures/picture-event.png') }}" class="h-40 w-60 object-contain">  
        </div>

        <br><br> <br><br>

        <div class="flex justify-center"> 

                <form>

                    <div class="flex justify-center">
                        <button type="submit"> <a href="{{ route('user.login') }}"class="bg-blue-900 hover:bg-blue-800 text-white mt-4 font-bold  py-2 px-8 rounded-lg">Sign In<a></button>
                    </div>

                    <br>

                        <p class="text-center mt-0 p-4 text-gray-500">OR</p>

                     <br>
                    
                        <div class="flex justify-center">

                        <button type="submit"> <a href="{{ route('user.register') }}"class="bg-blue-900 hover:bg-blue-800 text-white mt-4 font-bold  py-2 px-8 rounded-lg">Sign Up<a></button>
                    </div> 
                    <br><br>    
                </form>
            </div>
        </div>
    </div>
</body>
</html>