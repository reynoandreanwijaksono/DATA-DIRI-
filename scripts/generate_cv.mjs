import { PDFDocument, rgb, StandardFonts } from 'pdf-lib';
import fs from 'fs';
import path from 'path';

async function createCV() {
    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage([595.28, 841.89]); // A4 in points
    const { width, height } = page.getSize();

    // Fonts
    const fontBold = await pdfDoc.embedFont(StandardFonts.HelveticaBold);
    const fontRegular = await pdfDoc.embedFont(StandardFonts.Helvetica);
    const fontOblique = await pdfDoc.embedFont(StandardFonts.HelveticaOblique);

    // Colors
    const primaryColor = rgb(0.12, 0.35, 0.85); // Modern Royal Blue
    const darkSlate = rgb(0.09, 0.13, 0.20);   // #172133
    const textGray = rgb(0.35, 0.40, 0.48);    // Subdued text
    const lightBg = rgb(0.96, 0.97, 0.99);     // Sidebar background
    const white = rgb(1, 1, 1);
    const accentLine = rgb(0.85, 0.89, 0.95);

    // Draw Left Sidebar Background (Width: 205pt)
    const sidebarWidth = 205;
    page.drawRectangle({
        x: 0,
        y: 0,
        width: sidebarWidth,
        height: height,
        color: lightBg,
    });

    // Divider Line
    page.drawLine({
        start: { x: sidebarWidth, y: 0 },
        end: { x: sidebarWidth, y: height },
        thickness: 1,
        color: accentLine,
    });

    // Top Header Banner (Right Content Area)
    page.drawRectangle({
        x: sidebarWidth,
        y: height - 120,
        width: width - sidebarWidth,
        height: 120,
        color: white,
    });

    // 1. Embed Profile Photo
    try {
        const photoPath = path.resolve('public/images/profile.jpg');
        if (fs.existsSync(photoPath)) {
            const photoBytes = fs.readFileSync(photoPath);
            const photoImage = await pdfDoc.embedJpg(photoBytes);
            
            // Photo dimensions: 115 x 135 pt
            const photoW = 115;
            const photoH = 135;
            const photoX = (sidebarWidth - photoW) / 2;
            const photoY = height - 165;

            // Border behind photo
            page.drawRectangle({
                x: photoX - 3,
                y: photoY - 3,
                width: photoW + 6,
                height: photoH + 6,
                color: white,
                borderColor: primaryColor,
                borderWidth: 2,
            });

            page.drawImage(photoImage, {
                x: photoX,
                y: photoY,
                width: photoW,
                height: photoH,
            });
        }
    } catch (err) {
        console.log('Photo embed skipped:', err.message);
    }

    // -------------------------------------------------------------
    // LEFT SIDEBAR CONTENTS
    // -------------------------------------------------------------
    let sideY = height - 195;

    // Contact Section
    function drawSidebarHeading(title, y) {
        page.drawText(title.toUpperCase(), {
            x: 20,
            y: y,
            size: 11,
            font: fontBold,
            color: primaryColor,
        });
        page.drawLine({
            start: { x: 20, y: y - 5 },
            end: { x: sidebarWidth - 25, y: y - 5 },
            thickness: 1.5,
            color: primaryColor,
        });
        return y - 20;
    }

    sideY = drawSidebarHeading('Kontak', sideY);

    const contacts = [
        { label: 'Lokasi', value: 'Mlonggo, Jepara, Jawa Tengah' },
        { label: 'Email', value: 'reynoandreanwijaksono@gmail.com' },
        { label: 'Portfolio', value: 'https://reynoandrean.vercel.app' },
        { label: 'GitHub', value: 'github.com/reynoandreanwijaksono' },
    ];

    for (const c of contacts) {
        page.drawText(c.label, {
            x: 20,
            y: sideY,
            size: 8,
            font: fontBold,
            color: darkSlate,
        });
        sideY -= 12;
        page.drawText(c.value, {
            x: 20,
            y: sideY,
            size: 8,
            font: fontRegular,
            color: textGray,
        });
        sideY -= 16;
    }

    sideY -= 5;
    sideY = drawSidebarHeading('Keahlian Teknis', sideY);

    const techSkills = [
        'PHP & Laravel 13',
        'MySQL & SQLite',
        'JavaScript & Alpine.js',
        'Tailwind CSS & Blade',
        'HTML5 & Modern CSS3',
        'REST API & MVC Architecture',
        'Git & GitHub Version Control',
        'Docker & Serverless Deployment',
    ];

    for (const s of techSkills) {
        page.drawCircle({
            x: 24,
            y: sideY + 3,
            size: 2.5,
            color: primaryColor,
        });
        page.drawText(s, {
            x: 32,
            y: sideY,
            size: 8.5,
            font: fontRegular,
            color: darkSlate,
        });
        sideY -= 15;
    }

    sideY -= 5;
    sideY = drawSidebarHeading('Desain & Tools', sideY);

    const designSkills = [
        'Figma (UI/UX Design)',
        'Canva Graphic Design',
        'Social Media & Poster Design',
        'Responsive Web Design',
    ];

    for (const d of designSkills) {
        page.drawCircle({
            x: 24,
            y: sideY + 3,
            size: 2.5,
            color: primaryColor,
        });
        page.drawText(d, {
            x: 32,
            y: sideY,
            size: 8.5,
            font: fontRegular,
            color: darkSlate,
        });
        sideY -= 15;
    }

    sideY -= 5;
    sideY = drawSidebarHeading('Bahasa', sideY);

    page.drawText('• Bahasa Indonesia', { x: 22, y: sideY, size: 8.5, font: fontBold, color: darkSlate });
    page.drawText('  (Penutur Asli / Fasih)', { x: 22, y: sideY - 11, size: 8, font: fontRegular, color: textGray });
    sideY -= 24;
    page.drawText('• Bahasa Inggris', { x: 22, y: sideY, size: 8.5, font: fontBold, color: darkSlate });
    page.drawText('  (Dasar & Teknis Komputer)', { x: 22, y: sideY - 11, size: 8, font: fontRegular, color: textGray });


    // -------------------------------------------------------------
    // RIGHT MAIN CONTENT AREA
    // -------------------------------------------------------------
    const mainX = sidebarWidth + 25;

    // Header: Name & Role
    page.drawText('REYNO ANDREAN WIJAKSONO', {
        x: mainX,
        y: height - 55,
        size: 19,
        font: fontBold,
        color: darkSlate,
    });

    page.drawText('Web Developer & Graphic Designer', {
        x: mainX,
        y: height - 73,
        size: 11,
        font: fontBold,
        color: primaryColor,
    });

    page.drawLine({
        start: { x: mainX, y: height - 85 },
        end: { x: width - 25, y: height - 85 },
        thickness: 1,
        color: accentLine,
    });

    let mainY = height - 105;

    function drawMainHeading(title, y) {
        page.drawText(title.toUpperCase(), {
            x: mainX,
            y: y,
            size: 11,
            font: fontBold,
            color: primaryColor,
        });
        page.drawLine({
            start: { x: mainX, y: y - 5 },
            end: { x: width - 25, y: y - 5 },
            thickness: 1.5,
            color: primaryColor,
        });
        return y - 18;
    }

    // 1. Profil Singkat (About)
    mainY = drawMainHeading('Profil Singkat', mainY);

    const bioLines = [
        'Siswa SMKN 1 Bangsri program keahlian Pengembangan Perangkat Lunak dan Gim (PPLG)',
        'dengan dedikasi tinggi di bidang pengembangan website dan desain grafis. Berpengalaman',
        'membangun website modern dengan Laravel, PHP, MySQL, dan Tailwind CSS, serta terbiasa',
        'mendesain visual dengan Figma dan Canva. Mampu berkolaborasi aktif dalam tim, adaptif,',
        'dan selalu bersemangat memecahkan masalah dengan solusi teknologi yang efektif.',
    ];

    for (const line of bioLines) {
        page.drawText(line, {
            x: mainX,
            y: mainY,
            size: 8.5,
            font: fontRegular,
            color: darkSlate,
            lineHeight: 12,
        });
        mainY -= 12.5;
    }

    mainY -= 8;

    // 2. Pengalaman Proyek Unggulan
    mainY = drawMainHeading('Proyek Unggulan', mainY);

    const projects = [
        {
            title: 'Website E-Commerce Bewole Furniture Jepara',
            tag: 'Laravel 13 • Tailwind CSS • MySQL • Breeze',
            points: [
                'Membangun sistem e-commerce mebel Jepara dengan katalog produk dinamis dan responsif.',
                'Mengimplementasikan sistem autentikasi pengguna dan dashboard admin terpadu.',
                'Menyusun arsitektur basis data relasional MySQL untuk pengelolaan produk dan transaksi toko.',
            ],
        },
        {
            title: 'Website Portfolio Pribadi',
            tag: 'Laravel • Tailwind CSS • Livewire • SQLite • Vercel',
            points: [
                'Mengembangkan website personal portfolio interaktif berkinerja tinggi dengan dark/light mode.',
                'Menerapkan arsitektur serverless deployment di Vercel dengan optimasi aset Vite.',
                'Dilengkapi form pesan interaktif dengan sistem proteksi keamanan dan honeypot.',
            ],
        },
        {
            title: 'Website E-Commerce & Company Profile Aziziscakes',
            tag: 'Laravel 13 • Tailwind CSS • Starter Kit • PHP',
            points: [
                'Mengembangkan wadah profil bisnis kue resmi dengan katalog sajian segar dan alur pesanan.',
                'Menyediakan dashboard admin untuk kemudahan pembaruan katalog produk dan data pemesanan.',
            ],
        },
        {
            title: 'Desain Konten Media Sosial & Branding',
            tag: 'Figma • Canva • UI/UX Design • Visual Branding',
            points: [
                'Mendesain poster promosi, banner visual, dan materi publikasi Instagram dengan estetik modern.',
                'Menerapkan prinsip tipografi, hierarki visual, dan komposisi warna yang kuat.',
            ],
        },
    ];

    for (const p of projects) {
        page.drawText(p.title, {
            x: mainX,
            y: mainY,
            size: 9.5,
            font: fontBold,
            color: darkSlate,
        });

        // Pill Tag
        page.drawText(`[ ${p.tag} ]`, {
            x: mainX + fontBold.widthOfTextAtSize(p.title, 9.5) + 8,
            y: mainY,
            size: 7.5,
            font: fontBold,
            color: primaryColor,
        });

        mainY -= 13;

        for (const pt of p.points) {
            page.drawText('• ' + pt, {
                x: mainX + 5,
                y: mainY,
                size: 8,
                font: fontRegular,
                color: textGray,
            });
            mainY -= 11.5;
        }

        mainY -= 4;
    }

    mainY -= 4;

    // 3. Pendidikan & Kegiatan Organisasi
    mainY = drawMainHeading('Pendidikan & Organisasi', mainY);

    // Edu 1
    page.drawText('SMK Negeri 1 Bangsri', {
        x: mainX,
        y: mainY,
        size: 9.5,
        font: fontBold,
        color: darkSlate,
    });
    page.drawText('2024 – Sekarang  |  Jepara', {
        x: width - 145,
        y: mainY,
        size: 8,
        font: fontBold,
        color: primaryColor,
    });
    mainY -= 12;
    page.drawText('Pengembangan Perangkat Lunak dan Gim (PPLG)', {
        x: mainX,
        y: mainY,
        size: 8.5,
        font: fontOblique,
        color: darkSlate,
    });
    mainY -= 12;
    page.drawText('Fokus pada rekayasa web (Laravel, PHP, MySQL), algoritma pemrograman, dan antarmuka desain UI/UX.', {
        x: mainX + 5,
        y: mainY,
        size: 8,
        font: fontRegular,
        color: textGray,
    });

    mainY -= 16;

    // Org 1
    page.drawText('Ekstrakurikuler Bola Voli SMKN 1 Bangsri', {
        x: mainX,
        y: mainY,
        size: 9.5,
        font: fontBold,
        color: darkSlate,
    });
    page.drawText('2024 – Sekarang  |  Anggota', {
        x: width - 145,
        y: mainY,
        size: 8,
        font: fontBold,
        color: primaryColor,
    });
    mainY -= 12;
    page.drawText('Aktif dalam sesi latihan tim, kompetisi olahraga, serta melatih kedisiplinan dan komunikasi efektif.', {
        x: mainX + 5,
        y: mainY,
        size: 8,
        font: fontRegular,
        color: textGray,
    });

    // Save Output
    const pdfBytes = await pdfDoc.save();
    const outputPath = path.resolve('public/assets/cv/reyno-andrean-wijaksono-cv.pdf');
    fs.writeFileSync(outputPath, pdfBytes);
    console.log('SUCCESS: CV PDF generated at:', outputPath, 'Size:', pdfBytes.length, 'bytes');
}

createCV().catch(err => {
    console.error('ERROR generating CV:', err);
    process.exit(1);
});
