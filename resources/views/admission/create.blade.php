<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission – Johar College</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 10px; }
    </style>
</head>
<body class="bg-blue-50 font-sans antialiased">

{{-- Navbar --}}
<header class="sticky top-0 z-50 bg-white border-b border-blue-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
        <a href="/" class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl border-2 border-blue-200 bg-white flex items-center justify-center overflow-hidden">
                <img src="https://th.bing.com/th/id/R.a82d90db5a67c90d20f8a99d9fef81aa?rik=oWjWjDrv8YzNjQ&riu=http%3a%2f%2fjoharcollege.info%2fImages%2fJSLogo.jpg&ehk=%2f4xdVtUN9MV5yBP5dM3mvmDs51rBBEnmPLBiv2hwmBk%3d&risl=&pid=ImgRaw&r=0"
                     alt="Logo" class="h-full w-full object-contain">
            </div>
            <div>
                <div class="text-blue-800 font-extrabold text-sm leading-tight">Johar College</div>
                <div class="text-blue-400 text-xs">Student Admission</div>
            </div>
        </a>
        <a href="/" class="inline-flex items-center gap-1 rounded-xl border border-blue-200 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-50 transition">
            ← Back to Home
        </a>
    </div>
</header>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 rounded-2xl p-6 mb-8 text-white">
        <div class="text-blue-200 text-xs font-semibold uppercase tracking-wide mb-1">Admissions 2026</div>
        <h1 class="text-2xl font-extrabold">Student Admission Form</h1>
        <p class="text-blue-200 text-sm mt-1">Fill in all required details to submit your application.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700 font-medium">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Personal Info --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6 mb-5">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-5">Personal Information</h2>
            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Enter full name"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g,'')">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Father Name <span class="text-red-500">*</span></label>
                    <input type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Enter father name"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                           oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g,'')">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Gender <span class="text-red-500">*</span></label>
                    <select name="gender" class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">Select Gender</option>
                        <option value="Male"   {{ old('gender') == 'Male'   ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob') }}"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Contact Number <span class="text-red-500">*</span></label>
                    <div class="flex">
                        <span class="bg-blue-100 border border-blue-200 border-r-0 px-4 py-2.5 rounded-l-xl text-sm text-blue-700 font-semibold">+92</span>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="3XXXXXXXXX"
                               class="w-full border border-blue-200 bg-blue-50 rounded-r-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               oninput="this.value = this.value.replace(/[^0-9]/g,'').slice(0,10)" maxlength="10">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">City <span class="text-red-500">*</span></label>
                    <input type="text" name="city" value="{{ old('city') }}" placeholder="Enter city"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">B-Form / CNIC Document</label>
                    <input type="file" name="cnic_document" accept=".jpg,.jpeg,.png,.pdf"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2 text-sm text-blue-700 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-700 file:text-white file:px-3 file:py-1 file:text-xs file:font-semibold hover:file:bg-blue-800">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Address <span class="text-red-500">*</span></label>
                    <textarea name="address" placeholder="Enter full address" rows="2"
                              class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">{{ old('address') }}</textarea>
                </div>

            </div>
        </div>

        {{-- Academic Info --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6 mb-5">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-5">Academic Information</h2>
            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Program <span class="text-red-500">*</span></label>
                    <select name="program_id" class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">Select Program</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                {{ $program->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Session <span class="text-red-500">*</span></label>
                    <select name="session_id" class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">Select Session</option>
                        @foreach($sessions as $session)
                            <option value="{{ $session->id }}" {{ old('session_id') == $session->id ? 'selected' : '' }}>
                                {{ $session->session_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Matric Marks</label>
                    <input type="number" name="matric_marks" value="{{ old('matric_marks') }}" placeholder="Obtained marks"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-blue-800 mb-1">Matric Total</label>
                    <input type="number" name="matric_total" value="{{ old('matric_total') }}" placeholder="Total marks"
                           class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

            </div>
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="w-full inline-flex items-center justify-center rounded-xl bg-blue-700 px-6 py-3.5 text-base font-semibold text-white shadow hover:bg-blue-800 transition">
            Submit Application →
        </button>
    </form>
</div>
</body>
</html>
