@extends('layouts.master')

@push('meta')
    @unless($pages->isNewestVersion())
        <link rel="canonical" href="{{ secure_url('docs/'.$pages->newestVersion().'.x/'.$pages->currentPage) }}" />
    @endunless

    <meta name="docsearch:language" content="en" />
    <meta name="docsearch:version" content="{{ $versionSlug }}" />
@endpush

@section('nav-menu')
    <nav class="nav-menu space-y-8">
        <div class="pl-4">
            @include('includes.version-switcher', ['currentPage' => $pages->currentPage, 'currentVersion' => $pages->currentVersion, 'versions' => $pages->allVersions()])
        </div>

        @include('includes.menu', ['items' => $pages->all()])
    </nav>
@endsection

@section('content')
@yield('header')

<section class="container px-6 py-12 mx-auto md:px-8">
    <div class="flex flex-col lg:flex-row">
        <nav class="nav-menu hidden lg:block space-y-8">
            <div class="pr-16">
                @include('includes.version-switcher', ['currentPage' => $pages->currentPage, 'currentVersion' => $pages->currentVersion, 'versions' => $pages->allVersions()])
            </div>

            @include('includes.menu', ['items' => $pages->all()])
        </nav>

        <div class="w-full break-words md:w-4/5 lg:w-3/5 lg:pl-4 content" v-pre>
            @unless ($pages->isNewestVersion())
                @include('includes.version-warning')
            @endunless

            <h1>{!! $title !!}</h1>

            @yield('content')

            <div class="pt-8 pb-6 mt-12 border-t-2">
                @include('includes.footer-links')
            </div>
        </div>

        <div class="flex-col md:block mx-auto md:w-1/5 lg:pl-12">
            <div>
                <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CE7D553Y&placement=laravel-livewirecom" id="_carbonads_js"></script>
            </div>

            <div class="flex flex-col justify-center md:pt-8 sm:block">
                <p class="hidden mt-0 mb-4 text-xs font-bold tracking-wider text-gray-500 uppercase sm:block md:text-right">Sponsors</p>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://laravel.com/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="https://laravel.com/img/logotype.min.svg" alt="Laravel">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://devsquad.com/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_devsquad.png" alt="DevSquad">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://www.livemessage.io/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_livemessage.png" alt="Livemessage">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://padmission.com/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_padmission.png" alt="Padmission">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://cierra.de" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_cierra.png" alt="Cierra">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="https://www.1043labs.com/" target="_blank">
                    <img class="w-24 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_1043labs.png" alt="1043 Labs">
                </a>

                <a style="height: 50px" class="block pb-3 mb-3" href="http://jrmerritt.com/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_jrmerritt.png" alt="JR Merritt">
                </a>

                <a style="height: 50px" class="block" href="https://trustfactory.bz/" target="_blank">
                    <img class="w-32 mx-auto md:mx-0 md:ml-auto" src="/img/sponsor_trustfactory.png" alt="Trustfactory">
                </a>
            </div>
        </div>
    </div>
</section>
@overwrite
