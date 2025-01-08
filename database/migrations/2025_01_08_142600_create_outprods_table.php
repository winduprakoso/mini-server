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
        Schema::create('outprods', function (Blueprint $table) {
            $table->id();
            $table->string('line_no')->nullable();
            $table->string('carline')->nullable();
            $table->string('id_cust')->nullable();
            $table->string('id_cv')->nullable();
            $table->string('cv')->nullable();
            $table->string('cv_loding')->nullable();
            $table->string('assy_no')->nullable();
            $table->string('std_box')->nullable();
            $table->string('nik')->nullable();
            $table->string('pic_prd')->nullable();
            $table->string('tgl_prd')->nullable();
            $table->string('shift')->nullable();
            $table->string('pm')->nullable();
            $table->string('waktu')->nullable();
            $table->string('serial_np')->nullable();
            $table->string('barcode_np')->nullable();
            $table->string('serial_box')->nullable();
            $table->string('barcode_box')->nullable();
            $table->string('gelombang')->nullable();
            $table->string('pic_prn')->nullable();
            $table->string('tgl_prn')->nullable();
            $table->string('pic_ver')->nullable();
            $table->string('tgl_ver')->nullable();
            $table->string('item_ver')->nullable();
            $table->string('barcode_awal')->nullable();
            $table->string('barcode_kbn')->nullable();
            
            $table->timestamps();
        });
    }
    // $qry="insert into outprod(line_no,carline,id_cust,id_cv,CV,CV_Loding,ASSY_NO,std_box,NIK,PIC_PRD,TGL_PRD,Shift,pm,waktu,SERIAL_NP,
    // BARCODE_NP,SERIAL_BOX,BARCODE_BOX,GELOMBANG,PIC_PRN,TGL_PRN,PIC_VER,TGL_VER,ITEM_VER,barcode_awal,barcode_kbn)";

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outprods');
    }
};
