<tr class="hover:bg-primary-50/60 transition-colors border-b border-slate-100 last:border-0 group/row even:bg-slate-50/50">
    <td class="px-2 py-2.5 font-semibold text-center text-slate-600 border-r border-slate-100 w-1/4">
        {{ $umur }}
        <!-- Hidden input sebagai identifier usia -->
        <input type="hidden" name="umur_key[]" value="{{ $umur }}">
    </td>
    <td class="px-2 py-2.5 text-center bg-primary-50/30 border-r border-slate-100 w-1/4">
        <input type="number" value="{{ ($laki ?? 0) + ($perempuan ?? 0) }}" readonly class="input-total-umur w-full text-center bg-transparent border-transparent font-bold text-primary-600 outline-none pointer-events-none p-0 m-0">
    </td>
    <td class="px-2 py-2.5 text-center border-r border-slate-100 w-1/4">
        <input type="number" name="umur_l[]" value="{{ $laki ?? 0 }}" readonly class="data-input input-laki-umur w-full text-center bg-transparent border-transparent focus:bg-white focus:border-primary-400 focus:ring-1 focus:ring-primary-400 rounded py-1 outline-none transition-all group-hover/row:bg-white/50">
    </td>
    <td class="px-2 py-2.5 text-center w-1/4">
        <input type="number" name="umur_p[]" value="{{ $perempuan ?? 0 }}" readonly class="data-input input-perempuan-umur w-full text-center bg-transparent border-transparent focus:bg-white focus:border-primary-400 focus:ring-1 focus:ring-primary-400 rounded py-1 outline-none transition-all group-hover/row:bg-white/50">
    </td>
</tr>