<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard – Johar College</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 10px; }
    </style>
</head>
<body class="bg-blue-50 font-sans antialiased">

{{-- Navbar --}}
<header class="sticky top-0 z-50 bg-white border-b border-blue-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
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

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-red-50 border border-red-200 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-100 transition">
                ⎋ Logout
            </button>
        </form>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Page Title --}}
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-blue-900">Admin Dashboard</h1>
        <p class="text-sm text-blue-400 mt-1">Manage student and teacher applications</p>
    </div>

    @if(session('success'))
        <div class="mb-5 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700 font-medium">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-5">
            <div class="text-xs font-semibold text-blue-400 uppercase tracking-wide">Student Applications</div>
            <div class="mt-2 text-3xl font-extrabold text-blue-800">{{ $students->count() }}</div>
        </div>
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-5">
            <div class="text-xs font-semibold text-blue-400 uppercase tracking-wide">Teacher Applications</div>
            <div class="mt-2 text-3xl font-extrabold text-blue-800">{{ $teachers->count() }}</div>
        </div>
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-5">
            <div class="text-xs font-semibold text-blue-400 uppercase tracking-wide">Total Applications</div>
            <div class="mt-2 text-3xl font-extrabold text-blue-800">{{ $students->count() + $teachers->count() }}</div>
        </div>
    </div>

    {{-- Student Applications --}}
    <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6 mb-8">
        <h2 class="text-lg font-extrabold text-blue-900 mb-5">Student Applications</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-blue-50 text-blue-700 text-xs uppercase tracking-wide">
                        <th class="text-left px-4 py-3 rounded-l-xl">Name</th>
                        <th class="text-left px-4 py-3">Phone</th>
                        <th class="text-left px-4 py-3">Program</th>
                        <th class="text-left px-4 py-3">CNIC / B-Form</th>
                        <th class="text-left px-4 py-3">Status</th>
                        <th class="text-left px-4 py-3 rounded-r-xl">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-50">
                    @forelse($students as $student)
                    <tr class="hover:bg-blue-50/50 transition">
                        <td class="px-4 py-3 font-medium text-blue-800">
                            <a href="{{ route('admin.student.view', $student->id) }}"
                               class="hover:text-blue-600 hover:underline">
                                {{ $student->full_name }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-slate-600">{{ $student->phone }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center rounded-lg bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                {{ $student->program->name ?? 'N/A' }}
                            </span>
                        </td>
                        
                        <td class="p-2">
    @if($student->cnic_document)
        <a href="{{ asset('storage/' . $student->cnic_document) }}"
           target="_blank"
           class="text-blue-600 underline">
            View Document
        </a>
    @else
        No File
    @endif
</td>
                        </td>
                        <td class="px-4 py-3">
                            @if($student->status == 'approved')
                                <span class="inline-flex items-center rounded-lg bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">✓ Approved</span>
                            @else
                                <span class="inline-flex items-center rounded-lg bg-yellow-100 px-2.5 py-1 text-xs font-semibold text-yellow-700">⏳ Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($student->status == 'pending')
                                <form method="POST" action="{{ route('admin.student.approve', $student->id) }}">
                                    @csrf
                                    <button class="inline-flex items-center rounded-lg bg-green-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-green-700 transition">
                                        Approve
                                    </button>
                                </form>
                            @else
                                <span class="text-green-600 text-xs font-semibold">✓ Done</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-blue-300 text-sm">No student applications yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Teacher Applications --}}
    <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-6">
        <h2 class="text-lg font-extrabold text-blue-900 mb-5">Teacher Applications</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
    <thead>
        <tr class="bg-blue-50 text-blue-700 text-xs uppercase tracking-wide">
            <th class="text-left px-4 py-3 rounded-l-xl">Name</th>
            <th class="text-left px-4 py-3">Email</th>
            <th class="text-left px-4 py-3">Phone</th>
            <th class="text-left px-4 py-3">Qualification</th>
            <th class="text-left px-4 py-3">Subject</th>
            <th class="text-left px-4 py-3">Experience</th>
            <th class="text-left px-4 py-3">CV</th>
            <th class="text-left px-4 py-3 rounded-r-xl">Status</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-blue-50">
        @forelse($teachers as $teacher)
        <tr class="hover:bg-blue-50/50 transition">

            <td class="px-4 py-3 font-medium text-blue-800">
                {{ $teacher->full_name }}
            </td>

            <td class="px-4 py-3 text-slate-600">
                {{ $teacher->email }}
            </td>

            <td class="px-4 py-3 text-slate-600">
                {{ $teacher->phone }}
            </td>

            <td class="px-4 py-3 text-slate-600">
                {{ $teacher->qualification ?? 'N/A' }}
            </td>

            <td class="px-4 py-3 text-slate-600">
                {{ $teacher->subject ?? 'N/A' }}
            </td>

            <td class="px-4 py-3 text-slate-600">
                {{ Str::limit($teacher->experience, 30, '...') }}
            </td>

            <!-- CV Download -->
            <td class="px-4 py-3">
                @if($teacher->cv)
                    <a href="{{ asset('uploads/cv/' . $teacher->cv) }}"
                       target="_blank"
                       class="text-blue-600 font-semibold hover:underline">
                        Download CV
                    </a>
                @else
                    <span class="text-slate-400">No CV</span>
                @endif
            </td>

            <!-- Status -->
            <td class="px-4 py-3">
                <span class="inline-flex items-center rounded-lg px-2.5 py-1 text-xs font-semibold
                    @if($teacher->status == 'approved') bg-green-100 text-green-700
                    @elseif($teacher->status == 'rejected') bg-red-100 text-red-700
                    @else bg-blue-100 text-blue-700
                    @endif">
                    {{ ucfirst($teacher->status) }}
                </span>
            </td>
            <td class="px-4 py-3">

    <span class="inline-flex items-center rounded-lg px-2.5 py-1 text-xs font-semibold
        @if($teacher->status == 'approved') bg-green-100 text-green-700
        @elseif($teacher->status == 'rejected') bg-red-100 text-red-700
        @else bg-blue-100 text-blue-700
        @endif">
        {{ ucfirst($teacher->status) }}
    </span>

    @if($teacher->status == 'pending')
        <form action="{{ route('teacher.approve', $teacher->id) }}" method="POST" class="mt-2">
            @csrf
            <button type="submit"
                class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs hover:bg-green-700">
                Approve
            </button>
        </form>
    @endif

</td>

        </tr>
        @empty
        <tr>
            <td colspan="8" class="px-4 py-8 text-center text-blue-300 text-sm">
                No teacher applications yet.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
        </div>
    </div>

</div>
</body>
</html>
