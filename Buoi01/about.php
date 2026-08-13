<?php
    $name = "Linh Phạm";
    $major = "Sinh viên Công nghệ thông tin";
    $email = "your-email@gmail.com";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $name; ?> - Giới thiệu bản thân</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            line-height: 1.7;
        }

        /* ===== THANH MENU ===== */

        nav {
            background: white;
            border-bottom: 1px solid #e5e7eb;

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1000px;
            margin: auto;

            padding: 18px 25px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }

        .menu {
            list-style: none;

            display: flex;
            gap: 25px;
        }

        .menu a {
            text-decoration: none;
            color: #374151;
            font-weight: 500;
        }

        .menu a:hover {
            color: #2563eb;
        }

        /* ===== PHẦN GIỚI THIỆU ===== */

        .hero {
            max-width: 1000px;
            min-height: 550px;

            margin: auto;
            padding: 70px 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 60px;
        }

        .hero-content {
            flex: 1;
        }

        .hello {
            color: #2563eb;
            font-size: 18px;
            font-weight: bold;

            margin-bottom: 10px;
        }

        .hero h1 {
            font-size: 52px;
            color: #111827;

            margin-bottom: 10px;
        }

        .hero h2 {
            font-size: 24px;
            font-weight: normal;
            color: #6b7280;

            margin-bottom: 20px;
        }

        .hero p {
            color: #6b7280;

            max-width: 600px;

            margin-bottom: 25px;
        }

        .button {
            display: inline-block;

            padding: 12px 25px;

            background: #2563eb;
            color: white;

            border-radius: 8px;

            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background: #1d4ed8;
        }

        /* ===== ẢNH ĐẠI DIỆN ===== */

        .avatar {
            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 80px;
            font-weight: bold;

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* ===== CÁC SECTION ===== */

        section {
            max-width: 1000px;
            margin: auto;

            padding: 70px 25px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 34px;
            color: #111827;

            margin-bottom: 8px;
        }

        .section-title p {
            color: #6b7280;
        }

        /* ===== GIỚI THIỆU ===== */

        .about-container {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 25px;
        }

        .card {
            background: white;

            padding: 30px;

            border-radius: 15px;

            border: 1px solid #e5e7eb;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
        }

        .card h3 {
            color: #2563eb;

            margin-bottom: 15px;

            font-size: 21px;
        }

        .card p {
            color: #6b7280;
        }

        /* ===== DỰ ÁN ===== */

        .projects {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 25px;
        }

        .project {
            background: white;

            padding: 30px;

            border-radius: 15px;

            border: 1px solid #e5e7eb;

            transition: 0.3s;
        }

        .project:hover {
            transform: translateY(-5px);

            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }

        .project-number {
            color: #2563eb;

            font-size: 14px;
            font-weight: bold;

            margin-bottom: 8px;
        }

        .project h3 {
            font-size: 22px;

            margin-bottom: 12px;

            color: #111827;
        }

        .project p {
            color: #6b7280;
        }

        /* ===== LIÊN HỆ ===== */

        .contact-box {
            background: #111827;

            color: white;

            padding: 55px 25px;

            border-radius: 20px;

            text-align: center;
        }

        .contact-box h2 {
            font-size: 32px;

            margin-bottom: 15px;
        }

        .contact-box p {
            color: #d1d5db;

            margin-bottom: 15px;
        }

        .contact-box a {
            color: white;

            text-decoration: none;

            font-weight: bold;
        }

        /* ===== FOOTER ===== */

        footer {
            text-align: center;

            padding: 30px;

            color: #6b7280;

            font-size: 14px;
        }

        /* ===== ĐIỆN THOẠI ===== */

        @media (max-width: 768px) {

            .menu {
                display: none;
            }

            .hero {
                flex-direction: column-reverse;

                text-align: center;

                padding-top: 50px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .avatar {
                width: 200px;
                height: 200px;

                font-size: 60px;
            }

            .about-container {
                grid-template-columns: 1fr;
            }

            .projects {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>

    <!-- ===== MENU ===== -->

    <nav>

        <div class="nav-container">

            <div class="logo">
                <?php echo $name; ?>
            </div>

            <ul class="menu">

                <li>
                    <a href="#about">Giới thiệu</a>
                </li>

                <li>
                    <a href="#projects">Dự án</a>
                </li>

                <li>
                    <a href="#contact">Liên hệ</a>
                </li>

            </ul>

        </div>

    </nav>

    <!-- ===== GIỚI THIỆU CHÍNH ===== -->

    <div class="hero">

        <div class="hero-content">

            <div class="hello">
                Xin chào! 👋
            </div>

            <h1>
                <?php echo $name; ?>
            </h1>

            <h2>
                <?php echo $major; ?>
            </h2>

            <p>
                Mình là sinh viên Công nghệ thông tin,
                hiện đang học tập và phát triển các kiến thức
                về lập trình và phát triển phần mềm.
            </p>

            <p>
                Mình đặc biệt quan tâm đến lập trình web
                và mong muốn có thể xây dựng những sản phẩm
                hữu ích trong tương lai.
            </p>

            <a href="#projects" class="button">
                Xem dự án
            </a>

        </div>

        <div class="avatar">
            LP
        </div>

    </div>

    <!-- ===== VỀ BẢN THÂN ===== -->

    <section id="about">

        <div class="section-title">

            <h2>Về mình</h2>

            <p>
                Một chút thông tin về bản thân
            </p>

        </div>

        <div class="about-container">

            <div class="card">

                <h3>🎓 Học tập</h3>

                <p>
                    Mình hiện đang là sinh viên ngành
                    Công nghệ thông tin. Trong quá trình học tập,
                    mình được tìm hiểu về lập trình, cơ sở dữ liệu,
                    phát triển phần mềm và phát triển website.
                </p>

            </div>

            <div class="card">

                <h3>💡 Định hướng</h3>

                <p>
                    Mình muốn tiếp tục trau dồi kiến thức lập trình,
                    đặc biệt là phát triển web. Mục tiêu của mình
                    là có thể tự xây dựng những website và ứng dụng
                    có tính thực tế.
                </p>

            </div>

            <div class="card">

                <h3>🌱 Sở thích</h3>

                <p>
                    Mình thích tìm hiểu công nghệ mới,
                    lập trình, phát triển website và học thêm
                    những kiến thức có thể phục vụ cho công việc
                    trong tương lai.
                </p>

            </div>

            <div class="card">

                <h3>🚀 Mục tiêu</h3>

                <p>
                    Không ngừng học hỏi, hoàn thiện kỹ năng
                    lập trình và tích lũy kinh nghiệm thông qua
                    các bài tập cũng như những dự án thực tế.
                </p>

            </div>

        </div>

    </section>

    <!-- ===== DỰ ÁN ===== -->

    <section id="projects">

        <div class="section-title">

            <h2>Dự án đã thực hiện</h2>

            <p>
                Một số dự án và bài tập trong quá trình học tập
            </p>

        </div>

        <div class="projects">

            <!-- DỰ ÁN 01 -->

            <div class="project">

                <div class="project-number">
                    PROJECT 01
                </div>

                <h3>
                    Web giới thiệu du lịch Đà Nẵng
                </h3>

                <p>
                    Giới thiệu du lịch, ẩm thực, đặt phòng.
                </p>

            </div>

            <!-- DỰ ÁN 02 -->

            <div class="project">

                <div class="project-number">
                    PROJECT 02
                </div>

                <h3>
                    Website chia sẻ tài liệu học tập
                </h3>

                <p>
                    Xây dựng ý tưởng website giúp người dùng
                    chia sẻ và tìm kiếm tài liệu học tập.
                    Đây là dự án giúp mình thực hành các kiến thức
                    về lập trình web.
                </p>

            </div>

            <!-- DỰ ÁN 03 -->

            <div class="project">

                <div class="project-number">
                    PROJECT 03
                </div>

                <h3>
                    Website hệ thống quản lý thư viện mini
                </h3>

                <p>
                    Xây dựng website quản lý thư viện mini
                    phục vụ cho việc thực hành lập trình web.
                </p>

            </div>

        </div>

    </section>

    <!-- ===== LIÊN HỆ ===== -->

    <section id="contact">

        <div class="contact-box">

            <h2>Liên hệ với mình</h2>

            <p>
                Nếu bạn muốn trao đổi về công nghệ,
                lập trình hoặc các dự án học tập,
                hãy liên hệ với mình.
            </p>

            <a href="mailto:<?php echo $email; ?>">
                <?php echo $email; ?>
            </a>

        </div>

    </section>

    <!-- ===== FOOTER ===== -->

    <footer>

        © 2026 <?php echo $name; ?>.
        Personal Portfolio.

    </footer>

</body>

</html>