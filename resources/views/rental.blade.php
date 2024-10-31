<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ujikom</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <h1 class="text-center font-extrabold text-5xl">Rental Mobil</h1>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <form action="{{ route('rental.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_penyewa" class="block text-gray-700 font-semibold mb-2">Nama Penyewa</label>
                <input type="text" id="nama_penyewa" name="nama_penyewa" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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
    
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full border border-gray-300 bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-center">
                    <th class="px-4 py-2 border border-gray-300">No</th>
                    <th class="px-4 py-2 border border-gray-300">Nama Penyewa</th>
                    <th class="px-4 py-2 border border-gray-300">Nama Mobil</th>
                    <th class="px-4 py-2 border border-gray-300">Program</th>
                    <th class="px-4 py-2 border border-gray-300">Biaya</th>
                    <th class="px-4 py-2 border border-gray-300">Lama Sewa (hari)</th>
                    <th colspan="4" class="px-4 py-2 border border-gray-300">Biaya Rental</th>
                    <th class="px-4 py-2 border border-gray-300">Total Biaya</th>
                    <th class="px-4 py-2 border border-gray-300">Aksi</th> <!-- Kolom Aksi -->
                </tr>
                <tr class="bg-gray-100 text-gray-700 text-center">
                    <th colspan="6"></th>
                    <th class="px-4 py-2 border border-gray-300">Paket 1 (10%)</th>
                    <th class="px-4 py-2 border border-gray-300">Paket 2 (20%)</th>
                    <th class="px-4 py-2 border border-gray-300">Paket 3 (25%)</th>
                    <th class="px-4 py-2 border border-gray-300">Harian/Extra hour</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionRentals as $transaction)
                <tr class="text-center text-gray-600">
                    <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $transaction->nama_penyewa }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $transaction->mobil->nama }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $transaction->program->nama }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ 'Rp ' . number_format($transaction->mobil->biaya, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $transaction->program->hari }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        Rp {{ number_format($transaction->mobil->biaya * 4 * 0.9, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        Rp {{ number_format($transaction->mobil->biaya * 7 * 0.9, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        Rp {{ number_format($transaction->mobil->biaya * 10 * 0.9, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        Rp {{ number_format(100000, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        Rp {{ number_format($transaction->total_biaya, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('edit', $transaction->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
