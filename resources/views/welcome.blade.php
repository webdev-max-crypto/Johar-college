<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Johar College</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        ::selection { background: #1d4ed8; color: white; }
        a, button { transition: all 0.2s ease-in-out; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 10px; }

        /* Scrollable highlights */
        .highlights-scroll {
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }
        .highlights-scroll::-webkit-scrollbar { height: 6px; }
        .highlights-scroll::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 10px; }

        /* Lightbox */
        #lightbox {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.85);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        #lightbox.open { display: flex; }
        #lightbox img { max-width: 90vw; max-height: 85vh; border-radius: 16px; object-fit: contain; }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-white">

{{-- Lightbox --}}
<div id="lightbox" onclick="closeLightbox()">
    <img id="lightbox-img" src="" alt="Highlight">
    <button onclick="closeLightbox()" class="absolute top-5 right-6 text-white text-3xl font-bold">✕</button>
</div>

<div class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-blue-50">
    @auth
    <div class="absolute top-5 right-5 flex items-center gap-3">

        <span class="text-sm font-semibold text-gray-700">
            Welcome, {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded-xl text-sm hover:bg-red-700">
                Logout
            </button>
        </form>

    </div>
@endauth

    {{-- Navbar --}}
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-blue-100 shadow-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3">
                    {{-- Logo image placeholder - replace src with actual logo path --}}
                    <div class="h-12 w-12 rounded-xl border-2 border-blue-200 bg-white flex items-center justify-center overflow-hidden">
                        <img src="https://th.bing.com/th/id/R.a82d90db5a67c90d20f8a99d9fef81aa?rik=oWjWjDrv8YzNjQ&riu=http%3a%2f%2fjoharcollege.info%2fImages%2fJSLogo.jpg&ehk=%2f4xdVtUN9MV5yBP5dM3mvmDs51rBBEnmPLBiv2hwmBk%3d&risl=&pid=ImgRaw&r=0" alt="Johar College Logo" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <div class="text-blue-700 font-extrabold text-base leading-tight">Johar College</div>
                        <div class="text-xs text-blue-400">Quality Education</div>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-7 text-sm">
                    <a href="#about" class="text-blue-700 hover:text-blue-900 font-medium">About</a>
                    <a href="#programs" class="text-blue-700 hover:text-blue-900 font-medium">Programs</a>
                    <a href="#admissions" class="text-blue-700 hover:text-blue-900 font-medium">Admissions</a>
                    <a href="#contact" class="text-blue-700 hover:text-blue-900 font-medium">Contact</a>
                    <a href="#teachers" class="text-blue-700 hover:text-blue-900 font-medium">Our Faculty</a>
                    <a href="/teacher/application" class="text-blue-700 hover:text-blue-900 font-medium">Apply as Teacher</a>
                    <a href="/admission" class="text-blue-700 hover:text-blue-900 font-medium">Apply as Student</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="#admissions" class="hidden sm:inline-flex rounded-xl border border-blue-300 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50">
                        View Admissions
                    </a>
                    <a href="/login" class="inline-flex rounded-xl bg-blue-700 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-800">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative py-14 sm:py-20">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-200/50 blur-3xl"></div>
            <div class="absolute top-24 -right-24 h-72 w-72 rounded-full bg-blue-300/30 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full bg-blue-50 border border-blue-200 px-4 py-2 text-sm text-blue-700">
                        <span class="inline-flex h-2 w-2 rounded-full bg-green-500"></span>
                        Admissions Open for 2026 • Scholarships Available
                    </div>

                    <h1 class="mt-5 text-4xl sm:text-5xl font-extrabold tracking-tight text-blue-900 leading-tight">
                        Quality Education<br>for a Better Future
                    </h1>

                    <p class="mt-4 text-blue-700/80 text-base sm:text-lg leading-relaxed">
                        Johar College offers modern teaching, experienced faculty, and a vibrant academic environment.
                        Prepare for a bright career with strong fundamentals and real-world learning.
                    </p>

                    <div class="mt-7 flex flex-col sm:flex-row gap-3 sm:items-center">
                        <a href="/admission" class="inline-flex items-center justify-center rounded-2xl bg-blue-700 px-6 py-3 text-sm sm:text-base font-semibold text-white shadow hover:bg-blue-800">
                            Apply Now <span class="ml-2">→</span>
                        </a>
                        <a href="#programs" class="inline-flex items-center justify-center rounded-2xl border border-blue-300 bg-white px-6 py-3 text-sm sm:text-base font-semibold text-blue-700 hover:bg-blue-50">
                            Explore Programs
                        </a>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div class="rounded-2xl bg-white border border-blue-100 p-4 shadow-sm">
                            <div class="text-2xl font-extrabold text-blue-800">1200+</div>
                            <div class="text-sm text-blue-500">Students</div>
                        </div>
                        <div class="rounded-2xl bg-white border border-blue-100 p-4 shadow-sm">
                            <div class="text-2xl font-extrabold text-blue-800">80+</div>
                            <div class="text-sm text-blue-500">Teachers</div>
                        </div>
                        <div class="rounded-2xl bg-white border border-blue-100 p-4 shadow-sm">
                            <div class="text-2xl font-extrabold text-blue-800">95%</div>
                            <div class="text-sm text-blue-500">Success Rate</div>
                        </div>
                    </div>
                </div>

                {{-- Hero image card --}}
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden border border-blue-200 bg-white shadow-md">
                        <div class="relative h-64 sm:h-72">
                            <img src="https://tse2.mm.bing.net/th/id/OIP.dCE6JedUJCS5y76BwgDztQHaEM?rs=1&pid=ImgDetMain&o=7&rm=3"
                                 class="w-full h-full object-cover" alt="Campus">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 via-blue-900/20 to-transparent"></div>
                            <div class="absolute bottom-5 left-5 right-5">
                                <div class="inline-flex items-center gap-2 rounded-2xl bg-white/90 px-4 py-2 text-sm font-semibold text-blue-800">
                                    <span class="inline-flex h-2 w-2 rounded-full bg-blue-500"></span>
                                    Learn • Grow • Succeed
                                </div>
                                <div class="mt-3 text-white">
                                    <div class="text-xl font-extrabold">Campus Highlights</div>
                                    <div class="text-sm text-white/80">Academics, guidance & student support</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-3">
                            <div class="rounded-2xl bg-blue-50 border border-blue-100 p-3">
                                <div class="text-sm font-semibold text-blue-800">Modern Labs</div>
                                <div class="text-xs text-blue-500 mt-1">Practical learning</div>
                            </div>
                            <div class="rounded-2xl bg-blue-50 border border-blue-100 p-3">
                                <div class="text-sm font-semibold text-blue-800">Student Guidance</div>
                                <div class="text-xs text-blue-500 mt-1">Career support</div>
                            </div>
                            <div class="rounded-2xl bg-blue-50 border border-blue-100 p-3">
                                <div class="text-sm font-semibold text-blue-800">Events & Clubs</div>
                                <div class="text-xs text-blue-500 mt-1">Community spirit</div>
                            </div>
                            <div class="rounded-2xl bg-blue-50 border border-blue-100 p-3">
                                <div class="text-sm font-semibold text-blue-800">Scholarships</div>
                                <div class="text-xs text-blue-500 mt-1">Merit-based awards</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Notice bar --}}
    <section class="pb-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-blue-700 px-5 py-3 flex flex-col sm:flex-row sm:items-center gap-2">
                <div class="text-white font-bold">📢 Admissions Open 2026</div>
                <div class="text-blue-100 text-sm">Apply Online Now • Scholarships Available for Merit Students</div>
                <a href="/login" class="sm:ml-auto inline-flex rounded-xl bg-white px-4 py-2 text-sm font-semibold text-blue-700 hover:bg-blue-50">
                    Apply Now
                </a>
            </div>
        </div>
    </section>

    {{-- Campus Highlights (scrollable, clickable images) --}}
    <section id="highlights" class="py-14 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-blue-900">Campus Highlights</h2>
                <p class="mt-2 text-blue-600 text-sm">Click on any image to view it • Scroll to explore</p>
            </div>

            <div class="highlights-scroll flex gap-5 pb-4">
                @php
                $highlights = [
                    ['url' => 'https://tse4.mm.bing.net/th/id/OIP.uZQ-bEd_7pbHH50bP85j_gHaFb?rs=1&pid=ImgDetMain&o=7&rm=3', 'title' => 'Campus Life'],
                    ['url' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600', 'title' => 'Modern Classrooms'],
                    ['url' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=600', 'title' => 'Student Activities'],
                    ['url' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600', 'title' => 'Library'],
                    ['url' => 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=600', 'title' => 'Science Labs'],
                    ['url' => 'https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=600', 'title' => 'Sports Day'],
                ];
                @endphp

                @foreach($highlights as $h)
                <div class="flex-shrink-0 w-64 cursor-pointer group" onclick="openLightbox('{{ $h['url'] }}')">
                    <div class="rounded-2xl overflow-hidden border border-blue-100 shadow-sm group-hover:shadow-md group-hover:-translate-y-1 transition-all">
                        <img src="{{ $h['url'] }}" alt="{{ $h['title'] }}" class="w-64 h-44 object-cover">
                        <div class="bg-white px-4 py-3">
                            <div class="text-sm font-semibold text-blue-800">{{ $h['title'] }}</div>
                            <div class="text-xs text-blue-400 mt-0.5">Tap to view</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="py-14 bg-blue-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-blue-900">About Us</h2>
                <p class="mt-3 text-blue-600 max-w-2xl mx-auto">
                    Johar College is committed to quality education with modern teaching methods, experienced faculty, and a supportive academic environment.
                </p>
            </div>

            <div class="mt-10 grid lg:grid-cols-3 gap-6">
                <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                    <div class="text-blue-700 font-extrabold text-sm">01</div>
                    <div class="mt-2 text-lg font-bold text-blue-900">Modern Teaching</div>
                    <p class="mt-2 text-blue-600 text-sm leading-relaxed">Structured curriculum, interactive learning, and regular assessments.</p>
                </div>
                <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                    <div class="text-blue-700 font-extrabold text-sm">02</div>
                    <div class="mt-2 text-lg font-bold text-blue-900">Experienced Faculty</div>
                    <p class="mt-2 text-blue-600 text-sm leading-relaxed">Dedicated teachers who mentor students and guide them toward success.</p>
                </div>
                <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                    <div class="text-blue-700 font-extrabold text-sm">03</div>
                    <div class="mt-2 text-lg font-bold text-blue-900">Student Support</div>
                    <p class="mt-2 text-blue-600 text-sm leading-relaxed">Academic counseling, events, and student-focused initiatives.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs --}}
    <section id="programs" class="py-14 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-blue-900">Our Programs</h2>
                <p class="mt-3 text-blue-600 max-w-2xl mx-auto">Choose your pathway and build strong academic foundations.</p>
            </div>

            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $programs = [
                    ['label' => 'Pre-Medical', 'title' => 'FSc Pre-Medical', 'icon' => '🧬', 'color' => 'blue'],
                    ['label' => 'Pre-Engineering', 'title' => 'FSc Pre-Engineering', 'icon' => '⚙️', 'color' => 'blue'],
                    ['label' => 'Computer Studies', 'title' => 'ICS', 'icon' => '💻', 'color' => 'blue'],
                    ['label' => 'Commerce', 'title' => 'I.Com', 'icon' => '📈', 'color' => 'blue'],
                ];
                @endphp

                @foreach($programs as $p)
                <div class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <div class="text-sm font-semibold text-blue-500">{{ $p['label'] }}</div>
                            <div class="mt-2 text-lg font-extrabold text-blue-900">{{ $p['title'] }}</div>
                        </div>
                        <div class="h-10 w-10 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center text-xl">{{ $p['icon'] }}</div>
                    </div>
                    <a href="/admission" class="mt-4 inline-flex items-center text-sm font-semibold text-blue-700 hover:text-blue-900">
                        Apply Now <span class="ml-1">→</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Admissions CTA --}}
    <section id="admissions" class="py-14 bg-blue-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-gradient-to-r from-blue-800 to-blue-600 text-white overflow-hidden shadow-md">
                <div class="p-7 sm:p-10 grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7">
                        <div class="text-blue-200 font-extrabold text-sm">Admissions 2026</div>
                        <h3 class="mt-2 text-2xl sm:text-3xl font-extrabold">Get started in minutes</h3>
                        <p class="mt-3 text-blue-100">Download the admission form, submit required documents, and become part of Johar College.</p>
                        <div class="mt-6 flex flex-col sm:flex-row gap-3">
                            <a href="/admission" class="inline-flex items-center justify-center rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-blue-800 hover:bg-blue-50">
                                Apply Now
                            </a>
                            <a href="#contact" class="inline-flex items-center justify-center rounded-2xl border border-white/40 px-5 py-3 text-sm font-semibold text-white hover:bg-white/10">
                                Contact Admissions
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-white/10 border border-white/20 p-4"><div class="text-2xl font-extrabold">24/7</div><div class="text-sm text-blue-200">Support</div></div>
                        <div class="rounded-2xl bg-white/10 border border-white/20 p-4"><div class="text-2xl font-extrabold">Fast</div><div class="text-sm text-blue-200">Process</div></div>
                        <div class="rounded-2xl bg-white/10 border border-white/20 p-4"><div class="text-2xl font-extrabold">Merit</div><div class="text-sm text-blue-200">Scholarships</div></div>
                        <div class="rounded-2xl bg-white/10 border border-white/20 p-4"><div class="text-2xl font-extrabold">Safe</div><div class="text-sm text-blue-200">Environment</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Events --}}
    <section class="py-14 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-blue-900">Latest Events</h2>
                <p class="mt-3 text-blue-600 max-w-2xl mx-auto">Sports day, seminars, workshops, and student activities.</p>
            </div>
            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="rounded-3xl border border-blue-200 bg-blue-50 p-6 hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between gap-4">
                        <div><div class="text-sm font-semibold text-blue-500">Sports Day</div><div class="mt-2 text-lg font-extrabold text-blue-900">Athletics & Teams</div></div>
                        <div class="h-10 w-10 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center">🏅</div>
                    </div>
                    <p class="mt-3 text-sm text-blue-600">Join the fun, cheer for your house, and celebrate sportsmanship.</p>
                </article>
                <article class="rounded-3xl border border-blue-200 bg-blue-50 p-6 hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between gap-4">
                        <div><div class="text-sm font-semibold text-blue-500">Tech Seminar</div><div class="mt-2 text-lg font-extrabold text-blue-900">Future of IT</div></div>
                        <div class="h-10 w-10 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center">💡</div>
                    </div>
                    <p class="mt-3 text-sm text-blue-600">Hands-on insights, career guidance, and interactive Q&A.</p>
                </article>
                <article class="rounded-3xl border border-blue-200 bg-blue-50 p-6 hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between gap-4">
                        <div><div class="text-sm font-semibold text-blue-500">Workshop</div><div class="mt-2 text-lg font-extrabold text-blue-900">Soft Skills</div></div>
                        <div class="h-10 w-10 rounded-2xl bg-blue-100 border border-blue-200 flex items-center justify-center">🎓</div>
                    </div>
                    <p class="mt-3 text-sm text-blue-600">Improve communication, confidence, and presentation.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Teachers --}}
    <section id="teachers" class="py-14 bg-blue-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-blue-900">Our Faculty</h2>
                <p class="mt-3 text-blue-600 max-w-2xl mx-auto">Meet our experienced and dedicated teaching staff.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $teachers = [
                    ['name' => 'Professor Abdul Khaliq (Chairman)', 'qualification' => 'M.Sc. Physics Associate Professor  Govt. College of Science Samanabad Faisalabad', 'subject' => 'Physics (Retired)', 'img' => 'http://www.joharcollege.info/Images/Website/WhatsApp%20Image%202023-08-08%20at%201.11.17%20PM231600303.jpeg'],
                    ['name' => 'Mr. Mudassar Hussain', 'qualification' => 'M.Sc. Physics (Lecturer)', 'subject' => 'Physics', 'img' => 'http://www.joharcollege.info/Images/Website/download204248640.png'],
                    ['name' => 'Professor Rai Muhammad Nawaz (Director)', 'qualification' => 'M.Sc. Mathematics Associate Professor Govt. College Samanabad Faisalabad.', 'subject' => 'Mathematics(Retired)', 'img' => 'http://www.joharcollege.info/Images/Website/WhatsApp%20Image%202023-08-08%20at%201.17.07%20PM232002600.jpeg'],
                    ['name' => 'Ms. Alia Amin (Principal Girls Campus)', 'qualification' => 'M.Sc. Mathematics (Lecturer)', 'subject' => 'Mathematics', 'img' => 'http://www.joharcollege.info/Images/Website/Mam%20Alia%20Amin212359551.jpeg'],
                    ['name' => 'Professor Haji Khalid Mahmood Ch.', 'qualification' => 'M.Phil Botany Associate Professor  Govt. College Samanabad Faisalabad ', 'subject' => ' (Retired)', 'img' => 'http://www.joharcollege.info/Images/Website/download3205233498.png'],
                    ['name' => 'Mr. Muzamil Hussain', 'qualification' => 'M.Phil Chemistry (Lecturer)', 'subject' => 'chemistry ', 'img' => 'http://www.joharcollege.info/Images/Website/WhatsApp%20Image%202023-08-08%20at%2011.46.21%20AM234930788.jpeg'],
                    ['name' => 'Mr. Muhammad Zubair', 'qualification' => 'M.A Urdu Associate Professor', 'subject' => '(Retired)', 'img' => 'http://www.joharcollege.info/Images/Website/Zubair%20Sir234514116.jpg'],
                    ['name' => 'Mr. Muhammad Hashim', 'qualification' => 'M.BA (Director)', 'subject' => 'Lecturer', 'img' => 'http://www.joharcollege.info/Images/Website/Muhammad%20Hashim%20Sir212844419.jpeg'],
                    ['name' => 'Mr. Muhammad Abdullah Khalid', 'qualification' => 'M.Phil Education (Lecturer) M.A Sociology M.A Pakistan Studies', 'subject' => 'Lecturer', 'img' => 'http://www.joharcollege.info/Images/Website/download3205233498.png'],
                    ['name' => 'Ms. Shahida Parveen', 'qualification' => 'M.Phil Pakistan Studies (Lecturer)', 'subject' => 'Pakistan Studies', 'img' => 'http://www.joharcollege.info/Images/Website/female-icon-11205250158.jpg'],
                    ['name' => 'Mr. Anjum Zaheer', 'qualification' => 'M.Com (Lecturer)', 'subject' => 'Lecturer', 'img' => 'http://www.joharcollege.info/Images/Website/download3205307505.png'],
                    ['name' => 'Mr. Usman Amjad (Principal)', 'qualification' => 'M.Phil Islamic Studies (Principal Boys Campus) * PhD Islamic Studies (Continue)', 'subject' => 'Islamic Studies', 'img' => 'http://www.joharcollege.info/Images/Website/Mr.%20Usman235843923.JPG'],
                ];
                @endphp

                @foreach($teachers as $t)
                <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden hover:-translate-y-1 transition">
                    <div class="h-48 bg-blue-100 flex items-center justify-center overflow-hidden">
                        @if($t['img'])
                            <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex flex-col items-center gap-2 text-blue-300">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                </svg>
                                <span class="text-xs">Photo Here</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="font-extrabold text-blue-900 text-sm">{{ $t['name'] }}</div>
                        <div class="text-xs text-blue-500 mt-1">{{ $t['subject'] }}</div>
                        <div class="mt-2 inline-flex items-center rounded-lg bg-blue-50 border border-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                            {{ $t['qualification'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-blue-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 gap-10">
                <div>
                    <a href="/" class="flex items-center gap-3">
                        <div class="h-11 w-11 rounded-xl bg-white border border-white/20 flex items-center justify-center overflow-hidden">
                            <img src="https://th.bing.com/th/id/R.a82d90db5a67c90d20f8a99d9fef81aa?rik=oWjWjDrv8YzNjQ&riu=http%3a%2f%2fjoharcollege.info%2fImages%2fJSLogo.jpg&ehk=%2f4xdVtUN9MV5yBP5dM3mvmDs51rBBEnmPLBiv2hwmBk%3d&risl=&pid=ImgRaw&r=0" alt="Johar College Logo" class="h-full w-full object-contain">
                        </div>
                        <div>
                            <div class="font-extrabold text-white">Johar College</div>
                            <div class="text-xs text-blue-300">Quality Education • Bright Future</div>
                        </div>
                    </a>
                    <p class="mt-4 text-sm text-blue-300">Committed to modern teaching, experienced faculty, and student growth.</p>
                </div>

                <div>
                    <div class="font-semibold text-white">Quick Links</div>
                    <ul class="mt-4 space-y-3 text-sm text-blue-300">
                        <li><a class="hover:text-white" href="#about">About</a></li>
                        <li><a class="hover:text-white" href="#programs">Programs</a></li>
                        <li><a class="hover:text-white" href="#admissions">Admissions</a></li>
                        <li><a class="hover:text-white" href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div id="contact">
                    <div class="font-semibold text-white">Contact</div>
                    <div class="mt-4 space-y-3 text-sm text-blue-300">
                        <div>📞 +92 300 0000000</div>
                        <div>✉️ admissions@joharcollege.edu</div>
                        <div>📍 Johar Town, Lahore</div>
                    </div>
                    <div class="mt-5 flex gap-3">
                        <a href="#" class="h-9 w-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-sm hover:bg-white/20">f</a>
                        <a href="#" class="h-9 w-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-sm hover:bg-white/20">in</a>
                        <a href="#" class="h-9 w-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-sm hover:bg-white/20">X</a>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-white/10 text-sm text-blue-400 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
                <div>© 2026 Johar College. All Rights Reserved.</div>
                <div class="flex items-center gap-3">
                    <a class="hover:text-white" href="#">Privacy</a>
                    <span class="text-white/20">•</span>
                    <a class="hover:text-white" href="#">Terms</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>
@if(session('success'))
    <div id="popup"
         class="fixed top-5 right-5 bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg z-50">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('popup').style.display = 'none';
        }, 3000);
    </script>
@endif
</body>
</html>
