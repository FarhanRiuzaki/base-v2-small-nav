<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA KITA ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
<!-- KETIKA MELOAD FILE BLADE, MAKA EKSTENSI .BLADE.PHP TIDAK PERLU DITULISKAN -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    Dashboard
@endsection

<style>
    .card {
        border-radius: .3rem !important;
    }
    .card-body {
        flex: 1 1 auto;
        padding: 15px !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
        padding-top: 0 !important;
        padding-bottom: 3px !important;
    }
    .form-control {
        border-radius: 2px !important;
    }
</style>
<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ welcome_word()}} {{ ucwords(Auth::user()->name)}}!</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <div class="form-control bg-white border-0 custom-shadow custom-radius text-center" style="padding-top: 8px">
                        {{ date('d M Y')}}
                    </div>
                </div>
            </div>
            {{-- <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- @card --}}
                    <h3 class="text-center">
                        FLOATING FUND E-MONEY MONITORING SYSTEM
                    </h3>

                {{-- @endcard --}}
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                {{ Form::inputTextRow('Data per posisi', 'date', date('d-m-Y'),'datepicker', ['autocomplete' => 'off']) }}
            </div>
            <div class="col-md-6 offset-1">
                {{-- <h4 class="text-center bg-warning">WARNING: Penempatan Surat Berharga / Rekening BI = 67,04%</h4> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @card
                    <table class="table table-bordered">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th colspan="4" >PLACEMENT FLOATING FUND GABUNGAN</th>
                            </tr>
                            <tr>
                                <th rowspan="2" width='25%'>Placement Dana Uang Elektronik</th>
                                <th width='25%'>Floating Fund Mega Cash</th>
                                <th width='30%'>Floating Fund M-Money</th>
                                <th rowspan="2" width='20%'>Total</th>
                            </tr>
                            <tr>
                                <th>{{ $parameter['code_megacash'] }}</th>
                                <th>{{ $parameter['code_mmoney'] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>Nominal</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <p><i><u>A. Penempatan Floating Fund Gabungan</u></i></p>
                    <table class="table table-bordered">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th rowspan="2" width='25%'>Floating Fund untuk Penempatan Dana</th>
                                <th width='25%'>Penempatan di giro BCA (Min 30%)</th>
                                <th rowspan="2" colspan="2" width='30%'>Rekening di Bank Indonesia/Sertifikat BI/Surat Berharga Negara (Maks 70%)</th>
                                <th rowspan="2" width='20%'>Total Penempatan</th>
                            </tr>
                            <tr>
                                <th>{{ $parameter['code_bca'] }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td rowspan="4" class="text-middle">-</td>
                                <td rowspan="4" class="text-middle">-</td>
                                <td class="text-left">Giro BI</td>
                                <td>{{ number_format($record['amount_bni'],2) }}</td>
                                <td rowspan="4" class="text-middle">-</td>
                            </tr>
                            <tr>
                                <td class="text-left">SBI</td>
                                <td>{{ number_format($record['amount_sbi'],2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">SBN</td>
                                <td>{{ number_format($record['amount_sbn'],2) }}</td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="text-middle"><b>Total</b></td>
                                <td><b>{{ number_format($record['total_amount'],2) }}</b></td>
                            </tr>
                            <tr>
                                <td class="bg-dark text-white">Persentase</td>
                                <td>-</td>
                                <td>67%</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                @endcard
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        @card
                            <table class="table table-bordered">
                                <thead class="text-center bg-dark text-white">
                                    <tr>
                                        <th colspan="2">KEWAJIBAN PEMBAYARAN KE MERCHANT</th>
                                    </tr>
                                    <tr>
                                        <th>Monthly (Total)</th>
                                        <th>12 Month Average</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endcard
                    </div>
                    <div class="col-md-12">
                        @card
                            <table class="table table-borderless-0">
                                <tr>
                                    <td width="25%"><u>HIGHLIGHT GIRO BCA:</u></td>
                                    <td width="25%"></td>
                                    <td width="25%"><u>HIGHLIGHT SBI/SBN:</u></td>
                                    <td width="25%"></td>
                                </tr>
                                <tr>
                                    <td class="bg-danger"></td>
                                    <td class="text-right"> &le; 34,99%</td>
                                    <td class="bg-danger"></td>
                                    <td class="text-right">	&ge; 68,00%</td>
                                </tr>
                                <tr>
                                    <td class="bg-warning"></td>
                                    <td class="text-right">35,00% - 38,99%</td>
                                    <td class="bg-warning"></td>
                                    <td class="text-right">67,00% - 67,99%</td>
                                </tr>

                                <tr>
                                    <td class="bg-primary"></td>
                                    <td class="text-right">	&ge; 39,00%</td>
                                    <td class="bg-primary"></td>
                                    <td class="text-right"> &le; 66,99%</td>
                                </tr>
                            </table>
                        @endcard
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @card
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center bg-orange text-black">
                                FLOATING FUND DAN PENEMPATAN DANA MEGA CASH
                            </th>
                        </tr>
                    </table>
                    <table class="table table-bordered" style="
                    width: 80%;"">
                        <thead class="text-center bg-orange text-black">
                            <tr>
                                <th width='25%'>UANG ELEKTRONIK</th>
                                <th width='25%'>FLOATING FUND</th>
                                <th width='30%'>NILAI KEWAJIBAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>MEGACASH</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <p><i><u>A. Alokasi Penempatan MEGACASH</u></i></p>
                    <table class="table table-bordered">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th width='25%'>Floating Fund untuk Penempatan Dana</th>
                                <th width='25%'>Penempatan di giro BCA (Min 30%)</th>
                                <th width='30%'>Rekening di Bank Indonesia/Sertifikat BI/Surat Berharga Negara (Maks 70%)</th>
                                <th width='20%'>Total Penempatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <td>Persentase</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tfoot>
                    </table>
                @endcard
            </div>
            <div class="col-md-6">
                @card
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center bg-aqua text-black">
                                FLOATING FUND DAN PENEMPATAN DANA MEGA CASH
                            </th>
                        </tr>
                    </table>
                    <table class="table table-bordered" style="
                    width: 80%;"">
                        <thead class="text-center bg-aqua text-black">
                            <tr>
                                <th width="25%">UANG ELEKTRONIK</th>
                                <th width="25%">FLOATING FUND</th>
                                <th width="30%">NILAI KEWAJIBAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>M-MONEY</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <p><i><u>A. Alokasi Penempatan M-MONEY</u></i></p>
                    <table class="table table-bordered">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th width='25%'>Floating Fund untuk Penempatan Dana</th>
                                <th width='25%'>Penempatan di giro BCA (Min 30%)</th>
                                <th width='30%'>Rekening di Bank Indonesia/Sertifikat BI/Surat Berharga Negara (Maks 70%)</th>
                                <th width='20%'>Total Penempatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <td>Persentase</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tfoot>
                    </table>
                @endcard
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card linear-primary text-white">
                    <div class="card-body text-center">
                       <br>
                       <span class="bg-primary shadow p-3 mb-5" style="padding: 20px; border-radius: 55px; font-size: 35px"><i class="far fa-gem"></i></span>
                       <br><br><br>
                        <h2 class="text-center text-white">Welcome, {{ ucwords(Auth::user()->name)}}</h2>
                        <br>
                        <p>You have done 57.6% more sales today. Check your new badge in your profile.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller">$</sup>18,306</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Omset Harian
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                                <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pelanggan Baru (H+7)</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Perlu Dikirim</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                                <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Produk</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
