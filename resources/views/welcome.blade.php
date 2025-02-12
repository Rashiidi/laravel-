@extends('layouts.app')


@section('content')

  <main class="flex flex-col md:flex-row items-center justify-between p-6 md:p-12">
   <div class="text-center md:text-left md:w-full">
    <h2 class="text-red-500 text-lg">
     Stay Healthy
    </h2>
    <h1 class="text-4xl md:text-5xl font-bold mt-2">
     Stay Healthy With Fitness Club
    </h1>
    <p class="mt-4 text-gray-400">
     Train with us, and you'll not only be part of the team, you'll be part of the family.
    </p>
    <div class="mt-6 space-x-4">
     <a href="/login"><button class="bg-red-500 text-white px-6 py-2 rounded-md">
      Log in
     </button></a>
    <A href="/register"> <button class="border border-white text-white px-6 py-2 rounded-md">
      Register
     </button></A>
   </div>
  </main>

 </body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
@endsection