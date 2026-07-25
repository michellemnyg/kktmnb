<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Michelle M',
            'nip' => '0000',
            'password' => Hash::make('testingweb'),
            'role' => 'superadmin',
        ]);

        $demo = \App\Models\Demografi::create([
            'bulan' => '07',
            'tahun' => '2026',
            'wna_l' => 0, 'wna_p' => 0,
            'wni_l' => 2937, 'wni_p' => 2892,
            'lahir_l' => 4, 'lahir_p' => 2,
            'mati_l' => 1, 'mati_p' => 1,
            'datang_l' => 9, 'datang_p' => 10,
            'pindah_l' => 3, 'pindah_p' => 11,
            'kk_ada' => 1379, 'kk_belum' => 551,
            'ktp_ada_l' => 1187, 'ktp_ada_p' => 1181,
            'ktp_belum_l' => 755, 'ktp_belum_p' => 720,
            'agama_kristen_l' => 1874, 'agama_kristen_p' => 1938,
            'agama_katolik_l' => 345, 'agama_katolik_p' => 332,
            'agama_islam_l' => 715, 'agama_islam_p' => 618,
            'agama_hindu_l' => 3, 'agama_hindu_p' => 4,
            'pend_tk_l' => 40, 'pend_tk_p' => 28,
            'pend_sd_l' => 281, 'pend_sd_p' => 342,
            'pend_smp_l' => 153, 'pend_smp_p' => 171,
            'pend_sma_l' => 119, 'pend_sma_p' => 111,
            'pend_pt_l' => 108, 'pend_pt_p' => 153,
            'pts_tidak_l' => 5, 'pts_tidak_p' => 4,
            'pts_sd_l' => 92, 'pts_sd_p' => 87,
            'pts_smp_l' => 45, 'pts_smp_p' => 35,
            'pts_sma_l' => 62, 'pts_sma_p' => 58,
            'pkj_irt_l' => 0, 'pkj_irt_p' => 388,
            'pkj_nelayan_l' => 233, 'pkj_nelayan_p' => 0,
            'pkj_swasta_l' => 136, 'pkj_swasta_p' => 83,
            'pkj_tukang_l' => 125, 'pkj_tukang_p' => 0,
            'pkj_buruh_l' => 118, 'pkj_buruh_p' => 6,
            'bgn_darurat' => 39, 'bgn_semi' => 301, 'bgn_permanen' => 415,
            'kdr_motor' => 205, 'kdr_mobil' => 167, 'kdr_truk' => 48,
        ]);

        for ($i = 0; $i <= 80; $i++) {
            $umurKey = $i == 80 ? '80+' : (string)$i;
            $demo->umurs()->create([
                'umur' => $umurKey,
                'laki' => rand(10, 50),
                'perempuan' => rand(10, 50),
            ]);
        }
    }
}