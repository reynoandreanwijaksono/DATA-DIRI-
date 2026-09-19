<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Website Portofolio</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 32px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .header {
            background: linear-gradient(135deg, #022c22 0%, #064e3b 50%, #047857 100%);
            padding: 32px 28px;
            text-align: left;
            color: #ffffff;
        }
        .header-tag {
            display: inline-block;
            background: rgba(16, 185, 129, 0.25);
            color: #6ee7b7;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 4px 12px;
            border-radius: 9999px;
            margin-bottom: 12px;
            border: 1px solid rgba(110, 231, 183, 0.3);
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .content {
            padding: 28px;
        }
        .meta-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 24px;
        }
        .meta-row {
            display: flex;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .meta-row:last-child {
            margin-bottom: 0;
        }
        .meta-label {
            width: 110px;
            color: #64748b;
            font-weight: 600;
            flex-shrink: 0;
        }
        .meta-value {
            color: #0f172a;
            font-weight: 600;
            word-break: break-word;
        }
        .message-box {
            background: #ffffff;
            border-left: 4px solid #059669;
            padding: 16px 20px;
            border-radius: 0 12px 12px 0;
            background-color: #f0fdf4;
            margin-bottom: 28px;
        }
        .message-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #047857;
            margin-bottom: 8px;
        }
        .message-text {
            font-size: 15px;
            color: #1e293b;
            line-height: 1.7;
            white-space: pre-line;
            margin: 0;
        }
        .btn-reply {
            display: inline-block;
            background: linear-gradient(135deg, #022c22 0%, #064e3b 100%);
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            text-align: center;
        }
        .footer {
            padding: 20px 28px;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <span class="header-tag">Website Portfolio Notification</span>
            <h1>Ada Pesan Baru Masuk! ✉️</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p style="font-size: 15px; color: #334155; margin-top: 0; margin-bottom: 20px;">
                Halo <strong>Reyno</strong>, seseorang baru saja mengirimkan formulir pesan melalui website portofolio Anda:
            </p>

            <!-- Sender Meta Info -->
            <div class="meta-card">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 6px 0; width: 110px; color: #64748b; font-size: 13px; font-weight: 600;">Nama:</td>
                        <td style="padding: 6px 0; color: #0f172a; font-size: 14px; font-weight: 700;">{{ $data['name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 0; width: 110px; color: #64748b; font-size: 13px; font-weight: 600;">Email:</td>
                        <td style="padding: 6px 0; color: #059669; font-size: 14px; font-weight: 700;">
                            <a href="mailto:{{ $data['email'] ?? '' }}" style="color: #059669; text-decoration: underline;">
                                {{ $data['email'] ?? '-' }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 0; width: 110px; color: #64748b; font-size: 13px; font-weight: 600;">Subjek:</td>
                        <td style="padding: 6px 0; color: #0f172a; font-size: 14px; font-weight: 700;">{{ $data['subject'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 6px 0; width: 110px; color: #64748b; font-size: 13px; font-weight: 600;">Waktu:</td>
                        <td style="padding: 6px 0; color: #64748b; font-size: 13px;">{{ now()->setTimezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB</td>
                    </tr>
                </table>
            </div>

            <!-- Message Body -->
            <div class="message-box">
                <div class="message-label">Isi Pesan:</div>
                <div class="message-text">{{ $data['message'] ?? '' }}</div>
            </div>

            <!-- Action CTA -->
            <div style="text-align: center; margin-top: 24px; margin-bottom: 12px;">
                <a href="mailto:{{ $data['email'] ?? '' }}?subject={{ rawurlencode('Re: ' . ($data['subject'] ?? 'Pesan Portofolio')) }}" class="btn-reply">
                    Balas Langsung via Email &rarr;
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            Dikirim secara otomatis dari sistem portofolio <strong>Reyno Andrean Wijaksono</strong>.<br>
            <a href="https://reynoandrean.vercel.app" style="color: #059669; text-decoration: none;">reynoandrean.vercel.app</a>
        </div>
    </div>
</body>
</html>
