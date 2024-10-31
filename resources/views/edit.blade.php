<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ujikom</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <h1 class="text-center font-extrabold text-5xl">Form Edit</h1>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <form action="{{ route('update', $t_biaya_rental->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_penyewa" class="block text-gray-700 font-semibold mb-2">Nama Penyewa</label>
                <input type="text" value="{{ $t_biaya_rental->nama_penyewa }}" id="nama_penyewa" name="nama_penyewa" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
    
            <div class="mb-4">
                <label for="mobil_id" class="block text-gray-700 font-semibold mb-2">Mobil</label>
                <select id="mobil_id" name="mobil_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Mobil</option>
                    @foreach($mobils as $mobil)
                        <option value="{{ $mobil->id }}">{{ $mobil->nama }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="program" class="block text-gray-700 font-semibold mb-2">Program</label>
                <select id="program" name="program_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Select Program</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->nama }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>