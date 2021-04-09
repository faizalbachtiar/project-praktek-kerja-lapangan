<?php if ($sertifikat) : ?>
    <?php foreach ($sertifikat as $data) : ?>
        <?php if ($data->kategori == 'dam') : ?>
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>

            <HEAD>
                <TITLE>Sertifikat Laik Higiene Depot Air Minum</TITLE>
                <link rel="icon" href="https://dinkes.malangkota.go.id/wp-content/uploads/sites/104/2015/03/cropped-cropped-cropped-logo-kota-malang.php_-1-1-32x32.png" sizes="32x32">
                <STYLE TYPE="text/css">
                    @page {
                        size: 8.5in 14in;
                        margin-left: 1in;
                        margin-right: 1in;
                        margin-top: 0.49in;
                        margin-bottom: 1in
                    }

                    P {
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        widows: 2;
                        orphans: 2
                    }

                    P.western {
                        font-family: "Times New Roman", serif;
                        font-size: 12pt
                    }

                    P.cjk {
                        font-size: 12pt
                    }

                    P.ctl {
                        font-family: "Times New Roman";
                        font-size: 12pt
                    }

                    H1 {
                        margin-top: 0in;
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        text-align: center;
                        widows: 2;
                        orphans: 2
                    }

                    H1.western {
                        font-family: "Times New Roman", serif;
                        font-size: 16pt
                    }

                    H1.cjk {
                        font-size: 16pt
                    }

                    H1.ctl {
                        font-family: ;
                        font-size: 16pt
                    }

                    A:link {
                        color: #0563c1;
                    }
                </STYLE>
            </HEAD>

            <BODY LANG="en-US" LINK="#0563c1" DIR="LTR">
                <!-- =====================================================BAGIAN KOP SURAT======================================================================================================== -->
                <header>
                    <P ALIGN=CENTER>
                        <IMG SRC="<?php echo base_url(); ?>assets/img/sertifikat/logo_sertifikat.png" NAME="Picture 2" ALIGN=BOTTOM WIDTH=98 HEIGHT=102 BORDER=0>
                    </P>
                    <P ALIGN=CENTER STYLE="margin-bottom: 0in">
                        <FONT SIZE=4>PEMERINTAH KOTA MALANG</FONT>
                    </P>
                    <H1 CLASS="western">DINAS KESEHATAN</H1>
                    <P CLASS="header" ALIGN=CENTER STYLE="margin-left: 0in;">
                        <FONT FACE="Times New Roman, serif">Jl. Simpang Laksda Adi Sucipto No. 45 Telp : (0341) 406878 Fax : (0341) 406879</FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif">
                            Website : <A HREF="http://www.dinkes.malangkota.go.id/">www.dinkes.malangkota.go.id/</A>
                            e-mail : dinkes@malangkota.go.id
                        </FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif"> </FONT>
                        <FONT FACE="Times New Roman, serif">
                            <B>MALANG</B>
                        </FONT>
                        <FONT FACE="Times New Roman, serif">- Kode Pos 65124</FONT>
                    </P>
                    <P STYLE=" border-top: 3.00pt solid #00000a; border-bottom: none; border-left: none; border-right: none; padding-top: 0.01in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in; line-height: 5%"><BR></P>
                </header>
                <!--   ================================================================================================================================================================================= -->
                <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=4>
                                    <U><B>SERTIFIKAT LAIK HYGIENE SANITASI DEPOT AIR MINUM</B></U>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <!-- =====================================================BAGIAN NOMOR SURAT======================================================================================================== -->
                <P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>
                                    <table align="center">
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>503/</td>
                                            <td><?php echo $data->nosertif; ?></td>
                                            <!-- ini inputan tnomor............................................................................................... -->
                                            <td>/35.73.302</td>
                                            <td>/<?php echo $data->tahunterbit; ?></td>
                                            <!-- ini inputan tahun............................................................................................... -->
                                        </tr>
                                    </table>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <!--   ================================================================================================================================================================================= -->
                <!--   ==================================================================BERDASARKAN PERATURAN======================================================================================================== -->
                <P CLASS="western" STYLE="margin-bottom: 0in"><BR></P>
                <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 10%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>
                                    <B>Berdasar :</B>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <OL>
                    <P STYLE="margin-bottom: 0in; line-height: 115%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Arial, serif">
                                    <FONT SIZE=3>
                                        <li>Undang-undang Nomor 36 Tahun 2009 tentang Kesehatan</li>
                                        <li>Undang-undang Nomor 32 Tahun 2009 tentang Perlindungan dan Pengelola Lingkungan Hidup</li>
                                        <li>Peraturan Menteri Kesehatan RI. No. 43 Tahun 2014 tentang higieni Sanitasi Depot Air Minum</li>
                                        <li>Peraturan Menteri Kesehatan RI. No.492/MENKES/PER/IV/2010 tentang Persyaratan Kualitas Air Minum</li>
                                        <li>Peraturan Daerah Kota Malang No.17 Tahun 2001 tentang Konservasi Air</li>
                                        <li>Peraturan Daerah Kota Malang No . 8 Tahun 2006 tentang Pengelolaan Air Tanah</li>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                </OL>
                <!--   ================================================================================================================================================================================= -->
                <!--   ========================================================================BERDASARKAN KETERANGAN====================================================================================================== -->
                <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>
                                    <b> Diberikan Sertifikat Laik Hygiene Sanitasi Depot Air Minum (DAM) kepada : </b>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <OL>
                    <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 115%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Arial, serif">
                                    <FONT SIZE=3>
                                        <table>
                                            <tr>
                                                <td>
                                                    <li>Nama Depot Air Minum</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->nama_usaha; ?></td>
                                                <!-- ini inputanr............................................................................................... -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li>Nama Pemilik/Penanggung Jawab</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->nama; ?></td>
                                                <!-- ini inputanr............................................................................................... -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li>Alamat Depot Air Minum</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->alamat_usaha; ?></td>
                                                <!-- ini inputanr............................................................................................... -->
                                            </tr>
                                        </table>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                </ol>
                <!--   ================================================================================================================================================================================= -->
                <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>Sertifikat Laik Hygiene Sanitasi Depot Air Minumini berlaku selama 3 (tiga) tahun / berlaku sampai dengan <?php echo $data->batastgl; ?>,
                                    <!-- ini inputan tanggalnya............................................ -->
                                    kecuali ada perubahan / mutasi, atau tidak memenuhi persyaratan Hygiene Sanitasi dan Peraturan Perundangan yang berlaku
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <!--   ================================================================================================================================================================================= -->
                <!--   ========================================================INI BAGIAN TTD=============================================================================================================== -->
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; margin-left: 4.1in; ">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3> </FONT>
                            </FONT>
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>
                                    <table>
                                        <tr>
                                            <td>Dikeluarkan di</td>
                                            <td>:</td>
                                            <td>Malang</td>
                                        </tr>
                                        <tr>
                                            <td>Pada Tanggal</td>
                                            <td>:</td>
                                            <td><?php echo $data->tglterbit; ?></td>
                                            <!-- ini inputan........................................................................................................... -->
                                        </tr>
                                    </table>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 3.54in; text-indent: 0.46in; margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>KEPALA DINAS KESEHATAN</FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4.04in; text-indent: 0.46in; margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>KOTA MALANG</FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3> </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in"><BR></P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in"><BR></P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3></FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in; line-height:10%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>-------------------------------------------</FONT>
                                <!-- ini inputan........................................................................................................... -->
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in; line-height:10%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Arial, serif">
                                <FONT SIZE=3>NIP.</FONT>
                                <!-- ini inputan........................................................................................................... -->
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <OL>
                    <P ALIGN=LEFT STYLE="margin-bottom: 0in">
                        <A NAME="_GoBack"></A>
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Arial, serif">
                                    <FONT SIZE=3>
                                        <I>
                                            <U><B>Ketentuan:</B></U>
                                            <li>Mentaati ketentuan yang lain berlaku</li>
                                            <li>Melaksanakan persyaratan kesehatan seperti tertuang pada lembar dibaliknya</li>
                                        </I>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                </OL>
            </BODY>

            </HTML>
        <?php elseif ($data->kategori == 'hotel') : ?>
            <!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
            <html>

            <head>
                <title>Sertifikat Laik Higiene Sanitasi Hotel</title>
                <link rel="icon" href="https://dinkes.malangkota.go.id/wp-content/uploads/sites/104/2015/03/cropped-cropped-cropped-logo-kota-malang.php_-1-1-32x32.png" sizes="32x32">
                <style type="text/css">
                    @page {
                        size: 8.5in 14in;
                        margin-left: 1in;
                        margin-right: 1in;
                        margin-top: 0.49in;
                        margin-bottom: 1in
                    }

                    P {
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        text-align: justify;
                        widows: 2;
                        orphans: 2
                    }

                    P.western {
                        font-family: "Times New Roman", serif;
                        font-size: 12pt
                    }

                    P.cjk {
                        font-size: 12pt
                    }

                    P.ctl {
                        font-family: "Times New Roman";
                        font-size: 12pt
                    }


                    H1 {
                        margin-top: 0in;
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        text-align: center;
                        widows: 2;
                        orphans: 2
                    }

                    H1.western {
                        font-family: "Times New Roman", serif;
                        font-size: 16pt
                    }

                    H1.cjk {
                        font-size: 16pt
                    }

                    H1.ctl {
                        font-family: ;
                        font-size: 16pt
                    }

                    A:link {
                        color: #0563c1;
                        so-language: zxx
                    }
                </style>
            </head>

            <body lang="en-US" link="#0563C1" dir="LTR">
                <header>
                    <P ALIGN=CENTER STYLE="text-align : center;">
                        <IMG SRC="<?php echo base_url(); ?>assets/img/sertifikat/logo_sertifikat.png" NAME="Picture 2" ALIGN=BOTTOM WIDTH=98 HEIGHT=102 BORDER=0>
                    </P>
                    <P ALIGN=CENTER STYLE="margin-bottom: 0in; text-align :center;">
                        <FONT SIZE=4>PEMERINTAH KOTA MALANG</FONT>
                    </P>
                    <H1 CLASS="western">DINAS KESEHATAN</H1>
                    <P class="header" ALIGN=CENTER STYLE="margin-left: 0in; text-align:center;">
                        <FONT FACE="Times New Roman, serif">Jl.
                            Simpang Laksda Adi Sucipto No. 45 Telp : (0341) 406878 Fax : (0341)
                            406879</FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif">
                            Website : <A HREF="http://www.dinkes.malangkota.go.id/">www.dinkes.malangkota.go.id/</A>
                            e-mail : dinkes@malangkota.go.id</FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif"> </FONT>
                        <FONT FACE="Times New Roman, serif">
                            <B>MALANG</B>
                        </FONT>
                        <FONT FACE="Times New Roman, serif"> - Kode Pos 65124</FONT>
                    </P>
                    <P STYLE=" border-top: 3.00pt solid #00000a; border-bottom: none; border-left: none; border-right: none; padding-top: 0.01in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in; line-height: 5%">
                        <BR>
                    </P>
                </header>

                <P ALIGN=CENTER STYLE="line-height: 115%; text-align: center;">
                    <A NAME="_Hlk13038105"></A>
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=5>
                                    <B>KETERANGAN LAIK HYGIENE SANITASI HOTEL</B>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <P ALIGN=CENTER STYLE="line-height: 115%; text-align : center;">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3 STYLE="font-size: 11pt">

                                    <table align="center">
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>443.51/</td>
                                            <td><?php echo $data->nosertif ?></td>
                                            <td>/35.73.302</td>
                                            <td>/<?php echo $data->tahunterbit; ?></td>
                                        </tr>
                                    </table>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <P CLASS="western" ALIGN=LEFT STYLE="line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3>
                                    <B>Berdasarkan :</B>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <OL>
                    <LI>
                        <P ALIGN=LEFT STYLE="line-height: 115%">
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT FACE="Times New Roman, serif">
                                        <FONT SIZE=3>
                                            Undang – undang Nomor 36 tahun 2009 tentang Kesehatan
                                        </FONT>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    <LI>
                        <P ALIGN=LEFT STYLE="line-height: 115%">
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT FACE="Times New Roman, serif">
                                        <FONT SIZE=3>
                                            Peraturan Menteri Kesehatan Republik Indonesia No. 80/Menkes/Per/II/1990 tentang Persyaratan Kesehatan Hotel
                                        </FONT>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    <LI>
                        <P ALIGN=LEFT STYLE="line-height: 115%">
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT FACE="Times New Roman, serif">
                                        <FONT SIZE=3>
                                            Peraturan Daerah Nomor 8 tahun 1994 tentang Persyaratan Kesehatan Hotel
                                        </FONT>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    <LI>
                        <P ALIGN=LEFT STYLE="line-height: 115%">
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT FACE="Times New Roman, serif">
                                        <FONT SIZE=3>
                                            Berita acara hasil pemeriksaan uji kelaikan Hygiene Sanitasi yang dilaksanakan pada tanggal <?php $data->batastgl; ?>
                                        </FONT>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    </LI>
                </OL>

                <P CLASS="western" ALIGN=LEFT STYLE="line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3>
                                    <B>Diberikan Keterangan Laik Hygiene Sanitasi Hotel kepada :</B>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>

                <OL TYPE=a>
                    <P ALIGN=LEFT STYLE="line-height: 115%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=3>
                                        <table>
                                            <tr>
                                                <td>
                                                    <li>NAMA HOTEL</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->nama_usaha; ?></td><!-- ini inputanr............................................................................................... -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li>PENANGGUNG JAWAB</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->nama; ?></td><!-- ini inputanr............................................................................................... -->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <li>ALAMAT HOTEL</li>
                                                </td>
                                                <td>:</td>
                                                <td><?php echo $data->alamat_usaha; ?></td><!-- ini inputanr............................................................................................... -->
                                            </tr>
                                        </table>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                </OL>

                <P CLASS="western" STYLE="line-height: 115%">
                    Keterangan Laik Hygiene Sanitasi Hotel ini berlaku selama 2 (dua) tahun / berlaku sampai dengan <?php echo $data->batastgl; ?>,
                    <!-- ini inputanr............................................................................................... -->
                    kecuali ada perubahan/mutase, atau tidak memenuhi
                    Persyaratan Hygiene Sanitasi dan Peraturan Perundangan yang berlaku.</P>
                <P CLASS="western" ALIGN=LEFT STYLE="line-height: 20%"><BR></P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%; margin-left: 3.96in;">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3> </FONT>
                            </FONT>
                            <FONT FACE="Times New Roman, serif">
                                <table>
                                    <tr>
                                        <td>Dikeluarkan di</td>
                                        <td>:</td>
                                        <td>Malang</td>
                                    </tr>
                                    <tr>
                                        <td>Pada Tanggal</td>
                                        <td>:</td>
                                        <td><?php echo $data->tglterbit; ?></td> <!-- ini inputan........................................................................................................... -->
                                    </tr>
                                </table>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P STYLE=" border-top: 2.00pt solid #00000a; WIDTH: 200px; margin-left: 3.9in; line-height: 20%;"><BR></P>

                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 3.5in; text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                KEPALA DINAS KESEHATAN
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; text-indent: 0.5in; margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                KOTA MALANG
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 115%"><BR></P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=1 STYLE="font-size: 8pt"> </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 115%"><BR></P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 115%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=1 STYLE="font-size: 8pt"> </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 3.96in; margin-bottom: 0in; line-height: 10%"><A NAME="_GoBack"></A>
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3> </FONT>
                            </FONT>
                            <FONT FACE="Times New Roman, serif"><u></u>-------------------------------------------
                                <!-- ini inputan........................................................................................................... -->
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 3.96in; margin-bottom: 0in; line-height: 10%"><A NAME="_GoBack"></A>
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Times New Roman, serif">
                                <FONT SIZE=3> </FONT>
                            </FONT>
                            <FONT FACE="Times New Roman, serif">NIP.</FONT><!-- ini inputan........................................................................................................... -->
                        </FONT>
                    </FONT>
                </P>
            </body>

            </html>
        <?php elseif ($data->kategori == 'jasaboga') : ?>
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
            <HTML>

            <HEAD>
                <TITLE>Sertikat Laik Higiene Jasaboga</TITLE>
                <link rel="icon" href="https://dinkes.malangkota.go.id/wp-content/uploads/sites/104/2015/03/cropped-cropped-cropped-logo-kota-malang.php_-1-1-32x32.png" sizes="32x32">
                <STYLE TYPE="text/css">
                    @page {
                        size: 8.5in 14in;
                        margin-left: 1in;
                        margin-right: 1in;
                        margin-top: 0.49in;
                        margin-bottom: 1in
                    }

                    P {
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        widows: 2;
                        orphans: 2
                    }

                    P.western {
                        font-family: "Times New Roman", serif;
                        font-size: 12pt;
                        text-align: justify;
                    }

                    P.cjk {
                        font-size: 12pt
                    }

                    P.ctl {
                        font-family: "Times New Roman";
                        font-size: 12pt
                    }

                    H1 {
                        margin-top: 0in;
                        direction: ltr;
                        line-height: 106%;
                        text-align: center;
                        widows: 2;
                        orphans: 2
                    }

                    H1.western {
                        font-family: "Times New Roman", serif;
                        font-size: 16pt
                    }

                    H1.cjk {
                        font-size: 16pt
                    }

                    H1.ctl {
                        font-family: ;
                        font-size: 16pt
                    }

                    H2 {
                        margin-top: 0in;
                        margin-bottom: 0.11in;
                        direction: ltr;
                        text-align: center;
                        widows: 2;
                        orphans: 2
                    }

                    H2.western {
                        font-family: "Lucida Handwriting", serif
                    }

                    H2.cjk {
                        font-family: "Arial"
                    }

                    H2.ctl {
                        font-family: "Times New Roman"
                    }

                    H3 {
                        margin-left: 3.54in;
                        text-indent: 0.46in;
                        margin-top: 0in;
                        margin-bottom: 0in;
                        direction: ltr;
                        text-align: left;
                        widows: 2;
                        orphans: 2
                    }

                    H3.western {
                        font-family: "Arial", serif;
                        font-size: 12pt
                    }

                    H3.cjk {
                        font-family: "Arial";
                        font-size: 12pt
                    }

                    H3.ctl {
                        font-size: 12pt
                    }

                    A:link {
                        color: #0563c1;
                        so-language: zxx
                    }
                </STYLE>
            </HEAD>

            <BODY LANG="en-US" LINK="#0563c1" DIR="LTR">
                <!-- =====================================================BAGIAN KOP SURAT======================================================================================================== -->
                <header>
                    <P ALIGN=CENTER>
                        <IMG SRC="<?php echo base_url(); ?>assets/img/sertifikat/logo_sertifikat.png" NAME="Picture 2" ALIGN=BOTTOM WIDTH=98 HEIGHT=102 BORDER=0>
                    </P>
                    <P ALIGN=CENTER STYLE="margin-bottom: 0in">
                        <FONT SIZE=4>PEMERINTAH KOTA MALANG</FONT>
                    </P>
                    <H1 CLASS="western">DINAS KESEHATAN</H1>
                    <P class="header" ALIGN=CENTER STYLE="margin-left: 0in;">
                        <FONT FACE="Times New Roman, serif">Jl.
                            Simpang Laksda Adi Sucipto No. 45 Telp : (0341) 406878 Fax : (0341) 406879
                        </FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif">
                            Website : <A HREF="http://www.dinkes.malangkota.go.id/">www.dinkes.malangkota.go.id/</A>
                            e-mail : dinkes@malangkota.go.id
                        </FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif"> </FONT>
                        <FONT FACE="Times New Roman, serif">
                            <B>MALANG</B>
                        </FONT>
                        <FONT FACE="Times New Roman, serif">- Kode Pos 65124</FONT>
                    </P>
                    <P STYLE=" border-top: 3.00pt solid #00000a; border-bottom: none; border-left: none; border-right: none; padding-top: 0.01in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in; line-height: 5%"><BR></P>
                </header>
                <!--   ================================================================================================================================================================================= -->
                <P ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 20%">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT FACE="Lucida Calligraphy, serif">
                                <FONT SIZE=5 STYLE="font-size: 20pt">
                                    <B>SERTIFIKAT</B>
                                </FONT>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <H2 CLASS="western" STYLE="margin-bottom: 0in">
                    <SPAN STYLE="font-weight: normal">
                        LAIK HYGIENE SANITASI JASA BOGA
                    </SPAN>
                </H2>
                <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 20%"><BR></P>
                <!--   ====================================================================BAGIAN NOMOR SURAT DAN GOLONGAN=============================================================================== -->
                <P CLASS="western" STYLE="margin-bottom: 0in;">
                    <FONT FACE="Calibri, serif">
                        <FONT SIZE=2 STYLE="font-size: 11pt">
                            <FONT SIZE=3>
                                <table>
                                    <tr>
                                        <td>
                                            Nomor
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td><?php echo $data->nosertif; ?></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Golongan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td><?php echo $data->no_golongan; ?></td>
                                    </tr>
                                </table>
                            </FONT>
                        </FONT>
                    </FONT>
                </P>
                <!--   ================================================================================================================================================================================= -->

                <!--   ===================================================================================BERDAARKAN PERTIMABNAGAn===================================================================================== -->
                <P CLASS="western" STYLE="margin-bottom: 0in; line-height: 20%"><BR>
                    <P CLASS="western" ALIGN=LEFT STYLE="text-indent: 0.2in; margin-bottom: 0in; line-height : 5%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT SIZE=3>
                                    Berdasarkan pertimbangan:
                                    <ol>
                                        <li>Keputusan Menteri Kesehatan RI Nomor : 715/Menkes/SK/V/2003 tentang Persyaratan Hygiene Sanitasi Jasaboga</li>
                                        <li>Peraturan Daerah Kota Malang Nomor : 7 Tahun 1994 tentang Persyaratan Kesehatan Jasaboga</li>
                                        <li>Telah memenuhi kelengkapan persyaratan administrasi dan hasil pemeriksaan uji kelaikan Hygiene Sanitasi Makanan.</li>
                                    </ol>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <!--   ================================================================================================================================================================================= -->

                    <!--   ===========================================================================BERDASRKAN KETERANGANANNN====================================================================================================== -->
                    <P CLASS="western" ALIGN=LEFT STYLE="text-indent: 0.2in; margin-bottom: 0in;">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT SIZE=3>Diberikan Laik Hygiene Sanitasi Jasaboga kepada :</FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <OL>
                        <P ALIGN=LEFT STYLE="margin-bottom: 0in">
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT SIZE=3>
                                        <table>
                                            <tr>
                                                <td>
                                                    <b>
                                                        <li>Nama Perusahaan</li>
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                </td>
                                                <td>
                                                    <b><?php echo $data->nama_usaha; ?></b>
                                                </td> <!-- ini inputan........................................................................................................... -->
                                            </tr>

                                            <tr>
                                                <td>
                                                    <b>
                                                        <li>Nama Pengusaha / Penanggung Jawab</li>
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                </td>
                                                <td>
                                                    <b><?php echo $data->nama; ?></b>
                                                </td> <!-- ini inputan........................................................................................................... -->
                                            </tr>

                                            <tr>
                                                <td>
                                                    <b>
                                                        <li>Alamat Perusahaan</li>
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                </td>
                                                <td>
                                                    <b><?php echo $data->alamat_usaha; ?></b>
                                                </td> <!-- ini inputan........................................................................................................... -->
                                            </tr>
                                        </table>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    </OL>
                    <!--   ================================================================================================================================================================================= -->
                    <P CLASS="western" ALIGN=LEFT STYLE="text-indent: 0.2in;">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT SIZE=3>Dengan ketentuan sebagai berikut :</FONT>
                            </FONT>
                        </FONT>
                    </P>

                    <OL TYPE=a>
                        <P>
                            <FONT FACE="Calibri, serif">
                                <FONT SIZE=2 STYLE="font-size: 11pt">
                                    <FONT SIZE=3>
                                        <li>Sertifikat Laik Hygienen Sanitasi Jasaboga berlaku 2 (dua) tahun sejak tanggal ditetapkan</li>
                                        <li style="text-align: justify;">Laik Hygiene Sanitasi Jasaboga akan dievaluasi kembali setelah 2 (dua) tahun, kecuali terjadi perubahan / mutasi, atau tidak memenuhi persyaratan hygiene sanitasi dan peraturan perundanga yang berlaku</li>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </P>
                    </OL>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20% ;margin-left: 4in;">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=3>
                                        <table>
                                            <tr>
                                                <td>Dikeluarkan di</td>
                                                <td>:</td>
                                                <td style="letter-spacing: 5px">Malang</td>
                                            </tr>
                                            <tr>
                                                <td>Pada Tanggal</td>
                                                <td>:</td>
                                                <td style="letter-spacing: 5px"><?php echo $data->tglterbit; ?></td> <!-- ini inputan........................................................................................................... -->
                                            </tr>
                                        </table>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif"> </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <H3 CLASS="western">KEPALA DINAS KESEHATAN</H3>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; text-indent: 0.5in; margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Arial, serif">
                                    <FONT SIZE=3><B>KOTA MALANG</B></FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=1 STYLE="font-size: 8pt"></FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%"><BR></P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%"><BR></P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=1 STYLE="font-size: 8pt"> </FONT>
                                </FONT>
                            </FONT>
                        </FONT>
                    </P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=3> </FONT>
                                </FONT>
                                <FONT FACE="Times New Roman, serif"><u></u>---------------------------------------------------------------</FONT><!-- ini inputan........................................................................................................... -->
                            </FONT>
                        </FONT>
                    </P>
                    <P CLASS="western" ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in; line-height: 20%">
                        <FONT FACE="Calibri, serif">
                            <FONT SIZE=2 STYLE="font-size: 11pt">
                                <FONT FACE="Times New Roman, serif">
                                    <FONT SIZE=3> </FONT>
                                </FONT>
                                <FONT FACE="Times New Roman, serif">
                                    <b>NIP.</b>
                                </FONT><!-- ini inputan........................................................................................................... -->
                            </FONT>
                        </FONT>
                    </P>
                </P>
            </BODY>

            </HTML>
        <?php elseif ($data->kategori == 'tpm') : ?>
            <!DOCTYPE HTML>
            <HTML>

            <HEAD>
                <TITLE>Sertifikat Laik Higiene Sanitasi Tempat Penyedia Makan</TITLE>
                <link rel="icon" href="https://dinkes.malangkota.go.id/wp-content/uploads/sites/104/2015/03/cropped-cropped-cropped-logo-kota-malang.php_-1-1-32x32.png" sizes="32x32">
                <STYLE TYPE="text/css">
                    @page {
                        size: 8.5in 11in;
                        margin-left: 1in;
                        margin-right: 1in;
                        margin-top: 0.49in;
                        margin-bottom: 1in
                    }

                    P {
                        margin-left: 1.04in;
                        margin-bottom: 0.08in;
                        direction: ltr;
                        font-size: 11pt;
                        line-height: 106%;
                        text-align: justify;
                        widows: 2;
                        orphans: 2
                    }

                    H1 {
                        margin-top: 0in;
                        margin-bottom: 0.11in;
                        direction: ltr;
                        line-height: 106%;
                        text-align: center;
                        widows: 2;
                        orphans: 2
                    }

                    H1.western {
                        font-family: "Times New Roman", serif;
                        font-size: 16pt
                    }

                    P.header {
                        text-align: center;
                    }

                    H1.cjk {
                        font-size: 16pt
                    }

                    H1.ctl {
                        font-family: ;
                        font-size: 16pt
                    }

                    A:link {
                        color: #0563c1;
                        so-language: zxx
                    }
                </STYLE>
            </HEAD>

            <BODY LANG="en-US" LINK="#0563c1" DIR="LTR">

                <header>
                    <!-- /* ini bagian gambar */ -->
                    <h1 ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in">
                        <IMG SRC="<?php echo base_url(); ?>assets/img/sertifikat/logo_sertifikat.png" NAME="Picture 2" ALIGN=BOTTOM WIDTH=98 HEIGHT=102 BORDER=0>
                    </h1>
                    <P class="header" ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in">
                        <FONT FACE="Times New Roman, serif">
                            <FONT SIZE=4>PEMERINTAH KOTA MALANG</FONT>
                        </FONT>
                    </P>
                    <H1 CLASS="western">DINAS KESEHATAN</H1>

                    <!-- /* ini bagian tulisan kop */ -->

                    <P class="header" ALIGN=CENTER STYLE="margin-left: 0in;">

                        <FONT FACE="Times New Roman, serif">Jl.
                            Simpang Laksda Adi Sucipto No. 45 Telp : (0341) 406878 Fax : (0341) 406879</FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif">
                            Website : <A HREF="http://www.dinkes.malangkota.go.id/">www.dinkes.malangkota.go.id/</A>
                            e-mail : dinkes@malangkota.go.id
                        </FONT>
                        <br>
                        <FONT FACE="Times New Roman, serif"> </FONT>
                        <FONT FACE="Times New Roman, serif">
                            <B>MALANG</B>
                        </FONT>
                        <FONT FACE="Times New Roman, serif">- Kode Pos 65124</FONT>
                    </P>

                    <!-- /* ini bagian header garis */ -->
                    <P STYLE="margin-left: 0in; margin-bottom: 0in; border-top: 3.00pt solid #00000a; border-bottom: none; border-left: none; border-right: none; padding-top: 0.01in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in; line-height: 100%"></P>
                </header>
                <!--   ================================================================================================================================================================================= -->

                <!--/* ini bagian paragraft pernyataan */ -->
                <P class="header" ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Bauhaus 93, serif">
                        <FONT SIZE=5 STYLE="font-size: 20pt">
                            <B>SERTIFIKAT LAIK HYGIENE SANITASI</B>
                        </FONT>
                    </FONT>
                </P>
                <P class="header" ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Kristen ITC, serif">
                        <FONT SIZE=3>
                            RUMAH MAKAN DAN RESTORAN
                        </FONT>
                    </FONT>
                </P>
                <P class="header" ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Lucida Calligraphy, serif">
                        <FONT SIZE=3>
                            <table align="center" style="font-family: Lucida Calligraphy, serif">
                                <tr>
                                    <td>Nomor</td>
                                    <td>:</td>
                                    <td>443.51/</td>
                                    <td><?php echo $data->nosertif; ?></td> <!-- ini inputan tnomor............................................................................................... -->
                                    <td>/35.73.302/</td>
                                    <td>LS.RM</td>
                                    <td>/<?php echo $data->tahunterbit; ?></td><!-- ini inputan tahun............................................................................................... -->
                                </tr>
                            </table>
                        </FONT>
                    </FONT>
                </P>
                <P ALIGN=CENTER STYLE="margin-left: 0in; margin-bottom: 0.11in"><BR><BR></P>
                <P ALIGN=LEFT STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Lucida Calligraphy, serif">
                        <FONT SIZE=3>
                            Kepala Dinas Kesehatan Kota Malang, Menerangkan bahwa :
                        </FONT>
                    </FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Lucida Calligraphy, serif">
                        <FONT SIZE=3>
                            <table style="font-family: Lucida Calligraphy, serif">
                                <tr>
                                    <td>Rumah Makan</td>
                                    <td>:</td>
                                    <td>”<?php echo $data->nama_usaha; ?>”</td><!-- ini inputan ............................................................................................... -->
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $data->alamat_usaha; ?></td><!-- ini inputan ............................................................................................... -->
                                </tr>
                            </table>
                        </FONT>
                    </FONT>
                </P>
                <!-- /* ini bagian penerangan */ -->
                <P ALIGN=LEFT STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Brush Script MT">
                        <FONT SIZE=4>Berdasarkan hasil pemeriksaan hygiene sanitasi pada tanggal <?php echo $data->tglvisitasi; ?>, Makan / Restaurant tersebut dinyatakan Laik Hygiene Sanitasi.</FONT>
                    </FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 0in; margin-bottom: 0.11in">
                    <FONT FACE="Brush Script MT">
                        <FONT SIZE=4>
                            Sertifikat ini berlaku 2 (dua) tahun sejak tanggal ditetapkan.</FONT>
                    </FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 0in; margin-bottom: 0.11in"><BR><BR></P>
                <!-- /* ini bagian ttd */ -->
                <P ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0.11in">
                    <A NAME="_GoBack"></A>
                    <FONT FACE="Script MT Bold, serif">
                        <FONT SIZE=3></FONT>
                    </FONT>
                    <FONT FACE="Lucida Calligraphy, serif">
                        Malang, <?php echo $data->tglterbit; ?>
                    </FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 3.5in; text-indent: 0.5in; margin-bottom: 0in">
                    <FONT FACE="Arial Black, serif">Kepala Dinas Kesehatan</FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 4in; text-indent: 0.5in; margin-bottom: 0in">
                    <FONT FACE="Arial Black, serif">Kota Malang</FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in">
                    <FONT FACE="Arial Black, serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">
                            <br><br><br>
                        </FONT>
                    </FONT>
                </P>
                <P ALIGN=LEFT STYLE="margin-left: 4in; margin-bottom: 0in">
                    <FONT FACE="Arial Black, serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">
                            ---------------------------------------------------------------
                        </FONT>
                    </FONT>
                </P>

            </BODY>

            </HTML>
        <?php endif; ?>
    <?php endforeach; ?>
<?php elseif ($sertifikat === FALSE) : ?>
<?php endif; ?>