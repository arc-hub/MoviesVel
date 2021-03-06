@extends('layout.master')
@section('title', $tv['name'])

@section('content')
  <div class="tv-info border-b border-gray-800">
    <div class="container mx-auto p-4 flex flex-col md:flex-row">
      <div class="flex-none">
        <img src="{{ $tv['poster_path'] }}" alt="{{ $tv['name'] }}-Poster" class="w-64 md:w-96">
      </div>
      <div class="md:ml-16">
        <h2 class="text-4xl font-semibold">{{ $tv['name'] }}</h2>      
        <div class="flex flex-wrap items-center text-gray-400">
          <span>
            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>          </span>
          <span class="ml-1">{{ $tv['vote_average'] }}</span>
          <span class="mx-2">|</span>
          <span>{{ $tv['first_air_date'] }}</span>
          <span class="mx-2">|</span>
          <span>{{ $tv['genres'] }}</span>
        </div>
        <p class="text-gray-300 mt-8">{{ $tv['overview'] }}</p>
        <div class="mt-12">
          <h4 class="text-white font-semibold">Created By</h4>
          <div class="flex mt-4">
            @foreach ($tv['created_by'] as $creator)                
              <div class="mr-8">
                <h6>{{ $creator['name'] }}</h6>
                <div class="text-sm text-gray-400">Creator</div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="mt-12">
          <h4 class="text-white font-semibold">Featured Crew</h4>
          <div class="flex mt-4">
            @foreach ($tv['crew'] as $crew)                
              <div class="mr-8">
                <h6>{{ $crew['name'] }}</h6>
                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
              </div>
            @endforeach
          </div>
        </div>
        @if (count($tv['videos']['results']) > 0)
        <div class="mt-12">
          <a data-fancybox href="https://www.youtube.com/watch?v={{ $tv['videos']['results'][0]['key'] }}" class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold p-3 transition hover:bg-orange-600 duration-150 ease-in-out">
            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
            <span class="ml-2">Play Trailer</span>
          </a>
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="tv-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Cast</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        @foreach ($tv['cast'] as $cast) 
          <div class="mt-8">
            <a href="{{ route('actors.show', $cast['id']) }}">
              <img src="{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="mt-2">
              <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
              <p class="text-gray-400 text-sm">{{ $cast['character'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


  <div class="tv-images border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
      <h2 class="text-4xl font-semibold">Inside The Movie</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($tv['images'] as $image) 
          <div class="mt-8">
            <a href="{{ 'https://image.tmdb.org/t/p/w1280'.$image['file_path'] }}" data-fancybox="images" data-caption="{{ $tv['name'] }}-image-{{ $loop->index+1 }}"">
              <img src="{{ 'https://image.tmdb.org/t/p/w500'.$image['file_path'] }}" alt="{{ $tv['name'] }}-image-{{ $loop->index+1 }}" class="hover:opacity-75 transition ease-in-out duration-150">
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
    
@endsection