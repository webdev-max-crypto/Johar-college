<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail – Johar College</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans antialiased">

{{-- Navbar --}}
<header class="sticky top-0 z-50 bg-white border-b border-blue-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
        <a href="/" class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl border-2 border-blue-200 bg-blue-50 flex items-center justify-center overflow-hidden">
                <img src="https://th.bing.com/th/id/R.a82d90db5a67c90d20f8a99d9fef81aa?rik=oWjWjDrv8YzNjQ&riu=http%3a%2f%2fjoharcollege.info%2fImages%2fJSLogo.jpg&ehk=%2f4xdVtUN9MV5yBP5dM3mvmDs51rBBEnmPLBiv2hwmBk%3d&risl=&pid=ImgRaw&r=0"
                     alt="Logo" class="h-full w-full object-contain">
            </div>
            <div>
                <div class="text-blue-800 font-extrabold text-sm leading-tight">Johar College</div>
                <div class="text-blue-400 text-xs">Admin Panel</div>
            </div>
        </a>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-blue-50 border border-blue-200 px-4 py-2 text-sm font-semibold text-blue-700 hover:bg-blue-100 transition">
            ← Back to Dashboard
        </a>
    </div>
</header>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header Card --}}
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 rounded-2xl p-6 mb-6 text-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="text-blue-200 text-xs font-semibold uppercase tracking-wide mb-1">Student Application</div>
            <h1 class="text-2xl font-extrabold">{{ $student->full_name }}</h1>
            <div class="text-blue-200 text-sm mt-1">{{ $student->email }}</div>
        </div>
        <div class="flex items-center gap-3">
            @if($student->status == 'approved')
                <span class="inline-flex items-center rounded-xl bg-green-400/20 border border-green-400/40 px-4 py-2 text-sm font-bold text-green-200">✓ Approved</span>
            @else
                <span class="inline-flex items-center rounded-xl bg-yellow-400/20 border border-yellow-400/40 px-4 py-2 text-sm font-bold text-yellow-200">⏳ Pending</span>
                <form method="POST" action="{{ route('admin.student.approve', $student->id) }}">
                    @csrf
                    <button class="inline-flex items-center rounded-xl bg-white px-4 py-2 text-sm font-bold text-blue-800 hover:bg-blue-50 transition">
                        Approve
                    </button>
                </form>
            @endif
        </div>
    </div>

    {{-- Details Grid --}}
    <div class="grid sm:grid-cols-2 gap-5">

        {{-- Personal Info --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-4">Personal Information</h2>
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Full Name</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->full_name }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Father Name</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->father_name ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Gender</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->gender ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Date of Birth</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->dob ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">CNIC / B-Form</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->cnic_bform ?? '—' }}</dd>
                </div>
            </dl>
        </div>

        {{-- Contact Info --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-4">Contact Information</h2>
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Email</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->email }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Phone</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->phone }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">City</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->city ?? '—' }}</dd>
                </div>
                <div class="flex justify-between gap-4">
                    <dt class="text-blue-400 font-medium shrink-0">Address</dt>
                    <dd class="text-blue-900 font-semibold text-right">{{ $student->address ?? '—' }}</dd>
                </div>
            </dl>
        </div>

        {{-- Academic Info --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-4">Academic Information</h2>
            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Program</dt>
                    <dd>
                        <span class="inline-flex items-center rounded-lg bg-blue-100 px-3 py-1 text-xs font-bold text-blue-700">
                            {{ $student->program->name ?? 'N/A' }}
                        </span>
                    </dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Session</dt>
                    <dd class="text-blue-900 font-semibold">{{ $student->session_id ?? '—' }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Matric Marks</dt>
                    <dd class="text-blue-900 font-semibold">
                        {{ $student->matric_marks ?? '—' }}
                        @if($student->matric_total) / {{ $student->matric_total }} @endif
                    </dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-blue-400 font-medium">Inter Marks</dt>
                    <dd class="text-blue-900 font-semibold">
                        {{ $student->inter_marks ?? '—' }}
                        @if($student->inter_total) / {{ $student->inter_total }} @endif
                    </dd>
                </div>
            </dl>
        </div>

        {{-- Documents --}}
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6">
            <h2 class="text-sm font-extrabold text-blue-700 uppercase tracking-wide mb-4">Uploaded Documents</h2>
            <div class="space-y-3">

                {{-- CNIC / B-Form File --}}
                <div class="flex items-center justify-between rounded-xl bg-blue-50 border border-blue-100 px-4 py-3">
                    <div>
                        <div class="text-sm font-semibold text-blue-800">CNIC / B-Form</div>
                        <div class="text-xs text-blue-400 mt-0.5">Identity document</div>
                    </div>
@if($student->cnic_document)
                        <a href="{{ asset('storage/' . $student->cnic_document) }}"
                           target="_blank"
                           class="inline-flex items-center gap-1.5 rounded-xl bg-blue-700 px-4 py-2 text-xs font-bold text-white hover:bg-blue-800 transition">
                            📄 Open File
                        </a>
                    @else
                        <span class="text-xs text-slate-400 font-medium">Not uploaded</span>
                    @endif
                </div>

                {{-- Photo --}}
                <div class="flex items-center justify-between rounded-xl bg-blue-50 border border-blue-100 px-4 py-3">
                    <div>
                        <div class="text-sm font-semibold text-blue-800">Photo</div>
                        <div class="text-xs text-blue-400 mt-0.5">Student photo</div>
                    </div>
                    @if($student->photo)
                        <a href="{{ asset('storage/' . $student->photo) }}"
                           target="_blank"
                           class="inline-flex items-center gap-1.5 rounded-xl bg-blue-700 px-4 py-2 text-xs font-bold text-white hover:bg-blue-800 transition">
                            🖼 Open Photo
                        </a>
                    @else
                        <span class="text-xs text-slate-400 font-medium">Not uploaded</span>
                    @endif
                </div>

            </div>
        </div>

    </div>

    {{-- Submitted At --}}
    <div class="mt-5 text-xs text-blue-400 text-right">
        Submitted: {{ $student->created_at->format('d M Y, h:i A') }}
    </div>

</div>
</body>
</html>
