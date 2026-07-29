<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - AmikomEventHub</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #4f46e5;
            background: linear-gradient(135deg, #4338ca 0%, #4f46e5 50%, #6366f1 100%);
            margin: 0;
            padding: 40px 20px;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            max-width: 480px;
            margin: 0 auto;
            width: 100%;
        }
        .header-text {
            text-align: center;
            margin-bottom: 28px;
        }
        .header-text h1 {
            font-size: 26px;
            font-weight: 800;
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
            color: #ffffff;
        }
        .header-text p {
            color: #c7d2fe;
            margin: 0;
            font-size: 14px;
            font-weight: 500;
        }
        
        /* TICKET CARD STRUCTURE */
        .ticket-card {
            background-color: #ffffff;
            color: #0f172a;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.3);
            position: relative;
        }

        /* TICKET HEADER */
        .ticket-top {
            background-color: #f8fafc;
            padding: 32px 28px 24px 28px;
            text-align: center;
            border-bottom: 2px dashed #cbd5e1;
            position: relative;
        }

        /* CUTOUT CIRCLES FOR REAL TICKET EFFECT */
        .ticket-top::before, .ticket-top::after {
            content: "";
            position: absolute;
            bottom: -14px;
            width: 28px;
            height: 28px;
            background-color: #4f46e5;
            border-radius: 50%;
            z-index: 10;
        }
        .ticket-top::before {
            left: -14px;
        }
        .ticket-top::after {
            right: -14px;
        }

        .ticket-top p {
            color: #4f46e5;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0 0 8px 0;
            display: inline-block;
            background-color: #e0e7ff;
            padding: 4px 12px;
            border-radius: 20px;
        }
        .ticket-top h2 {
            font-size: 22px;
            font-weight: 800;
            margin: 8px 0 0 0;
            color: #0f172a;
            line-height: 1.3;
            letter-spacing: -0.3px;
        }

        /* TICKET BODY */
        .ticket-body {
            padding: 28px;
        }
        
        /* GRID SYSTEM USING TABLE FOR EMAIL COMPATIBILITY */
        .grid-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }
        .grid-table td {
            width: 50%;
            vertical-align: top;
            padding-bottom: 20px;
            padding-right: 10px;
        }
        
        .label {
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin: 0 0 4px 0;
        }
        .value {
            font-weight: 700;
            font-size: 15px;
            color: #0f172a;
            margin: 0;
            word-break: break-word;
            line-height: 1.4;
        }

        /* QR SECTION */
        .qr-section {
            background-color: #f8fafc;
            padding: 24px;
            border-radius: 20px;
            text-align: center;
            margin-top: 8px;
            border: 1px solid #f1f5f9;
        }
        .qr-container {
            background-color: #ffffff;
            padding: 14px;
            border-radius: 16px;
            display: inline-block;
            margin-bottom: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        
        .footer {
            text-align: center;
            padding: 8px 28px 28px 28px;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Success Banner -->
        <div class="header-text">
            <h1>Pembayaran Berhasil!</h1>
            <p>Tiket Anda telah terbit dan siap digunakan.</p>
        </div>

        <!-- Ticket Card -->
        <div class="ticket-card">

            <!-- Ticket Header -->
            <div class="ticket-top">
                <p>E-Ticket Resmi</p>
                <h2>{{ $transaction->event->title }}</h2>
            </div>

            <!-- Ticket Body -->
            <div class="ticket-body">
                
                <table class="grid-table">
                    <tr>
                        <td>
                            <p class="label">Nama Pembeli</p>
                            <p class="value">{{ $transaction->customer_name }}</p>
                        </td>
                        <td>
                            <p class="label">Tanggal & Waktu</p>
                            <p class="value">
                                {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M, H:i') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="label">Order ID</p>
                            <p class="value" style="font-family: monospace; font-size: 14px;">{{ $transaction->order_id }}</p>
                        </td>
                        <td>
                            <p class="label">Lokasi</p>
                            <p class="value">{{ $transaction->event->location }}</p>
                        </td>
                    </tr>
                </table>

                <div class="qr-section">
                    <p class="label" style="margin-bottom: 12px;">Scan QR untuk Check-in</p>

                    <div class="qr-container">
                        <img
                            src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($transaction->order_id) }}"
                            alt="QR Code"
                            width="150"
                            height="150"
                            style="display: block;"
                        >
                    </div>

                    <p style="margin: 0; font-family: monospace; font-weight: bold; color: #1e293b; font-size: 14px; letter-spacing: 0.5px;">
                        {{ $transaction->order_id }}
                    </p>
                </div>
            </div>

            <div class="footer">
                <p style="margin: 0;">Mohon tunjukkan E-Ticket ini saat memasuki area acara.</p>
                <p style="margin-top: 8px; margin-bottom: 0;">&copy; {{ date('Y') }} AmikomEventHub.</p>
            </div>

        </div>
    </div>
</body>
</html>