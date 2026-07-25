<tr class="hover:bg-slate-50 transition-colors">
    <td class="px-6 py-4 font-medium">{{ $label }}</td>
    <td class="px-6 py-2 text-center">
        <input type="number" value="{{ $laki }}" readonly class="data-input input-laki w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
    </td>
    <td class="px-6 py-2 text-center">
        <input type="number" value="{{ $perempuan }}" readonly class="data-input input-perempuan w-24 text-center bg-transparent border-transparent focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-md py-1 outline-none transition-all">
    </td>
    <td class="px-6 py-4 text-center font-bold text-primary-600">
        <input type="number" value="{{ $laki + $perempuan }}" readonly class="input-total w-24 text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none">
    </td>
</tr>