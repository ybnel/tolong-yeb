@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4">
    <main>
        <h1 class="text-3xl font-bold mt-8 mb-8">Now Showing</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            
            <div class="movie-card">
                <a href="#">
                    <img src="https://via.placeholder.com/500x750.png?text=Movie+Poster+1" alt="Movie Title" class="rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">Contoh Judul Film 1</a>
                </div>
            </div>

            <div class="movie-card">
                <a href="#">
                    <img src="https://via.placeholder.com/500x750.png?text=Movie+Poster+2" alt="Movie Title" class="rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">Contoh Judul Film 2</a>
                </div>
            </div>
            
            <div class="movie-card">
                <a href="#">
                    <img src="https://via.placeholder.com/500x750.png?text=Movie+Poster+3" alt="Movie Title" class="rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">Contoh Judul Film 3</a>
                </div>
            </div>

            <div class="movie-card">
                <a href="#">
                    <img src="https://via.placeholder.com/500x750.png?text=Movie+Poster+4" alt="Movie Title" class="rounded-lg hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">Contoh Judul Film 4</a>
                </div>
            </div>

        </div>
    </main>

    <footer class="py-8 mt-16 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} Cineplex. All Rights Reserved.</p>
    </footer>
</div>
@endsection