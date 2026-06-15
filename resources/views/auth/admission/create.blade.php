<!DOCTYPE html>
<html>
<head>
    <title>Student Admission Form</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<div class="max-w-4xl mx-auto py-10">

    <div class="bg-white shadow-lg rounded-3xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Student Admission Form
        </h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admission.store') }}"
              method="POST"
              class="grid md:grid-cols-2 gap-4">

            @csrf

            <input type="text"
                   name="full_name"
                   placeholder="Full Name"
                   class="border p-3 rounded-xl">

            <input type="text"
                   name="father_name"
                   placeholder="Father Name"
                   class="border p-3 rounded-xl">

            <input type="text"
                   name="cnic_bform"
                   placeholder="B-Form / CNIC"
                   class="border p-3 rounded-xl">

            <input type="email"
                   name="email"
                   placeholder="Email"
                   class="border p-3 rounded-xl">

            <input type="text"
                   name="phone"
                   placeholder="Phone"
                   class="border p-3 rounded-xl">

            <select name="gender"
                    class="border p-3 rounded-xl">
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <input type="text"
                   name="city"
                   placeholder="City"
                   class="border p-3 rounded-xl">

            <input type="date"
                   name="dob"
                   class="border p-3 rounded-xl">

            <textarea name="address"
                      placeholder="Address"
                      class="border p-3 rounded-xl md:col-span-2"></textarea>

            <select name="program_id"
                    class="border p-3 rounded-xl">
                <option>Select Program</option>

                @foreach($programs as $program)
                    <option value="{{ $program->id }}">
                        {{ $program->name }}
                    </option>
                @endforeach

            </select>

            <select name="session_id"
                    class="border p-3 rounded-xl">

                <option>Select Session</option>

                @foreach($sessions as $session)
                    <option value="{{ $session->id }}">
                        {{ $session->session_name }}
                    </option>
                @endforeach

            </select>

            <button
                class="bg-indigo-600 text-white py-3 rounded-xl md:col-span-2">
                Submit Application
            </button>

        </form>

    </div>

</div>

</body>
</html>