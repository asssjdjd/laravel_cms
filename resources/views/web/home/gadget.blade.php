@extends('layouts.frontend')

@section('content')
    <!-- navigation -->
     <section id = "nav-bar">
        <div class="container">
            <ul id ="hide-nav" class = "navbar-item" >
                <li class = "navbar-item-hide"><a href="{{ route('user.home') }}">Home</a></li>
                <li class = "navbar-item-hide"><a href="{{ route('user.laptops') }}">Laptop</a></li>
                <li class = "navbar-item-hide"><a href="{{ route('user.phones') }}">Phones</a></li>
                <li class = "navbar-item-hide active"><a href="{{ route('user.gadgets') }}">Gadgets</a></li>
                <li class = "navbar-item-hide"><a href="{{ route('user.contact') }}">Contact Us</a></li>
                <li class = "navbar-item-hide"><a href="#">Download</a></li>
            </ul>
            <ul id = "icon-navbar"style="display: flex;">
                <li id = "search-navbar"><span class="material-symbols-outlined">search</span></li>
                <li id = "close-navbar"><span class="material-symbols-outlined">menu</span></li>

            </ul>
        </div>
     </section>
     <section id="visible-nav">
        <ul id = "navbar-items" class = "navbar-item" >
            <li class = "navbar-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class = "navbar-item"><a href="{{ route('user.laptops') }}">Laptop</a></li>
            <li class = "navbar-item"><a href="{{ route('user.phones') }}">Phones</a></li>
            <li class = "navbar-item active"><a href="{{ route('user.gadgets') }}">Gadgets</a></li>
            <li class = "navbar-item"><a href="{{ route('user.contact') }}">Contact Us</a></li>
            <li class = "navbar-item"><a href="#">Download</a></li>
        </ul>
     </section>

     <!-- header -->
      <section id = "header">
        <!-- top header -->
         <div class="container">
            <div id="top-header">
                <ul id = "left-header">
                    <li><a href="">Support</a></li>
                    <li><a href="">Documentation</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
                <ul id = "right-header">
                    <li>
                        <span style = "font-size: 20px" class="material-symbols-outlined">call</span>
                        <span>(123)456-7890</span>
                    </li>
                    <li>
                        <span style = "font-size: 20px" class="material-symbols-outlined">mail</span>
                        <span>example@domain.com</span>
                    </li>
                </ul>
            </div>
         </div>

        <!-- bottom header -->
         <div id="bottom-header">
            <ul id = "left-header">
                <a href="{{ route('user.home') }}"><img src="/images/logo.png" alt="" ></a>
            </ul>
            <ul id = "right-header">
                <div id = "header-nav">
                    <li class = "navbar-item"><a href="{{ route('user.home') }}">Home</a></li>
                    <li class = "navbar-item"><a href="{{ route('user.laptops') }}">Laptop</a></li>
                    <li class = "navbar-item"><a href="{{ route('user.phones') }}">Phones</a></li>
                    <li class = "navbar-item active"><a href="{{ route('user.gadgets') }}">Gadgets</a></li>
                    <li class = "navbar-item"><a href="{{ route('user.contact') }}">Contact Us</a></li>
                    <li class = "navbar-item"><a href="#">Download</a></li>
                </div>
            </ul>
            <div id = "header-nav-icon">
                <ul >
                    <li><span class="material-symbols-outlined">search</span></li>
                    <li><span class="material-symbols-outlined">menu</span></li>
                </ul>
            </div>
        </div>
      </section>

    <!-- search modal -->
    <div id="searchModal" class="modal-overlay">
            <div class="modal-content">
                <span class="close-modal">&times;</span>

                <div class="search-input-wrapper">
                    <input type="text" placeholder="Search ..." id="mainSearchInput">
                    <div class="underline"></div>
                </div>

                <p class="search-hint">Begin typing your search term above and press enter to search. Press ESC to cancel.</p>
                <button type="submit" class="submit-btn">SEARCH</button>
            </div>
        </div>

     <!-- main -->
     <section id = "main">
        <div class="group-card">
            @forelse($gadgets as $gadget)
             <div class="main-card">
                <div class = "img-card">
                    <a href="#">
                        <img src="{{ asset('storage/' . $gadget->image) }}" alt="{{ $gadget->title }}" width="360px" height="180px">
                        <div class="overlay">
                            <span class="overlay-text">{{ substr($gadget->title, 0, 1) }}</span>
                        </div>
                    </a>
                </div>
                <div class = "infor-card">
                    <h2 style = "font-size: 20px; margin-top: 30px;">
                        <a style="text-decoration: none;" href="#">{{ $gadget->title }}</a>
                    </h2>
                    <div class="slide-meta">
                            <span class="category"><div class="category_2"><a href="{{ route('user.gadgets') }}" class="slideEffect">GADGET</a></div></span>
                            <span class="separator"></span> <span class="date"><a href="#" class = "slideEffect">{{ $gadget->created_at->format('M d, Y') }}</a></span>
                    </div>
                </div>

                <div class="introduce-card" style="font-size: 18px;line-height: 1.8">
                    {{ Str::limit($gadget->content, 150) }}
                </div>

               <a href="#" class="read-more">
                    <div class = "read">READ MORE</div>
                </a>
            </div>
            @empty
                <div class="main-card">No gadgets found</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination">
            @if($gadgets->onFirstPage())
                <span class="page-number" style="color: rgb(134, 142, 150);">←</span>
            @else
                <a href="{{ $gadgets->previousPageUrl() }}" class="page-number">←</a>
            @endif

            @foreach($gadgets->getUrlRange(1, $gadgets->lastPage()) as $page => $url)
                @if($page == $gadgets->currentPage())
                    <span class="page-number" style="color: rgb(255, 102, 0);">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="page-number">{{ $page }}</a>
                @endif
            @endforeach

            @if($gadgets->hasMorePages())
                <a href="{{ $gadgets->nextPageUrl() }}" class="page-next">→</a>
            @else
                <span class="page-next" style="color: rgb(134, 142, 150);">→</span>
            @endif
        </div>
        <button id="backToTop" class="back-to-top-btn">
            <span class="text" style="display: flex; align-items: center; justify-items: center; gap: 10px">
                <span>Back To Top</span>
                <img src="/images/arrow_forward_black.svg" alt="Up">
            </span>
        </button>
     </section>

      <!-- Footer -->
      <section id = "footer">
        <div class="group-card">
            <div class = "left-footer">
                <div class="footer-card foot_1">
                    <a href="{{ route('user.home') }}"><img src="/images/logo-white.png" alt=""></a>
                    <div class = "footer-content" style="font-size: 16px;">
                        Cenote is Free Clean and Minimal WordPress Blog Theme.
                        It is suitable for any types of blog.
                        You can use it on Personal, Fashion, Travel, Cryptocurrency  or any blog
                    </div>
                </div>
                <div class="footer-card foot_2" style="font-size: 14px;">
                    <h3 style="font-size: 14px;">CATEGORIES</h3>
                    <ul>
                        <li><a href="{{ route('user.laptops') }}">LAPTOP</a></li>
                        <li><a href="{{ route('user.phones') }}">PHONES</a></li>
                        <li><a href="{{ route('user.gadgets') }}">GADGETS</a></li>
                        <li><a href="#">CONTACT US</a></li>
                        <li><a href="#">FEATURES</a></li>
                    </ul>
            </div>

            </div>
            <div class="right-footer">
                <div class="footer-card foot_3">
                <h3 class="tags-title" style="font-size: 14px !important;">TAGS</h3>
                <div class="tags-list" style="font-size: 10px !important;">
                    <a href="#" class="tag-item" style="font-size: 10px !important;">DJI</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">GADGET</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">GAME</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">MACBOOK</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">PHONE</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">PLAY STATION</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">SMART WATCH</a>
                    <a href="#" class="tag-item" style="font-size: 10px !important;">TECH</a>
                </div>
            </div>
            </div>
        </div>

        <div>
            <div class="group-card-content content" style="font-size: 14px;">
                <span style="color:rgb(189, 189, 189);">Copyright © 2025</span>
                <a href="#" style="text-decoration: none;">Cenote Technology Blog</a>
                <span style="color:rgb(189, 189, 189);">. All rights reserved. Theme: </span>
                <a href="#" style="text-decoration: none;">Cenote </a>
                <span style="color:rgb(189, 189, 189);">by ThemeGrill. Powered by WordPress.</span>
            </div>
        </div>
      </section>

@endsection
