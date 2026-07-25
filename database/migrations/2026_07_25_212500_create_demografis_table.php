<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demografis', function (Blueprint $table) {
            $table->id();
            $table->string('bulan', 2); // '01' - '12'
            $table->year('tahun');
            
            // I. Penduduk
            $table->integer('wni_l')->default(0); $table->integer('wni_p')->default(0);
            $table->integer('wna_l')->default(0); $table->integer('wna_p')->default(0);
            // II. Mutasi
            $table->integer('lahir_l')->default(0); $table->integer('lahir_p')->default(0);
            $table->integer('mati_l')->default(0); $table->integer('mati_p')->default(0);
            $table->integer('datang_l')->default(0); $table->integer('datang_p')->default(0);
            $table->integer('pindah_l')->default(0); $table->integer('pindah_p')->default(0);
            // III. KK & IV. KTP
            $table->integer('kk_ada')->default(0); $table->integer('kk_belum')->default(0);
            $table->integer('ktp_ada_l')->default(0); $table->integer('ktp_ada_p')->default(0);
            $table->integer('ktp_belum_l')->default(0); $table->integer('ktp_belum_p')->default(0);
            // V. Agama
            $table->integer('agama_kristen_l')->default(0); $table->integer('agama_kristen_p')->default(0);
            $table->integer('agama_katolik_l')->default(0); $table->integer('agama_katolik_p')->default(0);
            $table->integer('agama_islam_l')->default(0); $table->integer('agama_islam_p')->default(0);
            $table->integer('agama_hindu_l')->default(0); $table->integer('agama_hindu_p')->default(0);
            $table->integer('agama_buddha_l')->default(0); $table->integer('agama_buddha_p')->default(0);
            $table->integer('agama_konghucu_l')->default(0); $table->integer('agama_konghucu_p')->default(0);
            $table->integer('agama_lain_l')->default(0); $table->integer('agama_lain_p')->default(0);
            // VI. Pendidikan
            $table->integer('pend_tk_l')->default(0); $table->integer('pend_tk_p')->default(0);
            $table->integer('pend_sd_l')->default(0); $table->integer('pend_sd_p')->default(0);
            $table->integer('pend_smp_l')->default(0); $table->integer('pend_smp_p')->default(0);
            $table->integer('pend_sma_l')->default(0); $table->integer('pend_sma_p')->default(0);
            $table->integer('pend_pt_l')->default(0); $table->integer('pend_pt_p')->default(0);
            // VII. Putus Sekolah
            $table->integer('pts_tidak_l')->default(0); $table->integer('pts_tidak_p')->default(0);
            $table->integer('pts_tk_l')->default(0); $table->integer('pts_tk_p')->default(0);
            $table->integer('pts_sd_l')->default(0); $table->integer('pts_sd_p')->default(0);
            $table->integer('pts_smp_l')->default(0); $table->integer('pts_smp_p')->default(0);
            $table->integer('pts_sma_l')->default(0); $table->integer('pts_sma_p')->default(0);
            $table->integer('cacat_fisik_l')->default(0); $table->integer('cacat_fisik_p')->default(0);
            $table->integer('cacat_mental_l')->default(0); $table->integer('cacat_mental_p')->default(0);
            // VIII. Pekerjaan (Top list per your excel)
            $table->integer('pkj_asn_pegawai_l')->default(0); $table->integer('pkj_asn_pegawai_p')->default(0);
            $table->integer('pkj_asn_guru_l')->default(0); $table->integer('pkj_asn_guru_p')->default(0);
            $table->integer('pkj_tni_l')->default(0); $table->integer('pkj_tni_p')->default(0);
            $table->integer('pkj_polri_l')->default(0); $table->integer('pkj_polri_p')->default(0);
            $table->integer('pkj_petani_l')->default(0); $table->integer('pkj_petani_p')->default(0);
            $table->integer('pkj_tukang_l')->default(0); $table->integer('pkj_tukang_p')->default(0);
            $table->integer('pkj_pelaut_l')->default(0); $table->integer('pkj_pelaut_p')->default(0);
            $table->integer('pkj_nelayan_l')->default(0); $table->integer('pkj_nelayan_p')->default(0);
            $table->integer('pkj_buruh_l')->default(0); $table->integer('pkj_buruh_p')->default(0);
            $table->integer('pkj_wiraswasta_l')->default(0); $table->integer('pkj_wiraswasta_p')->default(0);
            $table->integer('pkj_swasta_l')->default(0); $table->integer('pkj_swasta_p')->default(0);
            $table->integer('pkj_bumd_l')->default(0); $table->integer('pkj_bumd_p')->default(0);
            $table->integer('pkj_irt_l')->default(0); $table->integer('pkj_irt_p')->default(0);
            $table->integer('pkj_pendeta_l')->default(0); $table->integer('pkj_pendeta_p')->default(0);
            $table->integer('pkj_imam_l')->default(0); $table->integer('pkj_imam_p')->default(0);
            $table->integer('pkj_sopir_l')->default(0); $table->integer('pkj_sopir_p')->default(0);
            $table->integer('pkj_belum_l')->default(0); $table->integer('pkj_belum_p')->default(0);
            // IX. Bangunan
            $table->integer('bgn_permanen')->default(0);
            $table->integer('bgn_semi')->default(0);
            $table->integer('bgn_darurat')->default(0);
            $table->integer('bgn_lainnya')->default(0);
            // X. Kendaraan
            $table->integer('kdr_motor')->default(0);
            $table->integer('kdr_mobil')->default(0);
            $table->integer('kdr_bus')->default(0);
            $table->integer('kdr_mikrolet')->default(0);
            $table->integer('kdr_truk')->default(0);
            $table->integer('kdr_pickup')->default(0);
            // XI. Domisili
            $table->integer('dom_tetap_l')->default(0); $table->integer('dom_tetap_p')->default(0);
            $table->integer('dom_tidak_tetap_l')->default(0); $table->integer('dom_tidak_tetap_p')->default(0);
            $table->integer('dom_pendatang_l')->default(0); $table->integer('dom_pendatang_p')->default(0);
            $table->integer('dom_pindah_l')->default(0); $table->integer('dom_pindah_p')->default(0);
            $table->integer('dom_mati_l')->default(0); $table->integer('dom_mati_p')->default(0);
            // XII. Pelayanan Keagamaan
            $table->integer('jemaat_sm')->default(0);
            $table->integer('jemaat_remaja')->default(0);
            $table->integer('jemaat_pemuda')->default(0);
            $table->integer('jemaat_ibu')->default(0);
            $table->integer('jemaat_bapa')->default(0);
            $table->integer('jemaat_lansia')->default(0);
            $table->integer('jemaat_koor')->default(0);
            
                    $table->timestamps();
                    
                    // Mencegah duplikasi data pada bulan dan tahun yang sama
                    $table->unique(['bulan', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografis');
    }
};
