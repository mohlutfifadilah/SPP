<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pay2,$nama,$nip,$rekening,$kode,$tahun,$total)
    {
        $this->pay2 = $pay2;
        $this->nama = $nama;
        $this->nip = $nip;
        $this->rekening = $rekening;
        $this->kode = $kode;
        $this->tahun = $tahun;
        $this->total = $total;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('emoer2021@gmail.com')->subject('Pembayaran SPP')
            ->view('email')
            ->with(
            [
                'pay2' => $this->pay2,
                'nama' => $this->nama,
                'nip'  => $this->nip,
                'rekening'  => $this->rekening,
                'kode'  => $this->kode,
                'tahun'  => $this->tahun,
                'total'  => $this->total,
                'wa'     => 'https://wa.me/6287832657197'
            ]);
    }
}