@extends('layouts.app')

@section('title', 'Lakshadweep Matrimony')

@section('content')


  <section id="hero"
    class="hero-carousel carousel slide"
    data-bs-ride="carousel"
    data-bs-interval="4000">

    @if($slides->count() > 0)

        <!-- INDICATORS -->
        <div class="carousel-indicators">

            @foreach($slides as $index => $slide)

                <button
                    type="button"
                    data-bs-target="#hero"
                    data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}"
                    aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}">
                </button>

            @endforeach

        </div>


        <!-- SLIDES -->
        <div class="carousel-inner">

            @foreach($slides as $index => $slide)

                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                    <div class="hero-slide"
                        style="background-image:
                        url('{{ asset('storage/' . $slide->image) }}');">

                        <div class="hero-overlay"></div>

                        <div class="container hero-content">

                            @if($slide->subtitle)
                                <span class="hero-badge">
                                    {{ $slide->subtitle }}
                                </span>
                            @endif

                            @if($slide->title)
                                <h1>
                                    {{ $slide->title }}
                                </h1>
                            @endif

                            @if($slide->description)
                                <p>
                                    {{ $slide->description }}
                                </p>
                            @endif

                            @if($slide->button_text && $slide->button_url)

                                <a
                                    class="btn btn-danger btn-lg px-4"
                                    href="{{ $slide->button_url }}">

                                    {{ $slide->button_text }}

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        <!-- PREVIOUS -->
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#hero"
            data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

            <span class="visually-hidden">
                Previous
            </span>

        </button>


        <!-- NEXT -->
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#hero"
            data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

            <span class="visually-hidden">
                Next
            </span>

        </button>

    @endif

</section>
    <section class="search-strip">
        <div class="container">
            <div class="search-box shadow-lg">
                <div>
                    <small>Looking For</small>
                    <strong>Life Partner</strong>

                </div>
                <div>
                    <small>Location</small>
                    <strong>Lakshadweep & Beyond</strong>
                </div>
                <div>
                    <small>Profiles</small>
                    <strong>Admin Approved</strong>
                </div>
                <a href="{{ auth()->check() ? route('search') : route('register') }}" class="btn btn-warning px-4">Search
                    Profiles</a>
            </div>
        </div>
    </section>

    <section id="about-us" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-kicker">WHY CHOOSE US</span>
                <h2 class="section-title">A Matrimony Site Made for Our Community</h2>
                <p class="text-muted">From Lakshadweep islands to other states, everyone is welcome.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">✓</div>
                        <h5>Verified Profiles</h5>
                        <p>New profiles are reviewed by the admin before appearing in matches.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">♡</div>
                        <h5>Meaningful Matches</h5>
                        <p>Search by age, location, education, occupation and other preferences.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h5>Privacy & Control</h5>
                        <p>Customers can activate or deactivate their own profile whenever they choose.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-kicker">
                    HOW IT WORKS
                </span>

                <h2 class="section-title">
                    Find Your Life Partner in 3 Simple Steps
                </h2>

                <p class="text-muted">
                    Start your journey with Lakshadweep Matrimony.
                </p>

            </div>


            <div class="row g-4">

                <!-- STEP 1 -->
                <div class="col-md-4">

                    <div class="feature-card h-100">

                        <div class="feature-icon">
                            1
                        </div>

                        <h5>
                            Create Your Profile
                        </h5>

                        <p>
                            Register and add your personal,
                            education, career and partner preferences.
                        </p>

                    </div>

                </div>


                <!-- STEP 2 -->
                <div class="col-md-4">

                    <div class="feature-card h-100">

                        <div class="feature-icon">
                            2
                        </div>

                        <h5>
                            Find Suitable Matches
                        </h5>

                        <p>
                            Search approved profiles based on
                            age, location, education and other preferences.
                        </p>

                    </div>

                </div>


                <!-- STEP 3 -->
                <div class="col-md-4">

                    <div class="feature-card h-100">

                        <div class="feature-icon">
                            3
                        </div>

                        <h5>
                            Connect & Begin
                        </h5>

                        <p>
                            View suitable profiles and take the
                            next step towards a meaningful relationship.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
                <div>
                    <span class="section-kicker">MEET PEOPLE</span>
                    <h2 class="section-title mb-1">Featured Profiles</h2>
                    <p class="text-muted mb-0">Approved members looking for a meaningful relationship.</p>
                </div>
                @auth
                    <a href="{{ route('search') }}" class="btn btn-outline-danger">View All Profiles →</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-outline-danger">Join to View Matches</a>
                @endauth
            </div>
            <div class="row g-4">

                @forelse($featured as $u)

                    <div class="col">

                        <div class="profile-card h-100">

                            @if ($u->profile_photo)
                                <img src="{{ asset('storage/' . $u->profile_photo) }}" class="profile-card-img"
                                    alt="{{ $u->name }}">
                            @else
                                <div class="profile-card-img d-flex align-items-center justify-content-center bg-light">
                                    No Photo
                                </div>
                            @endif

                            <div class="profile-card-body">

                                <h5>{{ $u->name }}</h5>

                                <p class="small text-muted mb-1">
                                    {{ optional($u->profile)->location ?? (optional($u->profile)->state ?? 'Location not added') }}
                                </p>

                                <p class="small mb-3">
                                    {{ optional($u->educationDetail)->education_level ?? 'Education not added' }}
                                    ·
                                    {{ optional($u->professionalDetail)->occupation ?? 'Occupation not added' }}
                                </p>

                                @auth

                                    @if(auth()->id() === $u->id)

                                        {{-- Logged-in user's own profile --}}
                                        <a href="{{ route('profile.show') }}"
                                        class="btn btn-sm btn-outline-danger">
                                            View My Profile
                                        </a>

                                    @else

                                        {{-- Other customer's profile --}}
                                        <a href="{{ route('customer.profile.show', $u->id) }}"
                                        class="btn btn-sm btn-outline-danger">
                                            View Profile
                                        </a>

                                    @endif

                                @else

                                    <a href="{{ route('login') }}"
                                    class="btn btn-sm btn-outline-danger">
                                        Login to View
                                    </a>

                                @endauth

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="demo-profile-grid">

                            @foreach ([
            [
                'photo' => 'images/profiles/aisha.jpg',
                'name' => 'Aisha Fatima',
                'place' => 'Kavaratti, Lakshadweep',
            ],
            [
                'photo' => 'images/profiles/hafsa.jpg',
                'name' => 'Hafsa Najeeb',
                'place' => 'Agatti, Lakshadweep',
            ],
            [
                'photo' => 'images/profiles/rihana.jpg',
                'name' => 'Rihana Shirin',
                'place' => 'Kadmat, Lakshadweep',
            ],
            [
                'photo' => 'images/profiles/shahul.jpg',
                'name' => 'Shahul Hammad',
                'place' => 'Kavaratti, Lakshadweep',
            ],
            [
                'photo' => 'images/profiles/naseer.jpg',
                'name' => 'Naseer Ahmed',
                'place' => 'Bangaram, Lakshadweep',
            ],
        ] as $demo)
                                <div class="col">
                                    <div class="profile-card h-100">

                                        <img src="{{ $demo['photo'] }}" class="profile-card-img"
                                            alt="{{ $demo['name'] }}">

                                        <div class="profile-card-body">

                                            <h5>{{ $demo['name'] }}</h5>

                                            <p class="small text-muted mb-1">
                                                {{ $demo['place'] }}
                                            </p>

                                            <p class="small mb-0">
                                                Profile preview
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                @endforelse

            </div>
        </div>
    </section>

    <section id="success-stories" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-kicker">SUCCESS STORIES</span>
                <h2 class="section-title">Happy Customers</h2>
                <p class="text-muted">Real stories and real connections.</p>
            </div>
            <div class="row g-4">
                @forelse($testimonials as $t)
                    <div class="col-md-4">
                        <div class="testimonial-card h-100">
                            <div class="testimonial-photo-wrap">
                                @if ($t->photo)
                                    <img src="{{ asset('storage/' . $t->photo) }}" alt="{{ $t->name }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=300&q=80"
                                        alt="Happy couple">
                                @endif
                            </div>
                            <div>
                                <p>“{{ $t->message }}”</p>
                                <strong>— {{ $t->name }}</strong>
                            </div>
                        </div>
                    </div>
                @empty
                    @foreach ([['photo' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=500&q=80', 'name' => 'Ahmed & Fathima', 'text' => 'We found a meaningful connection through Lakshadweep Matrimony.'], ['photo' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=500&q=80', 'name' => 'Najeeb & Shahana', 'text' => 'Simple, trusted and very helpful for our family.'], ['photo' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=500&q=80', 'name' => 'Aslam & Rihana', 'text' => 'A wonderful place to begin the journey towards marriage.']] as $story)
                        <div class="col-md-4">
                            <div class="testimonial-card h-100">
                                <div class="testimonial-photo-wrap"><img src="{{ $story['photo'] }}" alt="Happy couple">
                                </div>
                                <div>
                                    <p>“{{ $story['text'] }}”</p><strong>— {{ $story['name'] }}</strong>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>
    <!-- CONTACT US -->
    <section id="contact-us" class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="section-kicker">
                    CONTACT US
                </span>

                <h2 class="section-title">
                    We're Here to Help
                </h2>

                <p class="text-muted">
                    Have a question? Get in touch with us.
                </p>

            </div>


            <div class="row justify-content-center g-4">

                <!-- PHONE -->
                <div class="col-md-4">

                    <div class="feature-card h-100 text-center">

                        <div class="feature-icon">
                            ☎
                        </div>

                        <h5>
                            Phone
                        </h5>

                        <p>
                            +91 12345 67890
                        </p>

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="col-md-4">

                    <div class="feature-card h-100 text-center">

                        <div class="feature-icon">
                            ✉
                        </div>

                        <h5>
                            Email
                        </h5>

                        <p>
                            info@lakshadweepmatrimony.com
                        </p>

                    </div>

                </div>


                <!-- LOCATION -->
                <div class="col-md-4">

                    <div class="feature-card h-100 text-center">

                        <div class="feature-icon">
                            📍
                        </div>

                        <h5>
                            Location
                        </h5>

                        <p>
                            Kavaratti, Lakshadweep
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="cta-section">
        <div class="container text-center">
            <h2>Ready to Find Your Match?</h2>
            <p>Create your profile and take the first step towards a beautiful future.</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">Register Now</a>
        </div>
    </section>

@endsection
